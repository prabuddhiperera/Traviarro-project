<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => $this->faker->sentence(10),
            'description' => $this->faker->paragraphs(4, true),
            'image' => 'uploads/services/' . $this->faker->randomElement([
                'taxi.jpg', 'yala.jpg', 'city-tour.jpg', 'wilpattu.jpg', 'bentota.jpg'
            ]),
            'category' => $this->faker->randomElement([
                'Safari', 'Adventure', 'Transport', 'City Tour', 'Cultural'
            ]),
            'status' => $this->faker->boolean(90), // 90% active
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
