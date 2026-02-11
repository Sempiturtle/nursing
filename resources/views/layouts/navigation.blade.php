<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-maternal-peach/30">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <x-application-logo class="block h-10 w-auto text-maternal-rose group-hover:scale-110 transition duration-300" />
                        <span class="font-outfit font-bold text-xl text-maternal-brown tracking-tight">Milky Way</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose transition uppercase tracking-widest border-none">
                        {{ __('Overview') }}
                    </x-nav-link>
                    <x-nav-link :href="route('education.index')" :active="request()->routeIs('education.index')" class="text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose transition uppercase tracking-widest border-none">
                        {{ __('Watch & Learn') }}
                    </x-nav-link>

                    <!-- Breastfeeding Info Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-4">
                        <x-dropdown align="left" width="64">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose transition uppercase tracking-widest border-none focus:outline-none">
                                    <span>{{ __('Breastfeeding Info') }}</span>
                                    <svg class="ms-2 h-4 w-4 fill-current opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('education.tips')" class="font-bold">
                                    {{ __('Breastfeeding Tips') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('education.latching')" class="font-bold">
                                    {{ __('Latching & Attaching') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('education.nutrition')" class="font-bold">
                                    {{ __('Proper Nutrition') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <x-nav-link :href="route('education.news')" :active="request()->routeIs('education.news')" class="text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose transition uppercase tracking-widest border-none">
                        {{ __('News(article)') }}
                    </x-nav-link>

                    <button @click="$dispatch('open-menu')" class="flex items-center space-x-2 px-5 py-2.5 bg-maternal-rose/10 text-maternal-rose rounded-full hover:bg-maternal-rose hover:text-white transition-all duration-300 font-bold text-[10px] uppercase tracking-[0.15em] border border-maternal-rose/30">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        <span>{{ __('Explore') }}</span>
                    </button>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-auto">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-5 py-2.5 border border-maternal-peach/30 text-sm leading-4 font-bold rounded-full text-maternal-brown bg-maternal-peach/10 hover:bg-maternal-peach/20 hover:border-maternal-rose/30 focus:outline-none transition-all duration-300">
                                <div class="w-8 h-8 rounded-full bg-maternal-rose/10 flex items-center justify-center mr-3">
                                    <span class="text-maternal-rose text-xs">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 text-maternal-brown/40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::user()->is_admin)
                                <x-dropdown-link :href="route('admin.dashboard')" class="font-bold text-maternal-rose">
                                    {{ __('Admin Panel') }}
                                </x-dropdown-link>
                                <div class="border-t border-maternal-peach/30 my-1"></div>
                            @endif
                            
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile Settings') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose transition uppercase tracking-widest">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-maternal-brown text-white text-sm font-bold rounded-full hover:bg-zinc-800 transition shadow-lg shadow-black/10 uppercase tracking-widest">{{ __('Join Us') }}</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-2xl text-maternal-brown hover:bg-maternal-peach/20 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-base font-bold text-maternal-brown {{ request()->routeIs('dashboard') ? 'bg-maternal-peach/30 rounded-2xl' : '' }}">Dashboard Overview</a>
            <a href="{{ route('education.index') }}" class="block px-4 py-3 text-base font-bold text-maternal-brown {{ request()->routeIs('education.index') ? 'bg-maternal-peach/30 rounded-2xl' : '' }}">Watch & Learn</a>
            
            <div class="px-4 py-2">
                <p class="text-[10px] font-bold text-maternal-brown/40 uppercase tracking-widest mb-2">{{ __('Breastfeeding Info') }}</p>
                <div class="space-y-1 ps-2 border-l border-maternal-peach/30">
                    <a href="{{ route('education.tips') }}" class="block px-4 py-2 text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose {{ request()->routeIs('education.tips') ? 'text-maternal-rose' : '' }}">Breastfeeding Tips</a>
                    <a href="{{ route('education.latching') }}" class="block px-4 py-2 text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose {{ request()->routeIs('education.latching') ? 'text-maternal-rose' : '' }}">Latching & Attaching</a>
                    <a href="{{ route('education.nutrition') }}" class="block px-4 py-2 text-sm font-bold text-maternal-brown/70 hover:text-maternal-rose {{ request()->routeIs('education.nutrition') ? 'text-maternal-rose' : '' }}">Proper Nutrition</a>
                </div>
            </div>

            <a href="{{ route('education.news') }}" class="block px-4 py-3 text-base font-bold text-maternal-brown {{ request()->routeIs('education.news') ? 'bg-maternal-peach/30 rounded-2xl' : '' }}">News(article)</a>
            
            <div class="mt-6 pt-6 border-t border-maternal-peach/50 flex flex-col space-y-3">
                @auth
                    <div class="flex items-center px-4 mb-4">
                        <div class="w-10 h-10 rounded-full bg-maternal-rose text-white flex items-center justify-center font-bold mr-4">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="text-maternal-brown font-bold">{{ Auth::user()->name }}</div>
                            <div class="text-maternal-brown/50 text-xs">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="text-center py-3 border border-maternal-peach text-maternal-brown font-bold rounded-full">Profile Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-center py-3 bg-maternal-rose text-white rounded-full font-bold shadow-lg shadow-maternal-rose/20">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-center py-3 border border-maternal-peach text-maternal-brown font-bold rounded-full lowercase uppercase tracking-widest text-xs">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="text-center py-3 bg-maternal-brown text-white rounded-full font-bold shadow-lg shadow-black/10 uppercase tracking-widest text-xs">{{ __('Join Us') }}</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
