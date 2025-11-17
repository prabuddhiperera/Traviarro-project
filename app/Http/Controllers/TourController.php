<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Resources\TourResource;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all(); // fetch all tours
        return view('tours.index', compact('tours'));
    }

    public function show($id)
    {
        $tour = Tour::findOrFail($id);
        return view('tours.show', compact('tour'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination_id' => 'required|exists:destinations,id',
            'price' => 'required|numeric',
            'duration' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string'
        ]);

        $tour = Tour::create($request->all());
        return new TourResource($tour);
    }

    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'destination_id' => 'sometimes|required|exists:destinations,id',
            'price' => 'sometimes|required|numeric',
            'duration' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string'
        ]);

        $tour->update($request->all());
        return new TourResource($tour);
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return response()->json(['message' => 'Tour deleted successfully']);
    }
}
