<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        // Search filter
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $services = $query->get();

        // Get distinct categories for the filter dropdown
        $categories = Service::distinct()->pluck('category');

        return view('services.index', compact('services', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'type'=>'required|string',
            'price'=>'required|numeric',
            'description'=>'nullable',
            'admin_id'=>'required|exists:admins,id'
        ]);

        $service = Service::create($request->all());
        return new ServiceResource($service);
    }

    // Show a single service
    public function show($id)
{
    $service = Service::findOrFail($id);

    // Related services by category
    $relatedServices = Service::where('category', $service->category)
                              ->where('id', '!=', $service->id) // exclude current
                              ->take(3)
                              ->get();

    return view('services.show', compact('service', 'relatedServices'));
}


    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'=>'sometimes|required',
            'type'=>'sometimes|required|string',
            'price'=>'sometimes|required|numeric',
            'description'=>'nullable',
            'admin_id'=>'sometimes|required|exists:admins,id'
        ]);

        $service->update($request->all());
        return new ServiceResource($service);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(['message'=>'Service deleted successfully']);
    }
}
