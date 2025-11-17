<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class AdminController extends Controller
{
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
    // 👇 Added login + dashboard logic here
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

        // Find admin by email
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }

        // Store admin session manually
        session(['admin_id' => $admin->id]);
        return redirect()->route('admin.dashboard');
    }

public function dashboard()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login')->with('status', 'Please login first.');
        }

        $admin = Admin::find(session('admin_id'));

        // ✅ Detect which column exists for revenue
        $revenueColumn = Schema::hasColumn('bookings', 'amount') ? 'amount' :
                         (Schema::hasColumn('bookings', 'price') ? 'price' :
                         (Schema::hasColumn('bookings', 'total_price') ? 'total_price' : null));

        // ✅ Summary cards
        $totalBookings = Booking::count();
        $totalRevenue = $revenueColumn ? Booking::sum($revenueColumn) : 0;
        $totalProfit = $totalRevenue * 0.2; // Example 20% profit

        // ✅ Monthly Bookings Data
        $bookingsData = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $bookingsDataFull = [];
        for ($i = 1; $i <= 12; $i++) {
            $bookingsDataFull[] = $bookingsData[$i] ?? 0;
        }

        // ✅ Monthly Revenue Data
        $revenueDataFull = [];
        if ($revenueColumn) {
            $revenueData = Booking::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw("SUM($revenueColumn) as total")
            )
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('total', 'month')
                ->toArray();

            for ($i = 1; $i <= 12; $i++) {
                $revenueDataFull[] = $revenueData[$i] ?? 0;
            }
        }

        // ✅ Booking Type Data (Tours, Taxi, Activity)
        $bookingTypeData = [
            'Tours' => Booking::where('type', 'Tours')->count(),
            'Taxi' => Booking::where('type', 'Taxi')->count(),
            'Activity' => Booking::where('type', 'Activity')->count(),
        ];

        // ✅ Latest Reservations
        $recentReservations = Booking::latest()->take(5)->get();

        return view('admin.dashboard', [
            'admin' => $admin,
            'totalBookings' => $totalBookings,
            'totalRevenue' => $totalRevenue,
            'totalProfit' => $totalProfit,
            'bookingsData' => $bookingsDataFull,
            'revenueData' => $revenueDataFull,
            'bookingTypeData' => $bookingTypeData,
            'recentReservations' => $recentReservations,
        ]);
    }



    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login')->with('status', 'Logged out successfully.');
    }

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

    // 1️⃣ Daily Booking Created (based on created_at)
    $dailyCreated = \DB::table('bookings')
        ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->whereBetween('created_at', [$start, $end])
        ->groupBy('date')
        ->pluck('count', 'date');

    // 2️⃣ Total Bookings for actual travel dates (based on booking_date)
    $dailyTotalBookings = \DB::table('bookings')
        ->selectRaw('DATE(booking_date) as date, COUNT(*) as count')
        ->whereBetween('booking_date', [$start, $end])
        ->groupBy('date')
        ->pluck('count', 'date');

    // 3️⃣ & 4️⃣ Daily Revenue
    $dailyRevenue = \DB::table('bookings')
        ->selectRaw('DATE(booking_date) as date, SUM(total_amount) as total')
        ->whereBetween('booking_date', [$start, $end])
        ->groupBy('date')
        ->pluck('total', 'date');

    // 5️⃣ & 6️⃣ Daily Profit
    $dailyProfit = \DB::table('bookings')
        ->selectRaw('DATE(booking_date) as date, SUM(profit_amount) as total')
        ->whereBetween('booking_date', [$start, $end])
        ->groupBy('date')
        ->pluck('total', 'date');

    // 7️⃣ & 8️⃣ Booking Type Breakdown
    $dailyTypes = \DB::table('bookings')
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

}
