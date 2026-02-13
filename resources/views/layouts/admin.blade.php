<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Milky Way') }} — Infrastructure Management</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|outfit:400,500,600,700,900&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        
        .nav-item-hover:hover .nav-icon {
            transform: translateY(-2px);
            filter: drop-shadow(0 0 8px rgba(168, 85, 247, 0.4));
        }
        
        .sidebar-active-pill {
            background: linear-gradient(135deg, var(--color-accent-purple), var(--color-accent-pink));
        }
    </style>
</head>
<body class="antialiased bg-surface-base text-text-primary selection:bg-accent-purple selection:text-white font-inter noise">

<div x-data="{ 
    sidebarCollapsed: false, 
    mobileOpen: false,
    commandPaletteOpen: false,
    get isSidebarOpen() { return !this.sidebarCollapsed }
}" 
@keydown.window.cmd.k.prevent="commandPaletteOpen = true"
@keydown.window.ctrl.k.prevent="commandPaletteOpen = true"
class="flex h-screen overflow-hidden bg-mesh">

    {{-- Mobile Overlay --}}
    <div x-show="mobileOpen" x-cloak @click="mobileOpen = false"
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[70] lg:hidden"></div>

    {{-- Sidebar --}}
    <aside :class="{ 
               'w-72': !sidebarCollapsed, 
               'w-20': sidebarCollapsed,
               'translate-x-0': mobileOpen,
               '-translate-x-full lg:translate-x-0': !mobileOpen
           }"
           class="fixed lg:relative top-0 left-0 h-full glass border-r border-white/5 flex flex-col z-[100] transition-all duration-300 ease-in-out flex-shrink-0 custom-scrollbar">

        <div class="h-20 flex items-center px-6 border-b border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 gradient-accent rounded-xl flex items-center justify-center shadow-glow-purple group cursor-pointer transition-transform hover:scale-110 duration-500">
                    <x-application-logo class="w-6 h-6 text-white group-hover:rotate-12 transition-transform" />
                </div>
                <div x-show="!sidebarCollapsed" 
                     x-transition:enter="transition ease-out duration-200 delay-100"
                     x-transition:enter-start="opacity-0 -translate-x-4"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     class="flex flex-col leading-none">
                    <span class="text-white text-lg font-black font-outfit uppercase tracking-tighter gradient-text">Milky Way</span>
                    <span class="text-accent-purple text-[10px] font-bold uppercase tracking-[0.2em] -mt-0.5">Control Center</span>
                </div>
            </div>
        </div>

        {{-- Navigation Items --}}
        <nav class="flex-1 py-8 overflow-y-auto px-4 space-y-2">
            <div x-show="!sidebarCollapsed" class="px-4 mb-4">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em]">Dashboard</span>
            </div>

            <x-admin-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')" icon="layout-grid">
                General Overview
            </x-admin-nav-link>

            <div x-show="!sidebarCollapsed" class="px-4 mt-8 mb-4">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em]">Resources</span>
            </div>

            <x-admin-nav-link href="{{ route('admin.articles.index') }}" :active="request()->routeIs('admin.articles.*')" icon="file-text">
                Articles Library
            </x-admin-nav-link>
            
            <x-admin-nav-link href="{{ route('admin.videos.index') }}" :active="request()->routeIs('admin.videos.*')" icon="video">
                Tutorial Hub
            </x-admin-nav-link>

            <x-admin-nav-link href="{{ route('admin.clinics.index') }}" :active="request()->routeIs('admin.clinics.*')" icon="map-pin">
                Clinic Network
            </x-admin-nav-link>

            <div x-show="!sidebarCollapsed" class="px-4 mt-8 mb-4">
                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em]">Management</span>
            </div>

            <x-admin-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')" icon="users">
                Access Control
            </x-admin-nav-link>

            <x-admin-nav-link href="{{ route('admin.feedback.index') }}" :active="request()->routeIs('admin.feedback.*')" icon="message-square">
                User Insights
            </x-admin-nav-link>
        </nav>

        {{-- User Profile Footer --}}
        <div class="p-4 border-t border-white/5 bg-white/5">
            <div class="flex items-center gap-3 p-2 rounded-xl transition-all duration-300 hover:bg-white/5 cursor-pointer group">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full gradient-accent flex items-center justify-center font-bold text-white shadow-lift">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-accent-emerald border-2 border-slate-900 rounded-full"></div>
                </div>
                <div x-show="!sidebarCollapsed" class="flex flex-col min-w-0">
                    <span class="text-sm font-bold text-white truncate">{{ auth()->user()->name }}</span>
                    <span class="text-[11px] text-slate-500 truncate">Administrator</span>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main Content Window --}}
    <main class="flex-1 h-full overflow-y-auto relative custom-scrollbar">
        {{-- Header Bar --}}
        <header class="sticky top-0 z-[60] h-20 bg-slate-950/80 backdrop-blur-xl border-b border-white/5 flex items-center justify-between px-8">
            <div class="flex items-center gap-6">
                <button @click="sidebarCollapsed = !sidebarCollapsed" 
                        class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-white/5 text-slate-400 transition-all border border-transparent hover:border-white/10 group">
                    <svg class="w-5 h-5 transition-transform duration-500" :class="sidebarCollapsed ? 'rotate-180' : 'rotate-0'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
                </button>

                <div class="hidden lg:flex items-center gap-3">
                    <nav class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-500">
                        <span class="hover:text-white transition-colors cursor-pointer">Admin</span>
                        <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                        <span class="text-white">{{ $header ?? 'Dashboard' }}</span>
                    </nav>
                </div>
            </div>

            <div class="flex items-center gap-6">
                {{-- Command Palette Trigger --}}
                <div @click="commandPaletteOpen = true" 
                     class="hidden md:flex items-center gap-3 px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-xs font-medium text-slate-400 cursor-pointer hover:bg-white/10 hover:border-white/20 transition-all group lg:min-w-[240px]">
                    <svg class="w-4 h-4 text-slate-500 group-hover:text-accent-purple transition-colors" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="flex-1">Search Command...</span>
                    <kbd class="flex items-center gap-1 font-sans text-slate-500 bg-white/5 px-2 py-0.5 rounded border border-white/10">
                        <span class="text-[10px]">⌘</span>K
                    </kbd>
                </div>

                {{-- Notifications --}}
                <button class="relative w-10 h-10 flex items-center justify-center rounded-xl hover:bg-white/5 text-slate-400 border border-transparent hover:border-white/10 transition-all group">
                    <svg class="w-5 h-5 group-hover:animate-pulse-glow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-accent-rose rounded-full border-2 border-slate-900 animate-pulse"></span>
                </button>

                {{-- Profile Dropdown --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" 
                            class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-white/5 transition-all border border-transparent hover:border-white/10 group">
                        <div class="w-8 h-8 rounded-lg gradient-accent flex items-center justify-center font-bold text-white shadow-lift text-xs">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <svg class="w-4 h-4 text-slate-500 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak
                             x-transition:enter="transition ease-out duration-200" 
                             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             class="absolute top-full right-0 mt-3 w-64 glass-dark rounded-2xl p-2 shadow-suspended z-[100]">
                            
                            <div class="px-4 py-3 border-b border-white/5 mb-1">
                                <p class="text-white font-bold text-sm tracking-tight">{{ auth()->user()->name }}</p>
                                <p class="text-slate-500 text-xs truncate">{{ auth()->user()->email }}</p>
                            </div>
                            
                            <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-300 hover:bg-white/5 hover:text-white rounded-xl transition-all group">
                                <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-slate-500 group-hover:text-accent-purple transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                Manage Profile
                            </a>

                            <div class="h-px bg-white/5 my-1 mx-2"></div>

                            <form method="POST" action="{{ route('logout') }}">@csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-accent-rose hover:bg-accent-rose/10 rounded-xl transition-all group text-left">
                                    <div class="w-8 h-8 rounded-lg bg-accent-rose/10 flex items-center justify-center text-accent-rose">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    </div>
                                    Secure Logout
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </header>

        {{-- Page Content Wrapper --}}
        <div class="flex-1 px-8 py-10">
            <div class="max-w-[1600px] mx-auto animate-slide-up-fade">
                {{ $slot }}
            </div>
        </div>
    </main>

    {{-- Command Palette Modal --}}
    <div x-show="commandPaletteOpen" x-cloak
         @keydown.window.escape="commandPaletteOpen = false"
         class="fixed inset-0 z-[200] flex items-start justify-center pt-24 px-4 sm:px-6">
        <div x-show="commandPaletteOpen" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             @click="commandPaletteOpen = false"
             class="fixed inset-0 bg-slate-950/80 backdrop-blur-md"></div>

        <div x-show="commandPaletteOpen" 
             x-transition:enter="ease-out duration-300" 
             x-transition:enter-start="opacity-0 scale-95 translate-y-4" 
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             class="relative w-full max-w-2xl glass-dark rounded-3xl shadow-suspended border border-white/10 overflow-hidden">
            
            <div class="flex items-center px-6 py-4 border-b border-white/5">
                <svg class="w-5 h-5 text-accent-purple" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" 
                       class="ml-4 flex-1 bg-transparent border-none focus:ring-0 text-white placeholder-slate-500 text-lg font-medium" 
                       placeholder="How can we help today?" 
                       autofocus>
                <div class="flex items-center gap-2 px-2 py-1 bg-white/5 rounded-lg border border-white/10 text-[10px] font-bold text-slate-500">
                    ESC
                </div>
            </div>

            <div class="max-height-[400px] overflow-y-auto p-4 space-y-4 custom-scrollbar">
                <div>
                    <h4 class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2">Shortcuts</h4>
                    <div class="space-y-1">
                        <div class="flex items-center justify-between px-4 py-3 hover:bg-white/5 rounded-2xl cursor-pointer group transition-all">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-accent-purple/20 group-hover:text-accent-purple transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                                </div>
                                <span class="text-sm font-bold text-slate-300 group-hover:text-white">Create New Article</span>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 bg-white/5 px-2 py-1 rounded border border-white/10">A + N</span>
                        </div>
                        <div class="flex items-center justify-between px-4 py-3 hover:bg-white/5 rounded-2xl cursor-pointer group transition-all">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-accent-blue/20 group-hover:text-accent-blue transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/></svg>
                                </div>
                                <span class="text-sm font-bold text-slate-300 group-hover:text-white">Find Nearby Clinic</span>
                            </div>
                            <span class="text-[10px] font-bold text-slate-600 bg-white/5 px-2 py-1 rounded border border-white/10">C + F</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/5 px-6 py-4 flex items-center justify-between border-t border-white/5">
                <div class="flex items-center gap-4 text-[10px] font-bold text-slate-500">
                    <span class="flex items-center gap-1.5"><kbd class="bg-white/5 px-1.5 py-0.5 rounded border border-white/10 tracking-normal inline-flex items-center">↑↓</kbd> to navigate</span>
                    <span class="flex items-center gap-1.5"><kbd class="bg-white/5 px-1.5 py-0.5 rounded border border-white/10 tracking-normal inline-flex items-center">ENTER</kbd> to select</span>
                </div>
                <div class="text-[10px] font-bold text-slate-500">
                    Powered by MilkyWay Intelligence
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Animated Toasts --}}
<div x-data="{ 
        notifications: [],
        remove(id) { this.notifications = this.notifications.filter(n => n.id !== id) },
        add(title, message, type = 'success') {
            const id = Date.now()
            this.notifications.push({ id, title, message, type })
            setTimeout(() => this.remove(id), 6000)
        }
     }"
     @notify.window="add($event.detail.title || 'Notification', $event.detail.text, $event.detail.type)"
     class="fixed bottom-8 right-8 z-[300] flex flex-col gap-4 w-full max-w-sm pointer-events-none">
    
    <template x-for="n in notifications" :key="n.id">
        <div x-show="true"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="translate-x-full opacity-0 scale-90"
             x-transition:enter-end="translate-x-0 opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="translate-x-0 opacity-100 scale-100"
             x-transition:leave-end="translate-x-full opacity-0 scale-90"
             class="pointer-events-auto glass-dark rounded-3xl p-5 shadow-suspended border border-white/10 flex items-start gap-5 relative overflow-hidden group">
            
            <div class="absolute bottom-0 left-0 h-1 bg-accent-purple animate-shimmer" style="width: 100%; transition: width 6s linear;"></div>

            <div :class="{
                    'bg-accent-emerald/20 text-accent-emerald': n.type === 'success',
                    'bg-accent-rose/20 text-accent-rose': n.type === 'error',
                    'bg-accent-blue/20 text-accent-blue': n.type === 'info',
                 }"
                 class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0 animate-pulse-glow">
                <template x-if="n.type === 'success'">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M4.5 12.75l6 6 9-13.5"/></svg>
                </template>
                <template x-if="n.type === 'error'">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                </template>
            </div>

            <div class="flex-1 min-w-0">
                <p class="text-[14px] font-black text-white font-outfit uppercase tracking-wider mb-0.5" x-text="n.title"></p>
                <p class="text-[12px] text-slate-400 font-medium leading-tight" x-text="n.message"></p>
            </div>

            <button @click="remove(n.id)" class="p-1.5 text-slate-600 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </template>
</div>

@if(session('success'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            window.dispatchEvent(new CustomEvent('notify', { detail: { title: 'Success', text: "{{ session('success') }}", type: 'success' } }));
        });
    </script>
@endif

@if(session('error'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            window.dispatchEvent(new CustomEvent('notify', { detail: { title: 'Security Alert', text: "{{ session('error') }}", type: 'error' } }));
        });
    </script>
@endif

</body>
</html>

