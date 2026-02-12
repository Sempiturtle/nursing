<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="flex justify-between h-24">
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3 group">
                    <x-application-logo class="w-8 h-8 text-maternal-brown group-hover:opacity-80 transition-opacity" />
                    <span class="font-outfit font-bold text-lg tracking-tight text-maternal-brown">Milky Way</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-12">
                <a href="#features" class="text-[13px] font-medium text-maternal-brown/60 hover:text-maternal-brown transition-colors uppercase tracking-[0.1em]">Features</a>
                <a href="#how-it-works" class="text-[13px] font-medium text-maternal-brown/60 hover:text-maternal-brown transition-colors uppercase tracking-[0.1em]">How It Works</a>
                <a href="{{ route('login') }}" class="text-[13px] font-medium text-maternal-brown/60 hover:text-maternal-brown transition-colors uppercase tracking-[0.1em]">Log in</a>
                <a href="{{ route('register') }}" class="btn-premium-primary !px-7 !py-3 text-[13px] uppercase tracking-[0.1em]">
                    Get Started
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" class="text-maternal-brown p-2 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8h16M4 16h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden bg-white border-b border-maternal-gray-soft absolute w-full shadow-luxury">
        <div class="px-6 pt-4 pb-12 space-y-4">
            <a href="#features" @click="open = false" class="block py-3 text-sm font-medium text-maternal-brown/60 hover:text-maternal-brown uppercase tracking-wider">Features</a>
            <a href="#how-it-works" @click="open = false" class="block py-3 text-sm font-medium text-maternal-brown/60 hover:text-maternal-brown uppercase tracking-wider">How It Works</a>
            <div class="pt-6 border-t border-maternal-gray-soft flex flex-col space-y-4">
                <a href="{{ route('login') }}" class="text-center py-3 text-sm font-medium text-maternal-brown uppercase tracking-wider">Log in</a>
                <a href="{{ route('register') }}" class="btn-premium-primary text-sm uppercase tracking-wider">Get Started</a>
            </div>
        </div>
    </div>
</nav>
