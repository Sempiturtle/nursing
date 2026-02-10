@props(['active' => false, 'icon' => null, 'collapsed' => false])

@php
$classes = ($active)
    ? 'flex items-center gap-3 px-4 py-3 text-sm font-bold bg-maternal-rose text-white rounded-2xl shadow-lg shadow-maternal-rose/25 transition-all duration-300'
    : 'flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-400 hover:bg-white/5 hover:text-white rounded-2xl transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <span class="flex-shrink-0 w-5 h-5">{!! $icon !!}</span>
    @endif
    <span x-show="sidebarOpen" x-transition:enter="transition ease-out duration-200 delay-75"
          x-transition:enter-start="opacity-0 translate-x-2"
          x-transition:enter-end="opacity-100 translate-x-0"
          class="whitespace-nowrap">{{ $slot }}</span>
</a>
