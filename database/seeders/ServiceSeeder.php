<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Taxis',
                'short_description' => 'Island-Wide Taxi Services: Your Trusted Ride Across Sri Lanka',
                'description' => "Whether you’re arriving at the airport or exploring the vibrant cities and serene countryside of Sri Lanka, our island-wide taxi service ensures seamless, comfortable, and reliable transportation at every step. From Colombo to Jaffna, from the southern beaches to the cultural heartlands, our professional drivers are your friendly local guides, ready to pick you up or drop you off anywhere across the island — day or night.\n\nOur fleet includes clean, air-conditioned, well-maintained vehicles, from sedans for solo travelers and couples to spacious vans and buses for families or groups. Safety is paramount: every driver is experienced, licensed, and knowledgeable about the best routes to avoid traffic delays, ensuring you reach your destination relaxed and on time.\n\nEnjoy stress-free travel with transparent and best pricing — no hidden fees — and flexible booking options tailored to your schedule. Whether it’s an early morning airport pickup or a late-night city transfer, we’re here 24/7 to provide punctual service with a smile.\n\nTravel with peace of mind and the convenience of door-to-door service, knowing you’re backed by a company committed to your comfort, safety, and satisfaction throughout your Sri Lankan adventure.",
                'category' => 'Transport',
                'image' => 'img/services/taxi.jpg',
            ],
            [
                'title' => 'City Tours',
                'short_description' => 'Immersive City Tours: Dive Into the Heartbeat of Sri Lanka’s Cities',
                'description' => "Experience the vibrant pulse of Sri Lanka’s cities with our expertly crafted city tours designed to immerse you in local culture, history, and hidden gems. Whether wandering the colonial streets of Colombo, exploring the sacred sites of Kandy, or discovering the rich heritage of Galle Fort, each tour is an authentic journey led by knowledgeable guides passionate about their cities.\n\nSee iconic landmarks, bustling markets, serene temples, and taste the flavors of street food that locals adore. Our tours are flexible and customizable — want to focus on art, architecture, or food? We tailor the experience just for you.\n\nPerfect for first-time visitors or repeat travelers eager to see beyond the surface, our city tours provide a deep understanding of Sri Lanka’s urban stories while creating unforgettable memories.",
                'category' => 'Tours',
                'image' => 'img/services/city-tour.jpg',
            ],
            [
                'title' => 'Signature Tours',
                'short_description' => 'Tailored Adventures Across Sri Lanka',
                'description' => "Our signature tours are carefully curated experiences that showcase the best of Sri Lanka’s diverse landscapes, culture, and history. Whether it’s a multi-day journey through ancient temples, a coastal exploration along turquoise waters, or an off-the-beaten-path discovery of rural villages, these tours offer both depth and variety.\n\nEach itinerary is flexible, allowing you to personalize your journey based on your interests and pace. Enjoy expert local insights, handpicked accommodations, and seamless logistics to ensure your adventure flows effortlessly.\n\nTravelers who seek meaningful connections with Sri Lanka’s heritage and nature will find these tours perfectly crafted to awaken their senses and enrich their souls.",
                'category' => 'Tours',
                'image' => 'img/services/signature-tour.jpg',
            ],
            [
                'title' => 'Yala Safari',
                'short_description' => 'Yala Safari: The Ultimate Wildlife Adventure',
                'description' => "Step into the wild heart of Sri Lanka with a safari in Yala National Park — the island’s most famous and second-largest national park, sprawling over 979 square kilometers of diverse ecosystems ranging from dense jungle to open plains and lagoons.\n\nYala is renowned worldwide for its high density of leopards — arguably the best place on earth to spot these elusive big cats in their natural habitat. But the thrill doesn’t stop there — expect to encounter majestic elephants, sloth bears, colorful bird species, and even crocodiles.\n\nYour safari is led by experienced guides who bring wildlife stories to life, ensuring a safe and unforgettable adventure.",
                'category' => 'Wildlife',
                'image' => 'img/services/yala.jpg',
            ],
            [
                'title' => 'Minneriya Safari',
                'short_description' => 'Witness the Spectacular Elephant Gathering',
                'description' => "Minneriya National Park hosts one of the largest wild Asian elephant congregations in the world. During the dry season, over 300 elephants gather near the Minneriya reservoir — a stunning spectacle known as 'The Gathering'.\n\nThe park also features leopards, deer, crocodiles, and a vibrant birdlife, making it perfect for nature lovers and wildlife photographers.\n\nOur guided safaris provide an intimate view of elephant behavior and conservation efforts while offering breathtaking encounters with Sri Lanka’s natural beauty.",
                'category' => 'Wildlife',
                'image' => 'img/services/minneriya.jpg',
            ],
            [
                'title' => 'Wilpattu Safari',
                'short_description' => 'Discover Sri Lanka’s Largest National Park',
                'description' => "Wilpattu National Park, spanning 1,317 square kilometers, is famous for its serene 'Willus' — natural lakes that attract diverse wildlife. Home to leopards, elephants, and sloth bears, it offers a tranquil safari experience away from crowds.\n\nExplore lush jungles and hidden lagoons guided by experts who reveal the park’s history and wildlife secrets.",
                'category' => 'Wildlife',
                'image' => 'img/services/wilpattu.jpg',
            ],
            [
                'title' => 'Udawalawe Safari',
                'short_description' => 'Elephant Encounters in a Natural Wonderland',
                'description' => "Udawalawe National Park offers incredible opportunities to witness wild elephants in their natural habitat. With open grasslands and beautiful lakes, it’s a peaceful safari ideal for families and photographers alike.\n\nOur guided tours also highlight conservation work at the nearby Elephant Transit Home.",
                'category' => 'Wildlife',
                'image' => 'img/services/udawalawe.jpg',
            ],
            [
                'title' => 'Kumana Safari',
                'short_description' => 'Birdwatcher’s Paradise and Wildlife Sanctuary',
                'description' => "Kumana National Park is renowned for its wetlands, attracting flamingos, pelicans, and hundreds of bird species. This tranquil park also shelters elephants, leopards, and sloth bears, making it perfect for nature lovers seeking quiet exploration.",
                'category' => 'Wildlife',
                'image' => 'img/services/kumana.jpg',
            ],
            [
                'title' => 'Hurulu Eco Park Safari',
                'short_description' => 'Explore the Heart of Sri Lanka’s Dry Zone',
                'description' => "Hurulu Eco Park blends forests, grasslands, and wetlands, offering sightings of elephants, leopards, and exotic birds. A quiet alternative to busy parks, it provides rich biodiversity and a peaceful safari experience.",
                'category' => 'Wildlife',
                'image' => 'img/services/hurulu.jpg',
            ],
            [
                'title' => 'Ridiyagama Safari',
                'short_description' => 'Discover the New Frontier of Wildlife Adventures',
                'description' => "Ridiyagama Safari Park is Sri Lanka’s first drive-through wildlife park, home to native and exotic animals. Perfect for families, it combines education and adventure in a safe, modern setting.",
                'category' => 'Wildlife',
                'image' => 'img/services/ridiyagama.jpg',
            ],
            [
                'title' => 'Bentota River Safari',
                'short_description' => 'Tranquil Journey Through Mangrove Forests',
                'description' => "Glide through Bentota’s mangrove-lined waterways spotting crocodiles, monitor lizards, and vibrant birdlife. This serene experience also offers cultural insights into river village life and ecology.",
                'category' => 'Adventure',
                'image' => 'img/services/bentota-river.jpg',
            ],
            [
                'title' => 'Madhu River Safari',
                'short_description' => 'An Untouched Ecological Treasure',
                'description' => "Explore the pristine mangrove forests of Madhu River, teeming with birds and reptiles. The calm waters and lush surroundings create a perfect eco-adventure.",
                'category' => 'Adventure',
                'image' => 'img/services/madhu-river.jpg',
            ],
            [
                'title' => 'Mirissa Whale Watching',
                'short_description' => 'Witness the Giants of the Ocean',
                'description' => "Join eco-friendly cruises off Mirissa to spot majestic blue whales, sperm whales, and playful dolphins in crystal-clear waters. A must-do for wildlife lovers.",
                'category' => 'Marine',
                'image' => 'img/services/mirissa-whale.jpg',
            ],
            [
                'title' => 'Trincomalee Whale Watching',
                'short_description' => 'Gateway to the Indian Ocean’s Giants',
                'description' => "Set sail in Trincomalee Bay to encounter whales and dolphins year-round in calm, biodiverse waters, guided by marine experts.",
                'category' => 'Marine',
                'image' => 'img/services/trinco-whale.jpg',
            ],
            [
                'title' => 'Kalpitiya Whale Watching',
                'short_description' => 'Marine Safari in Untouched Waters',
                'description' => "Kalpitiya’s serene coast offers whale and dolphin watching with less crowds. Pair your tour with snorkeling in vibrant coral reefs.",
                'category' => 'Marine',
                'image' => 'img/services/kalpitiya-whale.jpg',
            ],
            [
                'title' => 'Bentota Skydiving',
                'short_description' => 'Thrill Meets Spectacle Above Sri Lanka’s Coastline',
                'description' => "Leap from 12,000 feet over Bentota’s stunning coastline. A fully certified, adrenaline-filled experience with panoramic views.",
                'category' => 'Adventure',
                'image' => 'img/services/skydiving.jpg',
            ],
            [
                'title' => 'Bentota Water Sports',
                'short_description' => 'Heart-Pounding Fun on the Waves',
                'description' => "Jet skiing, banana rides, and water skiing — Bentota’s coast offers endless fun for thrill-seekers and families alike.",
                'category' => 'Adventure',
                'image' => 'img/services/water-sports.jpg',
            ],
            [
                'title' => 'Kitulgala Rafting',
                'short_description' => 'Ride the Rapids of Sri Lanka’s Adventure Capital',
                'description' => "Navigate the rapids of the Kelani River surrounded by lush rainforest in Kitulgala — a must-do for adventure lovers.",
                'category' => 'Adventure',
                'image' => 'img/services/kitulgala-rafting.jpg',
            ],
            [
                'title' => 'Surfing Hotspots',
                'short_description' => 'Ride the Legendary Waves of Sri Lanka',
                'description' => "From Arugam Bay to Mirissa, explore Sri Lanka’s iconic surfing destinations suited for both beginners and pros.",
                'category' => 'Adventure',
                'image' => 'img/services/surfing.jpg',
            ],
            [
                'title' => 'Hot Air Ballooning in Dambulla',
                'short_description' => 'Soar Over the Cultural Heartland',
                'description' => "Float above Dambulla’s golden plains and Sigiriya Rock at sunrise — a breathtaking experience of serenity and wonder.",
                'category' => 'Adventure',
                'image' => 'img/services/hot-air-balloon.jpg',
            ],
            [
                'title' => 'Trekking Horton Plains',
                'short_description' => 'Into the Misty Highlands',
                'description' => "Trek through cloud forests and grasslands to reach World’s End and Baker’s Falls in this UNESCO World Heritage Site.",
                'category' => 'Nature',
                'image' => 'img/services/horton-plains.jpg',
            ],
            [
                'title' => 'Snorkeling in Sri Lanka',
                'short_description' => 'Dive Into Vibrant Underwater Worlds',
                'description' => "Discover colorful coral reefs and tropical fish in Mirissa, Hikkaduwa, Trinco, and Bentota — perfect for marine lovers.",
                'category' => 'Marine',
                'image' => 'img/services/snorkeling.jpg',
            ],
            [
                'title' => 'Turtle Hatchery Visits',
                'short_description' => 'Guardians of Sri Lanka’s Marine Legacy',
                'description' => "Visit turtle hatcheries in Kosgoda and Galle to learn about conservation and witness the release of baby turtles into the sea.",
                'category' => 'Conservation',
                'image' => 'img/services/turtle-hatchery.jpg',
            ],
            [
                'title' => 'Ziplining Adventures',
                'short_description' => 'Fly Through Sri Lanka’s Lush Canopies',
                'description' => "Soar above Ella’s forests and Kitulgala’s rivers for an exhilarating ziplining experience with stunning jungle views.",
                'category' => 'Adventure',
                'image' => 'img/services/zipline.jpg',
            ],
            [
                'title' => 'Gem and Jewelry Experiences',
                'short_description' => 'Unearth Sri Lanka’s Sparkling Treasure',
                'description' => "Learn the art of gem mining and jewelry making in Kandy and Ratnapura — and take home an authentic piece of Sri Lanka’s heritage.",
                'category' => 'Culture',
                'image' => 'img/services/gem.jpg',
            ],
            [
                'title' => 'Spice and Tea Tours',
                'short_description' => 'Savor the Aromas of Sri Lanka’s Highlands',
                'description' => "Tour tea and spice plantations in Kandy and Nuwara Eliya to learn about Sri Lanka’s world-famous flavors and traditions.",
                'category' => 'Culture',
                'image' => 'img/services/spice_tea.jpg',
            ],
            [
                'title' => 'Cooking Classes in Sigiriya',
                'short_description' => 'Taste the Heart of Sri Lankan Cuisine',
                'description' => "Learn to cook Sri Lankan dishes with local chefs — from rice and curry to hoppers — in immersive hands-on classes.",
                'category' => 'Culture',
                'image' => 'img/services/cooking.jpg',
            ],
            [
                'title' => 'Yoga Classes',
                'short_description' => 'Rejuvenate Body and Mind Amidst Nature',
                'description' => "Practice yoga and meditation in tranquil natural settings — guided by skilled instructors focused on wellness and balance.",
                'category' => 'Wellness',
                'image' => 'img/services/yoga.jpg',
            ],
            [
                'title' => 'Cycle Rentals in Sigiriya',
                'short_description' => 'Explore Ancient Landscapes on Two Wheels',
                'description' => "Rent bicycles and explore Sigiriya’s ancient ruins, villages, and countryside at your own pace — an eco-friendly adventure.",
                'category' => 'Adventure',
                'image' => 'img/services/cycling.jpg',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'short_description' => $service['short_description'],
                'description' => $service['description'],
                'category' => $service['category'],
                'image' => $service['image'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
