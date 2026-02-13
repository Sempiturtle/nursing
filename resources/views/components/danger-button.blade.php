<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white border border-transparent rounded-xl font-bold text-[13px] hover:bg-red-700 transition-all active:scale-[0.98] shadow-sm']) }}>
    {{ $slot }}
</button>
