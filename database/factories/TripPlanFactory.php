<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripPlan>
 */
class TripPlanFactory extends Factory
{
protected $model = TripPlan::class;

    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('+1 days', '+2 months');
        $endDate = (clone $startDate)->modify('+'. $this->faker->numberBetween(1,7) .' days');

        return [
            'user_id' => User::factory(),
            'admin_id' => Admin::factory(),
            'title' => 'Trip Plan: '.$this->faker->city,
            'budget' => $this->faker->numberBetween(20000, 100000),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'notes' => $this->faker->paragraph,
        ];
    }
}
