<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Milky Way') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,500,600|inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-outfit antialiased text-maternal-brown selection:bg-maternal-rose selection:text-white">
        <x-menu-overlay />
        <x-video-modal />
        
        <div class="min-h-screen bg-maternal-cream">
            @include('layouts.navigation-landing')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('layouts.footer-landing')
        </div>
    </body>
</html>
