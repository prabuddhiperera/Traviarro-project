<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'tour'])->get();
        return BookingResource::collection($bookings);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'nullable|exists:services,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
            'travel_date' => 'required|date',
            'travel_time' => 'required',
            'from_location' => 'required|string',
            'to_location' => 'required|string',
            'type' => 'required|string',
        ]);

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'customer_name' => $request->customer_name ?? 'API User',
            'phone' => $request->phone ?? 'N/A',
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'booking_date' => now()->toDateString(),
            'travel_date' => $request->travel_date,
            'travel_time' => $request->travel_time,
            'number_of_people' => $request->number_of_people ?? 1,
            'type' => $request->type,
            'total_price' => $request->total_price,
            'revenue' => $request->total_price,
            'profit' => $request->total_price * 0.2,
            'amount' => $request->total_price,
            'status' => $request->status,
            'vehicle_type' => $request->vehicle_type ?? 'Car',
            'itinerary' => $request->itinerary ?? 'N/A',
        ]);

        return new BookingResource($booking);
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'tour']);
        return new BookingResource($booking);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'sometimes|required|string',
            'total_price' => 'sometimes|required|numeric',
        ]);

        $booking->update($request->only([
            'status', 'total_price'
        ]));

        return new BookingResource($booking);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
