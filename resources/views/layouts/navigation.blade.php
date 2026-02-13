<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 'py-2': scrolled, 'py-5': !scrolled }"
     class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500 ease-in-out px-4 sm:px-6">
    
    <div class="max-w-7xl mx-auto">
        <div :class="{ 'glass-morphism rounded-2xl px-6 shadow-luxury': scrolled, 'bg-transparent': !scrolled }"
             class="flex justify-between items-center h-16 transition-all duration-500">
            
            <div class="flex items-center gap-12">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                    <x-application-logo class="h-8 w-auto text-maternal-rose transition-transform duration-500 group-hover:scale-110" />
                    <span class="font-outfit font-black text-lg tracking-tight text-text-primary">Milky Way</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}" 
                       class="text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ request()->routeIs('dashboard') ? 'text-maternal-rose' : 'text-text-muted hover:text-text-primary' }}">
                        Overview
                    </a>
                    <a href="{{ route('education.index') }}" 
                       class="text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ request()->routeIs('education.index') ? 'text-maternal-rose' : 'text-text-muted hover:text-text-primary' }}">
                        Watch & Learn
                    </a>
                    <a href="{{ route('education.news') }}" 
                       class="text-[11px] font-black uppercase tracking-[0.2em] transition-colors duration-300 {{ request()->routeIs('education.news') ? 'text-maternal-rose' : 'text-text-muted hover:text-text-primary' }}">
                        News
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <!-- Strategic Actions -->
                <div class="hidden md:flex items-center gap-4">
                    <button @click="$dispatch('open-menu')" class="px-5 py-2.5 bg-surface-dark text-white rounded-xl font-bold text-[10px] uppercase tracking-widest hover:bg-maternal-black/90 transition-all duration-300 shadow-luxury hover:-translate-y-0.5">
                        Explore
                    </button>
                    
                    @auth
                        <div x-data="{ userOpen: false }" class="relative">
                            <button @click="userOpen = !userOpen" class="w-10 h-10 rounded-xl bg-surface-dim border border-maternal-black/5 flex items-center justify-center text-maternal-rose hover:bg-white transition-all duration-300">
                                <span class="font-black text-xs">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </button>
                            
                            <div x-show="userOpen" @click.away="userOpen = false" x-cloak
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                 class="absolute top-full right-0 mt-4 w-56 glass-morphism rounded-2xl p-2 shadow-suspended border border-white/40">
                                <div class="px-4 py-3 border-b border-maternal-black/5 mb-2">
                                    <p class="text-[10px] font-black text-text-muted uppercase tracking-widest">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-text-dimmed truncate">{{ Auth::user()->email }}</p>
                                </div>
                                
                                @if(Auth::user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-xs font-bold text-maternal-rose hover:bg-white/50 rounded-lg transition">Admin Panel</a>
                                @endif
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-xs font-bold text-text-primary hover:bg-white/50 rounded-lg transition">Profile</a>
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold text-text-muted hover:text-red-500 hover:bg-red-50/50 rounded-lg transition">Log Out</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Hamburger -->
                <button @click="open = !open" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-surface-dim border border-maternal-black/5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-[-20px]"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden mt-4 glass-morphism rounded-[2rem] p-8 shadow-suspended overflow-hidden">
        <div class="space-y-6">
            <a href="{{ route('dashboard') }}" class="block text-sm font-black text-text-primary uppercase tracking-widest">Overview</a>
            <a href="{{ route('education.index') }}" class="block text-sm font-black text-text-primary uppercase tracking-widest">Watch & Learn</a>
            <a href="{{ route('education.news') }}" class="block text-sm font-black text-text-primary uppercase tracking-widest">News</a>
            
            <div class="pt-6 border-t border-maternal-black/5 flex flex-col gap-4">
                @auth
                    <a href="{{ route('profile.edit') }}" class="btn-agency-secondary text-center">Profile Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full btn-agency-primary bg-red-500 hover:bg-red-600">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-agency-secondary text-center">Login</a>
                    <a href="{{ route('register') }}" class="btn-agency-primary text-center">Join Us</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<div class="h-28"></div>
