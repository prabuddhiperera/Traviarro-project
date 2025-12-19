<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use App\Models\Tour;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'tour'])->latest()->paginate(10);
        $users = User::all();
        $tours = Tour::all();
        $services = Service::all();

        $locations = [
            'Bandaranaike International Airport','Ratmalana Airport','Mount Lavinia','Wadduwa',
            'Waskaduwa','Kalutara','Beruwala','Aluthgama','Bentota','Induruwa','Kosgoda','Ahungalla',
            'Balapitiya','Ambalangoda','Akurala','Meetiyagoda','Hikkaduwa','Dodanduwa','Mirissa',
            'Unawatuna','Talpe','Koggala','Habaraduwa','Ahangama','Weligama','Matara','Dondra',
            'Talalla','Hiriketiya','Dickwella','Tangalle','Ridiyagama','Udawalawe','Yala (Kirinda)',
            'Tissamaharama','Weerawila','Kataragama','Haputale','Bandarawela','Ella','Ratnapura'
        ];

        $nextReservationId = 'R' . (Booking::max('id') + 1 ?? 1);

        return view('admin.booking', compact('bookings', 'users', 'tours', 'services', 'locations', 'nextReservationId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|string|unique:bookings,reservation_id',
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'nullable|exists:services,id',
            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'pickup_location' => 'nullable|string',
            'dropoff_location' => 'nullable|string',
            'travel_date' => 'required|date',
            'travel_time' => 'required',
            'vehicle_type' => 'required|string',
            'itinerary' => 'nullable|string',
            'total_price' => 'required|numeric',
            'payment_status' => 'required|string',
            'reservation_status' => 'required|string',
        ]);

        $user = User::find($request->user_id);
        $service = Service::find($request->tour_id);

        Booking::create([
            'reservation_id' => $request->reservation_id,
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'customer_name' => $user->full_name ?? $user->name ?? 'Guest',
            'phone' => $user->phone ?? 'N/A',
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'booking_date' => now()->toDateString(),
            'travel_date' => $request->travel_date,
            'travel_time' => $request->travel_time,
            'number_of_people' => $request->number_of_people ?? 1,
            'type' => $service->title ?? 'General',
            'total_price' => $request->total_price,
            'revenue' => $request->total_price,      // <-- must include
            'profit' => $request->total_price * 0.2, // <-- must include
            'amount' => $request->total_price,       // <-- must include
            'status' => $request->reservation_status ?? 'Pending',
            'vehicle_type' => $request->vehicle_type,
            'baby_seat' => $request->baby_seat,
            'flight_number' => $request->flight_number,
            'itinerary' => $request->itinerary,
            'payment_status' => $request->payment_status ?? 'Unpaid',
            'payment_method' => $request->payment_method ?? 'Cash',
        ]);


        return redirect()->back()->with('success', 'Booking created successfully!');
    }

    public function edit(Booking $booking)
    {
        $users = User::all();
        $tours = Tour::all();
        $services = Service::all();
        $locations = [
            'Bandaranaike International Airport','Ratmalana Airport','Mount Lavinia','Wadduwa',
            'Waskaduwa','Kalutara','Beruwala','Aluthgama','Bentota','Induruwa','Kosgoda','Ahungalla',
            'Balapitiya','Ambalangoda','Akurala','Meetiyagoda','Hikkaduwa','Dodanduwa','Mirissa',
            'Unawatuna','Talpe','Koggala','Habaraduwa','Ahangama','Weligama','Matara','Dondra',
            'Talalla','Hiriketiya','Dickwella','Tangalle','Ridiyagama','Udawalawe','Yala (Kirinda)',
            'Tissamaharama','Weerawila','Kataragama','Haputale','Bandarawela','Ella','Ratnapura'
        ];

        return view('admin.bookings.edit', compact('booking','users','tours','services','locations'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'reservation_id' => 'required|string|unique:bookings,reservation_id,' . $booking->id,
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'nullable|exists:services,id',
            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'pickup_location' => 'nullable|string',
            'dropoff_location' => 'nullable|string',
            'travel_date' => 'required|date',
            'travel_time' => 'required',
            'vehicle_type' => 'required|string',
            'itinerary' => 'nullable|string',
            'total_price' => 'required|numeric',
            'payment_status' => 'required|string',
            'reservation_status' => 'required|string', // keep this
        ]);

        $user = User::find($request->user_id);
        $service = Service::find($request->tour_id);

        $numberOfPeople = ($request->adults ?? 0) + ($request->kids ?? 0);
        $totalPrice = $request->total_price;

        $booking->update([
            'reservation_id' => $request->reservation_id,
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'customer_name' => $user->full_name ?? $user->name ?? 'Guest',
            'phone' => $user->phone ?? 'N/A',
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'travel_date' => $request->travel_date,
            'travel_time' => $request->travel_time,
            'number_of_people' => $numberOfPeople,
            'type' => $service->title ?? 'General',
            'total_price' => $totalPrice,
            'revenue' => $totalPrice,        // ensure NOT NULL
            'amount' => $totalPrice,         // ensure NOT NULL
            'profit' => $totalPrice * 0.2,   // update profit
            'vehicle_type' => $request->vehicle_type,
            'baby_seat' => $request->baby_seat ?? 'No',
            'flight_number' => $request->flight_number ?? null,
            'itinerary' => $request->itinerary,
            'payment_status' => $request->payment_status,
            'payment_method' => $request->payment_method,
            'reservation_status' => $request->reservation_status,
        ]);

        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully!');
    }


    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }
}
