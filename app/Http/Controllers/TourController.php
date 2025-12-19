<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    // ----------------------------------------------------------
    // CUSTOMER TOUR LIST PAGE
    // ----------------------------------------------------------
    public function customerTours()
    {
        $tours = Tour::with('destination')->latest()->get();
        return view('tours.index', compact('tours'));
    }

    // CUSTOMER TOUR DETAILS
    public function customerShow($id)
{
    $tour = Tour::with('days')->findOrFail($id);
    return view('tours.show', compact('tour'));
}



    // ----------------------------------------------------------
    // ADMIN TOUR DASHBOARD
    // ----------------------------------------------------------
    public function index()
    {
        return view('admin.tours.manage-tours', [
            'tours' => Tour::with(['destination', 'bookings.user'])->latest()->get(),
            'destinations' => Destination::all(),
            'users' => User::all(),
        ]);
    }


    // CREATE FORM
    public function create()
    {
        return view('admin.tours.create', [
            'destinations' => Destination::all(),
            'users' => User::all(),
        ]);
    }


    // STORE NEW TOUR
    public function store(Request $request)
    {
        $request->validate([
            'user_id'         => 'required|exists:users,id',
            'destination_id'  => 'required|exists:destinations,id',
            'tour_id'         => 'nullable|exists:tours,id',
            'price'           => 'required|numeric|min:0',
            'commission'      => 'nullable|numeric|min:0',
            'description'     => 'nullable|string',
            'image'           => 'nullable|image|max:2048',
            'pickup_location' => 'nullable|string',
            'dropoff_location'=> 'nullable|string',
            'travel_date'     => 'nullable|date',
            'travel_time'     => 'nullable|string',
            'vehicle_type'    => 'nullable|string',
            'flight_number'   => 'nullable|string',
        ]);

        $adminId = Session::get('admin_id');
        if (!$adminId) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        // Upload Image
        $imageName = $request->hasFile('image')
            ? $request->file('image')->store('tours', 'public')
            : null;

        // If tour_id selected, copy name
        $tourName = 'New Tour';
        if ($request->tour_id) {
            $selectedTour = Tour::find($request->tour_id);
            if ($selectedTour) {
                $tourName = $selectedTour->name;
            }
        }

        Tour::create([
            'admin_id'        => $adminId,
            'user_id'         => $request->user_id,
            'destination_id'  => $request->destination_id,
            'tour_id'         => $request->tour_id,
            'name'            => $tourName,
            'price'           => $request->price,
            'commission'      => $request->commission ?? 0,
            'description'     => $request->description,
            'image'           => $imageName,
            'pickup_location' => $request->pickup_location,
            'dropoff_location'=> $request->dropoff_location,
            'travel_date'     => $request->travel_date,
            'travel_time'     => $request->travel_time,
            'vehicle_type'    => $request->vehicle_type,
            'flight_number'   => $request->flight_number,
            'payment_status'  => $request->payment_status ?? 'Unpaid',
            'payment_method'  => $request->payment_method ?? 'Cash',
            'reservation_status' => $request->reservation_status ?? 'Pending',
        ]);

        return redirect()->back()->with('success', 'Tour created successfully!');
    }


    // EDIT TOUR
    public function edit($id)
    {
        return view('admin.tours.edit-tour', [
            'tour' => Tour::findOrFail($id),
            'users' => User::all(),
            'tours' => Tour::all(),
            'destinations' => Destination::all(),
        ]);
    }


    // UPDATE TOUR
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        $request->validate([
            'user_id'         => 'required|exists:users,id',
            'destination_id'  => 'required|exists:destinations,id',
            'tour_id'         => 'nullable|exists:tours,id',
            'price'           => 'required|numeric|min:0',
            'commission'      => 'nullable|numeric|min:0',
            'description'     => 'nullable|string',
            'image'           => 'nullable|image|max:2048',
            'pickup_location' => 'nullable|string',
            'dropoff_location'=> 'nullable|string',
            'travel_date'     => 'nullable|date',
            'travel_time'     => 'nullable|string',
            'vehicle_type'    => 'nullable|string',
            'flight_number'   => 'nullable|string',
        ]);

        // Update image
        if ($request->hasFile('image')) {

            if ($tour->image && Storage::disk('public')->exists($tour->image)) {
                Storage::disk('public')->delete($tour->image);
            }

            $tour->image = $request->file('image')->store('tours', 'public');
        }

        $tour->update([
            'user_id'         => $request->user_id,
            'tour_id'         => $request->tour_id,
            'destination_id'  => $request->destination_id,
            'price'           => $request->price,
            'commission'      => $request->commission ?? ($request->price * 0.2),
            'description'     => $request->description,
            'pickup_location' => $request->pickup_location,
            'dropoff_location'=> $request->dropoff_location,
            'travel_date'     => $request->travel_date,
            'travel_time'     => $request->travel_time,
            'vehicle_type'    => $request->vehicle_type,
            'flight_number'   => $request->flight_number,
            'payment_status'  => $request->payment_status ?? 'Unpaid',
            'payment_method'  => $request->payment_method ?? 'Cash',
            'reservation_status' => $request->reservation_status ?? 'Pending',
        ]);

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully!');
    }


    // DELETE TOUR
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);

        if ($tour->image && Storage::disk('public')->exists($tour->image)) {
            Storage::disk('public')->delete($tour->image);
        }

        $tour->delete();

        return redirect()->back()->with('success', 'Tour deleted successfully!');
    }
}
