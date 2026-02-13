@php
    $categories = [
        'Breastfeeding Info' => [
            ['name' => 'Breastfeeding Tips', 'url' => route('education.tips')],
            ['name' => 'Latching & Attaching', 'url' => route('education.latching')],
            ['name' => 'Proper Nutrition', 'url' => route('education.nutrition')],
        ],
        'Support & News' => [
             ['name' => 'News(article)', 'url' => route('education.news')],
             ['name' => 'Clinic Locator', 'url' => route('support.clinics')],
             ['name' => 'Emergency Hotlines', 'url' => route('support.hotlines')],
        ],
        'System' => [
             ['name' => 'DATA(Feedback)', 'url' => route('feedback.index')],
             ['name' => 'FAQS', 'url' => route('faqs')],
             ['name' => 'About Milky Way', 'url' => route('about')],
        ]
    ];
@endphp

<div x-data="{ menuOpen: false }" @open-menu.window="menuOpen = true" @close-menu.window="menuOpen = false" x-cloak>
    <!-- Overlay -->
    <div x-show="menuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="fixed inset-0 bg-maternal-brown/95 backdrop-blur-xl z-[110] flex flex-col pt-12">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex-1 flex flex-col">
            <!-- Header -->
            <div class="flex justify-between items-center mb-20">
                <div class="flex items-center space-x-3">
                    <x-application-logo class="w-10 h-10 text-maternal-rose" />
                    <span class="font-outfit font-bold text-2xl text-white">Milky Way Menu</span>
                </div>
                <button @click="menuOpen = false" class="p-4 bg-white/10 rounded-full text-white hover:bg-white/20 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Global Search in Menu -->
            <div class="max-w-2xl mb-24">
                 <form action="{{ route('search') }}" method="GET">
                    <div class="relative group">
                        <input type="text" name="q" placeholder="Search the Milky Way universe..." 
                               class="w-full bg-white/5 border-2 border-white/10 rounded-[2rem] px-10 py-6 text-2xl text-white placeholder-white/30 focus:border-maternal-rose focus:ring-4 focus:ring-maternal-rose/10 transition duration-300">
                        <button type="submit" class="absolute right-6 top-1/2 -translate-y-1/2 p-4 bg-maternal-rose text-white rounded-full shadow-lg hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </div>
                 </form>
            </div>

            <!-- Links Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                @foreach($categories as $title => $links)
                    <div>
                        <h4 class="text-maternal-rose font-bold text-xs uppercase tracking-[0.2em] mb-8">{{ $title }}</h4>
                        <div class="space-y-6">
                            @foreach($links as $link)
                                <a href="{{ $link['url'] }}" class="block text-3xl md:text-4xl font-bold text-white/90 hover:text-white hover:translate-x-4 transition duration-300">
                                    {{ $link['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bottom: Language & Auth -->
            <div class="mt-auto py-12 border-t border-white/10 flex flex-wrap items-center justify-between gap-8">
                 <div class="flex space-x-8">
                     <button class="text-white font-bold opacity-100">English</button>
                     <button class="text-white font-bold opacity-40 hover:opacity-100 transition">Tagalog</button>
                 </div>
                 <div class="flex items-center space-x-6">
                     @auth
                        <span class="text-white/40 font-medium">Hello, {{ auth()->user()->name }}</span>
                        <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-white text-maternal-brown rounded-2xl font-bold">Your Dashboard</a>
                     @else
                        <a href="{{ route('login') }}" class="text-white font-bold hover:text-maternal-rose transition">Log in</a>
                        <a href="{{ route('register') }}" class="px-10 py-4 bg-maternal-rose text-white rounded-full font-bold shadow-xl shadow-maternal-rose/20">Get Support Now</a>
                     @endauth
                 </div>
            </div>
        </div>
    </div>
</div>
