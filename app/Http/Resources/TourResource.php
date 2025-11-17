<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
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
            'title' => $this->title,
            'price' => $this->price,
            'duration' => $this->duration,
            'description' => $this->description,
            'image' => $this->image,
            'destination' => new DestinationResource($this->whenLoaded('destination')),
            'admin' => new AdminResource($this->whenLoaded('admin')),
            'bookings' => BookingResource::collection($this->whenLoaded('bookings')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];

    }
}
