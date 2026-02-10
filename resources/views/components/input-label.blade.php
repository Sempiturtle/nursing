@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-xs uppercase tracking-widest text-maternal-brown/60 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
