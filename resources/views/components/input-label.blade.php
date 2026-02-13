@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[11px] font-black text-zinc-400 uppercase tracking-[0.2em] mb-2']) }}>
    {{ $value ?? $slot }}
</label>
