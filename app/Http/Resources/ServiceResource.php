<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'type' => $this->type,
            'price' => $this->price,
            'description' => $this->description,
            'admin' => new AdminResource($this->whenLoaded('admin')),
            'bookings' => BookingResource::collection($this->whenLoaded('bookings')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
