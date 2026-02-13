<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-white text-zinc-900 border border-zinc-200 rounded-xl font-bold text-[13px] hover:bg-zinc-50 transition-all active:scale-[0.98] shadow-sm']) }}>
    {{ $slot }}
</button>
