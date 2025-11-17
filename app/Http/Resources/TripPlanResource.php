<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripPlanResource extends JsonResource
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
            'budget' => $this->budget,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'notes' => $this->notes,
            'user' => new UserResource($this->whenLoaded('user')),
            'admin' => new AdminResource($this->whenLoaded('admin')),
            'destinations' => DestinationResource::collection($this->whenLoaded('destinations')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
