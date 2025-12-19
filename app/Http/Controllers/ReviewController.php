<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    /**
     * API: Get all reviews with related models
     */
    public function index()
    {
        $reviews = Review::with(['user','tour','destination'])->get();
        return ReviewResource::collection($reviews);
    }

    /**
     * API: Store a new review
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'comment' => 'required|string',
    ]);

    // Save review
    Review::create([
        'user_id' => null,        // no user ID for now
        'tour_id' => null,        // optional
        'destination_id' => null, // optional
        'rating' => 5,            // default rating, you can add a rating input if you want
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Thank you! Your message has been sent.');
}


    /**
     * API: Show a single review
     */
    public function show(Review $review)
    {
        $review->load(['user','tour','destination']);
        return new ReviewResource($review);
    }

    /**
     * API: Update a review
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id', // Nullable
            'tour_id' => 'nullable|exists:tours,id',
            'destination_id' => 'nullable|exists:destinations,id',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review->update($request->all());
        return new ReviewResource($review);
    }

    /**
     * API: Delete a review
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }

    /**
     * Homepage: Get latest 12 reviews with random names
     */
    public function homeReviews()
{
    // Get the latest 12 reviews
    $reviews = Review::orderBy('created_at', 'desc')->limit(12)->get();

    // Random names for display
    $names = [
        'Alice', 'Bob', 'Charlie', 'Diana', 'Ethan', 'Fiona',
        'George', 'Hannah', 'Ian', 'Julia', 'Kevin', 'Laura'
    ];

    // Pass to the welcome view instead of home
    return view('welcome', compact('reviews', 'names'));
}

}
