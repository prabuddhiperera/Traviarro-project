<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <title>{{ $metaTitle ?? 'Trivarro – Explore Sri Lanka With the Best Experiences' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Book tours, taxis, and travel experiences in Sri Lanka with Trivarro. Best prices, fast booking, and trusted service.' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'Sri Lanka tours, Sri Lanka taxi, travel booking, Trivarro, best Sri Lanka experiences' }}">
    <meta name="author" content="Trivarro">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ $canonicalURL ?? url()->current() }}"/>

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $metaTitle ?? 'Trivarro – Explore Sri Lanka With the Best Experiences' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Book tours, taxis, and travel experiences in Sri Lanka with Trivarro.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/seo-cover.jpg') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle ?? 'Trivarro – Explore Sri Lanka' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Best tour and taxi booking in Sri Lanka.' }}">
    <meta name="twitter:image" content="{{ asset('images/seo-cover.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- SEO: JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "TravelAgency",
        "name": "Trivarro",
        "url": "https://trivarro.com",
        "description": "Book Sri Lanka tours, taxis & activities with Trivarro.",
        "logo": "{{ asset('images/logo.png') }}",
        "sameAs": [
            "https://facebook.com/trivarro",
            "https://instagram.com/trivarro"
        ]
    }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>

<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-gray-100">

    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')
@livewireScripts
</body>
</html>
