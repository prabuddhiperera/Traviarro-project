<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourDaysSeeder extends Seeder
{
    public function run(): void
    {
        $tour_id = 1; // ID of the Family Getaway Tour in tours table

        $days = [
            [
                'day_number' => 1,
                'title' => 'Arrival - Negombo',
                'description' => 'Negombo is located a few minutes from the airport—your immediate cure for jet lag. Start with the fish market, then paddle through the mangroves. Negombo beach is ideal for a refreshing swim or evening stroll.',
                'image' => '/img/tours/negombo.jpg',
            ],
            [
                'day_number' => 2,
                'title' => 'Sigiriya & Pinnawala',
                'description' => 'Visit Pinnawala Elephant Orphanage, then head to Sigiriya. Safari drive at Minneriya National Park. Spend the evening at the hotel restaurant and pool.',
                'image' => '/img/tours/sigiriya.jpg',
            ],
            [
                'day_number' => 3,
                'title' => 'Sigiriya Rock Fortress',
                'description' => 'Early morning visit to Sigiriya Rock Fortress for sunrise views. Explore frescoes and ruins. Afternoon village tour. Evening at the hotel.',
                'image' => '/img/tours/sigiriya-village.jpg',
            ],
            [
                'day_number' => 4,
                'title' => 'Kandy & Dambulla',
                'description' => 'Visit Dambulla Cave Temple en route to Kandy. Explore Temple of the Tooth Relic and attend a cultural dance show in the evening.',
                'image' => '/img/tours/kandy.jpg',
            ],
            [
                'day_number' => 5,
                'title' => 'Kandy & Botanical Gardens',
                'description' => 'Shop for souvenirs in Kandy. Visit a gem museum and store, then explore the Royal Botanical Gardens in the evening.',
                'image' => '/img/tours/kandy-botanical.jpg',
            ],
            [
                'day_number' => 6,
                'title' => 'Nuwara Eliya',
                'description' => 'Travel to Nuwara Eliya, stopping at Ramboda Waterfall and Post Office. Visit a Tea Factory and stroll around Gregory Lake.',
                'image' => '/img/tours/nuwara-eliya.jpg',
            ],
            [
                'day_number' => 7,
                'title' => 'Horton Plains & Strawberry Farm',
                'description' => 'Early adventure to Horton Plains—see Baker\'s Falls and World\'s End. Evening visit to a strawberry farm with tractor tours and tasting.',
                'image' => '/img/tours/horton-plains.jpg',
            ],
            [
                'day_number' => 8,
                'title' => 'Ella & Scenic Train',
                'description' => 'Travel to Ella by vehicle or train, enjoying mountain scenery. Visit Nine Arch Bridge and Ravana Falls.',
                'image' => '/img/tours/ella.jpg',
            ],
            [
                'day_number' => 9,
                'title' => 'Ella Adventure & Cooking',
                'description' => 'Experience Flying Ravana Zipline. Participate in an authentic Sri Lankan cooking experience. Overnight in Yala.',
                'image' => '/img/tours/ella-adventure.jpg',
            ],
            [
                'day_number' => 10,
                'title' => 'Yala & Mirissa',
                'description' => 'Morning safari in Yala National Park. Travel to Mirissa, stopping at Tangalle Beach and Coconut Tree Hill to watch the sunset.',
                'image' => '/img/tours/yala-mirissa.jpg',
            ],
            [
                'day_number' => 11,
                'title' => 'Whale Watching - Mirissa',
                'description' => 'Whale watching tour in the morning. Relax, surf, and enjoy beach nightlife at Weligama or Mirissa.',
                'image' => '/img/tours/mirissa-whale.jpg',
            ],
            [
                'day_number' => 12,
                'title' => 'Ahangama & Galle Fort',
                'description' => 'Visit Kai Beach in Ahangama. Explore UNESCO Heritage Site Galle Fort in the evening.',
                'image' => '/img/tours/ahangama-galle.jpg',
            ],
            [
                'day_number' => 13,
                'title' => 'Bentota & River Safari',
                'description' => 'Travel to Bentota, stopping at Kosgoda Sea Turtle Hatchery. Enjoy a River Safari and spend the evening at leisure.',
                'image' => '/img/tours/bentota.jpg',
            ],
            [
                'day_number' => 14,
                'title' => 'Colombo City Tour',
                'description' => 'Travel to Colombo. Relaxed city tour, shopping, and experience the luxurious commercial hub.',
                'image' => '/img/tours/colombo.jpg',
            ],
            [
                'day_number' => 15,
                'title' => 'Departure',
                'description' => 'Transfer to the airport for departure with memories from this incredible journey.',
                'image' => '/img/tours/departure.jpg',
            ],
        ];

        foreach ($days as $day) {
            DB::table('tour_days')->insert(array_merge($day, [
                'tour_id' => $tour_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
