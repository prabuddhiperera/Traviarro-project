<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Http\Resources\AdminResource;

class AdminController extends Controller
{
    // ----------------------------------------------------------
    // ADMIN CRUD (API)
    // ----------------------------------------------------------

    public function index()
    {
        $admins = Admin::with(['users','destinations','tours','services','bookings','tripPlans'])->get();
        return AdminResource::collection($admins);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6'
        ]);

        $admin = Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return new AdminResource($admin);
    }

    public function show(Admin $admin)
    {
        $admin->load(['users','destinations','tours','services','bookings','tripPlans']);
        return new AdminResource($admin);
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name'=>'sometimes|required',
            'email'=>'sometimes|required|email|unique:admins,email,'.$admin->id,
            'password'=>'nullable|min:6'
        ]);

        $admin->name = $request->name ?? $admin->name;
        $admin->email = $request->email ?? $admin->email;

        if($request->password){
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return new AdminResource($admin);
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->json(['message'=>'Admin deleted successfully']);
    }


    // ----------------------------------------------------------
    // LOGIN SYSTEM (MANUAL SESSION)
    // ----------------------------------------------------------

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }

        // Store admin session manually
        session(['admin_id' => $admin->id]);

        return redirect()->route('admin.dashboard');
    }

    // ----------------------------------------------------------
    // DASHBOARD
    // ----------------------------------------------------------

    public function dashboard()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login')->with('status', 'Please login first.');
        }

        $admin = Admin::find(session('admin_id'));

        // Revenue column auto-detect
        $revenueColumn = Schema::hasColumn('bookings', 'amount') ? 'amount' :
            (Schema::hasColumn('bookings', 'price') ? 'price' :
            (Schema::hasColumn('bookings', 'total_amount') ? 'total_amount' : null));

        $totalBookings = Booking::count();
        $totalRevenue = $revenueColumn ? Booking::sum($revenueColumn) : 0;
        $totalProfit   = $totalRevenue * 0.20; // 20% profit

        // Monthly booking chart
        $bookingsData = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total','month')
        ->toArray();

        $bookingsDataFull = [];
        for ($i = 1; $i <= 12; $i++) {
            $bookingsDataFull[] = $bookingsData[$i] ?? 0;
        }

        // Monthly revenue chart
        $revenueDataFull = [];
        if ($revenueColumn) {
            $revenueData = Booking::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw("SUM($revenueColumn) as total")
            )
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total','month')
            ->toArray();

            for ($i = 1; $i <= 12; $i++) {
                $revenueDataFull[] = $revenueData[$i] ?? 0;
            }
        }

        // Booking type breakdown
        $bookingTypeData = [
            'Tours' => Booking::where('type', 'Tours')->count(),
            'Taxi'  => Booking::where('type', 'Taxi')->count(),
            'Activity' => Booking::where('type', 'Activity')->count(),
        ];

        $recentReservations = Booking::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'admin',
            'totalBookings',
            'totalRevenue',
            'totalProfit',
            'bookingsDataFull',
            'revenueDataFull',
            'bookingTypeData',
            'recentReservations'
        ));
    }


    // ----------------------------------------------------------
    // CHARTS
    // ----------------------------------------------------------

    public function charts()
    {
        return view('admin.chart');
    }

    public function getChartData(Request $request)
    {
        $year = $request->year ?? now()->year;
        $month = $request->month ?? now()->month;

        $start = \Carbon\Carbon::create($year, $month, 1)->startOfMonth();
        $end = (clone $start)->endOfMonth();

        // Chart queries
        $dailyCreated = DB::table('bookings')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('date')
            ->pluck('count', 'date');

        $dailyTotalBookings = DB::table('bookings')
            ->selectRaw('DATE(booking_date) as date, COUNT(*) as count')
            ->whereBetween('booking_date', [$start, $end])
            ->groupBy('date')
            ->pluck('count', 'date');

        $dailyRevenue = DB::table('bookings')
            ->selectRaw('DATE(booking_date) as date, SUM(total_amount) as total')
            ->whereBetween('booking_date', [$start, $end])
            ->groupBy('date')
            ->pluck('total', 'date');

        $dailyProfit = DB::table('bookings')
            ->selectRaw('DATE(booking_date) as date, SUM(profit_amount) as total')
            ->whereBetween('booking_date', [$start, $end])
            ->groupBy('date')
            ->pluck('total', 'date');

        $dailyTypes = DB::table('bookings')
            ->selectRaw('DATE(booking_date) as date, type, COUNT(*) as count')
            ->whereBetween('booking_date', [$start, $end])
            ->groupBy('date', 'type')
            ->get();

        $typesFormatted = [];
        foreach ($dailyTypes as $row) {
            $typesFormatted[$row->date][$row->type] = $row->count;
        }

        return response()->json([
            'dailyCreated' => $dailyCreated,
            'dailyTotalBookings' => $dailyTotalBookings,
            'dailyRevenue' => $dailyRevenue,
            'dailyProfit' => $dailyProfit,
            'dailyTypes' => $typesFormatted,
        ]);
    }


    // ----------------------------------------------------------
    // LOGOUT
    // ----------------------------------------------------------

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login')->with('status', 'Logged out successfully.');
    }
}
