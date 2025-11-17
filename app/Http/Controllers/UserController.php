<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['admin','bookings','tripPlans','reviews'])->get();
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'number_of_adults' => 'nullable|integer|min:0',
            'number_of_children' => 'nullable|integer|min:0',
            'type' => 'nullable|in:user,admin',
            'notes' => 'nullable|string',
        ]);

        $user = User::create($request->only([
            'full_name', 'email', 'phone', 'country', 
            'number_of_adults', 'number_of_children', 'type', 'notes'
        ]));

        return new UserResource($user);
    }

    public function show(User $user)
    {
        $user->load(['admin','bookings','tripPlans','reviews']);
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'number_of_adults' => 'nullable|integer|min:0',
            'number_of_children' => 'nullable|integer|min:0',
            'type' => 'nullable|in:user,admin',
            'notes' => 'nullable|string',
        ]);

        $user->update($request->only([
            'full_name', 'email', 'phone', 'country', 
            'number_of_adults', 'number_of_children', 'type', 'notes'
        ]));

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
