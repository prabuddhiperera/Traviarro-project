<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Trivarro</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    @include('navigation-menu')

  <!-- Hero Banner -->
  <section class="relative bg-cover bg-center h-[65vh]" style="background-image: url('https://images.unsplash.com/photo-1518684079-3c830dcef090?auto=format&fit=crop&w=1400&q=80');">
    <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white text-center px-6">
      <h1 class="text-5xl font-bold mb-3 tracking-wide">About Trivarro</h1>
      <p class="max-w-2xl text-lg leading-relaxed">Sri Lanka, Done Right - Local Experts. Real Adventures. No Tourist Traps.</p>
    </div>
  </section>

  <!-- Our Story -->
  <section class="py-16 px-6 lg:px-24">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-blue-700 mb-6">Our Story</h2>
      <p class="text-gray-700 leading-relaxed text-lg mb-4">
        At Trivarro, we don't just offer tours — we build trust, craft meaningful experiences, and create journeys that stay with you long after you’ve returned home.
      </p>
      <p class="text-gray-700 leading-relaxed text-lg mb-4">
        Born in the heart of Sri Lanka, Trivarro was founded with a simple mission: to set a new standard in travel—one rooted in authenticity, reliability, and heart. While we may be a new name in the industry, our team is made up of local travel experts, experienced guides, and trusted partners who've spent years bringing unforgettable experiences to life.
      </p>
      <p class="text-gray-700 leading-relaxed text-lg">
        When you travel, you want to feel safe, seen, and inspired. We get it—and that’s why every Trivarro journey is designed with care, not guesswork.
      </p>
    </div>
  </section>

  <!-- Meet Our Team -->
  <section class="bg-blue-50 py-14 px-6 lg:px-24 text-center">
      <h2 class="text-3xl font-bold text-blue-700 mb-4">Meet Our Team</h2>
      <p class="text-gray-600 max-w-3xl mx-auto mb-8">
          Behind every journey is a team of passionate locals dedicated to making your experience unforgettable. 
          From your first inquiry to your last goodbye, you’ll always have someone who truly cares.
      </p>

      <div class="flex justify-center gap-8 flex-wrap">
          
          <!-- TEAM CARD -->
          <div class="bg-white shadow-lg rounded-2xl p-6 w-64">
              
              <!-- FACE ONLY -->
              <div class="w-28 h-28 mx-auto mb-4 overflow-hidden rounded-full shadow-md">
                  <img src="{{ asset('img/founder3.jpeg') }}"
                      class="w-full h-full object-cover object-[center_20%]"
                      alt="Founder">
              </div>

              <h3 class="font-semibold text-lg text-center">Oshan Tennakoon</h3>
              <p class="text-sm text-gray-500 text-center">Founder</p>

          </div>
          <!-- END TEAM CARD -->

      </div>
  </section>


  <!-- Our Services -->
  <section class="py-16 px-6 lg:px-24 text-center">
    <h2 class="text-3xl font-bold text-blue-700 mb-8">Our Services at a Glance</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-2">🚗 Private & Group Transport</h3>
        <p class="text-gray-600">Taxis, tuk-tuks, vans, and luxury vehicles — always comfortable and reliable.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-2">🌊 Adventure Experiences</h3>
        <p class="text-gray-600">Safaris, whale watching, snorkeling, rafting & more – thrill meets nature.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-2">🕒 24/7 Guest Support</h3>
        <p class="text-gray-600">Honest pricing, no hidden costs — support whenever you need it.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-2">🏝️ Customizable Tours</h3>
        <p class="text-gray-600">Curated packages with or without hotel bookings — you decide.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-xl hover:shadow-xl transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-2">🌿 Cultural Experiences</h3>
        <p class="text-gray-600">Local gems, spice farms, tea trails, temples, and traditional workshops.</p>
      </div>
    </div>
  </section>

  <!-- Mission, Vision, Promise -->
  <section class="bg-gradient-to-b from-blue-50 to-white py-16 px-6 lg:px-24">
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-10 text-center md:text-left">
      <div>
        <h3 class="text-2xl font-semibold text-blue-700 mb-3">Our Mission</h3>
        <p class="text-gray-700 leading-relaxed">
          To be the most trusted, traveler-first tourism company in Sri Lanka — delivering unforgettable experiences while uplifting local communities. We design travel that doesn’t just show you places, it connects you to people, culture, and moments that change how you see the world.
        </p>
      </div>
      <div>
        <h3 class="text-2xl font-semibold text-blue-700 mb-3">Our Vision</h3>
        <p class="text-gray-700 leading-relaxed">
          To make Sri Lanka the most soulful travel experience in the world — where every journey feels like coming home.
        </p>
      </div>
      <div>
        <h3 class="text-2xl font-semibold text-blue-700 mb-3">Our Promise to You</h3>
        <p class="text-gray-700 leading-relaxed">
          Whether it’s your first visit or your tenth, you’ll feel like you’re traveling with someone who truly cares. We treat your trip like it’s our own — because for us, it is.
        </p>
      </div>
    </div>
  </section>

  <!-- Footer Banner -->
  <section class="relative bg-cover bg-center h-[40vh]" style="background-image: url('https://images.unsplash.com/photo-1571214124510-6b5df3b6b7b0?auto=format&fit=crop&w=1400&q=80');">
    <div class="absolute inset-0 bg-black/60 flex flex-col justify-center items-center text-white text-center">
      <h2 class="text-4xl font-bold mb-2">Experience Sri Lanka with Heart</h2>
      <p class="text-lg">Travel with Trivarro — where every journey tells a story.</p>
    </div>
  </section>

  @include('layouts.footer')

</body>
</html>
