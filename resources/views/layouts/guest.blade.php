<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Milky Way') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700,900|inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>[x-cloak] { display: none !important; }</style>
    </head>
    <body class="font-inter antialiased text-text-primary bg-surface-base selection:bg-maternal-rose selection:text-white">
        <div class="min-h-screen bg-surface-dim relative overflow-hidden flex flex-col justify-center items-center py-12 px-6">
            <div class="absolute inset-0 bg-grain pointer-events-none"></div>
            
            <div class="relative z-10 w-full max-w-md">
                <div class="text-center mb-12 reveal-on-scroll">
                    <a href="/" class="inline-block group transition-transform duration-500 hover:scale-110">
                        <div class="w-20 h-20 bg-surface-dark rounded-[2.5rem] flex items-center justify-center mx-auto shadow-suspended relative overflow-hidden">
                             <div class="absolute inset-0 bg-grain opacity-10"></div>
                             <x-application-logo class="w-10 h-10 text-maternal-rose" />
                        </div>
                    </a>
                </div>

                <div class="bg-white rounded-[3.5rem] p-10 md:p-12 border border-maternal-black/5 shadow-suspended reveal-on-scroll stagger-delay-1 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[radial-gradient(circle,rgba(198,137,137,0.05)_0%,transparent_70%)] blur-2xl"></div>
                    <div class="relative z-10">
                        {{ $slot }}
                    </div>
                </div>

                <div class="text-center mt-12 reveal-on-scroll stagger-delay-3">
                    <p class="text-[10px] font-black text-text-muted uppercase tracking-[0.3em]">&copy; {{ date('Y') }} Milky Way Infrastructure</p>
                </div>
            </div>
        </div>

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
