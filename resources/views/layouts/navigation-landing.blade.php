<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-maternal-peach/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3">
                    <x-application-logo class="w-10 h-10 text-maternal-rose" />
                    <span class="font-outfit font-bold text-xl tracking-tight text-maternal-brown">Milky Way</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('education.index') }}" class="text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose transition uppercase tracking-widest">Watch & Learn</a>
                
                <form action="{{ route('search') }}" method="GET" class="relative">
                    <input type="text" name="q" placeholder="Search..." class="bg-maternal-peach/20 border-maternal-peach/30 rounded-full pl-4 pr-10 py-1 text-sm focus:border-maternal-rose focus:ring-maternal-rose/20 transition">
                    <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-maternal-brown/40 hover:text-maternal-rose">
                         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>

                <button @click="$dispatch('open-menu')" class="flex items-center space-x-2 px-5 py-2 bg-maternal-peach/30 rounded-full text-maternal-brown hover:bg-maternal-peach/50 transition font-bold text-sm uppercase tracking-widest">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <span>Menu</span>
                </button>
                
                <a href="{{ route('login') }}" class="text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose transition uppercase tracking-widest">Log in</a>
                <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 bg-maternal-rose text-white text-sm font-bold rounded-full hover:bg-maternal-rose-dark transition shadow-lg shadow-maternal-rose/20 uppercase tracking-widest">
                    Get Support Now
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="text-maternal-brown p-2">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden bg-white border-b border-maternal-peach">
        <div class="px-4 pt-2 pb-6 space-y-1">
            <a href="#features" class="block px-3 py-2 text-base font-medium text-maternal-brown/70 hover:text-maternal-rose">Features</a>
            <a href="#how-it-works" class="block px-3 py-2 text-base font-medium text-maternal-brown/70 hover:text-maternal-rose">How It Works</a>
            <div class="mt-4 pt-4 border-t border-maternal-peach/50 flex flex-col space-y-3">
                <a href="{{ route('login') }}" class="text-center py-2 text-maternal-brown font-medium">Log in</a>
                <a href="{{ route('register') }}" class="text-center py-3 bg-maternal-rose text-white rounded-full font-bold shadow-md">Get Support Now</a>
            </div>
        </div>
    </div>
</nav>
