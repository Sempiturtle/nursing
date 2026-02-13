@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full bg-white border border-zinc-200 rounded-xl px-4 py-2.5 text-[13px] font-medium text-zinc-900 placeholder-zinc-400 focus:outline-none focus:ring-2 focus:ring-maternal-rose/20 focus:border-maternal-rose transition-all']) !!}>
