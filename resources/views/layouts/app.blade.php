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
        <style>[x-cloak] { display: none !important; }</style>
    </head>
    <body class="font-inter antialiased text-text-primary bg-surface-base selection:bg-maternal-rose selection:text-white">
        <x-menu-overlay />
        <div class="min-h-screen bg-surface-dim relative overflow-hidden">
            <div class="absolute inset-0 bg-grain pointer-events-none"></div>
            
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="relative z-10">
                {{ $slot }}
            </main>
        </div>
        <x-video-modal />

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            // Once revealed, we don't need to observe it anymore
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                const revealElements = document.querySelectorAll('.reveal-on-scroll');
                revealElements.forEach(el => observer.observe(el));
            });
        </script>
    </body>
</html>
