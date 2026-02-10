@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-maternal-peach/20 border-maternal-peach/30 focus:border-maternal-rose focus:ring-maternal-rose/20 rounded-2xl shadow-sm text-maternal-brown placeholder:text-maternal-brown/30 transition duration-300 px-6 py-4 text-base']) }}>
