<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description ?? 'Melody Cafe - Calm cafe editorial design with pastel charm and restrained whimsy. Freshly prepared food, cozy atmosphere, and friendly service.' }}">

    <title>{{ isset($title) ? $title . ' - Melody Cafe' : 'Melody Cafe | Sweet Moments & Fresh Flavors' }}</title>

    @fonts

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-text font-sans antialiased min-h-full flex flex-col selection:bg-primary-soft selection:text-text">
    <!-- Accessible Skip to Content Link -->
    <a href="#main-content"
       class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2.5 focus:bg-primary focus:text-white focus:font-semibold focus:rounded-input focus:shadow-lg focus:outline-none focus:ring-2 focus:ring-primary-hover">
        Skip to main content
    </a>

    <!-- Navbar Component -->
    <x-ui.navbar :current-path="request()->path() === '/' ? '/' : '/' . request()->path()" />

    <!-- Semantic Main Landmark -->
    <main id="main-content" class="flex-grow focus:outline-none" tabindex="-1">
        {{ $slot }}
    </main>

    <!-- Footer Component -->
    <x-ui.footer />
</body>
</html>
