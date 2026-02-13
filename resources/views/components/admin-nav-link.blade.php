@props(['active' => false, 'icon' => 'circle'])

@php
    $icons = [
        'layout-grid' => '<svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h7v7H3zM14 3h7v7h-7zM14 14h7v7h-7zM3 14h7v7H3z"/></svg>',
        'file-text' => '<svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>',
        'video' => '<svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>',
        'map-pin' => '<svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'users' => '<svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>',
        'message-square' => '<svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>',
        'circle' => '<svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg>',
    ];
@endphp

<a {{ $attributes->merge(['class' => 'group flex items-center gap-4 px-4 py-3 rounded-2xl transition-all duration-500 relative overflow-hidden ' . ($active ? 'gradient-accent shadow-glow-purple text-white translate-x-1' : 'text-slate-400 hover:text-white hover:bg-white/5 hover:-translate-y-0.5')]) }}>
    @if($active)
        <div class="absolute inset-0 bg-white/20 animate-shimmer"></div>
    @endif

    <div class="w-6 h-6 flex-shrink-0 transition-transform duration-500 group-hover:scale-110 group-active:scale-95">
        {!! $icons[$icon] ?? $icons['circle'] !!}
    </div>

    <span x-show="!sidebarCollapsed" 
          x-transition:enter="transition ease-out duration-300 delay-100"
          x-transition:enter-start="opacity-0 -translate-x-4"
          x-transition:enter-end="opacity-100 translate-x-0"
          class="text-sm font-bold tracking-tight whitespace-nowrap">
        {{ $slot }}
    </span>

    @if($active)
        <div x-show="!sidebarCollapsed" class="ml-auto w-1.5 h-1.5 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)]"></div>
    @endif
</a>

