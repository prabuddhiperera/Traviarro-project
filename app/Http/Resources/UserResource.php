<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'bookings' => BookingResource::collection($this->whenLoaded('bookings')),
            'trip_plans' => TripPlanResource::collection($this->whenLoaded('tripPlans')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'admin' => new AdminResource($this->whenLoaded('admin')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
