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

        return view('admin.booking', compact('bookings', 'users', 'tours', 'services', 'locations'));
    }

    public function store(Request $request)
    {
        // Validate only the necessary fields
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'nullable|exists:services,id',
            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'travel_date' => 'required|date',
            'travel_time' => 'required',
            'vehicle_type' => 'required|string',
            'itinerary' => 'nullable|string',
            'price' => 'required|numeric',
            'number_of_people' => 'nullable|integer|min:1',
        ]);

        $user = User::find($request->user_id);

        $service = Service::find($request->tour_id);

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'customer_name' => $user->full_name ?? $user->name ?? 'Guest',
            'phone' => $user->phone ?? 'N/A',
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'booking_date' => now()->toDateString(),
            'travel_date' => $request->travel_date,
            'travel_time' => $request->travel_time,
            'number_of_people' => $request->number_of_people ?? 1,
            'type' => $service->title ?? 'General', // ✅ Automatically use service title
            'total_price' => $request->price,
            'revenue' => $request->price,
            'profit' => $request->price * 0.2,
            'amount' => $request->price,
            'status' => 'Pending',
            'vehicle_type' => $request->vehicle_type,
            'itinerary' => $request->itinerary,
        ]);

        return redirect()->back()->with('success', 'Booking created successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking deleted successfully.');
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
        'user_id' => 'required|exists:users,id',
        'tour_id' => 'nullable|exists:services,id',
        'from_location' => 'required|string',
        'to_location' => 'required|string',
        'travel_date' => 'required|date',
        'travel_time' => 'required',
        'vehicle_type' => 'required|string',
        'itinerary' => 'nullable|string',
        'total_price' => 'required|numeric',
        'status' => 'required|string',
    ]);

    $service = Service::find($request->tour_id);

    $booking->update([
        'user_id' => $request->user_id,
        'tour_id' => $request->tour_id,
        'customer_name' => User::find($request->user_id)->full_name ?? 'Guest',
        'phone' => User::find($request->user_id)->phone ?? 'N/A',
        'from_location' => $request->from_location,
        'to_location' => $request->to_location,
        'travel_date' => $request->travel_date,
        'travel_time' => $request->travel_time,
        'vehicle_type' => $request->vehicle_type,
        'type' => $service->title ?? 'General',
        'itinerary' => $request->itinerary,
        'total_price' => $request->total_price,
        'status' => $request->status,
        'profit' => $request->total_price * 0.2,
    ]);

    return redirect()->route('admin.bookings.index')->with('success','Booking updated successfully!');
}

}
