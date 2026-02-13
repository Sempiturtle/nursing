<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-maternal-rose text-white border border-transparent rounded-xl font-bold text-[13px] hover:bg-maternal-rose-dark transition-all active:scale-[0.98] shadow-luxury']) }}>
    {{ $slot }}
</button>
