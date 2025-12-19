<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use File;

class AdminServiceController extends Controller
{
    /**
     * Display the main page with create form + list
     */
    public function index()
    {
        // Get all services
        $services = Service::orderBy('id', 'DESC')->get();

        // Get distinct categories from services table
        $categories = Service::select('category')
            ->distinct()
            ->pluck('category')
            ->filter() // remove null/empty
            ->values(); // reindex the array

        return view('admin.services.create_services', compact('services', 'categories'));
    }

    /**
     * Store a new service
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'image'  => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->slug = $request->slug ?? Str::slug($request->title);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->category = $request->category;
        $service->status = $request->status;

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/services'), $filename);
            $service->image = $filename;
        }

        $service->save();

        return redirect()->back()->with('success', 'Service created successfully!');
    }

    /**
     * Edit page
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        // Get distinct categories for dropdown
        $categories = Service::select('category')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();

        return view('admin.services.edit_services', compact('service', 'categories'));
    }

    /**
     * Update service
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'image'  => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $service->title = $request->title;
        $service->slug = $request->slug ?? Str::slug($request->title);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->category = $request->category;
        $service->status = $request->status;

        if ($request->hasFile('image')) {
            if ($service->image && File::exists(public_path('uploads/services/' . $service->image))) {
                File::delete(public_path('uploads/services/' . $service->image));
            }
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/services'), $filename);
            $service->image = $filename;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Delete service
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image && File::exists(public_path('uploads/services/' . $service->image))) {
            File::delete(public_path('uploads/services/' . $service->image));
        }

        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully!');
    }
}
