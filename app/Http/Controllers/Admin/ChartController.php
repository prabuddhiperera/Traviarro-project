<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function getChartData(Request $request)
    {
        $year = $request->get('year', now()->year);
        $month = $request->get('month', now()->month);

        $startDate = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = Carbon::create($year, $month, 1)->endOfMonth();

        $bookings = DB::table('bookings')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate])
                      ->orWhereBetween('travel_date', [$startDate, $endDate]);
            })
            ->get();

        $dailyCreated = [];
        $dailyTotalBookings = [];
        $dailyRevenue = [];
        $dailyProfit = [];
        $dailyTypes = [];

        $date = $startDate->copy();
        while ($date <= $endDate) {
            $d = $date->toDateString();
            $dailyCreated[$d] = 0;
            $dailyTotalBookings[$d] = 0;
            $dailyRevenue[$d] = 0;
            $dailyProfit[$d] = 0;
            $dailyTypes[$d] = ['Tours'=>0, 'Taxi'=>0, 'Activity'=>0];
            $date->addDay();
        }

        foreach ($bookings as $b) {
            $createdDate = Carbon::parse($b->created_at)->toDateString();
            $travelDate = Carbon::parse($b->travel_date)->toDateString();
            $type = $b->type;

            if(isset($dailyCreated[$createdDate])) $dailyCreated[$createdDate]++;
            if(isset($dailyTotalBookings[$travelDate])) $dailyTotalBookings[$travelDate]++;
            if(isset($dailyRevenue[$travelDate])) $dailyRevenue[$travelDate] += $b->revenue ?? 0;
            if(isset($dailyProfit[$travelDate])) $dailyProfit[$travelDate] += $b->profit ?? 0;
            if(isset($dailyTypes[$travelDate][$type])) $dailyTypes[$travelDate][$type]++;
        }

        return response()->json([
            'dailyCreated' => $dailyCreated,
            'dailyTotalBookings' => $dailyTotalBookings,
            'dailyRevenue' => $dailyRevenue,
            'dailyProfit' => $dailyProfit,
            'dailyTypes' => $dailyTypes,
        ]);
    }
}
