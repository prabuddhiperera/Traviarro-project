<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->title }} | Traviaro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    @include('navigation-menu')

    <!-- 🌄 Hero Image -->
    <section class="relative">
        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h1 class="text-4xl md:text-5xl text-white font-bold font-['Playfair_Display',serif]">{{ $service->title }}</h1>
        </div>
    </section>

    <!-- 📝 Service Details -->
    <section class="max-w-6xl mx-auto px-6 py-16 grid gap-12 lg:grid-cols-3">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center gap-4">
                <span class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-medium">{{ $service->category }}</span>
                <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">${{ $service->price }}</span>
            </div>

            <h2 class="text-3xl font-semibold mb-4 font-['Libre_Baskerville',serif]">{{ $service->title }}</h2>
            <p class="text-gray-700 leading-relaxed">{{ $service->description }}</p>

            <!-- Optional Features -->
            @if($service->features)
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-3">Features:</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    @foreach(explode(',', $service->features) as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <!-- Right Column: Book Now -->
        <div class="lg:col-span-1 bg-white rounded-2xl shadow-lg p-6 flex flex-col gap-6">
        <h3 class="text-2xl font-semibold mb-2">Book This Service</h3>
        <p class="text-gray-600">Reserve your spot now and enjoy this unforgettable experience.</p>

        <form id="bookingForm" class="space-y-4" onsubmit="sendBookingWhatsApp(event)">
            <input 
            type="text" 
            name="Name" 
            placeholder="Your Name" 
            required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
            
            <input 
            type="email" 
            name="Email" 
            placeholder="Email Address" 
            required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >

            <!-- Adults and Children -->
            <div class="flex gap-4">
            <div class="w-1/2">
                <input 
                type="number" 
                name="Adults" 
                placeholder="No. of Adults" 
                required 
                min="1"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>
            <div class="w-1/2">
                <input 
                type="number" 
                name="Children" 
                placeholder="No. of Children" 
                min="0"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>
            </div>

            <button 
            type="submit" 
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 transition"
            >
            Book Now
            </button>
        </form>
        </div>
    </section>

    <!-- 🔄 Related Services -->
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h3 class="text-2xl font-semibold mb-8">Other Services You Might Like</h3>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($relatedServices as $rel)
                @if($rel->id !== $service->id)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition transform duration-300">
                    <img src="{{ asset($rel->image) }}" alt="{{ $rel->title }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h4 class="text-lg font-semibold mb-2">{{ $rel->title }}</h4>
                        <span class="text-sm bg-blue-100 text-blue-700 px-2 py-1 rounded-full">{{ $rel->category }}</span>
                        <p class="mt-2 text-gray-600 line-clamp-2">{{ $rel->short_description }}</p>
                        <a href="{{ route('services.show', $rel->id) }}" class="text-blue-600 font-medium hover:underline mt-2 inline-block">Learn More →</a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </section>

    @include('layouts.footer')

    <!-- Updated WhatsApp Script -->
    <script>
    function sendBookingWhatsApp(e) {
        e.preventDefault();
        const form = e.target;

        // 🟢 Start message with a warm greeting
        let message = "Hello! \nI'd like to make a booking request.\n\n";
        message += "Booking Details: \n";

        // Loop through form inputs
        for (let element of form.elements) {
        if (element.name && element.value) {
            message += `• *${element.name}:* ${element.value}\n`;
        }
        }

        // Add footer for nice touch
        message += "\nThank you! ";

        // Encode and open WhatsApp chat
        const encodedMessage = encodeURIComponent(message);
        const phone = "94770167206"; // ✅ No '+' or spaces

        // Opens WhatsApp (mobile or web automatically)
        window.open(`https://wa.me/${phone}?text=${encodedMessage}`, "_blank");
    }
    </script>

</body>
</html>
