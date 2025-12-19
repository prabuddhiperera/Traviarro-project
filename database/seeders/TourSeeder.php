<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    public function run()
    {
        // Delete existing tours safely (no truncate)
        DB::table('tours')->delete();

        // Insert tours without specifying `id` to avoid duplicates
        DB::table('tours')->insert([
            [
                'admin_id' => 1,
                'name' => '7 Days / 6 Nights Sri Lanka Highlights',
                'destination_id' => 1,
                'price' => 800,
                'description' => 'Explore Sri Lanka highlights – culture, mountains, beaches.',
                'image' => 'tours/7days.jpg',
                'pickup_location' => 'Airport',
                'dropoff_location' => 'Airport',
                'travel_date' => null,
                'travel_time' => null,
                'vehicle_type' => 'Car',
                'flight_number' => null,
                'duration' => '7 Days',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'admin_id' => 1,
                'name' => '10 Days / 9 Nights Sri Lanka Discovery',
                'destination_id' => 2,
                'price' => 1100,
                'description' => 'Sri Lanka Discovery Tour – beaches, culture, wildlife, and adventure.',
                'image' => 'tours/10days.jpg',
                'pickup_location' => 'Airport',
                'dropoff_location' => 'Airport',
                'travel_date' => null,
                'travel_time' => null,
                'vehicle_type' => 'Car',
                'flight_number' => null,
                'duration' => '10 Days',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_id' => 1,
                'name' => '15 Days / 14 Nights Family Getaway',
                'destination_id' => 3,
                'price' => 1500,
                'description' => 'Complete Sri Lanka family adventure covering all highlights.',
                'image' => 'tours/15days.jpg',
                'pickup_location' => 'Airport',
                'dropoff_location' => 'Airport',
                'travel_date' => null,
                'travel_time' => null,
                'vehicle_type' => 'Car',
                'flight_number' => null,
                'duration' => '15 Days',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
