<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivarro Escapes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">

<header class="fixed top-0 left-0 w-full z-50 bg-[#006994] py-5 shadow-md">
    <div class="max-w-[1450px] mx-auto px-6 flex flex-col md:flex-row items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center justify-center md:justify-start space-x-2">
            <img 
                src="{{ asset('img/logo.jpeg') }}" 
                alt="Traviaro Logo" 
                class="w-16 h-16 object-contain mix-blend-lighten opacity-90"
            />
            <span class="text-white text-2xl md:text-3xl font-bold" style="font-family: 'Poppins', sans-serif;">
                TRIVARRO
            </span>
            
        </div>

        <!-- Navigation -->
        <nav class="mt-4 md:mt-0 w-full md:w-auto">
            <ul class="flex flex-wrap gap-12 justify-center text-white text-lg md:text-xl font-bold font-['Libre_Baskerville',serif] tracking-wide">
                <li><a href="{{ route('home') }}" class="transition-colors duration-200 text-white hover:text-[#3399cc] hover:underline underline-offset-8">Home</a></li>
                <li><a href="{{ route('about') }}" class="transition-colors duration-200 text-white hover:text-[#3399cc] hover:underline underline-offset-8">About Us</a></li>
                <li><a href="{{ route('destination') }}" class="transition-colors duration-200 text-white hover:text-[#3399cc] hover:underline underline-offset-8">Destination</a></li>
                <li><a href="{{ route('tours') }}" class="transition-colors duration-200 text-white hover:text-[#3399cc] hover:underline underline-offset-8">Tours</a></li>
                <li><a href="{{ route('services') }}" class="transition-colors duration-200 text-white hover:text-[#3399cc] hover:underline underline-offset-8">Services</a></li>
                <li><a href="{{ route('contact') }}"  class="transition-colors duration-200 text-white hover:text-[#3399cc] hover:underline underline-offset-8">Contact Us</a></li>
            </ul>
        </nav>

    </div>
</header>
</body>
</html>
