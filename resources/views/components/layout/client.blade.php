<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fpoly Restaurant</title>

    <meta name="description"
        content="Cartify is an e-commerce platform built on top of Laravel, Livewire, Alpine.js, and Tailwind CSS.">

    <!-- Open Graph Meta Tags -->
    <meta property="og:url" content="https://demo.cartify.dev">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Cartify - for your next e-commerce project">
    <meta property="og:description"
        content="Cartify is an e-commerce platform built on top of Laravel, Livewire, Alpine.js, and Tailwind CSS.">
    <meta property="og:image" content="https://demo.cartify.dev/img/banner.png">

    <!-- Favicon -->
    <link rel="icon" href="https://ap.poly.edu.vn/images/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://demo.cartify.dev/css/app.css">
    @livewireStyles
</head>

<body class="antialiased font-sans">
    <x-layout.header />
    <main>
        @yield('content')
    </main>

    <x-layout.footer />
    @livewireScripts
</body>

</html>
