<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-8 py-4 bg-maternal-rose text-white rounded-2xl font-bold uppercase tracking-widest hover:bg-maternal-rose-dark focus:outline-none focus:ring-4 focus:ring-maternal-rose/20 transition duration-300 shadow-lg shadow-maternal-rose/20']) }}>
    {{ $slot }}
</button>
