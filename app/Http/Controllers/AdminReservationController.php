<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index() {
        $reservations = Reservation::with('user')->latest()->paginate(10);
        return view('admin.reservations', compact('reservations'));
    }

    public function create() {
        return view('admin.create_reservation');
    }

    public function store(Request $request) {
        // Validate customer info first
        $request->validate([
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',

            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'travel_date' => 'required|date',
            'travel_time' => 'required',
            'trip_type' => 'required|in:One Way,Round Trip',
            'vehicle_type' => 'required|string',
            'itinerary' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // Create or get existing customer
        $customer = User::firstOrCreate(
            ['phone' => $request->phone],
            ['full_name' => $request->full_name, 'email' => $request->email]
        );

        // Create reservation
        Reservation::create([
            'user_id' => $customer->id,
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'travel_date' => $request->travel_date,
            'travel_time' => $request->travel_time,
            'trip_type' => $request->trip_type,
            'vehicle_type' => $request->vehicle_type,
            'itinerary' => $request->itinerary,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Reservation created successfully!');
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return back()->with('success', 'Reservation deleted successfully!');
    }
}
