<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
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
            'city' => $this->city,
            'province' => $this->province,
            'description' => $this->description,
            'image' => $this->image,
            'admin' => new AdminResource($this->whenLoaded('admin')),
            'tours' => TourResource::collection($this->whenLoaded('tours')),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
