<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ===========================
    // SHOW ALL CUSTOMERS
    // ===========================
    public function index()
    {
        $customers = User::orderBy('created_at', 'desc')->get();
        return view('admin.customer.customer', compact('customers'));
    }

    // ===========================
    // STORE CUSTOMER
    // ===========================
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'number_of_adults' => 'nullable|integer|min:0',
            'number_of_children' => 'nullable|integer|min:0',
            'type' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        User::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer added successfully!');
    }

    // ===========================
    // EDIT PAGE
    // ===========================
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customer.customer_edit', compact('customer'));
    }

    // ===========================
    // UPDATE CUSTOMER
    // ===========================
    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'number_of_adults' => 'nullable|integer|min:0',
            'number_of_children' => 'nullable|integer|min:0',
            'type' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully!');
    }

    // ===========================
    // DELETE CUSTOMER
    // ===========================
    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully!');
    }
}
