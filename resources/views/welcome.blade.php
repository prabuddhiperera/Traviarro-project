<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traviarro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('navigation-menu')

    <section class="relative bg-cover bg-center h-[90vh]" style="background-image: url('/img/banner-srilanka.jpg');">
        <div class="absolute inset-0 bg-[#006994]/40"></div>
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
            <h1 class="text-5xl md:text-6xl font-extrabold font-['Libre_Baskerville',serif] mb-4">Welcome to Trivarro!</h1>
            <p class="text-lg md:text-xl mb-8 max-w-2xl">Your trusted travel companion for unforgettable journeys across Sri Lanka.</p>
            <a href="{{ url('/tours') }}" class="px-8 py-3 bg-[#00b0c6] hover:bg-[#0092a3] rounded-full text-lg font-semibold transition-all duration-300">Explore Tours</a>
        </div>
    </section>

<!-- 🌍 Services Section -->
<section class="py-20 bg-white">
    <!-- Heading -->
    <div class="text-center max-w-4xl mx-auto px-6 mb-12">
        <h2 class="text-4xl md:text-5xl font-extrabold font-['Libre_Baskerville',serif] text-[#006994] mb-4">Trivarro Signature Experiences</h2>
        <p class="text-lg md:text-xl text-gray-700">
            Trivarro curates 25+ unforgettable ways to experience Sri Lanka—dive into ocean adventures, journey through wild safaris, explore hidden trails, or unwind in rich cultural calm. Whether you seek thrill, romance, or connection to local life—your escape begins here.
        </p>
    </div>

    <!-- 8 Experiences Grid -->
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <!-- Example Card -->
        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience1.png" alt="Ocean Adventure" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Ocean Adventure</h3>
                <p class="text-gray-700 text-sm">Snorkel, dive, or cruise the turquoise waters of Sri Lanka.</p>
            </div>
        </div>

        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience2.jpg" alt="Safari" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Wild Safari</h3>
                <p class="text-gray-700 text-sm">Spot elephants, leopards, and exotic wildlife in national parks.</p>
            </div>
        </div>

        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience3.jpg" alt="Cultural Trails" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Hidden Trails</h3>
                <p class="text-gray-700 text-sm">Hike secret paths through lush greenery and waterfalls.</p>
            </div>
        </div>

        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience4.jpg" alt="Cultural Calm" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Cultural Calm</h3>
                <p class="text-gray-700 text-sm">Immerse in local rituals, temples, and traditional tea experiences.</p>
            </div>
        </div>

        <!-- More 4 cards -->
        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience5.jpg" alt="Adventure Sports" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Adventure Sports</h3>
                <p class="text-gray-700 text-sm">Surf, kite, and paraglide along Sri Lanka’s scenic coasts.</p>
            </div>
        </div>

        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience6.jpg" alt="Romantic Escapes" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Romantic Escapes</h3>
                <p class="text-gray-700 text-sm">Secluded beaches, luxury stays, and sunset views for couples.</p>
            </div>
        </div>

        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience7.jpg" alt="Local Life" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Local Life</h3>
                <p class="text-gray-700 text-sm">Participate in village activities, cooking, and crafts.</p>
            </div>
        </div>

        <div class="bg-[#006994]/10 rounded-xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="/img/experience8.jpg" alt="Wellness Retreats" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold text-[#006994] mb-2">Wellness Retreats</h3>
                <p class="text-gray-700 text-sm">Yoga, meditation, and spa experiences in serene locations.</p>
            </div>
        </div>
    </div>

    <!-- View All Services Button -->
    <div class="mt-12 text-center">
        <a href="{{ url('/services') }}" class="px-8 py-3 bg-[#00b0c6] hover:bg-[#0092a3] rounded-full text-lg font-semibold text-white transition duration-300">
            View All Services
        </a>
    </div>
</section>

<section class="py-20 bg-[#e0f7fa]">
    <!-- Heading -->
    <div class="text-center max-w-4xl mx-auto px-6 mb-12">
        <h2 class="text-4xl md:text-5xl font-extrabold font-['Libre_Baskerville',serif] text-[#006994] mb-4">Why Trivarro is Your Best Choice</h2>
        <p class="text-lg md:text-xl text-gray-700">
            Discover why travelers trust Trivarro for unforgettable Sri Lankan experiences. We combine safety, expertise, and passion to ensure your journey is seamless and memorable.
        </p>
    </div>

    <!-- Features Grid -->
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
        <!-- Feature Card Example -->
        <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition-all duration-300">
            <div class="flex justify-center mb-4">
                <img src="/img/icons/safety.jpg" alt="Safe Travel" class="h-16 w-16">
            </div>
            <h3 class="text-xl font-semibold text-[#006994] mb-2">Safe & Secure</h3>
            <p class="text-gray-700 text-sm">
                Your safety is our top priority with trusted guides, verified vehicles, and secure accommodations.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition-all duration-300">
            <div class="flex justify-center mb-4">
                <img src="/img/icons/expert-guide.jpg" alt="Expert Guides" class="h-16 w-16">
            </div>
            <h3 class="text-xl font-semibold text-[#006994] mb-2">Expert Guides</h3>
            <p class="text-gray-700 text-sm">
                Knowledgeable guides ensure you experience the hidden gems and local culture of Sri Lanka.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition-all duration-300">
            <div class="flex justify-center mb-4">
                <img src="/img/icons/custom-experience.jpg" alt="Customized Experience" class="h-16 w-16">
            </div>
            <h3 class="text-xl font-semibold text-[#006994] mb-2">Tailored Experiences</h3>
            <p class="text-gray-700 text-sm">
                Whether it’s adventure, romance, or relaxation, we customize trips to your preferences.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition-all duration-300">
            <div class="flex justify-center mb-4">
                <img src="/img/icons/affordable.png" alt="Affordable Pricing" class="h-16 w-16">
            </div>
            <h3 class="text-xl font-semibold text-[#006994] mb-2">Affordable Pricing</h3>
            <p class="text-gray-700 text-sm">
                Enjoy premium experiences without breaking your budget, with clear pricing and no hidden costs.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition-all duration-300">
            <div class="flex justify-center mb-4">
                <img src="/img/icons/support.png" alt="24/7 Support" class="h-16 w-16">
            </div>
            <h3 class="text-xl font-semibold text-[#006994] mb-2">24/7 Support</h3>
            <p class="text-gray-700 text-sm">
                Our team is always ready to help during your journey, providing peace of mind wherever you go.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-2xl transition-all duration-300">
            <div class="flex justify-center mb-4">
                <img src="/img/icons/local-connection.png" alt="Local Connections" class="h-16 w-16">
            </div>
            <h3 class="text-xl font-semibold text-[#006994] mb-2">Authentic Local Experiences</h3>
            <p class="text-gray-700 text-sm">
                Connect with local culture, food, and traditions to make your trip truly memorable.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <!-- Heading -->
    <div class="text-center max-w-4xl mx-auto px-6 mb-12">
        <h2 class="text-4xl md:text-5xl font-extrabold font-['Libre_Baskerville',serif] text-[#006994] mb-4">Handpicked Journeys Curated for You</h2>
        <p class="text-lg md:text-xl text-gray-700">
            From romantic getaways and wild safaris to cultural treasures and epic adventures — Trivarro brings you the freedom to explore your way. Pick from our thoughtfully designed journeys or let us build one around your dreams. However you travel, we’ll make it unforgettable.
        </p>
    </div>

    <!-- Tours Grid -->
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        <!-- Tour Card Example -->
        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour1.jpg" alt="Tour 1" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Beach Paradise</h3>
            </div>
        </div>

        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour2.jpg" alt="Tour 2" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Wild Safari</h3>
            </div>
        </div>

        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour3.jpg" alt="Tour 3" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Cultural Trails</h3>
            </div>
        </div>

        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour4.jpg" alt="Tour 4" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Adventure Trips</h3>
            </div>
        </div>

        <!-- Add 4 more tours similarly -->
        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour5.jpg" alt="Tour 5" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Romantic Getaways</h3>
            </div>
        </div>

        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour6.jpg" alt="Tour 6" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Hill Country Escapes</h3>
            </div>
        </div>

        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour7.jpg" alt="Tour 7" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Island Adventures</h3>
            </div>
        </div>

        <div class="relative rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <img src="/img/tours/tour8.jpg" alt="Tour 8" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                <h3 class="text-white text-xl font-semibold px-4 text-center">Cultural Heritage</h3>
            </div>
        </div>
    </div>

    <!-- View All Tours Button -->
    <div class="text-center mt-12">
        <a href="{{ url('/tours') }}" class="px-10 py-3 bg-[#006994] hover:bg-[#00557a] text-white text-lg font-semibold rounded-full transition-all duration-300">
            View All Tours
        </a>
    </div>
</section>

<section class="py-16 bg-[#e0f7fa]">
  <div class="container mx-auto px-6">
    <h2 class="text-4xl md:text-5xl font-extrabold font-['Libre_Baskerville',serif] text-center text-[#006994] mb-4">Vehicales We Provide, Ready For Your Journey!</h2>
    

    <!-- Horizontal Scroll Wrapper -->
    <div class="flex space-x-6 overflow-x-auto scrollbar-hide pb-4">
      
      <!-- Vehicle Card Example -->
      <div class="min-w-[250px] bg-white rounded-xl shadow-lg p-4 flex-shrink-0 hover:shadow-2xl transition duration-300">
        <img src="img/car.jpg" alt="Car" class="rounded-xl w-full h-40 object-cover mb-4">
        <h3 class="text-xl font-semibold text-gray-700 mb-1">Car</h3>
        <p class="text-gray-500 mb-2">3 Adults</p>
        <ul class="text-gray-600 list-disc list-inside">
          <li>Toyota Prius</li>
          <li>Honda Fit Shuttle</li>
          <li>Toyota Axio</li>
        </ul>
      </div>

      <div class="min-w-[250px] bg-white rounded-xl shadow-lg p-4 flex-shrink-0 hover:shadow-2xl transition duration-300">
        <img src="img/suv.jpeg" alt="SUV" class="rounded-xl w-full h-40 object-cover mb-4">
        <h3 class="text-xl font-semibold text-gray-700 mb-1">SUV</h3>
        <p class="text-gray-500 mb-2">3 Adults</p>
        <ul class="text-gray-600 list-disc list-inside">
          <li>Honda Vessel</li>
          <li>Toyota C-HR</li>
        </ul>
      </div>

      <div class="min-w-[250px] bg-white rounded-xl shadow-lg p-4 flex-shrink-0 hover:shadow-2xl transition duration-300">
        <img src="img/flat-van.jpeg" alt="Flat Roof Van" class="rounded-xl w-full h-40 object-cover mb-4">
        <h3 class="text-xl font-semibold text-gray-700 mb-1">Flat Roof Van</h3>
        <p class="text-gray-500 mb-2">4-6 Adults</p>
        <ul class="text-gray-600 list-disc list-inside">
          <li>Toyota HiAce (KDH)</li>
          <li>Nissan Caravan</li>
        </ul>
      </div>

      <div class="min-w-[250px] bg-white rounded-xl shadow-lg p-4 flex-shrink-0 hover:shadow-2xl transition duration-300">
        <img src="img/high-van.jpg" alt="High Roof Van" class="rounded-xl w-full h-40 object-cover mb-4">
        <h3 class="text-xl font-semibold text-gray-700 mb-1">High Roof Van</h3>
        <p class="text-gray-500 mb-2">7-9 Adults</p>
        <ul class="text-gray-600 list-disc list-inside">
          <li>Toyota HiAce (KDH)</li>
          <li>Nissan Caravan</li>
        </ul>
      </div>

      <div class="min-w-[250px] bg-white rounded-xl shadow-lg p-4 flex-shrink-0 hover:shadow-2xl transition duration-300">
        <img src="img/bus.png" alt="Bus/Coach" class="rounded-xl w-full h-40 object-cover mb-4">
        <h3 class="text-xl font-semibold text-gray-700 mb-1">Bus / Coach</h3>
        <p class="text-gray-500 mb-2">15 / 25 / 45 Seater</p>
      </div>

      <div class="min-w-[250px] bg-white rounded-xl shadow-lg p-4 flex-shrink-0 hover:shadow-2xl transition duration-300">
        <img src="img/luxury.jpg" alt="Luxury" class="rounded-xl w-full h-40 object-cover mb-4">
        <h3 class="text-xl font-semibold text-gray-700 mb-1">Luxury</h3>
        <p class="text-gray-500 mb-2">3-4 Adults</p>
        <p class="text-gray-600">Available Upon Request</p>
        <ul class="text-gray-600 list-disc list-inside mt-2">
          <li>BMW</li>
          <li>Mercedes Benz</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<section class="py-20 bg-white">
  <!-- Heading -->
  <div class="text-center max-w-4xl mx-auto px-6 mb-12">
    <h2 class="text-4xl md:text-5xl font-extrabold font-['Libre_Baskerville',serif] text-[#006994] mb-4">
      Special Deals & Promotions
    </h2>
    <p class="text-lg md:text-xl text-gray-700">
      Unlock exclusive offers with Trivarro! Earn discounts, rewards, and credits when you travel, refer friends, or share your adventures.
    </p>
  </div>

  <!-- Promotions Grid -->
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

    <!-- Loyal Traveler Club -->
    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
      <div class="bg-gray-100 h-64 w-full flex items-center justify-center overflow-hidden">
        <img src="/img/promos/loyal-traveler.jpeg" alt="Loyal Traveler Club"
             class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-300">
      </div>
      <div class="p-6 text-center">
        <h3 class="text-xl font-semibold text-[#006994] mb-3">Loyal Traveler Club</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Complete <strong>3 rides</strong> with Trivarro and get <strong>LKR 1,200 off</strong> on all future rides.
        </p>
      </div>
    </div>

    <!-- Refer & Explore -->
    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
      <div class="bg-gray-100 h-64 w-full flex items-center justify-center overflow-hidden">
        <img src="/img/promos/refer-explore.jpeg" alt="Refer and Explore"
             class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-300">
      </div>
      <div class="p-6 text-center">
        <h3 class="text-xl font-semibold text-[#006994] mb-3">Refer & Explore</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Refer a friend and both get <strong>LKR 2,000 off</strong> your next ride.<br>
          <span class="text-[#006994] font-medium">Multi-day tours: Friend gets 5% off!</span>
        </p>
      </div>
    </div>

    <!-- Activity & Ride Combo -->
    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
      <div class="bg-gray-100 h-64 w-full flex items-center justify-center overflow-hidden">
        <img src="/img/promos/activity-combo.jpeg" alt="Activity and Ride Combo"
             class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-300">
      </div>
      <div class="p-6 text-center">
        <h3 class="text-xl font-semibold text-[#006994] mb-3">Activity & Ride Combo</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Book any activity and get <strong>LKR 2,000 off</strong> your ride and <strong>LKR 1,000 off</strong> the activity.
        </p>
      </div>
    </div>

    <!-- Social Share Discount -->
    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group">
      <div class="bg-gray-100 h-64 w-full flex items-center justify-center overflow-hidden">
        <img src="/img/promos/social-share.jpeg" alt="Social Share Discount"
             class="h-full w-full object-contain group-hover:scale-105 transition-transform duration-300">
      </div>
      <div class="p-6 text-center">
        <h3 class="text-xl font-semibold text-[#006994] mb-3">Social Share Discount</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Share your Trivarro experience on social media and tag us to earn <strong>LKR 1,500 credits</strong> for your next booking!
        </p>
      </div>
    </div>

  </div>
</section>



<section class="py-20">
  <div class="container mx-auto px-6">
    <!-- Heading -->
    <div class="text-center mb-12">
      <h2 class="text-4xl md:text-5xl font-extrabold text-[#006994] mb-4">Start Your Journey With Us</h2>
      <p class="text-lg text-gray-700 max-w-2xl mx-auto">
        Fill your request form below and send it directly to WhatsApp!
      </p>
    </div>

    <!-- Tabs -->
    <div class="flex justify-center flex-wrap gap-3 mb-10">
      <button data-target="airport-form" class="tab-btn bg-blue-600 text-white px-5 py-2 rounded-full font-medium shadow hover:bg-blue-700 transition">Airport Transport</button>
      <button data-target="oneway-form" class="tab-btn bg-blue-600 text-white px-5 py-2 rounded-full font-medium shadow hover:bg-blue-700 transition">One Way Transfer</button>
      <button data-target="tours-form" class="tab-btn bg-blue-600 text-white px-5 py-2 rounded-full font-medium shadow hover:bg-blue-700 transition">Tours</button>
      <button data-target="activities-form" class="tab-btn bg-blue-600 text-white px-5 py-2 rounded-full font-medium shadow hover:bg-blue-700 transition">Activities</button>
    </div>

    <!-- Forms Wrapper -->
    <div class="forms-wrapper space-y-8">

      <!-- Airport Transport Form -->
      <div id="airport-form" class="tab-content block">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl p-8">
          <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Airport Transport Request</h3>
          <form class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" onsubmit="sendWhatsApp(event, 'Airport Transport')">
            <div>
              <label class="block text-gray-600 mb-2 font-medium">From</label>
              <select name="From" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
              <option>Bandaranaike International Airport</option>
              <option>Ratmalana Airport</option>
              <option>Mount Lavinia</option>
              <option>Wadduwa</option>
              <option>Waskaduwa</option>
              <option>Kalutara</option>
              <option>Beruwala</option>
              <option>Aluthgama</option>
              <option>Bentota</option>
              <option>Induruwa</option>
              <option>Kosgoda</option>
              <option>Ahungalla</option>
              <option>Balapitiya</option>
              <option>Ambalangoda</option>
              <option>Akurala</option>
              <option>Meetiyagoda</option>
              <option>Hikkaduwa</option>
              <option>Dodanduwa</option>
              <option>Mirissa</option>
              <option>Unawatuna</option>
              <option>Talpe</option>
              <option>Koggala</option>
              <option>Habaraduwa</option>
              <option>Ahangama</option>
              <option>Weligama</option>
              <option>Matara</option>
              <option>Dondra</option>
              <option>Talalla</option>
              <option>Hiriketiya</option>
              <option>Dickwella</option>
              <option>Tangalle</option>
              <option>Ridiyagama</option>
              <option>Udawalawe</option>
              <option>Yala (Kirinda)</option>
              <option>Tissamaharama</option>
              <option>Weerawila</option>
              <option>Kataragama</option>
              <option>Haputale</option>
              <option>Bandarawela</option>
              <option>Ella</option>
              <option>Ratnapura</option>
              <option>Sinharaja</option>
              <option>Katunayake</option>
              <option>Negombo</option>
              <option>Arugambay</option>
              <option>Pinnawala</option>
              <option>Habarana</option>
              <option>Wipattu</option>
              <option>Kalpitiya</option>
              <option>Nilaveli</option>
              <option>Kandalama</option>
              <option>Gal Oya</option>
              <option>Digana</option>
              <option>Pottuvil</option>
              <option>Colombo</option>
              <option>Kandy</option>
              <option>Galle</option>
              <option>Jaffna</option>
              <option>Anuradhapura</option>
              <option>Polonnaruwa</option>
              <option>Trincomalee</option>
              <option>Batticaloa</option>
              <option>Negombo</option>
              <option>Kurunegala</option>
              <option>Ratnapura</option>
              <option>Nuwara Eliya</option>
              <option>Matale</option>
              <option>Badulla</option>
              <option>Kalmunai</option>
              <option>Dambulla</option>
              <option>Moratuwa</option>
              <option>Kalutara</option>
              <option>Kegalle</option>
              <option>Matara</option>
              <option>Gampaha</option>
              <option>Puttalam</option>
              <option>Vavuniya</option>
              <option>Ampara</option>
              <option>Hambantota</option>
              <option>Sigiriya</option>
              <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">To</label>
              <select name="To" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
              <option>Bandaranaike International Airport</option>
              <option>Ratmalana Airport</option>
              <option>Mount Lavinia</option>
              <option>Wadduwa</option>
              <option>Waskaduwa</option>
              <option>Kalutara</option>
              <option>Beruwala</option>
              <option>Aluthgama</option>
              <option>Bentota</option>
              <option>Induruwa</option>
              <option>Kosgoda</option>
              <option>Ahungalla</option>
              <option>Balapitiya</option>
              <option>Ambalangoda</option>
              <option>Akurala</option>
              <option>Meetiyagoda</option>
              <option>Hikkaduwa</option>
              <option>Dodanduwa</option>
              <option>Mirissa</option>
              <option>Unawatuna</option>
              <option>Talpe</option>
              <option>Koggala</option>
              <option>Habaraduwa</option>
              <option>Ahangama</option>
              <option>Weligama</option>
              <option>Matara</option>
              <option>Dondra</option>
              <option>Talalla</option>
              <option>Hiriketiya</option>
              <option>Dickwella</option>
              <option>Tangalle</option>
              <option>Ridiyagama</option>
              <option>Udawalawe</option>
              <option>Yala (Kirinda)</option>
              <option>Tissamaharama</option>
              <option>Weerawila</option>
              <option>Kataragama</option>
              <option>Haputale</option>
              <option>Bandarawela</option>
              <option>Ella</option>
              <option>Ratnapura</option>
              <option>Sinharaja</option>
              <option>Katunayake</option>
              <option>Negombo</option>
              <option>Arugambay</option>
              <option>Pinnawala</option>
              <option>Habarana</option>
              <option>Wipattu</option>
              <option>Kalpitiya</option>
              <option>Nilaveli</option>
              <option>Kandalama</option>
              <option>Gal Oya</option>
              <option>Digana</option>
              <option>Pottuvil</option>
              <option>Colombo</option>
              <option>Kandy</option>
              <option>Galle</option>
              <option>Jaffna</option>
              <option>Anuradhapura</option>
              <option>Polonnaruwa</option>
              <option>Trincomalee</option>
              <option>Batticaloa</option>
              <option>Negombo</option>
              <option>Kurunegala</option>
              <option>Ratnapura</option>
              <option>Nuwara Eliya</option>
              <option>Matale</option>
              <option>Badulla</option>
              <option>Kalmunai</option>
              <option>Dambulla</option>
              <option>Moratuwa</option>
              <option>Kalutara</option>
              <option>Kegalle</option>
              <option>Matara</option>
              <option>Gampaha</option>
              <option>Puttalam</option>
              <option>Vavuniya</option>
              <option>Ampara</option>
              <option>Hambantota</option>
              <option>Sigiriya</option>
              <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Date</label>
              <input type="date" name="Date" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Time</label>
              <input type="time" name="Time" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Vehicle Type</label>
              <select name="Vehicle" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option>Select Vehicle</option>
                <option>Car (3 Adults)</option>
                <option>SUV (3 Adults)</option>
                <option>Flat Roof Van (4-6 Adults)</option>
                <option>High Roof Van (7-9 Adults)</option>
                <option>Bus / Coach (15 / 25 / 45 Seater)</option>
                <option>Luxury (3-4 Adults)</option>
              </select>
            </div>
            <!-- Phone -->
          <div>
  <label class="block text-gray-600 mb-2 font-medium">Phone Number</label>
  <div class="flex">
    <!-- Small country code dropdown -->
    <select class="w-24 appearance-none border border-gray-300 rounded-l-lg bg-gray-50 p-2.5 text-gray-700 text-sm pr-6" style="background-image:none;">
                <option value="+1">🇺🇸 United States +1</option>
                <option value="+44">🇬🇧 United Kingdom +44</option>
                <option value="+94" selected>🇱🇰 Sri Lanka +94</option>
                <option value="+61">🇦🇺 Australia +61</option>
                <option value="+91">🇮🇳 India +91</option>
                <option value="+81">🇯🇵 Japan +81</option>
                <option value="+65">🇸🇬 Singapore +65</option>
                <option value="+971">🇦🇪 United Arab Emirates +971</option>
                <option value="+60">🇲🇾 Malaysia +60</option>
                <option value="+27">🇿🇦 South Africa +27</option>

                <option value="+49">🇩🇪 +49</option>
                <option value="+31">🇳🇱 Netherlands +31</option>
                <option value="+1">🇨🇦 Canada +1</option>
                <option value="+44">🇬🇧 United Kingdom +44</option>
                <option value="+86">🇨🇳 China +86</option>
                <option value="+33">🇫🇷 France +33</option>
                <option value="+65">🇸🇬 Singapore +65</option>
                <option value="+7">🇷🇺 Russia +7</option>
                <option value="+974">🇶🇦 Qatar +974</option>
                <option value="+968">🇴🇲 Oman +968</option>
                <option value="+353">🇮🇪 Ireland +353</option>
                <option value="+358">🇫🇮 Finland +358</option>
                <option value="+1-809">🇩🇴 Dominican Republic +1-809</option>
                <option value="+1-829">🇩🇴 Dominican Republic +1-829</option>
                <option value="+1-849">🇩🇴 Dominican Republic +1-849</option>
                <option value="+36">🇭🇺 Hungary +36</option>
                <option value="+45">🇩🇰 Denmark +45</option>
                <option value="+351">🇵🇹 Portugal +351</option>
                <option value="+352">🇱🇺 Luxembourg +352</option>
                <option value="+509">🇭🇹 Haiti +509</option>
                <option value="+7">🇰🇿 Kazakhstan +7</option>
                <option value="+92">🇵🇰 Pakistan +92</option>
                <option value="+93">🇦🇫 Afghanistan +93</option>
                <option value="+261">🇲🇬 Madagascar +261</option>
                <option value="+855">🇰🇭 Cambodia +855</option>
                <option value="+46">🇸🇪 Sweden +46</option>
                <option value="+49">🇩🇪 Germany +49</option>
                <option value="+62">🇮🇩 Indonesia +62</option>
                <option value="+82">🇰🇷 South Korea +82</option>
                <option value="+27">🇿🇦 South Africa +27</option>
                <option value="+66">🇹🇭 Thailand +66</option>
                <option value="+63">🇵🇭 Philippines +63</option>
                <option value="+960">🇲🇻 Maldives +960</option>
                <option value="+32">🇧🇪 Belgium +32</option>
                <option value="+375">🇧🇾 Belarus +375</option>
                <option value="+55">🇧🇷 Brazil +55</option>
                <option value="+880">🇧🇩 Bangladesh +880</option>
                <option value="+385">🇭🇷 Croatia +385</option>
                <option value="+20">🇪🇬 Egypt +20</option>
                <option value="+30">🇬🇷 Greece +30</option>
                <option value="+98">🇮🇷 Iran +98</option>
                <option value="+39">🇮🇹 Italy +39</option>
                <option value="+1-876">🇯🇲 Jamaica +1-876</option>
                <option value="+962">🇯🇴 Jordan +962</option>
                <option value="+254">🇰🇪 Kenya +254</option>
                <option value="+381">🇷🇸 Serbia +381</option>
                <option value="+371">🇱🇻 Latvia +371</option>
                <option value="+377">🇲🇨 Monaco +377</option>
                <option value="+977">🇳🇵 Nepal +977</option>
                <option value="+64">🇳🇿 New Zealand +64</option>
                <option value="+47">🇳🇴 Norway +47</option>
                <option value="+48">🇵🇱 Poland +48</option>
                <option value="+966">🇸🇦 Saudi Arabia +966</option>
                <option value="+34">🇪🇸 Spain +34</option>
                <option value="+90">🇹🇷 Turkey +90</option>
                <option value="+84">🇻🇳 Vietnam +84</option>    </select>

    <!-- Long phone number input -->
    <input type="tel" placeholder="XX XXX XXXX" class="flex-1 border border-gray-300 border-l-0 rounded-r-lg p-2.5 focus:ring-2 focus:ring-blue-400">
  </div>
</div>
            <div class="md:col-span-2 lg:col-span-3 flex justify-center mt-4">
              <button type="submit" class="bg-green-600 text-white px-10 py-3 rounded-full text-lg font-medium hover:bg-green-700 transition shadow-md">Send Request</button>
            </div>
          </form>
        </div>
      </div>

      <!-- One Way Transfer Form -->
      <div id="oneway-form" class="tab-content hidden">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl p-8">
          <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">One Way Transfer Request</h3>
          <form class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" onsubmit="sendWhatsApp(event, 'One Way Transfer')">
            <div>
              <label class="block text-gray-600 mb-2 font-medium">From</label>
              <select name="From" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
              <option>Bandaranaike International Airport</option>
              <option>Ratmalana Airport</option>
              <option>Mount Lavinia</option>
              <option>Wadduwa</option>
              <option>Waskaduwa</option>
              <option>Kalutara</option>
              <option>Beruwala</option>
              <option>Aluthgama</option>
              <option>Bentota</option>
              <option>Induruwa</option>
              <option>Kosgoda</option>
              <option>Ahungalla</option>
              <option>Balapitiya</option>
              <option>Ambalangoda</option>
              <option>Akurala</option>
              <option>Meetiyagoda</option>
              <option>Hikkaduwa</option>
              <option>Dodanduwa</option>
              <option>Mirissa</option>
              <option>Unawatuna</option>
              <option>Talpe</option>
              <option>Koggala</option>
              <option>Habaraduwa</option>
              <option>Ahangama</option>
              <option>Weligama</option>
              <option>Matara</option>
              <option>Dondra</option>
              <option>Talalla</option>
              <option>Hiriketiya</option>
              <option>Dickwella</option>
              <option>Tangalle</option>
              <option>Ridiyagama</option>
              <option>Udawalawe</option>
              <option>Yala (Kirinda)</option>
              <option>Tissamaharama</option>
              <option>Weerawila</option>
              <option>Kataragama</option>
              <option>Haputale</option>
              <option>Bandarawela</option>
              <option>Ella</option>
              <option>Ratnapura</option>
              <option>Sinharaja</option>
              <option>Katunayake</option>
              <option>Negombo</option>
              <option>Arugambay</option>
              <option>Pinnawala</option>
              <option>Habarana</option>
              <option>Wipattu</option>
              <option>Kalpitiya</option>
              <option>Nilaveli</option>
              <option>Kandalama</option>
              <option>Gal Oya</option>
              <option>Digana</option>
              <option>Pottuvil</option>
              <option>Colombo</option>
              <option>Kandy</option>
              <option>Galle</option>
              <option>Jaffna</option>
              <option>Anuradhapura</option>
              <option>Polonnaruwa</option>
              <option>Trincomalee</option>
              <option>Batticaloa</option>
              <option>Negombo</option>
              <option>Kurunegala</option>
              <option>Ratnapura</option>
              <option>Nuwara Eliya</option>
              <option>Matale</option>
              <option>Badulla</option>
              <option>Kalmunai</option>
              <option>Dambulla</option>
              <option>Moratuwa</option>
              <option>Kalutara</option>
              <option>Kegalle</option>
              <option>Matara</option>
              <option>Gampaha</option>
              <option>Puttalam</option>
              <option>Vavuniya</option>
              <option>Ampara</option>
              <option>Hambantota</option>
              <option>Sigiriya</option>
              <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">To</label>
              <select name="To" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
              <option>Bandaranaike International Airport</option>
              <option>Ratmalana Airport</option>
              <option>Mount Lavinia</option>
              <option>Wadduwa</option>
              <option>Waskaduwa</option>
              <option>Kalutara</option>
              <option>Beruwala</option>
              <option>Aluthgama</option>
              <option>Bentota</option>
              <option>Induruwa</option>
              <option>Kosgoda</option>
              <option>Ahungalla</option>
              <option>Balapitiya</option>
              <option>Ambalangoda</option>
              <option>Akurala</option>
              <option>Meetiyagoda</option>
              <option>Hikkaduwa</option>
              <option>Dodanduwa</option>
              <option>Mirissa</option>
              <option>Unawatuna</option>
              <option>Talpe</option>
              <option>Koggala</option>
              <option>Habaraduwa</option>
              <option>Ahangama</option>
              <option>Weligama</option>
              <option>Matara</option>
              <option>Dondra</option>
              <option>Talalla</option>
              <option>Hiriketiya</option>
              <option>Dickwella</option>
              <option>Tangalle</option>
              <option>Ridiyagama</option>
              <option>Udawalawe</option>
              <option>Yala (Kirinda)</option>
              <option>Tissamaharama</option>
              <option>Weerawila</option>
              <option>Kataragama</option>
              <option>Haputale</option>
              <option>Bandarawela</option>
              <option>Ella</option>
              <option>Ratnapura</option>
              <option>Sinharaja</option>
              <option>Katunayake</option>
              <option>Negombo</option>
              <option>Arugambay</option>
              <option>Pinnawala</option>
              <option>Habarana</option>
              <option>Wipattu</option>
              <option>Kalpitiya</option>
              <option>Nilaveli</option>
              <option>Kandalama</option>
              <option>Gal Oya</option>
              <option>Digana</option>
              <option>Pottuvil</option>
              <option>Colombo</option>
              <option>Kandy</option>
              <option>Galle</option>
              <option>Jaffna</option>
              <option>Anuradhapura</option>
              <option>Polonnaruwa</option>
              <option>Trincomalee</option>
              <option>Batticaloa</option>
              <option>Negombo</option>
              <option>Kurunegala</option>
              <option>Ratnapura</option>
              <option>Nuwara Eliya</option>
              <option>Matale</option>
              <option>Badulla</option>
              <option>Kalmunai</option>
              <option>Dambulla</option>
              <option>Moratuwa</option>
              <option>Kalutara</option>
              <option>Kegalle</option>
              <option>Matara</option>
              <option>Gampaha</option>
              <option>Puttalam</option>
              <option>Vavuniya</option>
              <option>Ampara</option>
              <option>Hambantota</option>
              <option>Sigiriya</option>
              <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Distance (KM)</label>
              <input type="number" name="Distance" value="100" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Vehicle Type</label>
              <select name="Vehicle" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option>Select Vehicle</option>
                <option>Car (3 Adults)</option>
                <option>SUV (3 Adults)</option>
                <option>Flat Roof Van (4-6 Adults)</option>
                <option>High Roof Van (7-9 Adults)</option>
                <option>Bus / Coach (15 / 25 / 45 Seater)</option>
                <option>Luxury (3-4 Adults)</option>
              </select>
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Date</label>
              <input type="date" name="Date" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Time</label>
              <input type="time" name="Time" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="md:col-span-2 lg:col-span-3 flex justify-center mt-4">
              <button type="submit" class="bg-green-600 text-white px-10 py-3 rounded-full text-lg font-medium hover:bg-green-700 transition shadow-md">Send Request</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Tours Form -->
      <div id="tours-form" class="tab-content hidden">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl p-8">
          <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Tours Request</h3>
          <form class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" onsubmit="sendWhatsApp(event, 'Tours')">
            <div>
              <label class="block text-gray-600 mb-2 font-medium">From</label>
              <select name="From" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
              <option>Bandaranaike International Airport</option>
              <option>Ratmalana Airport</option>
              <option>Mount Lavinia</option>
              <option>Wadduwa</option>
              <option>Waskaduwa</option>
              <option>Kalutara</option>
              <option>Beruwala</option>
              <option>Aluthgama</option>
              <option>Bentota</option>
              <option>Induruwa</option>
              <option>Kosgoda</option>
              <option>Ahungalla</option>
              <option>Balapitiya</option>
              <option>Ambalangoda</option>
              <option>Akurala</option>
              <option>Meetiyagoda</option>
              <option>Hikkaduwa</option>
              <option>Dodanduwa</option>
              <option>Mirissa</option>
              <option>Unawatuna</option>
              <option>Talpe</option>
              <option>Koggala</option>
              <option>Habaraduwa</option>
              <option>Ahangama</option>
              <option>Weligama</option>
              <option>Matara</option>
              <option>Dondra</option>
              <option>Talalla</option>
              <option>Hiriketiya</option>
              <option>Dickwella</option>
              <option>Tangalle</option>
              <option>Ridiyagama</option>
              <option>Udawalawe</option>
              <option>Yala (Kirinda)</option>
              <option>Tissamaharama</option>
              <option>Weerawila</option>
              <option>Kataragama</option>
              <option>Haputale</option>
              <option>Bandarawela</option>
              <option>Ella</option>
              <option>Ratnapura</option>
              <option>Sinharaja</option>
              <option>Katunayake</option>
              <option>Negombo</option>
              <option>Arugambay</option>
              <option>Pinnawala</option>
              <option>Habarana</option>
              <option>Wipattu</option>
              <option>Kalpitiya</option>
              <option>Nilaveli</option>
              <option>Kandalama</option>
              <option>Gal Oya</option>
              <option>Digana</option>
              <option>Pottuvil</option>
              <option>Colombo</option>
              <option>Kandy</option>
              <option>Galle</option>
              <option>Jaffna</option>
              <option>Anuradhapura</option>
              <option>Polonnaruwa</option>
              <option>Trincomalee</option>
              <option>Batticaloa</option>
              <option>Negombo</option>
              <option>Kurunegala</option>
              <option>Ratnapura</option>
              <option>Nuwara Eliya</option>
              <option>Matale</option>
              <option>Badulla</option>
              <option>Kalmunai</option>
              <option>Dambulla</option>
              <option>Moratuwa</option>
              <option>Kalutara</option>
              <option>Kegalle</option>
              <option>Matara</option>
              <option>Gampaha</option>
              <option>Puttalam</option>
              <option>Vavuniya</option>
              <option>Ampara</option>
              <option>Hambantota</option>
              <option>Sigiriya</option>
              <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">To</label>
              <select name="To" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
              <option>Bandaranaike International Airport</option>
              <option>Ratmalana Airport</option>
              <option>Mount Lavinia</option>
              <option>Wadduwa</option>
              <option>Waskaduwa</option>
              <option>Kalutara</option>
              <option>Beruwala</option>
              <option>Aluthgama</option>
              <option>Bentota</option>
              <option>Induruwa</option>
              <option>Kosgoda</option>
              <option>Ahungalla</option>
              <option>Balapitiya</option>
              <option>Ambalangoda</option>
              <option>Akurala</option>
              <option>Meetiyagoda</option>
              <option>Hikkaduwa</option>
              <option>Dodanduwa</option>
              <option>Mirissa</option>
              <option>Unawatuna</option>
              <option>Talpe</option>
              <option>Koggala</option>
              <option>Habaraduwa</option>
              <option>Ahangama</option>
              <option>Weligama</option>
              <option>Matara</option>
              <option>Dondra</option>
              <option>Talalla</option>
              <option>Hiriketiya</option>
              <option>Dickwella</option>
              <option>Tangalle</option>
              <option>Ridiyagama</option>
              <option>Udawalawe</option>
              <option>Yala (Kirinda)</option>
              <option>Tissamaharama</option>
              <option>Weerawila</option>
              <option>Kataragama</option>
              <option>Haputale</option>
              <option>Bandarawela</option>
              <option>Ella</option>
              <option>Ratnapura</option>
              <option>Sinharaja</option>
              <option>Katunayake</option>
              <option>Negombo</option>
              <option>Arugambay</option>
              <option>Pinnawala</option>
              <option>Habarana</option>
              <option>Wipattu</option>
              <option>Kalpitiya</option>
              <option>Nilaveli</option>
              <option>Kandalama</option>
              <option>Gal Oya</option>
              <option>Digana</option>
              <option>Pottuvil</option>
              <option>Colombo</option>
              <option>Kandy</option>
              <option>Galle</option>
              <option>Jaffna</option>
              <option>Anuradhapura</option>
              <option>Polonnaruwa</option>
              <option>Trincomalee</option>
              <option>Batticaloa</option>
              <option>Negombo</option>
              <option>Kurunegala</option>
              <option>Ratnapura</option>
              <option>Nuwara Eliya</option>
              <option>Matale</option>
              <option>Badulla</option>
              <option>Kalmunai</option>
              <option>Dambulla</option>
              <option>Moratuwa</option>
              <option>Kalutara</option>
              <option>Kegalle</option>
              <option>Matara</option>
              <option>Gampaha</option>
              <option>Puttalam</option>
              <option>Vavuniya</option>
              <option>Ampara</option>
              <option>Hambantota</option>
              <option>Sigiriya</option>
              <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>
             <!-- Vehicle -->
          <div>
            <label class="block text-gray-600 mb-2 font-medium">Vehicle Type</label>
            <select class="w-full border border-gray-300 rounded-lg p-2.5">
              <option>Select Vehicle</option>
              <option>Car (3 Adults)</option>
              <option>SUV (3 Adults)</option>
              <option>Flat Roof Van (4-6 Adults)</option>
              <option>High Roof Van (7-9 Adults)</option>
              <option>Bus / Coach (15 / 25 / 45 Seater)</option>
              <option>Luxury (3-4 Adults)</option>
            </select>
          </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Start Date</label>
              <input type="date" name="StartDate" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">End Date</label>
              <input type="date" name="EndDate" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Number of People</label>
              <input type="number" name="People" min="1" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
            </div>
            <!-- Itinerary / Notes -->
            <div class="md:col-span-2 lg:col-span-3">
              <label class="block text-gray-600 mb-2 font-medium">Itinerary / Notes</label>
              <textarea rows="4" placeholder="Type your tour plan, special requests, or notes here..." class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
            </div>
            <div class="md:col-span-2 lg:col-span-3 flex justify-center mt-4">
              <button type="submit" class="bg-green-600 text-white px-10 py-3 rounded-full text-lg font-medium hover:bg-green-700 transition shadow-md">Send Request</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Activities Form -->
      <div id="activities-form" class="tab-content hidden">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl p-8">
          <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Activities Request</h3>
          <form class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" onsubmit="sendWhatsApp(event, 'Activities')">
            <div>
              <label class="block text-gray-600 mb-2 font-medium">Activity Type</label>
              <select name="ActivityType" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select Activity</option>
              <option value="Wildlife Safari">Wildlife Safari</option>
              <option value="River Safari">River Safari</option>
              <option value="Whale Watching">Whale Watching</option>
              <option value="Water Sports">Water Sports</option>
              <option value="Wildlife Trekking">Wildlife Trekking</option>
              <option value="Snorkeling">Snorkeling</option>
              <option value="Turtle Hatchery">Turtle Hatchery</option>
              <option value="Zip Line">Zip Line</option>
              <option value="Cycle Rentals">Cycle Rentals</option>
              <option value="Yoga Classes">Yoga Classes</option>
              <option value="Rafting">Rafting</option>
              <option value="Cooking Classes">Cooking Classes</option>
              <option value="Taxis">Taxis</option>
              <option value="Multi-Day Tours">Multi-Day Tours</option>
              <option value="City Tours">City Tours</option>
              <option value="Trekking">Trekking</option>
            </select>
              </select>
            </div>
             <!-- Specific Activity -->
          <div>
            <label class="block text-gray-600 mb-2 font-medium">Specific Activity</label>
            <select id="specificActivity" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">

              <!-- Wildlife Safari -->
              <optgroup label="Wildlife Safari">
                <option>Yala National Park</option>
                <option>Wilpattu National Park</option>
                <option>Minneriya National Park</option>
                <option>Kumana National Park</option>
                <option>Hurulo Eco Park</option>
                <option>Ridiyagama National Park</option>
              </optgroup>

              <!-- River Safari -->
              <optgroup label="River Safari">
                <option>Bentota River</option>
                <option>Madu River</option>
              </optgroup>

              <!-- Whale Watching -->
              <optgroup label="Whale Watching">
                <option>Mirissa</option>
                <option>Trincomalee</option>
                <option>Kalpitiya</option>
                <option>Bentota</option>
              </optgroup>

              <!-- Water Sports -->
              <optgroup label="Water Sports">
                <option>Jetski</option>
                <option>Banana Ride</option>
                <option>Tube Ride</option>
                <option>Doughnut Ride</option>
                <option>Wake Board</option>
                <option>Water Ski</option>
                <option>Boat Ride</option>
                <option>Hot Air Balloon</option>
                <option>Dambulla</option>
              </optgroup>

              <!-- Wildlife Trekking -->
              <optgroup label="Wildlife Trekking">
                <option>Horton Plains</option>
              </optgroup>

              <!-- Snorkeling -->
              <optgroup label="Snorkeling">
                <option>Mirissa</option>
                <option>Trincomalee</option>
                <option>Kalpitiya</option>
              </optgroup>

              <!-- Turtle Hatchery -->
              <optgroup label="Turtle Hatchery">
                <option>Kosgoda</option>
                <option>Koggala</option>
              </optgroup>

              <!-- Zip Line -->
              <optgroup label="Zip Line">
                <option>Ella</option>
                <option>Kithulgala</option>
              </optgroup>

              <!-- Cycle Rentals -->
              <optgroup label="Cycle Rentals">
                <option>Sigiriya</option>
              </optgroup>

              <!-- Rafting -->
              <optgroup label="Rafting">
                <option>Kithulgala</option>
              </optgroup>

              <!-- Cooking Classes -->
              <optgroup label="Cooking Classes">
                <option>Sigiriya</option>
                <option>Kandy</option>
                <option>Ella</option>
                <option>Mihintale</option>
                <option>Hiriketiya</option>
              </optgroup>

              <!-- Taxis -->
              <optgroup label="Taxis">
                <option>Island Wide Taxi</option>
                <option>Airport Pickup and Drop</option>
              </optgroup>

              <!-- Multi-Day & City Tours -->
              <optgroup label="Tours">
                <option>Multi-Day Tours</option>
                <option>City Tours</option>
                <option>Tuk Tuk City Tour</option>
              </optgroup>

              <!-- Trekking -->
              <optgroup label="Trekking">
                <option>Horton Plains</option>
              </optgroup>
            </select>
          </div>
            <div>
              <label class="block text-gray-600 mb-2 font-medium">City</label>
              <select name="City" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
                <option selected disabled>Select City</option>
                <option>Bandaranaike International Airport</option>
                <option>Ratmalana Airport</option>
                <option>Mount Lavinia</option>
                <option>Wadduwa</option>
                <option>Waskaduwa</option>
                <option>Kalutara</option>
                <option>Beruwala</option>
                <option>Aluthgama</option>
                <option>Bentota</option>
                <option>Induruwa</option>
                <option>Kosgoda</option>
                <option>Ahungalla</option>
                <option>Balapitiya</option>
                <option>Ambalangoda</option>
                <option>Akurala</option>
                <option>Meetiyagoda</option>
                <option>Hikkaduwa</option>
                <option>Dodanduwa</option>
                <option>Mirissa</option>
                <option>Unawatuna</option>
                <option>Talpe</option>
                <option>Koggala</option>
                <option>Habaraduwa</option>
                <option>Ahangama</option>
                <option>Weligama</option>
                <option>Matara</option>
                <option>Dondra</option>
                <option>Talalla</option>
                <option>Hiriketiya</option>
                <option>Dickwella</option>
                <option>Tangalle</option>
                <option>Ridiyagama</option>
                <option>Udawalawe</option>
                <option>Yala (Kirinda)</option>
                <option>Tissamaharama</option>
                <option>Weerawila</option>
                <option>Kataragama</option>
                <option>Haputale</option>
                <option>Bandarawela</option>
                <option>Ella</option>
                <option>Ratnapura</option>
                <option>Sinharaja</option>
                <option>Katunayake</option>
                <option>Negombo</option>
                <option>Arugambay</option>
                <option>Pinnawala</option>
                <option>Habarana</option>
                <option>Wipattu</option>
                <option>Kalpitiya</option>
                <option>Nilaveli</option>
                <option>Kandalama</option>
                <option>Gal Oya</option>
                <option>Digana</option>
                <option>Pottuvil</option>
                <option>Colombo</option>
                <option>Kandy</option>
                <option>Galle</option>
                <option>Jaffna</option>
                <option>Anuradhapura</option>
                <option>Polonnaruwa</option>
                <option>Trincomalee</option>
                <option>Batticaloa</option>
                <option>Negombo</option>
                <option>Kurunegala</option>
                <option>Ratnapura</option>
                <option>Nuwara Eliya</option>
                <option>Matale</option>
                <option>Badulla</option>
                <option>Kalmunai</option>
                <option>Dambulla</option>
                <option>Moratuwa</option>
                <option>Kalutara</option>
                <option>Kegalle</option>
                <option>Matara</option>
                <option>Gampaha</option>
                <option>Puttalam</option>
                <option>Vavuniya</option>
                <option>Ampara</option>
                <option>Hambantota</option>
                <option>Sigiriya</option>
                <option>Sri Jayawardenepura Kotte</option>
              </select>
            </div>
             <!-- Date -->
          <div>
            <label class="block text-gray-600 mb-2 font-medium">Date</label>
            <input type="date" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
          </div>

          <!-- Time -->
          <div>
            <label class="block text-gray-600 mb-2 font-medium">Time</label>
            <input type="time" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-400">
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-gray-600 mb-2 font-medium">Phone Number</label>
            <div class="flex">
<select class="w-24 border border-gray-300 rounded-l-lg bg-gray-50 p-2.5 text-gray-700 focus:ring-2 focus:ring-blue-400">
                <option value="+1">🇺🇸 +1</option>
                <option value="+44">🇬🇧 +44</option>
                <option value="+94" selected>🇱🇰 +94</option>
                <option value="+61">🇦🇺 +61</option>
                <option value="+91">🇮🇳 +91</option>
                <option value="+81">🇯🇵 +81</option>
                <option value="+65">🇸🇬 +65</option>
                <option value="+971">🇦🇪 +971</option>
                <option value="+60">🇲🇾 +60</option>
                <option value="+27">🇿🇦 +27</option>
                <option value="+33">🇫🇷 +33</option>
                <option value="+49">🇩🇪 +49</option>
                <option value="+31">🇳🇱 Netherlands +31</option>
                <option value="+1">🇨🇦 Canada +1</option>
                <option value="+44">🇬🇧 United Kingdom +44</option>
                <option value="+86">🇨🇳 China +86</option>
                <option value="+33">🇫🇷 France +33</option>
                <option value="+65">🇸🇬 Singapore +65</option>
                <option value="+7">🇷🇺 Russia +7</option>
                <option value="+974">🇶🇦 Qatar +974</option>
                <option value="+968">🇴🇲 Oman +968</option>
                <option value="+353">🇮🇪 Ireland +353</option>
                <option value="+358">🇫🇮 Finland +358</option>
                <option value="+1-809">🇩🇴 Dominican Republic +1-809</option>
                <option value="+1-829">🇩🇴 Dominican Republic +1-829</option>
                <option value="+1-849">🇩🇴 Dominican Republic +1-849</option>
                <option value="+36">🇭🇺 Hungary +36</option>
                <option value="+45">🇩🇰 Denmark +45</option>
                <option value="+351">🇵🇹 Portugal +351</option>
                <option value="+352">🇱🇺 Luxembourg +352</option>
                <option value="+509">🇭🇹 Haiti +509</option>
                <option value="+7">🇰🇿 Kazakhstan +7</option>
                <option value="+92">🇵🇰 Pakistan +92</option>
                <option value="+93">🇦🇫 Afghanistan +93</option>
                <option value="+261">🇲🇬 Madagascar +261</option>
                <option value="+855">🇰🇭 Cambodia +855</option>
                <option value="+46">🇸🇪 Sweden +46</option>
                <option value="+49">🇩🇪 Germany +49</option>
                <option value="+62">🇮🇩 Indonesia +62</option>
                <option value="+82">🇰🇷 South Korea +82</option>
                <option value="+27">🇿🇦 South Africa +27</option>
                <option value="+66">🇹🇭 Thailand +66</option>
                <option value="+63">🇵🇭 Philippines +63</option>
                <option value="+960">🇲🇻 Maldives +960</option>
                <option value="+32">🇧🇪 Belgium +32</option>
                <option value="+375">🇧🇾 Belarus +375</option>
                <option value="+55">🇧🇷 Brazil +55</option>
                <option value="+880">🇧🇩 Bangladesh +880</option>
                <option value="+385">🇭🇷 Croatia +385</option>
                <option value="+20">🇪🇬 Egypt +20</option>
                <option value="+30">🇬🇷 Greece +30</option>
                <option value="+98">🇮🇷 Iran +98</option>
                <option value="+39">🇮🇹 Italy +39</option>
                <option value="+1-876">🇯🇲 Jamaica +1-876</option>
                <option value="+962">🇯🇴 Jordan +962</option>
                <option value="+254">🇰🇪 Kenya +254</option>
                <option value="+381">🇷🇸 Serbia +381</option>
                <option value="+371">🇱🇻 Latvia +371</option>
                <option value="+377">🇲🇨 Monaco +377</option>
                <option value="+977">🇳🇵 Nepal +977</option>
                <option value="+64">🇳🇿 New Zealand +64</option>
                <option value="+47">🇳🇴 Norway +47</option>
                <option value="+48">🇵🇱 Poland +48</option>
                <option value="+966">🇸🇦 Saudi Arabia +966</option>
                <option value="+34">🇪🇸 Spain +34</option>
                <option value="+90">🇹🇷 Turkey +90</option>
                <option value="+84">🇻🇳 Vietnam +84</option> 
                         </select>
              <input type="tel" placeholder="XX XXX XXXX" class="flex-1 border border-gray-300 border-l-0 rounded-r-lg p-2.5 focus:ring-2 focus:ring-blue-400">
          </div>

        </div>
            <div class="md:col-span-2 lg:col-span-3 flex justify-center mt-4">
              <button type="submit" class="bg-green-600 text-white px-10 py-3 rounded-full text-lg font-medium hover:bg-green-700 transition shadow-md">Send Request</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center text-[#006994] mb-4">
            What Our Customers Say
        </h2>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($reviews as $review)

                <div class="bg-white p-6 rounded-3xl shadow-xl border border-gray-100 hover:shadow-2xl transition duration-500">
                    
                    <div class="flex items-center mb-4">
                        <!-- DP -->
                        <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-lg">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800">
                                Recent Traveler
                            </h3>

                            <!-- Rating -->
                            <div class="flex mt-1">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <i class="fas fa-star text-yellow-400"></i>
                                @endfor
                                @for($i = $review->rating; $i < 5; $i++)
                                    <i class="far fa-star text-gray-300"></i>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Comment -->
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $review->comment }}
                    </p>

                </div>

            @endforeach
        </div>
    </div>
</section>



<script>
  // Tab switching
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');
  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      tabContents.forEach(tc => tc.classList.add('hidden'));
      tabContents.forEach(tc => tc.classList.remove('block'));
      const target = document.getElementById(btn.dataset.target);
      target.classList.remove('hidden');
      target.classList.add('block');
    });
  });

  // WhatsApp integration
  function sendWhatsApp(e, formName) {
    e.preventDefault();
    const form = e.target;

    // Start message with greeting
    let message = "Hello! \n";
    message += `${formName} Request:\n`;

    for (let element of form.elements) {
      if (element.name && element.value) {
        message += `${element.name}: ${element.value}\n`;
      }
    }

    const encodedMessage = encodeURIComponent(message);
    const phone = '+94 77 016 7206'; // Replace with your WhatsApp number including country code
    // open WhatsApp Web/Desktop or Mobile
    window.open(`https://wa.me/${phone}?text=${encodedMessage}`, '_blank');
  }
</script>

<!-- Tailwind CSS Scrollbar Hide -->
<style>
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

@include('layouts.footer')


</body>
</html>