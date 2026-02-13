<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Local Breastfeeding Support') }}
        </h2>
    </x-slot>

    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="mb-24 text-center reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-8">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Support Atlas</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-6xl text-text-primary mb-6 tracking-tight leading-[1.1]">Find Support Near You</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">Milky Way helps you locate verified breastfeeding-friendly stations and clinics. Allow GPS access for the most accurate results.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Strategic Control Panel -->
                <div class="lg:col-span-4 space-y-8">
                    <div class="bg-white rounded-[3rem] p-10 border border-maternal-black/5 shadow-luxury reveal-on-scroll">
                        <h3 class="text-2xl font-black text-text-primary mb-6 tracking-tight">Location Services</h3>
                        <p class="text-text-dimmed text-sm mb-8 font-medium leading-relaxed">Activate your coordinates to find immediate specialized care clinics in your current proximity.</p>
                        
                        <button class="w-full btn-agency-primary shadow-suspended group">
                            <svg class="w-5 h-5 mr-3 group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Enable GPS</span>
                        </button>
                    </div>

                    <div class="space-y-6 max-h-[500px] overflow-y-auto pr-2 custom-scrollbar reveal-on-scroll stagger-delay-1">
                        @forelse($clinics as $clinic)
                            <div class="bg-white p-8 rounded-[2.5rem] border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 cursor-pointer group">
                                <h4 class="font-black text-text-primary text-xl mb-3 group-hover:text-maternal-rose transition-colors duration-300">{{ $clinic->name }}</h4>
                                <p class="text-text-muted text-sm mb-6 font-medium leading-relaxed">{{ $clinic->address }}</p>
                                <div class="flex items-center text-text-dimmed text-[10px] font-black uppercase tracking-widest space-x-4 mb-6">
                                    <span class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-maternal-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span>{{ $clinic->operating_hours ?: 'Open 24/7' }}</span>
                                    </span>
                                </div>
                                <a href="tel:{{ $clinic->contact_number }}" class="inline-flex items-center text-maternal-rose font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-500">
                                    {{ $clinic->contact_number }}
                                    <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </a>
                            </div>
                        @empty
                            <div class="p-12 text-center bg-white/50 backdrop-blur-xl rounded-[2.5rem] border border-dashed border-maternal-black/10 text-text-muted font-medium italic">
                                No clinics found in this area.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Abstract Map Console -->
                <div class="lg:col-span-8 bg-surface-dark rounded-[3.5rem] border border-white/5 relative overflow-hidden shadow-suspended reveal-on-scroll stagger-delay-2">
                    <div class="absolute inset-0 bg-grain opacity-10"></div>
                    <div class="absolute inset-0 opacity-10 pointer-events-none">
                        <div class="grid grid-cols-12 h-full">
                            @for($i=0; $i<144; $i++)
                                <div class="border border-white/5"></div>
                            @endfor
                        </div>
                    </div>
                    <div class="relative z-10 h-[600px] flex flex-col items-center justify-center text-center p-12">
                        <div class="w-24 h-24 glass-morphism-dark rounded-[2.5rem] flex items-center justify-center mb-8 animate-float-gentle">
                             <x-application-logo class="w-12 h-12 text-maternal-rose" />
                        </div>
                        <h4 class="text-3xl font-black text-white mb-4 tracking-tight">Interactive Map Ready</h4>
                        <p class="text-white/40 text-lg font-medium max-w-sm mx-auto">Enable your clinical dashboard to synchronize with local geospatial support data.</p>
                        
                        <div class="mt-12 group cursor-pointer">
                            <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-white group-hover:bg-white group-hover:text-surface-dark transition-all duration-500">
                                <svg class="w-6 h-6 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(198, 137, 137, 0.2); border-radius: 20px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(198, 137, 137, 0.4); }
    </style>
</x-app-layout>
