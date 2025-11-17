<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} | Trivarro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800">
    @include('navigation-menu')

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[90vh]" style="background-image: url('{{ asset($destination->image) }}');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#006994]/40 group-hover:bg-black/50 transition-all duration-300"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
            <h1 class="text-5xl md:text-6xl font-extrabold font-['Libre_Baskerville',serif] mb-4">
                {{ $destination->name }}
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-2xl text-gray-200">
                {{ $destination->city }}, Sri Lanka
            </p>
        </div>
    </section>

    <!-- Description -->
    <section class="py-16 max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-[#0077b6] mb-6">{{ $destination->name }}</h2>
            <p class="text-gray-700 text-lg leading-relaxed">{{ $destination->description }}</p>
        </div>

        <!-- Places to Visit -->
<!-- Places to Visit -->
@if($destination->places->count())
<h3 class="text-2xl font-bold text-[#0077b6] mb-6">Places to Visit</h3>
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
    @foreach($destination->places as $place)
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition">
            @if($place->image)
                <img src="{{ asset('uploads/images/' . $place->image) }}" alt="{{ $place->name }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-6">
                <h4 class="text-xl font-semibold text-[#0077b6] mb-2">{{ $place->name }}</h4>
                <p class="text-gray-600">Explore this amazing place and enjoy the experience.</p>
            </div>
        </div>
    @endforeach
</div>
@endif

<!-- Things to Do -->
@if($destination->activities->count())
<h3 class="text-2xl font-bold text-[#0077b6] mb-6">Things to Do</h3>
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
    @foreach($destination->activities as $activity)
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition">
            @if($activity->image)
                <img src="{{ asset('uploads/images/' . $activity->image) }}" alt="{{ $activity->name }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-6">
                <h4 class="text-xl font-semibold text-[#0077b6] mb-2">{{ $activity->name }}</h4>
                <p class="text-gray-600">Don't miss out on this activity while visiting.</p>
            </div>
        </div>
    @endforeach
</div>
@endif



        <div class="text-center mt-12">
            <a href="{{ route('destination') }}" class="inline-block bg-[#0077b6] text-white px-8 py-3 rounded-full hover:bg-[#023e8a] transition">
                Back to Destinations
            </a>
        </div>
    </section>

    @include('layouts.footer')

</body>
</html>
