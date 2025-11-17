<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'users' => UserResource::collection($this->whenLoaded('users')),
            'destinations' => DestinationResource::collection($this->whenLoaded('destinations')),
            'tours' => TourResource::collection($this->whenLoaded('tours')),
            'services' => ServiceResource::collection($this->whenLoaded('services')),
            'bookings' => BookingResource::collection($this->whenLoaded('bookings')),
            'trip_plans' => TripPlanResource::collection($this->whenLoaded('tripPlans')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
