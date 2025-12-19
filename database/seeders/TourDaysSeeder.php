<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourDaysSeeder extends Seeder
{
    public function run()
    {
        // Define all tours days in order: shortest to longest
        $toursDays = [

            // -------------------------------------------------------------
            // 7 DAYS / 6 NIGHTS  — EXACT WORDS YOU PROVIDED (EXPANDED)
            // -------------------------------------------------------------

            '7 Days / 6 Nights Sri Lanka Highlights' => [
                [
                    'day_number' => 1,
                    'title'      => 'Arrival / Sigiriya',
                    'description'=> 'Upon arrival, make your way towards Sigirya and check-in the hotel to cure jet lag and have a relaxed evening.',
                    'image'      => '/img/tours/negombo.jpg'
                ],
                [
                    'day_number' => 2,
                    'title'      => 'Kandy',
                    'description'=> 'You are in for an adventure this morning, Make your way to the Minneriya National Park with a packed breakfast this morning. - Thereafter, make your way to Kandy and in this evening, experience a cultural cooking class and taste the authentic Sri Lankan food made with love for dinner.',
                    'image'      => '/img/tours/kandy.jpg'
                ],
                [
                    'day_number' => 3,
                    'title'      => 'Kandy',
                    'description'=> '- Adter breakfast this morning, visit a gem museum, where you can enjoy an insightful gem tour about Ceylon gems and purchase beautiful jewelry. - ⁠Hereafter, spend time shopping for souvenirs and woodcarvings in Kandy, which is one of the best places in Sri Lanka to find unique gifts and keepsakes. - ⁠Head for a city tour after lunch where you can visit the royal Botanical Garden. - ⁠And end the day with a cultural dance show and witness the unite and showcase of the country’s diverse traditional dance styles on one stage.',
                    'image'      => '/img/tours/kandy-botanical.jpg'
                ],
                [
                    'day_number' => 4,
                    'title'      => 'Ella',
                    'description'=> 'After breakfast this morning, make your way to Ella by vehicle or by Train (based on availability) enjoying the breathtaking sceneries of mountain hill views. - Visit the Nine Arch Bridge and Ravana Falls and capture photographs of the scenery.',
                    'image'      => '/img/tours/ella.jpg'
                ],
                [
                    'day_number' => 5,
                    'title'      => 'Galle',
                    'description'=> 'After breakfast this morning, make your way to Mirissa to begin experiencing the down-south beach experience. Afterwards, visit a UNESCO Heritage Site the Galle Fort for a stroll and visit beautiful beaches.',
                    'image'      => '/img/tours/galle.jpg'
                ],
                [
                    'day_number' => 6,
                    'title'      => 'Bentota',
                    'description'=> 'After breakfast this morning, make your way to Bentota, stopping en route in Kosgoda Sea Turtle Hatchery. - Upon arrival, experience a thrilling River Safari discover captivating wildlife, stunning landscapes, and unforgettable moments. - Spend your evenings at leisure.',
                    'image'      => '/img/tours/bentota.jpg'
                ],
                [
                    'day_number' => 7,
                    'title'      => 'Colombo / Departure',
                    'description'=> 'After a relaxed breakfast, make your way to Colombo the capital city of Sri Lanka. - Upon arrival, head out for a relaxed city tour and also do some last minute shopping runs as well and experience the luxurious lifestyle in the commercial hub. - With your heart full of adventurous memories from this incredible island, it\'s time to say farewell! - We\'ll ensure your smooth transfer to the airport for your departure. Safe travels, take care and see you soon!',
                    'image'      => '/img/tours/colombo.jpg'
                ],
            ],

            // -------------------------------------------------------------
            // 10 DAYS / 9 NIGHTS — EXACT WORDS YOU PROVIDED (EXPANDED)
            // -------------------------------------------------------------

            '10 Days / 9 Nights Sri Lanka Discovery' => [
                [
                    'day_number' => 1,
                    'title'      => 'Arrival - Negombo',
                    'description'=> 'Negombo is located a few minutes from the airport—your immediate cure for jet lag. - When fully rested, start with the fish market, then paddle through the mangroves when you\'re ready for adventure. - The Negombo beach is ideal for a refreshing swim or a tranquil evening stroll along the sand.',
                    'image'      => '/img/tours/negombo.jpg'
                ],
                [
                    'day_number' => 2,
                    'title'      => 'Sigiriya (No Pinnawala)',
                    'description'=> 'After breakfast this morning, make your way to Sigiriya. - Leaving the modernity behind, you step into a landscape where centuries of history whisper from every stone, marking your arrival in the renowned Cultural Triangle. - Head out on a safari drive at the Minneriya National Park this afternoon. - Spend your evening at leisure by the restaurant and pool by the Hotel.',
                    'image'      => '/img/tours/sigiriya.jpg'
                ],
                [
                    'day_number' => 3,
                    'title'      => 'Sigiriya',
                    'description'=> 'Early this morning make your way to a UNESCO World Heritage site, the Sigiriya Rock Fortress for a spectacular sunrise. - Be amazed with the breathtaking sunrise views, frescoes, and the ruins of King Kashyapa’s palace at the summit. - In the afternoon, experience a traditional sigiriya village tour. - Spend your evening at leisure by the restaurant and pool by the Hotel.',
                    'image'      => '/img/tours/sigiriya-village.jpg'
                ],
                [
                    'day_number' => 4,
                    'title'      => 'Kandy',
                    'description'=> 'After breakfast this morning, make your way to Kandy, stopping en route to visit the Dambulla Cave Temple in Dambulla. - Embark on a city tour that guides you to the Temple of the Tooth Relic, a powerful and profoundly sacred pilgrimage site for Buddhists globally. - In this evening, catch a cultural dance show. - After breakfast this morning, you can spend some time shopping for souvenirs in Kandy, which is one of the best places in Sri Lanka to find unique gifts and keepsakes. - Afterwards, visit a gem museum and store, where you can enjoy an insightful gem tour and purchase beautiful jewelry, before heading to the Royal Botanical Gardens in the evening or attend a cooking class for dinner.',
                    'image'      => '/img/tours/kandy.jpg'
                ],
                [
                    'day_number' => 5,
                    'title'      => 'Kandy Shopping & Botanical Gardens',
                    'description'=> 'After breakfast this morning, you can spend some time shopping for souvenirs in Kandy, which is one of the best places in Sri Lanka to find unique gifts and keepsakes. - Afterwards, visit a gem museum and store, where you can enjoy an insightful gem tour and purchase beautiful jewelry, before heading to the Royal Botanical Gardens in the evening.',
                    'image'      => '/img/tours/kandy-botanical.jpg'
                ],
                [
                    'day_number' => 6,
                    'title'      => 'Nuwara Eliya',
                    'description'=> 'After Breakfast today, you will make your way to Nuwara Eliya, the Central Highlands of Sri Lanka, stopping en-route by the Ramboda Waterfall and Post Office Nuwara Eliya. - Visit a Tea Factory and buy teas and spices before heading for a calm stroll in Gregory Lake.',
                    'image'      => '/img/tours/nuwara-eliya.jpg'
                ],
            ],

            // 10 Days / 9 Nights Sri Lanka Discovery
            '10 Days / 9 Nights Sri Lanka Discovery' => [
                [
                    'day_number' => 1,
                    'title'      => 'Arrival - Negombo',
                    'description'=> 'Negombo is located a few minutes from the airport—your immediate cure for jet lag. - When fully rested, start with the fish market, then paddle through the mangroves when you\'re ready for adventure. - The Negombo beach is ideal for a refreshing swim or a tranquil evening stroll along the sand.',
                    'image'      => '/img/tours/negombo.jpg'
                ],
                [
                    'day_number' => 2,
                    'title'      => 'Sigiriya',
                    'description'=> 'After breakfast this morning, make your way to Sigiriya, stopping en route to visit the Sigiriya Rock Fortress. - Leaving the modernity behind, you step into a landscape where centuries of history whisper from every stone, marking your arrival in the renowned Cultural Triangle. - Head out on a safari drive at the Minneriya National Park this afternoon. - Spend your evening at leisure by the restaurant and pool by the Hotel.',
                    'image'      => '/img/tours/sigiriya.jpg'
                ],
                [
                    'day_number' => 3,
                    'title'      => 'Sigiriya',
                    'description'=> 'Early this morning make your way to a UNESCO World Heritage site, the Sigiriya Rock Fortress for a spectacular sunrise. - Be amazed with the breathtaking sunrise views, frescoes, and the ruins of King Kashyapa’s palace at the summit. - In the afternoon, experience a traditional sigiriya village tour. - Spend your evening at leisure by the restaurant and pool by the Hotel.',
                    'image'      => '/img/tours/sigiriya-village.jpg'
                ],
                [
                    'day_number' => 4,
                    'title'      => 'Kandy',
                    'description'=> 'After breakfast this morning, make your way to Kandy, stopping en route to visit the Dambulla Cave Temple in Dambulla.Thereafter, make your way to Kandy and in this evening, experience a cultural cooking class and taste the authentic Sri Lankan food made with love for dinner. - Embark on a city tour that guides you to the Temple of the Tooth Relic, a powerful and profoundly sacred pilgrimage site for Buddhists globally. - In this evening, catch a cultural dance show.',
                    'image'      => '/img/tours/kandy.jpg'
                ],
                [
                    'day_number' => 5,
                    'title'      => 'Kandy',
                    'description'=> '- After breakfast this morning, visit a gem museum, where you can enjoy an insightful gem tour about Ceylon gems and purchase beautiful jewelry. - ⁠Hereafter, spend time shopping for souvenirs and woodcarvings in Kandy, which is one of the best places in Sri Lanka to find unique gifts and keepsakes. - ⁠Head for a city tour after lunch where you can visit the royal Botanical Garden. - ⁠And end the day with a cultural dance show and witness the unite and showcase of the country’s diverse traditional dance styles on one stage.',
                    'image'      => '/img/tours/kandy-botanical.jpg'
                ],
                [
                    'day_number' => 6,
                    'title'      => 'Nuwara Eliya',
                    'description'=> 'After Breakfast today, you will make your way to Nuwara Eliya, the Central Highlands of Sri Lanka, stopping en-route by the Ramboda Waterfall and Post Office Nuwara Eliya. - Visit a Tea Factory and buy teas and spices before heading for a calm stroll in Gregory Lake.',
                    'image'      => '/img/tours/nuwara-eliya.jpg'
                ],
                [
                    'day_number' => 7,
                    'title'      => 'Ella',
                    'description'=> 'After breakfast this morning, make your way to Ella by vehicle or by Train (based on availability) enjoying the breathtaking sceneries of mountain hill views. - Visit the Nine Arch Bridge and Ravana Falls and capture photographs of the scenery.',
                    'image'      => '/img/tours/ella.jpg'
                ],
                [
                    'day_number' => 8,
                    'title'      => 'Mirissa',
                    'description'=> '- After breakfast this morning, make your way down south to the coastal area in Mirissa. - Hereafter, you can relax and chill or even surf in the beaches in Weligama or Mirissa and enjoy the nightlife by the beach side.',
                    'image'      => '/img/tours/mirissa.jpg'
                ],
                [
                    'day_number' => 9,
                    'title'      => 'Mirissa/Galle',
                    'description'=> '- Start the day off by having a Whale Watching tour. - Afterwards, visit a UNESCO Heritage Site the Galle Fort for a stroll in the evening.',
                    'image'      => '/img/tours/galle.jpg'
                ],
                [
                    'day_number' => 10,
                    'title'      => 'Departure - Colombo',
                    'description'=> 'Transfer to Colombo for departure. - With your heart full of adventurous memories from this incredible island, it\'s time to say farewell!',
                    'image'      => '/img/tours/colombo.jpg'
                ],
            ],


            // -------------------------------------------------------------
            // 15 DAYS / 14 NIGHTS FAMILY GETAWAY — EXACT WORDS YOU PROVIDED
            // -------------------------------------------------------------

            '15 Days / 14 Nights Family Getaway' => [
                [
                    'day_number' => 1,
                    'title'      => 'Arrival - Negombo',
                    'description'=> 'Negombo is located a few minutes from the airport—your immediate cure for jet lag. - When fully rested, start with the fish market, then paddle through the mangroves when you\'re ready for adventure. - The Negombo beach is ideal for a refreshing swim or a tranquil evening stroll along the sand.',
                    'image'      => '/img/tours/negombo.jpg'
                ],
                [
                    'day_number' => 2,
                    'title'      => 'Sigiriya',
                    'description'=> 'After breakfast this morning, make your way to Sigiriya, stopping en route to visit the Pinnawala Elephant Orphange in Rambukkana. - Leaving the modernity behind, you step into a landscape where centuries of history whisper from every stone, marking your arrival in the renowned Cultural Triangle. - Head out on a safari drive at the Minneriya National Park this afternoon. - Spend your evening at leisure by the restaurant and pool by the Hotel.',
                    'image'      => '/img/tours/sigiriya.jpg'
                ],
                [
                    'day_number' => 3,
                    'title'      => 'Sigiriya',
                    'description'=> 'Early this morning make your way to a UNESCO World Heritage site, the Sigiriya Rock Fortress for a spectacular sunrise. - Be amazed with the breathtaking sunrise views, frescoes, and the ruins of King Kashyapa’s palace at the summit. - In the afternoon, experience a traditional sigiriya village tour. - Spend your evening at leisure by the restaurant and pool by the Hotel.',
                    'image'      => '/img/tours/sigiriya-village.jpg'
                ],
                [
                    'day_number' => 4,
                    'title'      => 'Kandy',
                    'description'=> 'After breakfast this morning, make your way to Kandy, stopping en route to visit the Dambulla Cave Temple in Dambulla.Thereafter, make your way to Kandy and in this evening, experience a cultural cooking class and taste the authentic Sri Lankan food made with love for dinner. - Embark on a city tour that guides you to the Temple of the Tooth Relic, a powerful and profoundly sacred pilgrimage site for Buddhists globally. - In this evening, catch a cultural dance show.',
                    'image'      => '/img/tours/kandy.jpg'
                ],
                [
                    'day_number' => 5,
                    'title'      => 'Kandy',
                    'description'=> '- After breakfast this morning, visit a gem museum, where you can enjoy an insightful gem tour about Ceylon gems and purchase beautiful jewelry. - ⁠Hereafter, spend time shopping for souvenirs and woodcarvings in Kandy, which is one of the best places in Sri Lanka to find unique gifts and keepsakes. - ⁠Head for a city tour after lunch where you can visit the royal Botanical Garden. - ⁠And end the day with a cultural dance show and witness the unite and showcase of the country’s diverse traditional dance styles on one stage.',
                    'image'      => '/img/tours/kandy-botanical.jpg'
                ],
                [
                    'day_number' => 6,
                    'title'      => 'Nuwara Eliya',
                    'description'=> 'After Breakfast today, you will make your way to Nuwara Eliya, the Central Highlands of Sri Lanka, stopping en-route by the Ramboda Waterfall and Post Office Nuwara Eliya. - Visit a Tea Factory and buy teas and spices before heading for a calm stroll in Gregory Lake.',
                    'image'      => '/img/tours/nuwara-eliya.jpg'
                ],
                [
                    'day_number' => 7,
                    'title'      => 'Horton Plains & World\'s End',
                    'description'=> 'Early morning trek at Horton Plains National Park. Witness stunning views at World\'s End. Return to Nuwara Eliya for overnight stay.',
                    'image'      => '/img/tours/horton-plains.jpg'
                ],
                [
                    'day_number' => 8,
                    'title'      => 'Ella',
                    'description'=> 'After breakfast this morning, make your way to Ella by vehicle or by Train (based on availability) enjoying the breathtaking sceneries of mountain hill views. - Visit the Nine Arch Bridge and Ravana Falls and capture photographs of the scenery.',
                    'image'      => '/img/tours/ella.jpg'
                ],
                [
                    'day_number' => 9,
                    'title'      => 'Mirissa',
                    'description'=> 'After breakfast this morning, make your way down south to the coastal area in Mirissa - Hereafter, you can relax and chill or even surf in the beaches in Weligama or Mirissa and enjoy the nightlife by the beach side.',
                    'image'      => '/img/tours/mirissa.jpg'
                ],
                [
                    'day_number' => 10,
                    'title'      => 'Mirissa / Galle',
                    'description'=> 'Start the day off by having a Whale Watching tour. - Afterwards, visit a UNESCO Heritage Site the Galle Fort for a stroll in the evening.',
                    'image'      => '/img/tours/galle.jpg'
                ],
                [
                    'day_number' => 11,
                    'title'      => 'Yala',
                    'description'=> 'You are in for an adventure this morning, Make your way to the Yala National Park with a packed breakfast this morning. - Thereafter, make your way to Mirissa to begin experiencing the down-south beach experience. - En route stop in Tangalle Beach and evening in Coconut Tree Hill Mirissa watching the beautiful sunset.',
                    'image'      => '/img/tours/yala-mirissa.jpg'
                ],
                [
                    'day_number' => 12,
                    'title'      => 'Ahangama & Galle',
                    'description'=> 'After breakfast this morning, make your way to Ahangama and visit popular places in Ahangama such as Kai Beach. - Afterwards, visit a UNESCO Heritage Site the Galle Fort for a stroll in the evening.',
                    'image'      => '/img/tours/ahangama.jpg'
                ],
                [
                    'day_number' => 13,
                    'title'      => 'Bentota',
                    'description'=> 'After breakfast this morning, make your way to Bentota, stopping en route in Kosgoda Sea Turtle Hatchery. - Upon arrival, experience a thrilling River Safari discover captivating wildlife, stunning landscapes, and unforgettable moments. - Spend your evenings at leisure.',
                    'image'      => '/img/tours/bentota.jpg'
                ],
                [
                    'day_number' => 14,
                    'title'      => 'Colombo',
                    'description'=> 'After a relaxed breakfast, make your way to Colombo the capital city of Sri Lanka. - Upon arrival, head out for a relaxed city tour and also do some last minute shopping runs as well and experience the luxurious lifestyle in the commercial hub.',
                    'image'      => '/img/tours/colombo.jpg'
                ],
                [
                    'day_number' => 15,
                    'title'      => 'Departure',
                    'description'=> 'With your heart full of adventurous memories from this incredible island, it\'s time to say farewell! - We\'ll ensure your smooth transfer to the airport for your departure. Safe travels, take care and see you soon!',
                    'image'      => '/img/tours/departure.jpg'
                ],
            ],

        ];

        foreach ($toursDays as $tourName => $days) {
            $tour = DB::table('tours')->where('name', $tourName)->first();

            if (!$tour) {
                $this->command->info("Tour '{$tourName}' not found. Skipping...");
                continue;
            }

            $tour_id = $tour->id;

            // Delete existing tour days first
            DB::table('tour_days')->where('tour_id', $tour_id)->delete();

            foreach ($days as $day) {
                DB::table('tour_days')->insert([
                    'tour_id'     => $tour_id,
                    'day_number'  => $day['day_number'],
                    'title'       => $day['title'],
                    'description' => $day['description'],
                    'image'       => $day['image'] ?? '/img/tours/default.jpg',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }

        $this->command->info('All tour days seeded successfully in order!');
    }
}
