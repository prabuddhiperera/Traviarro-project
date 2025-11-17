<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Negombo',
                'city' => 'Negombo',
                'description' => 'Negombo is more than just a transit town — it’s a relaxing introduction to Sri Lanka’s culture, coastline, and cuisine. Just 15 minutes from the international airport, this beachside escape offers golden sands, colonial-era heritage, and a glimpse into the daily lives of local fishermen.',
                'places_to_visit' => [
                    'Negombo Beach',
                    'Dutch Canal',
                    'Negombo Fish Market',
                    'St. Mary’s Church',
                    'Muthurajawela Wetlands',
                    'Negombo Lagoon',
                    'Angurukaramulla Temple',
                    'Hamilton Canal',
                    'Dutch Fort Ruins',
                ],
                'things_to_do' => [
                    'Take a Negombo City Tour',
                    'Relax at Negombo Beach',
                    'Boat ride along Dutch Canal',
                    'Lagoon safari for birdwatching',
                    'Watch fishermen at fish market',
                    'Try fresh seafood',
                    'Cycle or walk colonial streets',
                    'Kitesurfing or jet skiing',
                    'Shop at local markets',
                ],
                'image' => 'negombo.jpg',
            ],
            [
                'name' => 'Colombo',
                'city' => 'Colombo',
                'description' => 'Colombo is Sri Lanka’s largest city and is the capital, blending colonial charm with modern skyscrapers, elegant rooftop bars, bustling markets, and vibrant street life.',
                'places_to_visit' => [
                    'Galle Face Green',
                    'Colombo National Museum',
                    'Gangaramaya Temple',
                    'Lotus Tower',
                    'Colombo Fort Area',
                    'Independence Square',
                    'Pettah Market',
                    'Viharamahadevi Park',
                ],
                'things_to_do' => [
                    'Ride a tuk-tuk city tour',
                    'Full Day Colombo City Tour with private driver',
                    'Sunset at Galle Face Green',
                    'Visit luxury malls',
                    'Dine at rooftop restaurants',
                    'Visit art galleries and museums',
                    'Attend cultural performances',
                    'Sailing trip from Port City',
                    'Taste street food',
                    'Shop for souvenirs',
                ],
                'image' => 'colombo.jpg',
            ],
            [
                'name' => 'Kandy',
                'city' => 'Kandy',
                'description' => 'Kandy isn’t just a city — it’s the spiritual soul of Sri Lanka. Nestled among misty hills and encircled by dense rainforest, it’s where ancient traditions live on through sacred temples, vibrant festivals, and royal heritage.',
                'places_to_visit' => [
                    'Temple of the Sacred Tooth Relic',
                    'Kandy Lake',
                    'Royal Botanical Gardens Peradeniya',
                    'Bahirawakanda Vihara Buddha Statue',
                    'Kandy View Point',
                    'Ambuluwawa Tower',
                    'Udawatta Kele Sanctuary',
                    'Kandy City Centre',
                ],
                'things_to_do' => [
                    'Book Tuk-tuk driver for city tour',
                    'Witness prayer ceremony at Temple of the Tooth',
                    'Stroll or boat ride on Kandy Lake',
                    'Visit gem museum',
                    'Wander traditional markets',
                    'Take spice garden tour',
                    'Explore botanical gardens',
                    'Attend Kandyan Cultural Dance Show',
                ],
                'image' => 'kandy.jpg',
            ],
            [
                'name' => 'Nuwara Eliya',
                'city' => 'Nuwara Eliya',
                'description' => 'With its cool climate, emerald tea plantations, and colonial cottages, Nuwara Eliya feels like a gentle pause from the tropics. Often called “Little England,” this hill country retreat was once the playground of British planters.',
                'places_to_visit' => [
                    'Gregory Lake',
                    'Post Office',
                    'Hakgala Botanical Garden',
                    'Pedro Tea Estate',
                    'Ambewela Farm',
                    'Ramboda Falls',
                    'Lover’s Leap Waterfall',
                    'Seetha Amman Temple',
                    'Victoria Park',
                ],
                'things_to_do' => [
                    'Book a private driver for city tour',
                    'Go boating at Gregory Lake',
                    'Tour a tea factory',
                    'Horseback ride',
                    'Hike to waterfalls and scenic viewpoints',
                    'Hike Horton Plains trail',
                    'Rent a bike around Gregory Lake',
                    'Visit Ambewela Farm',
                    'Visit strawberry farm',
                ],
                'image' => 'nuwara-eliya.jpg',
            ],
            [
                'name' => 'Ella',
                'city' => 'Ella',
                'description' => 'Ella is where lush green hills meet adventure. With postcard-perfect views, waterfalls, hiking trails, and an easy-going vibe.',
                'places_to_visit' => [
                    'Nine Arches Bridge',
                    'Little Adam’s Peak',
                    'Ella Rock',
                    'Ravana Falls',
                    'Diyaluma Falls',
                ],
                'things_to_do' => [
                    'Book a private driver',
                    'Hike to Little Adam’s Peak or Ella Rock',
                    'Watch train cross Nine Arches Bridge',
                    'Try zip-lining',
                    'Take a cooking class',
                    'Relax in open-air cafés',
                    'Scenic train ride from Ella to Kandy',
                ],
                'image' => 'ella.jpg',
            ],
            [
                'name' => 'Trincomalee',
                'city' => 'Trincomalee',
                'description' => 'Trincomalee is where pristine white beaches, ancient temples, and crystal-clear waters converge.',
                'places_to_visit' => [
                    'Nilaveli & Marble Beaches',
                    'Pigeon Island National Park',
                    'Koneswaram Temple',
                    'Fort Frederick',
                    'Hot Springs of Kanniya',
                ],
                'things_to_do' => [
                    'Go snorkeling/diving at Pigeon Island',
                    'Visit Koneswaram Temple',
                    'Relax on beaches',
                    'Watch dolphins or whales',
                    'Sunbathe or kayak at Uppuveli Beach',
                    'Sunset from Lover’s Leap cliff',
                ],
                'image' => 'trincomalee.jpg',
            ],
            [
                'name' => 'Arugambay',
                'city' => 'Arugambay',
                'description' => 'Arugambay is Sri Lanka’s surf capital — a vibrant coastal town with a laid-back rhythm, perfect waves, jungle adventures, and beach parties.',
                'places_to_visit' => [
                    'Main Point',
                    'Arugam Bay Beach',
                    'Elephant Rock',
                    'Pottuvil Lagoon',
                    'Muhudu Maha Viharaya',
                ],
                'things_to_do' => [
                    'Book a surf lesson',
                    'Lagoon safari',
                    'Climb Elephant Rock',
                    'Join beach bonfire or DJ night',
                    'Sunrise yoga at beachfront',
                    'Enjoy fresh seafood BBQs',
                ],
                'image' => 'arugambay.jpg',
            ],
            [
                'name' => 'Yala',
                'city' => 'Yala',
                'description' => 'Yala National Park is Sri Lanka’s premier safari destination.',
                'places_to_visit' => [
                    'Yala National Park',
                    'Kataragama Temple',
                    'Sithulpawwa Rajamaha Viharaya',
                    'Magul Maha Viharaya',
                    'Patanangala Beach',
                    'Manik River',
                ],
                'things_to_do' => [
                    'Book safari jeep',
                    'Visit ancient Buddhist ruins',
                    'Camp overnight at luxury lodge',
                    'Watch sunrise over cliffs',
                    'Dip at Manik River',
                ],
                'image' => 'yala.jpg',
            ],
            [
                'name' => 'Udawalawe',
                'city' => 'Udawalawe',
                'description' => 'Udawalawe is where you go to see elephants in their natural habitat.',
                'places_to_visit' => [
                    'Udawalawe National Park',
                    'Elephant Transit Home',
                    'Udawalawe Reservoir',
                ],
                'things_to_do' => [
                    'Book safari jeep',
                    'Birdwatching near reservoir',
                    'Scenic drives and nature walks',
                    'Watch baby elephants',
                    'Visit local rural village',
                    'Combine trip with Ella or Yala',
                ],
                'image' => 'udawalawe.jpg',
            ],
            [
                'name' => 'Mirissa',
                'city' => 'Mirissa',
                'description' => 'Mirissa is the heart of Sri Lanka’s south coast — golden crescent beach, surf shacks, oceanfront cafés, and whale-watching destination.',
                'places_to_visit' => [
                    'Mirissa Beach',
                    'Parrot Rock Bridge',
                    'Coconut Tree Hill',
                    'Secret Beach',
                    'Whale Watching Harbor',
                ],
                'things_to_do' => [
                    'Whale-watching cruise',
                    'Surf lessons or rent a board',
                    'Scuba diving',
                    'Snorkelling sessions',
                    'Cocktails at beachfront cabana',
                    'Sunrise walk to Coconut Tree Hill',
                ],
                'image' => 'mirissa.jpg',
            ],
            [
                'name' => 'Galle',
                'city' => 'Galle',
                'description' => 'Galle is a living time capsule. Once a 16th-century Portuguese fortress, now a UNESCO World Heritage Site.',
                'places_to_visit' => [
                    'Galle Fort',
                    'Galle Lighthouse',
                    'Dutch Reformed Church',
                    'Flag Rock Bastion',
                    'Japanese Peace Pagoda',
                ],
                'things_to_do' => [
                    'Private city tour',
                    'Wander colonial lanes',
                    'Visit antique shops',
                    'Catch sunset from Fort ramparts',
                    'Stay in boutique hotel',
                    'Cycle countryside',
                    'Check cricket match',
                    'Walk along ramparts',
                ],
                'image' => 'galle.jpg',
            ],
            [
                'name' => 'Unawatuna',
                'city' => 'Unawatuna',
                'description' => 'Just a few minutes from Galle, Unawatuna is a famous beach town with calm turquoise waters and coral reefs.',
                'places_to_visit' => [
                    'Unawatuna Beach',
                    'Jungle Beach',
                    'Japanese Peace Pagoda',
                    'Rumassala Hill',
                    'Yatagala Raja Maha Viharaya',
                ],
                'things_to_do' => [
                    'Snorkelling session',
                    'Hike to Jungle Beach',
                    'Visit Peace Pagoda',
                    'Cooking class',
                    'Explore cafés and seafood restaurants',
                    'Beach yoga and wellness retreats',
                ],
                'image' => 'unawatuna.jpg',
            ],
            [
                'name' => 'Bentota',
                'city' => 'Bentota',
                'description' => 'Bentota is Sri Lanka’s luxury playground — all-inclusive resorts, water sports, and calm lagoons.',
                'places_to_visit' => [
                    'Bentota Beach',
                    'Brief Garden by Bevis Bawa',
                    'Lunuganga Estate',
                    'Kosgoda Turtle Hatchery',
                ],
                'things_to_do' => [
                    'River safari through mangroves',
                    'Water activities like Jet skiing',
                    'Tour Bawa gardens',
                    'Spa day or romantic beach dinner',
                    'Visit sea turtle conservation',
                    'Explore tropical gardens',
                ],
                'image' => 'bentota.jpg',
            ],
            [
                'name' => 'Kalutara',
                'city' => 'Kalutara',
                'description' => 'Kalutara is a quiet coastal town blending scenic beaches with spiritual landmarks.',
                'places_to_visit' => [
                    'Kalutara Beach',
                    'Richmond Castle',
                    'Kalutara Bodhiya',
                    'Kalu Ganga',
                ],
                'things_to_do' => [
                    'Explore Richmond Castle',
                    'Walk around Kalutara Bodhiya',
                    'Beachfront spa or yoga retreat',
                    'Explore colonial-era mansions',
                    'Boat ride along Kalu Ganga',
                    'Try toddy and traditional sweets',
                ],
                'image' => 'kalutara.jpg',
            ],
            [
                'name' => 'Hikkaduwa',
                'city' => 'Hikkaduwa',
                'description' => 'Hikkaduwa is Sri Lanka’s original surf and snorkeling playground with vibrant nightlife.',
                'places_to_visit' => [
                    'Hikkaduwa Beach',
                    'Hikkaduwa Coral Sanctuary',
                    'Tsunami Memorial',
                    'Seenigama Temple',
                    'Turtle Hatchery',
                ],
                'things_to_do' => [
                    'Snorkel with sea turtles',
                    'Glass-bottom boat tour',
                    'Surfing',
                    'Beach parties and fire shows',
                    'Explore backwaters by riverboat',
                    'Visit turtle hatcheries',
                    'Enjoy beachside restaurants and cafes',
                ],
                'image' => 'hikkaduwa.jpg',
            ],
            [
                'name' => 'Sigiriya',
                'city' => 'Sigiriya',
                'description' => 'Sigiriya is Sri Lanka’s single most iconic landmark — an ancient sky palace atop a dramatic rock.',
                'places_to_visit' => [
                    'Sigiriya Rock Fortress',
                    'Pidurangala Rock',
                    'Sigiriya Museum',
                    'Minneriya National Park',
                    'Dambulla Cave Temple',
                ],
                'things_to_do' => [
                    'Climb Sigiriya or Pidurangala at sunrise',
                    'Explore archaeological ruins',
                    'Safari at Minneriya',
                    'Visit ancient Buddhist temples',
                    'Explore moats and gardens',
                    'Village safari by bullock cart',
                    'Cooking class with local family',
                ],
                'image' => 'sigiriya.jpg',
            ],
            [
                'name' => 'Wilpattu',
                'city' => 'Wilpattu',
                'description' => 'Wilpattu is the largest national park in Sri Lanka — vast, remote, and less crowded than Yala.',
                'places_to_visit' => [
                    'Wilpattu National Park',
                    'Mahawewa Villu',
                    'Ancient ruins inside park',
                    'Tonigala Rock',
                ],
                'things_to_do' => [
                    'Book safari jeep',
                    'Go birdwatching',
                    'Visit ancient Kudiramalai ruins',
                    'Stay in luxury safari camp',
                    'Explore quiet wilderness',
                    'Visit archaeological sites',
                ],
                'image' => 'wilpattu.jpg',
            ],
            [
                'name' => 'Anuradhapura',
                'city' => 'Anuradhapura',
                'description' => 'Anuradhapura is a sacred city, full of ancient stupas, monasteries, and Buddhist heritage.',
                'places_to_visit' => [
                    'Sri Maha Bodhi',
                    'Ruwanwelisaya',
                    'Abhayagiri Monastery',
                    'Isurumuniya Temple',
                    'Jetavanaramaya',
                ],
                'things_to_do' => [
                    'Cycling tours around sacred city',
                    'Explore ruins',
                    'Visit ancient temples',
                    'Attend evening prayer ceremony',
                    'Learn local history at museum',
                    'Guided walking tours',
                ],
                'image' => 'anuradhapura.jpg',
            ],
            [
                'name' => 'Polonnaruwa',
                'city' => 'Polonnaruwa',
                'description' => 'Polonnaruwa is Sri Lanka’s medieval capital, a UNESCO World Heritage Site with ancient ruins.',
                'places_to_visit' => [
                    'Gal Vihara',
                    'Polonnaruwa Vatadage',
                    'Parakrama Samudra',
                    'Rankoth Vehera',
                    'Archaeological Museum',
                ],
                'things_to_do' => [
                    'Cycle or walk through ruins',
                    'Guided historical tours',
                    'Visit archaeological museum',
                    'Take photos at iconic temples',
                    'Explore lakes and parks',
                    'Sunset photography at Parakrama Samudra',
                ],
                'image' => 'polonnaruwa.jpg',
            ],
            [
                'name' => 'Ahangama',
                'city' => 'Ahangama',
                'description' => 'Ahangama is a quiet coastal village famous for surf breaks and relaxed beaches.',
                'places_to_visit' => [
                    'Ahangama Beach',
                    'Jungle Beach',
                    'Koggala Lake',
                    'Handunugoda Tea Estate',
                ],
                'things_to_do' => [
                    'Surfing lessons or free surfing',
                    'Relax at secluded beaches',
                    'Boat rides in Koggala Lake',
                    'Visit tea estates',
                    'Sunrise and sunset photography',
                    'Yoga retreats',
                ],
                'image' => 'ahangama.jpg',
            ],
        ];

        foreach ($destinations as $destination) {
            // Check if destination exists
            $existing = DB::table('destinations')->where('name', $destination['name'])->first();

            if ($existing) {
                $destinationId = $existing->id;
            } else {
                $destinationId = DB::table('destinations')->insertGetId([
                    'name' => $destination['name'],
                    'city' => $destination['city'],
                    'description' => $destination['description'],
                    'image' => $destination['image'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Clear old data
            DB::table('places_to_visit')->where('destination_id', $destinationId)->delete();
            DB::table('things_to_do')->where('destination_id', $destinationId)->delete();

            // Insert places
            foreach ($destination['places_to_visit'] as $place) {
                DB::table('places_to_visit')->insert([
                    'destination_id' => $destinationId,
                    'name' => $place,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Insert things to do
            foreach ($destination['things_to_do'] as $activity) {
                DB::table('things_to_do')->insert([
                    'destination_id' => $destinationId,
                    'name' => $activity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
