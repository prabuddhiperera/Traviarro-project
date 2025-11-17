<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    // Show list of destinations in Blade view
    public function index()
    {
        $destinations = Destination::all(); // fetch all destinations
        return view('destination.index', compact('destinations')); // pass to Blade
    }

    // Show a single destination page
    public function show(Destination $destination)
    {
        // Eager load related places and activities
        $destination->load(['places', 'activities']);

        return view('destination.show', compact('destination'));
    }

    // Store a new destination (API or form)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string', // you can change to 'image|mimes:jpg,png' if file upload
            'admin_id' => 'nullable|exists:admins,id'
        ]);

        $destination = Destination::create($request->only([
            'name', 'city', 'description', 'image', 'admin_id'
        ]));

        return response()->json($destination, 201);
    }

    // Update an existing destination
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'admin_id' => 'sometimes|nullable|exists:admins,id'
        ]);

        $destination->update($request->only([
            'name', 'city', 'description', 'image', 'admin_id'
        ]));

        return response()->json($destination);
    }

    // Delete a destination
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return response()->json(['message' => 'Destination deleted successfully']);
    }
}
