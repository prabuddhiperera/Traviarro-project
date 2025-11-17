<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Destinations | Trivarro</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-white text-gray-800">
  @include('navigation-menu')

  <!-- Hero Section -->
  <section class="relative bg-cover bg-center h-[90vh]" style="background-image: url('{{ asset('img/destination.jpg') }}');">
    <div class="absolute inset-0 bg-[#006994]/40"></div>
    <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
      <h1 class="text-5xl md:text-6xl font-extrabold font-['Libre_Baskerville',serif] mb-4">
        Explore Sri Lanka with Trivarro
      </h1>
      <p class="text-lg md:text-xl mb-8 max-w-2xl">
        From ancient cities and misty hills to golden beaches — discover the island’s most breathtaking destinations with local experts.
      </p>
    </div>
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
      <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
        <!-- Destination Image -->
        <div class="relative overflow-hidden">
          <img 
            src="{{ asset($destination->image) }}" 
            alt="{{ $destination->name }}" 
            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110"
          >
          <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300">
            <span class="text-white text-lg font-semibold">{{ $destination->name }}</span>
          </div>
        </div>

        <!-- Destination Details -->
        <div class="p-6">
          <h3 class="text-2xl font-semibold text-[#0077b6] mb-2">{{ $destination->name }}</h3>
          <p class="text-gray-600 text-sm mb-4">
            {{ Str::limit($destination->description, 100) }}
          </p>
          <a href="{{ route('destination.show', $destination->id) }}" class="bg-[#0077b6] text-white px-5 py-2 rounded-full text-sm hover:bg-[#023e8a] transition">
            Explore
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  @include('layouts.footer')

</body>
</html>
