<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Emergency Hotlines') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-12">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-red-100 text-red-600 text-sm font-bold uppercase tracking-wide mb-4">
                    Urgent Care
                </span>
                <h3 class="font-outfit font-bold text-4xl text-maternal-brown mb-4">Immediate Support Available</h3>
                <p class="text-maternal-brown/60 text-lg max-w-2xl mx-auto">Get help when you need it most. Our regional partners are ready to support you with expert advice and emergency care.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($hotlines as $hotline)
                    <div class="bg-white p-8 rounded-[2rem] border-2 border-transparent hover:border-maternal-rose transition duration-500 shadow-sm hover:shadow-2xl">
                        <div class="flex items-center justify-between mb-8">
                            <span class="bg-maternal-peach/30 text-maternal-rose text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full">{{ $hotline->region }}</span>
                            <div class="w-10 h-10 bg-red-50 text-red-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                        </div>
                        
                        <h4 class="font-bold text-maternal-brown text-2xl mb-2">{{ $hotline->name }}</h4>
                        <p class="text-maternal-brown/50 text-sm mb-8 leading-relaxed">{{ $hotline->description }}</p>
                        
                        <a href="tel:{{ $hotline->number }}" class="w-full inline-flex items-center justify-center px-8 py-4 bg-maternal-brown text-white text-lg font-bold rounded-2xl hover:bg-maternal-rose hover:text-white hover:-translate-y-1 transition transform shadow-xl shadow-maternal-brown/10">
                            {{ $hotline->number }}
                        </a>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center bg-white rounded-3xl border border-dashed border-maternal-peach text-maternal-brown/40 font-medium">
                        Loading hotlines... Please wait.
                    </div>
                @endforelse
            </div>

            <div class="mt-16 bg-maternal-brown rounded-[2rem] p-12 text-center text-white relative overflow-hidden">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                <h4 class="font-bold text-3xl mb-4 relative z-10">Don't see your region?</h4>
                <p class="text-white/60 mb-8 relative z-10">We are constantly expanding our network. If you need immediate assistance and your region isn't listed, please contact our national hotline.</p>
                <a href="tel:911" class="inline-flex items-center space-x-2 text-maternal-rose font-bold text-xl relative z-10 hover:underline underline-offset-8">
                    <span>Emergency Services (911)</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
