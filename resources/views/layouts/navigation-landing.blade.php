<nav x-data="{ mobileMenuOpen: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 50)"
     :class="{ 'py-3': scrolled, 'py-8': !scrolled }"
     class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500 ease-in-out px-4 sm:px-6">
    
    <div class="max-w-7xl mx-auto">
        <div :class="{ 'glass-morphism rounded-2xl px-6 shadow-luxury': scrolled }"
             class="flex justify-between items-center h-18 transition-all duration-500">
            
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3 group outline-none">
                    <div class="w-10 h-10 bg-text-primary rounded-xl flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-500 shadow-luxury">
                        <x-application-logo class="w-5 h-5 text-white" />
                    </div>
                    <span class="font-outfit font-bold text-xl tracking-tight text-text-primary">Milky Way</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-10">
                <a href="#features" class="text-xs font-bold text-text-dimmed hover:text-text-primary transition-colors uppercase tracking-[0.2em] relative group">
                    <span>Features</span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-maternal-rose transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#how-it-works" class="text-xs font-bold text-text-dimmed hover:text-text-primary transition-colors uppercase tracking-[0.2em] relative group">
                    <span>Process</span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-maternal-rose transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <div class="h-4 w-px bg-maternal-black/10"></div>

                @auth
                    <a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('dashboard') }}" 
                       class="btn-agency-primary !px-6 !py-2.5">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-bold text-text-dimmed hover:text-text-primary transition-colors uppercase tracking-[0.2em]">Log in</a>
                    <a href="{{ route('register') }}" 
                       class="btn-agency-primary !px-6 !py-2.5 shadow-suspended">
                        Get Started
                    </a>
                @endauth
            </div>

            <!-- Mobile Toggle -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-text-primary p-2 focus:outline-none bg-surface-dim/80 backdrop-blur rounded-xl border border-maternal-black/5 hover:border-maternal-black/15 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden glass-morphism mx-2 mt-4 rounded-3xl overflow-hidden shadow-suspended">
        <div class="px-8 pt-10 pb-12 space-y-8">
            <a href="#features" @click="mobileMenuOpen = false" class="block text-sm font-bold text-text-dimmed hover:text-text-primary uppercase tracking-[0.2em]">Features</a>
            <a href="#how-it-works" @click="mobileMenuOpen = false" class="block text-sm font-bold text-text-dimmed hover:text-text-primary uppercase tracking-[0.2em]">Our Process</a>
            <div class="pt-8 border-t border-maternal-black/5 flex flex-col space-y-4">
                @auth
                    <a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('dashboard') }}" class="w-full btn-agency-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-center text-sm font-bold text-text-dimmed uppercase tracking-[0.2em]">Log in</a>
                    <a href="{{ route('register') }}" class="w-full btn-agency-primary shadow-suspended">Get Started</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
