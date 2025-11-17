<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Destinations | Trivarro</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .hero-bg {
      background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)),
        url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80');
      background-size: cover;
      background-position: center;
    }
  </style>
</head>

<body class="bg-white text-gray-800">
  @include('navigation-menu')

  <!-- Hero Section -->
  <section class="hero-bg text-white py-28 text-center">
    <h1 class="text-5xl md:text-6xl font-extrabold mb-4">Explore Sri Lanka with Trivarro</h1>
    <p class="max-w-2xl mx-auto text-lg text-gray-200">
      From ancient cities and misty hills to golden beaches — discover the island’s most breathtaking destinations with local experts.
    </p>
  </section>

  <!-- Destinations Section -->
  <section class="py-20 bg-gradient-to-b from-[#e0f7fa] to-white">
    <div class="text-center mb-12">
      <h2 class="text-4xl md:text-5xl font-bold text-[#006994] mb-4">Our Top Destinations</h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-lg">
        Handpicked locations that showcase the true beauty, adventure, and serenity of Sri Lanka.
      </p>
    </div>

    <div class="container mx-auto px-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
      @foreach($destinations as $destination)
      <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition">
        <img src="{{ asset('uploads/images/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-2xl font-semibold text-[#0077b6] mb-2">{{ $destination->name }}</h3>
          <p class="text-gray-600 text-sm mb-4">{{ Str::limit($destination->description, 80) }}</p>
          <a href="{{ route('destination.show', $destination->id) }}" class="bg-[#0077b6] text-white px-5 py-2 rounded-full text-sm hover:bg-[#023e8a] transition">Explore</a>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 900,
      once: true,
      offset: 100
    });
  </script>

  @include('layouts.footer')

</body>
</html>
