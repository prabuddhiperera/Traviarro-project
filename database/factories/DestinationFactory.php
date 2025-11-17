<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Destination;

class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Remove admin factory for now
            'admin_id' => null, 
            'name' => $this->faker->city . ' Tourist Spot',
            'city' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'places_to_visit' => implode(', ', $this->faker->words(5)), // random placeholder
            'things_to_do' => implode(', ', $this->faker->words(5)),    // random placeholder
            'image' => 'destination.jpg', // placeholder image
        ];
    }
}
