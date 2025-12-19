<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->title }} | Traviaro</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        /* Global override to ensure non-bold body text */
        body {
            font-weight: 400; /* Normal weight for body text */
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-700 font-poppins antialiased">
@include('navigation-menu')

<section class="relative">
    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full h-[28rem] object-cover brightness-50">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-60 flex flex-col items-center justify-center p-4">
        <h1 class="text-6xl md:text-8xl text-white font-extrabold font-playfair tracking-tight text-center drop-shadow-2xl">{{ $service->title }}</h1>
    </div>
</section>

<section class="lg:max-w-7xl mx-auto px-6 lg:px-12 py-24 grid gap-16 lg:grid-cols-3">

    {{-- LEFT CONTENT --}}
    <div class="lg:col-span-2 space-y-16">

        <div class="flex items-center gap-4">
            <span class="text-base bg-blue-600 text-white px-5 py-2 rounded-full font-medium shadow-xl shadow-blue-300 transform hover:scale-105 transition duration-300">
                <i class="fas fa-layer-group mr-2"></i> {{ $service->category }}
            </span>
            <span class="text-base bg-white text-blue-700 px-5 py-2 rounded-full font-medium border border-blue-200 shadow-xl shadow-gray-200 transform hover:scale-105 transition duration-300">
                <i class="fas fa-hand-holding-usd mr-2 text-blue-500"></i> ${{ $service->price }}
            </span>
        </div>

        <h2 class="text-4xl font-extrabold font-playfair text-gray-900 border-b-8 border-blue-300 border-opacity-70 pb-4">{{ $service->title }}</h2>

        @php
            $lines = preg_split('/\r\n|\r|\n/', $service->description);
        @endphp
        <div class="text-gray-700 leading-relaxed space-y-5 text-lg">
            @foreach($lines as $line)
                @if(Str::startsWith(trim($line), '-'))
                    <li class="ml-6 list-none flex items-start text-gray-800">
                        <i class="fas fa-check-circle text-blue-600 mr-3 mt-1 flex-shrink-0 text-lg"></i>
                        <span>{{ ltrim($line, '- ') }}</span>
                    </li>
                @elseif(trim($line) === '')
                    <br>
                @else
                    <p>{{ $line }}</p>
                @endif
            @endforeach
        </div>

        {{-- TAXI PRICING - Blue/White Theme Applied to Container --}}
        @if(strtolower($service->title) === 'taxis' || strtolower($service->category) === 'transport')
            @php
                // NEW PRICING DATA FROM USER'S REQUEST
                $routes = [
                    "Negombo" => [
                        "Car"=>["market"=>4000,"company"=>3000,"discount"=>25],
                        "Flat Roof Van"=>["market"=>6500,"company"=>5000,"discount"=>23],
                        "High Roof Van"=>["market"=>8000,"company"=>6500,"discount"=>18],
                    ],
                    "Colombo City" => [
                        "Car"=>["market"=>6500,"company"=>5500,"discount"=>15],
                        "Flat Roof Van"=>["market"=>10000,"company"=>8000,"discount"=>20],
                        "High Roof Van"=>["market"=>12000,"company"=>10000,"discount"=>16],
                    ],
                    "Sigiriya/Dambulla" => [
                        "Car"=>["market"=>22000,"company"=>16000,"discount"=>27],
                        "Flat Roof Van"=>["market"=>26000,"company"=>23000,"discount"=>12],
                        "High Roof Van"=>["market"=>31000,"company"=>28000,"discount"=>10],
                    ],
                    "Kandy" => [
                        "Car"=>["market"=>15500,"company"=>13500,"discount"=>13],
                        "Flat Roof Van"=>["market"=>24500,"company"=>21500,"discount"=>12],
                        "High Roof Van"=>["market"=>28500,"company"=>26500,"discount"=>7],
                    ],
                    "Ella (Regular Route)" => [
                        "Car"=>["market"=>27000,"company"=>21500,"discount"=>20],
                        "Flat Roof Van"=>["market"=>40000,"company"=>38000,"discount"=>5],
                        "High Roof Van"=>["market"=>48500,"company"=>44000,"discount"=>9],
                    ],
                    "Ella (Expressway)" => [
                        "Car"=>["market"=>30000,"company"=>25500,"discount"=>15],
                        "Flat Roof Van"=>["market"=>50000,"company"=>38000,"discount"=>24],
                        "High Roof Van"=>["market"=>49500,"company"=>45000,"discount"=>9],
                    ],
                    "Ella (Through Kandy Route)" => [
                        "Car"=>["market"=>28000,"company"=>24000,"discount"=>14],
                        "Flat Roof Van"=>["market"=>40000,"company"=>37000,"discount"=>7],
                        "High Roof Van"=>["market"=>48500,"company"=>44000,"discount"=>9],
                    ],
                    "Nuwara Eliya" => [
                        "Car"=>["market"=>23000,"company"=>18000,"discount"=>22],
                        "Flat Roof Van"=>["market"=>31000,"company"=>29500,"discount"=>5],
                        "High Roof Van"=>["market"=>40000,"company"=>38000,"discount"=>5],
                    ],
                    "Galle" => [
                        "Car"=>["market"=>17500,"company"=>15000,"discount"=>14],
                        "Flat Roof Van"=>["market"=>26000,"company"=>23000,"discount"=>12],
                        "High Roof Van"=>["market"=>32000,"company"=>29000,"discount"=>9],
                    ],
                    "Mirissa" => [
                        "Car"=>["market"=>19000,"company"=>16000,"discount"=>16],
                        "Flat Roof Van"=>["market"=>27000,"company"=>24000,"discount"=>11],
                        "High Roof Van"=>["market"=>34000,"company"=>30500,"discount"=>10],
                    ],
                    "Thissamaharama" => [
                        "Car"=>["market"=>32000,"company"=>23500,"discount"=>27],
                        "Flat Roof Van"=>["market"=>42000,"company"=>38000,"discount"=>10],
                        "High Roof Van"=>["market"=>50400,"company"=>47000,"discount"=>7],
                    ],
                    "Yala" => [
                        "Car"=>["market"=>33000,"company"=>24500,"discount"=>26],
                        "Flat Roof Van"=>["market"=>43000,"company"=>39000,"discount"=>9],
                        "High Roof Van"=>["market"=>51400,"company"=>48000,"discount"=>6],
                    ],
                    "Wilpattu" => [
                        "Car"=>["market"=>21000,"company"=>17500,"discount"=>17],
                        "Flat Roof Van"=>["market"=>28000,"company"=>26000,"discount"=>7],
                        "High Roof Van"=>["market"=>36000,"company"=>33000,"discount"=>8],
                    ],
                    "Anuradhapura" => [
                        "Car"=>["market"=>21000,"company"=>17500,"discount"=>17],
                        "Flat Roof Van"=>["market"=>29000,"company"=>27500,"discount"=>5],
                        "High Roof Van"=>["market"=>33500,"company"=>31500,"discount"=>6],
                    ],
                    "Bentota" => [
                        "Car"=>["market"=>14200,"company"=>11500,"discount"=>19],
                        "Flat Roof Van"=>["market"=>19000,"company"=>17500,"discount"=>8],
                        "High Roof Van"=>["market"=>27000,"company"=>24000,"discount"=>11],
                    ],
                    "Hikkaduwa" => [
                        "Car"=>["market"=>16500,"company"=>14000,"discount"=>15],
                        "Flat Roof Van"=>["market"=>23000,"company"=>21000,"discount"=>9],
                        "High Roof Van"=>["market"=>29000,"company"=>27000,"discount"=>7],
                    ],
                    "Unawatuna" => [
                        "Car"=>["market"=>17400,"company"=>15000,"discount"=>14],
                        "Flat Roof Van"=>["market"=>24000,"company"=>22500,"discount"=>6],
                        "High Roof Van"=>["market"=>31500,"company"=>28500,"discount"=>10],
                    ],
                    "Weligama/Ahangama" => [
                        "Car"=>["market"=>18000,"company"=>15500,"discount"=>14],
                        "Flat Roof Van"=>["market"=>28000,"company"=>25500,"discount"=>9],
                        "High Roof Van"=>["market"=>33000,"company"=>30000,"discount"=>9],
                    ],
                    "Tangalle" => [
                        "Car"=>["market"=>24200,"company"=>20000,"discount"=>17],
                        "Flat Roof Van"=>["market"=>34000,"company"=>30000,"discount"=>12],
                        "High Roof Van"=>["market"=>41000,"company"=>38000,"discount"=>7],
                    ],
                    "Dickwella/Hiriketiya Beach" => [
                        "Car"=>["market"=>19500,"company"=>17500,"discount"=>10],
                        "Flat Roof Van"=>["market"=>30000,"company"=>28500,"discount"=>5],
                        "High Roof Van"=>["market"=>40000,"company"=>37000,"discount"=>7],
                    ],
                    "Trincomalee" => [
                        "Car"=>["market"=>28000,"company"=>24000,"discount"=>14],
                        "Flat Roof Van"=>["market"=>42000,"company"=>37000,"discount"=>12],
                        "High Roof Van"=>["market"=>49000,"company"=>47000,"discount"=>4],
                    ],
                    "Habarana" => [
                        "Car"=>["market"=>18500,"company"=>17000,"discount"=>8],
                        "Flat Roof Van"=>["market"=>26000,"company"=>24000,"discount"=>8],
                        "High Roof Van"=>["market"=>31200,"company"=>29000,"discount"=>7],
                    ],
                    "Pinnawala" => [
                        "Car"=>["market"=>13000,"company"=>11500,"discount"=>12],
                        "Flat Roof Van"=>["market"=>21500,"company"=>19000,"discount"=>12],
                        "High Roof Van"=>["market"=>26000,"company"=>23000,"discount"=>11],
                    ],
                    "Kosgoda" => [
                        "Car"=>["market"=>14000,"company"=>12000,"discount"=>14],
                        "Flat Roof Van"=>["market"=>19400,"company"=>18000,"discount"=>7],
                        "High Roof Van"=>["market"=>26000,"company"=>24500,"discount"=>6],
                    ],
                    "Mount Lavinia" => [
                        "Car"=>["market"=>7000,"company"=>6500,"discount"=>7],
                        "Flat Roof Van"=>["market"=>12000,"company"=>10000,"discount"=>16],
                        "High Roof Van"=>["market"=>14000,"company"=>12000,"discount"=>14],
                    ],
                    "Hambantota" => [
                        "Car"=>["market"=>27000,"company"=>23000,"discount"=>15],
                        "Flat Roof Van"=>["market"=>44500,"company"=>39500,"discount"=>11],
                        "High Roof Van"=>["market"=>49000,"company"=>46500,"discount"=>5],
                    ],
                    "Udawalawe (Regular Route)" => [
                        "Car"=>["market"=>24000,"company"=>22000,"discount"=>8],
                        "Flat Roof Van"=>["market"=>36000,"company"=>34500,"discount"=>4],
                        "High Roof Van"=>["market"=>44000,"company"=>42000,"discount"=>4],
                    ],
                    "Udawalawe (Expressway)" => [
                        "Car"=>["market"=>26000,"company"=>24000,"discount"=>8],
                        "Flat Roof Van"=>["market"=>38000,"company"=>37000,"discount"=>3],
                        "High Roof Van"=>["market"=>48000,"company"=>46000,"discount"=>4],
                    ],
                ];
            @endphp

            <div class="mt-10 bg-white shadow-2xl rounded-3xl p-8 border-4 border-blue-100">
                <h3 class="text-2xl font-bold mb-6 text-blue-800 border-b-2 border-blue-100 pb-2">Airport Transfer Pricing</h3>

                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($routes as $city => $vehicles)
                        <div class="bg-gradient-to-b from-blue-50 to-blue-100 p-5 rounded-2xl shadow-lg hover:shadow-xl transition w-full">
                            <h4 class="text-lg font-semibold text-blue-800 border-b border-blue-200 pb-2 mb-4">✈️ Airport to {{ $city }}</h4>

                            @foreach($vehicles as $vehicle => $data)
                                @php
                                    $saving = $data['market'] - $data['company'];
                                @endphp
                                <div class="bg-white mb-3 p-4 rounded-xl border border-gray-100 relative shadow-md hover:shadow-lg transition">
                                    <span class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 px-2 py-0.5 text-xs rounded-full font-bold shadow-md">
                                        {{ $data['discount'] }}% OFF
                                    </span>

                                    <h5 class="font-medium text-sm text-gray-700 mb-1">{{ $vehicle }}</h5>
                                    <p class="text-red-600 text-xs line-through text-gray-400">
                                        Market: LKR. {{ number_format($data['market']) }}
                                    </p>
                                    <p class="text-gray-500 text-xs">Save with Traviaro: LKR. {{ number_format($saving) }}</p>
                                    <p class="text-blue-600 font-extrabold text-lg">
                                        LKR. {{ number_format($data['company']) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <p class="text-sm text-gray-500 mt-4 italic">
                    *All prices are in Sri Lankan Rupees (LKR.). Prices may vary depending on availability.
                </p>
            </div>
        @endif

        {{-- FEATURES - White/Cream elegant card, blue accent --}}
        @if($service->features)
            <div class="mt-8 bg-white p-10 rounded-3xl shadow-xl border-t-8 border-blue-500 transform hover:shadow-2xl transition duration-500">
                <h3 class="text-2xl font-bold mb-6 text-blue-800 border-b-2 border-gray-100 pb-3"><i class="fas fa-bullseye mr-2 text-blue-500"></i> Why Choose Us</h3>
                <ul class="grid md:grid-cols-2 gap-x-8 gap-y-5 text-gray-700">
                    @foreach(explode(',', $service->features) as $feature)
                        <li class="flex items-start text-base">
                            <i class="fas fa-check-circle text-blue-500 mr-3 mt-1 flex-shrink-0 text-xl"></i>
                            <span class="pt-0.5">{{ trim($feature) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    {{-- RIGHT BOOKING FORM - Highlighted on a soft blue background --}}
    <div class="lg:col-span-1 self-start lg:sticky lg:top-12 bg-blue-50 rounded-3xl p-8 shadow-2xl border-4 border-white ring-4 ring-blue-200">
        <h3 class="text-2xl font-bold mb-3 text-blue-900 font-playfair">Secure Your Transfer</h3>
        <p class="text-blue-700 text-base mb-6 border-b border-blue-200 pb-4">Fill out the details to send your booking request.</p>

        <form id="bookingForm" class="space-y-4" onsubmit="sendBookingWhatsApp(event)">
            <input type="text" name="Name" placeholder="Your Full Name" required
                class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 text-sm shadow-inner placeholder-gray-500 transition bg-white">

            <input type="email" name="Email" placeholder="Email Address" required
                class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 text-sm shadow-inner placeholder-gray-500 transition bg-white">

            <div class="flex gap-4">
                <input type="date" name="Date" required
                    class="w-1/2 px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 text-sm shadow-inner text-gray-600 transition bg-white">
                <input type="time" name="Time" required
                    class="w-1/2 px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 text-sm shadow-inner text-gray-600 transition bg-white">
            </div>

            @if(strtolower($service->title) === 'taxis' || strtolower($service->category) === 'transport')
                <select name="Transfer Option" required
                    class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 bg-white text-gray-700 text-sm shadow-inner transition">
                    <option value="" disabled selected>Select Transfer Option *</option>

                    {{-- Loop through the extensive new routes data for the booking form --}}
                    @foreach($routes as $city => $vehicles)
                        <optgroup label="Airport → {{ $city }}">
                            @foreach($vehicles as $vehicle => $data)
                                @php
                                    $optionText = "Airport to $city ($vehicle)";
                                @endphp
                                <option value="{{ $optionText }}">{{ $optionText }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            @endif

            <div class="flex gap-4">
                <input type="number" name="Adults" placeholder="Adults (1+)" required min="1"
                    class="w-1/2 px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 text-sm shadow-inner bg-white">
                <input type="number" name="Children" placeholder="Children (0+)" min="0"
                    class="w-1/2 px-5 py-3 border border-blue-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 text-sm shadow-inner bg-white">
            </div>

            <button type="submit"
                class="w-full bg-green-500 text-white py-4 rounded-xl font-extrabold text-xl hover:bg-green-600 transition duration-300 shadow-xl shadow-green-300/50 transform hover:scale-[1.02] focus:ring-4 focus:ring-blue-400">
                <i class="fab fa-whatsapp mr-2"></i> Confirm & Book Now
            </button>
        </form>
    </div>

</section>

@include('layouts.footer')

<script>
function sendBookingWhatsApp(e) {
    e.preventDefault();
    const form = e.target;
    let message = "Hello! I'd like to make a booking for the '{{ $service->title ?? 'Service' }}' service.\n\n";

    for (let input of form.elements) {
        if (input.name && input.value && input.type !== 'submit') {
            if (input.name === 'Transfer Option') {
                const selectedOption = input.options[input.selectedIndex];
                if (selectedOption.value !== "") {
                    message += `${input.name}: ${selectedOption.text.trim()}\n`;
                }
            } else {
                message += `${input.name}: ${input.value}\n`;
            }
        }
    }

    const phone = "94770167206";
    window.open(`https://wa.me/${phone}?text=${encodeURIComponent(message)}`, "_blank");
}
</script>

</body>
</html>