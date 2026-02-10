<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Local Breastfeeding Support') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-[3rem] p-8 md:p-12 shadow-sm border border-maternal-peach/30 mb-8 overflow-hidden relative">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                    <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                </div>
                
                <div class="relative z-10 max-w-2xl">
                    <h3 class="font-outfit font-bold text-3xl text-maternal-brown mb-4">Find Support Near You</h3>
                    <p class="text-maternal-brown/60 text-lg mb-8 leading-relaxed">Milky Way helps you locate verified breastfeeding-friendly stations and clinics. Allow GPS access for the most accurate results.</p>
                    
                    <button class="bg-maternal-rose text-white px-8 py-4 rounded-full font-bold shadow-lg shadow-maternal-rose/20 hover:bg-maternal-rose-dark transition flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Use My Current Location</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Clinic List -->
                <div class="lg:col-span-1 space-y-6 max-h-[600px] overflow-y-auto pr-2 custom-scrollbar">
                    @forelse($clinics as $clinic)
                        <div class="bg-white p-6 rounded-3xl border border-maternal-peach/30 shadow-sm hover:border-maternal-rose transition cursor-pointer group">
                            <h4 class="font-bold text-maternal-brown text-xl mb-2 group-hover:text-maternal-rose transition">{{ $clinic->name }}</h4>
                            <p class="text-maternal-brown/40 text-sm mb-4">{{ $clinic->address }}</p>
                            <div class="flex items-center text-maternal-brown/60 text-xs space-x-4 mb-4">
                                <span class="flex items-center space-x-1">
                                    <svg class="w-4 h-4 text-maternal-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>{{ $clinic->operating_hours ?: 'Open now' }}</span>
                                </span>
                            </div>
                            <a href="tel:{{ $clinic->contact_number }}" class="text-maternal-rose font-bold text-sm tracking-wide underline underline-offset-4">{{ $clinic->contact_number }}</a>
                        </div>
                    @empty
                        <div class="p-8 text-center bg-white rounded-3xl border border-dashed border-maternal-peach text-maternal-brown/40 font-medium">
                            No clinics found in this area.
                        </div>
                    @endforelse
                </div>

                <!-- Map Placeholder -->
                <div class="lg:col-span-2 bg-maternal-brown/5 rounded-[3rem] border border-maternal-peach/30 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20">
                        <!-- Abstract map pattern -->
                        <div class="grid grid-cols-12 h-full">
                            @for($i=0; $i<144; $i++)
                                <div class="border border-maternal-brown/10"></div>
                            @endfor
                        </div>
                    </div>
                    <div class="relative z-10 text-center">
                        <x-application-logo class="w-16 h-16 text-maternal-rose/30 mx-auto mb-4" />
                        <span class="text-maternal-brown/30 font-bold text-2xl uppercase tracking-widest">Interactive Map Ready</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #F8B4B4; border-radius: 20px; }
    </style>
</x-app-layout>
