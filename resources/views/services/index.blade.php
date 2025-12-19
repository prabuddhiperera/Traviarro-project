<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services | Traviaro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3"></script>
</head>
<body class="bg-[#e0f7fa] text-gray-800">

    @include('navigation-menu')

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[90vh]" style="background-image: url('{{ asset('img/services.jpg') }}');">
        <div class="absolute inset-0 bg-[#006994]/40"></div>
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
            <h1 class="text-5xl md:text-6xl font-extrabold font-['Libre_Baskerville',serif] mb-4">
                Discover Our Services
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-2xl">
                From thrilling adventures and cultural tours to relaxing escapes — explore experiences curated for you.
            </p>
        </div>
    </section>

    <!-- 🔍 Search & Filter -->
    <section class="max-w-6xl mx-auto px-6 py-8">
        <form action="{{ route('services') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search services..."
                class="w-full md:w-1/2 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <select name="category" class="w-full md:w-1/4 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                Filter
            </button>
        </form>
    </section>

    <!-- 🧭 Service Grid -->
    <section class="max-w-6xl mx-auto px-6 py-16">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($services as $service)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="h-56 w-full object-cover">
                    <div class="p-6">
                        <span class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-medium">{{ $service->category }}</span>
                        <h3 class="text-2xl font-semibold mb-2 mt-2 font-['Libre_Baskerville',serif]">{{ $service->title }}</h3>
                        <p class="text-gray-600 text-sm mb-5 line-clamp-3">{{ $service->short_description }}</p>

                        @if($service->title === 'Signature Tours')
                            <!-- Redirect Signature Tours to /tours route -->
                            <a href="{{ route('tours') }}" 
                               class="inline-block text-blue-600 font-medium hover:underline hover:text-blue-800">
                               Explore →
                            </a>
                        @else
                            <!-- Default Learn More link for other services -->
                            <a href="{{ route('services.show', $service->id) }}" 
                               class="inline-block text-blue-600 font-medium hover:underline hover:text-blue-800">
                               Learn More →
                            </a>
                        @endif

                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3 mt-10 text-lg">No services found.</p>
            @endforelse

        </div>
    </section>

    @include('layouts.footer')
    
</body>
</html>
