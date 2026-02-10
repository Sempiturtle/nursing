<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Milky Way') }} — Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --maternal-rose: #D19A9A;
            --maternal-rose-dark: #B5838D;
            --maternal-sage: #B7B7A4;
            --maternal-brown: #3D3028;
            --maternal-peach: #F6E6E4;
            --maternal-cream: #FBF7F4;
        }
        [x-cloak] { display: none !important; }
        * { font-family: 'Inter', system-ui, sans-serif; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .sidebar-dark { background: transparent; position: relative; }
        .sidebar-dark::before { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at 0% 0%, rgba(209, 154, 154, 0.08) 0%, transparent 50%), radial-gradient(circle at 100% 100%, rgba(183, 183, 164, 0.05) 0%, transparent 50%); pointer-events: none; }
        .content-bg { background: #FAFAFA; position: relative; }
        .content-bg::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 400px; background: linear-gradient(to bottom, #FBF7F4 0%, transparent 100%); pointer-events: none; }
        .header-blur { background: rgba(255, 255, 255, 0.75); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); }

        /* Nav */
        .nav-item { color: #8E8E93; font-size: 13.5px; font-weight: 500; padding: 8px 12px; border-radius: 10px; transition: all 250ms cubic-bezier(.4,0,.2,1); display: flex; align-items: center; gap: 10px; position: relative; }
        .nav-item:hover { color: #FFFFFF; background: rgba(255,255,255,0.06); transform: translateX(2px); }
        .nav-item.active { color: #FFFFFF; background: rgba(255,255,255,0.1); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .nav-item.active::before { content: ''; position: absolute; left: -12px; top: 50%; transform: translateY(-50%); width: 4px; height: 18px; background: var(--maternal-rose); border-radius: 0 4px 4px 0; box-shadow: 0 0 10px var(--maternal-rose); }
        .nav-section { font-size: 11px; font-weight: 700; color: #52525B; letter-spacing: 0.08em; text-transform: uppercase; padding: 0 12px; margin-bottom: 8px; margin-top: 28px; }

        /* Animations */
        @keyframes fadeUp { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-6px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes barGrow { from { width: 0; } }
        @keyframes countUp { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-up { animation: fadeUp 0.5s cubic-bezier(.4,0,.2,1) forwards; opacity: 0; }
        .animate-slide-in { animation: slideIn 0.4s cubic-bezier(.4,0,.2,1) forwards; opacity: 0; }
        .animate-bar-grow { animation: barGrow 1s cubic-bezier(.4,0,.2,1) forwards; }
        .animate-count { animation: countUp 0.6s cubic-bezier(.4,0,.2,1) forwards; opacity: 0; }
        .delay-1 { animation-delay: 50ms; }
        .delay-2 { animation-delay: 100ms; }
        .delay-3 { animation-delay: 150ms; }
        .delay-4 { animation-delay: 200ms; }
        .delay-5 { animation-delay: 300ms; }
        .delay-6 { animation-delay: 400ms; }

        /* Card hover lift */
        .card-lift { transition: all 300ms cubic-bezier(.34, 1.56, 0.64, 1); border: 1px solid rgba(0,0,0,0.05) !important; }
        .card-lift:hover { transform: translateY(-4px) scale(1.01); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05), 0 10px 10px -5px rgba(0,0,0,0.02); border-color: var(--maternal-rose-dark) !important; }
        .ambient-glow { position: relative; }
        .ambient-glow::after { content: ''; position: absolute; inset: -1px; background: linear-gradient(45deg, var(--maternal-rose), transparent, var(--maternal-sage)); opacity: 0; transition: opacity 0.3s; border-radius: inherit; z-index: -1; }
        .ambient-glow:hover::after { opacity: 0.15; }

        /* Status dot pulse */
        @keyframes statusPulse { 0%, 100% { box-shadow: 0 0 0 0 rgba(16,185,129,0.4); } 50% { box-shadow: 0 0 0 4px rgba(16,185,129,0); } }
        .status-pulse { animation: statusPulse 2s ease-in-out infinite; }

        /* Sparkline animation */
        @keyframes sparkGrow { from { transform: scaleY(0); } to { transform: scaleY(1); } }
        .spark-bar { transform-origin: bottom; animation: sparkGrow 0.6s cubic-bezier(.4,0,.2,1) forwards; transform: scaleY(0); }
    </style>
</head>
<body class="antialiased text-zinc-900 overflow-x-hidden">

<div x-data="{ sidebarOpen: true, mobileOpen: false }" 
     class="flex min-h-screen bg-[#0C0C0E]">


    {{-- Mobile Overlay --}}
    <div x-show="mobileOpen" x-cloak @click="mobileOpen = false"
         x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/50 z-[70] lg:hidden"></div>

{{-- Sidebar --}}
    <aside :class="{ 
               'translate-x-0': mobileOpen, 
               '-translate-x-full lg:translate-x-0': !mobileOpen,
               'w-[240px]': sidebarOpen, 
               'w-0 border-none': !sidebarOpen 
           }"
           class="fixed lg:sticky top-0 left-0 h-screen sidebar-dark flex flex-col z-[100] transition-all duration-300 border-r border-white/[0.06] overflow-hidden">

        <div class="h-14 flex items-center px-5 border-b border-white/[0.06] flex-shrink-0">
            <div class="flex items-center gap-2.5 min-w-max">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:rotate-12 group-hover:scale-110 shadow-sm" style="background: linear-gradient(135deg, #fff 0%, var(--maternal-peach) 100%)">
                    <svg class="w-4 h-4 text-zinc-900" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <span x-show="sidebarOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-x-2" x-transition:enter-end="opacity-100 translate-x-0" class="text-white text-[15px] font-bold tracking-tight whitespace-nowrap font-outfit">Milky Way</span>
                <span x-show="sidebarOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-x-2" x-transition:enter-end="opacity-100 translate-x-0" class="text-[9px] font-bold text-white/90 bg-white/10 backdrop-blur-md px-1.5 py-0.5 rounded-md uppercase tracking-wider whitespace-nowrap">Pro</span>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-3 overflow-y-auto overflow-x-hidden scrollbar-hide">
            <div x-show="sidebarOpen" class="nav-section whitespace-nowrap" style="margin-top:8px;">General</div>

            <a id="nav-dashboard" href="{{ route('admin.dashboard') }}"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" title="Dashboard">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap transition-all duration-200">Dashboard</span>
            </a>

            <div x-show="sidebarOpen" class="nav-section whitespace-nowrap">Content</div>

            <a id="nav-articles" href="{{ route('admin.articles.index') }}"
               class="nav-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}" title="Articles">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V9a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2z"/></svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap transition-all duration-200">Articles</span>
            </a>
            <a id="nav-videos" href="{{ route('admin.videos.index') }}"
               class="nav-item {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}" title="Videos">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><polygon points="5,3 19,12 5,21" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap transition-all duration-200">Videos</span>
            </a>
            <a id="nav-clinics" href="{{ route('admin.clinics.index') }}"
               class="nav-item {{ request()->routeIs('admin.clinics.*') ? 'active' : '' }}" title="Clinics">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><circle cx="12" cy="11" r="3"/></svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap transition-all duration-200">Clinics</span>
            </a>

            <div x-show="sidebarOpen" class="nav-section whitespace-nowrap">System</div>

            <a id="nav-users" href="{{ route('admin.users.index') }}"
               class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" title="Users">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap transition-all duration-200">Users</span>
            </a>

            <a id="nav-feedback" href="{{ route('admin.dashboard') }}"
               class="nav-item" title="Feedback">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
                <span x-show="sidebarOpen" class="whitespace-nowrap transition-all duration-200">Feedback</span>
            </a>
        </nav>
    </aside>

    {{-- Main --}}
    <main class="flex-1 flex flex-col min-w-0 min-h-screen content-bg transition-all duration-300 z-10">

        <header class="sticky top-0 z-[60] h-14 header-blur border-b border-zinc-200/60 flex items-center justify-between px-6 lg:px-8">
            <div class="flex items-center gap-3">
                {{-- Animated hamburger --}}
                <button id="btn-mobile-menu" @click="window.innerWidth >= 1024 ? sidebarOpen = !sidebarOpen : mobileOpen = !mobileOpen" class="relative w-9 h-9 flex items-center justify-center rounded-lg hover:bg-zinc-100 active:scale-95 transition-all duration-200 -ml-1.5 group">
                    <div class="flex flex-col items-center justify-center w-5 h-5">
                        <span :class="(window.innerWidth >= 1024 ? sidebarOpen : mobileOpen) ? 'rotate-45 translate-y-[5px]' : ''" class="block w-5 h-[2px] bg-zinc-800 group-hover:bg-zinc-950 rounded-full transition-all duration-300 origin-center"></span>
                        <span :class="(window.innerWidth >= 1024 ? sidebarOpen : mobileOpen) ? 'opacity-0 scale-0' : 'opacity-100 scale-100'" class="block w-3.5 h-[2px] bg-zinc-800 group-hover:bg-zinc-950 rounded-full mt-[5px] transition-all duration-200"></span>
                        <span :class="(window.innerWidth >= 1024 ? sidebarOpen : mobileOpen) ? '-rotate-45 -translate-y-[7px]' : ''" class="block w-5 h-[2px] bg-zinc-800 group-hover:bg-zinc-950 rounded-full mt-[5px] transition-all duration-300 origin-center"></span>
                    </div>
                </button>
                <h1 class="text-sm font-bold text-zinc-900 font-outfit uppercase tracking-wider">@yield('title', 'Dashboard')</h1>
            </div>

            <div class="flex items-center gap-4">
                <span class="hidden md:flex items-center gap-1.5 text-[12px] text-emerald-600 font-medium mr-2">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full status-pulse"></span>
                    All systems normal
                </span>

                <div class="hidden sm:flex items-center gap-1.5">
                    <button id="btn-notifications" class="relative p-1.5 text-zinc-400 hover:text-zinc-700 rounded-md hover:bg-zinc-100 transition">
                        <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white"></span>
                    </button>
                    <div class="w-px h-4 bg-zinc-200 mx-1"></div>
                </div>

                {{-- User Profile Dropdown --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-2.5 p-1 rounded-full hover:bg-zinc-50 transition group">
                        <div class="w-8 h-8 bg-zinc-800 rounded-full flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0 ring-2 ring-white shadow-sm group-hover:bg-zinc-700 transition-colors">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="hidden lg:flex flex-col items-start text-left">
                            <span class="text-zinc-900 font-bold text-[13px] leading-none font-outfit">{{ auth()->user()->name }}</span>
                            <span class="text-zinc-500 text-[10px] leading-tight mt-0.5">Administrator</span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-zinc-400 group-hover:text-zinc-600 transition-colors" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak
                         x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         class="absolute top-full right-0 mt-2 w-56 bg-white border border-zinc-200 rounded-2xl py-2 shadow-2xl z-[100] ring-1 ring-black/5">
                        <div class="px-4 py-3 border-b border-zinc-50">
                            <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Signed in as</p>
                            <p class="text-[14px] font-bold text-zinc-900 font-outfit mt-1 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-[11px] text-zinc-500 truncate mt-0.5">{{ auth()->user()->email }}</p>
                        </div>
                        
                        <div class="py-1">
                            <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-2.5 text-[13px] text-zinc-600 hover:text-zinc-900 hover:bg-zinc-50 transition">
                                <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                View Portal
                            </a>
                        </div>

                        <div class="border-t border-zinc-50 pt-1 mt-1 px-2">
                            <form method="POST" action="{{ route('logout') }}">@csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-[13px] text-rose-500 font-bold hover:bg-rose-50 rounded-xl transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 px-6 lg:px-8 py-6 lg:py-8">
            {{ $slot }}
        </div>
    </main>
</div>

{{-- Toast Notifications --}}
<div x-data="{ 
        messages: [],
        remove(id) {
            this.messages = this.messages.filter(m => m.id !== id)
        },
        add(text, type = 'success') {
            const id = Date.now()
            this.messages.push({ id, text, type })
            setTimeout(() => this.remove(id), 5000)
        }
     }"
     @notify.window="add($event.detail.text, $event.detail.type)"
     class="fixed bottom-6 right-6 z-[100] flex flex-col gap-3 w-full max-w-sm pointer-events-none">
    
    <template x-for="msg in messages" :key="msg.id">
        <div x-show="true"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-y-4 opacity-0 scale-95"
             x-transition:enter-end="translate-y-0 opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-y-0 opacity-100 scale-100"
             x-transition:leave-end="translate-y-2 opacity-0 scale-95"
             class="pointer-events-auto bg-white border border-zinc-200 rounded-2xl p-4 shadow-xl flex items-center gap-4 group">
            
            <div :class="{
                    'bg-emerald-50 text-emerald-500': msg.type === 'success',
                    'bg-rose-50 text-rose-500': msg.type === 'error',
                 }"
                 class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                <template x-if="msg.type === 'success'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                </template>
                <template x-if="msg.type === 'error'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </template>
            </div>

            <div class="flex-1">
                <p class="text-[14px] font-bold text-zinc-900 font-outfit" x-text="msg.text"></p>
                <p class="text-[11px] text-zinc-400 font-medium">System Notification</p>
            </div>

            <button @click="remove(msg.id)" class="p-1.5 text-zinc-300 hover:text-zinc-500 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </template>
</div>

@if(session('success'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            window.dispatchEvent(new CustomEvent('notify', { detail: { text: "{{ session('success') }}", type: 'success' } }));
        });
    </script>
@endif

@if(session('error'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            window.dispatchEvent(new CustomEvent('notify', { detail: { text: "{{ session('error') }}", type: 'error' } }));
        });
    </script>
@endif

</body>
</html>
