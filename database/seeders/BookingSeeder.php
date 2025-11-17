<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $services = Service::all();
        $statuses = ['Completed', 'Pending', 'Cancelled'];
        $locations = ['Colombo', 'Kandy', 'Galle', 'Negombo', 'Jaffna'];
        $vehicleTypes = [
            'Car (3 Adults)',
            'SUV (3 Adults)',
            'Flat Roof Van (4-6 Adults)',
            'High Roof Van (7-9 Adults)',
            'Bus / Coach (15 / 25 / 45 Seater)',
            'Luxury (3-4 Adults)',
        ];

        if ($users->isEmpty() || $services->isEmpty()) {
            $this->command->error('No users or services found. Seed users and services first.');
            return;
        }

        foreach ($users as $user) {
            // For each user, create random bookings
            for ($i = 0; $i < 5; $i++) {
                $service = $services->random(); // pick a random service

                $bookingDate = Carbon::now()->subDays(rand(0, 30));
                $travelDate = Carbon::now()->addDays(rand(1, 30));

                Booking::create([
                    'user_id' => $user->id,
                    'tour_id' => $service->id,
                    'type' => $service->title, // exactly from services table
                    'status' => $statuses[array_rand($statuses)],
                    'customer_name' => $user->full_name ?? $user->name,
                    'phone' => $user->phone ?? '+94771234567',
                    'from_location' => $locations[array_rand($locations)],
                    'to_location' => $locations[array_rand($locations)],
                    'booking_date' => $bookingDate->format('Y-m-d'),
                    'travel_date' => $travelDate->format('Y-m-d'),
                    'travel_time' => rand(0, 23) . ':' . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT),
                    'number_of_people' => rand(1, 5),
                    'total_price' => rand(100, 500),
                    'revenue' => rand(200, 1000),
                    'profit' => rand(50, 500),
                    'amount' => rand(100, 500),
                    'vehicle_type' => $vehicleTypes[array_rand($vehicleTypes)],
                    'itinerary' => 'Sample itinerary for ' . ($user->full_name ?? $user->name),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
