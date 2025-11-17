<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    protected $model = Tour::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'admin_id' => Admin::factory(),
            'destination_id' => Destination::factory(),
            'title' => $this->faker->sentence(3),
            'price' => $this->faker->numberBetween(5000, 50000),
            'duration' => $this->faker->numberBetween(1, 7) . ' Days / ' . $this->faker->numberBetween(0, 6) . ' Nights',
            'description' => $this->faker->paragraph,
            'image' => 'tour.jpg',
        ];
    }
}
