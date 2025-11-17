<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user','tour','destination'])->get();
        return ReviewResource::collection($reviews);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'tour_id'=>'nullable|exists:tours,id',
            'destination_id'=>'nullable|exists:destinations,id',
            'rating'=>'required|integer|min:1|max:5',
            'comment'=>'nullable|string'
        ]);

        $review = Review::create($request->all());
        return new ReviewResource($review);
    }

    public function show(Review $review)
    {
        $review->load(['user','tour','destination']);
        return new ReviewResource($review);
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'user_id'=>'sometimes|required|exists:users,id',
            'tour_id'=>'nullable|exists:tours,id',
            'destination_id'=>'nullable|exists:destinations,id',
            'rating'=>'sometimes|required|integer|min:1|max:5',
            'comment'=>'nullable|string'
        ]);

        $review->update($request->all());
        return new ReviewResource($review);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(['message'=>'Review deleted successfully']);
    }
}
