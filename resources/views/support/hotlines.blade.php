<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Emergency Hotlines') }}
        </h2>
    </x-slot>

    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="mb-24 text-center reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 bg-red-500/5 border border-red-500/10 rounded-full mb-8">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                    <span class="text-[10px] font-black text-red-500/70 uppercase tracking-[0.3em]">Urgent Response</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-6xl text-text-primary mb-6 tracking-tight leading-[1.1]">Immediate Support</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">Get help when you need it most. Our regional partners are ready to support you with expert advice and emergency care protocols.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-24">
                @forelse($hotlines as $index => $hotline)
                    <div class="bg-white p-10 rounded-[3rem] border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll"
                         style="transition-delay: {{ $index * 100 }}ms">
                        <div class="flex items-center justify-between mb-10">
                            <span class="text-maternal-rose text-[10px] font-black uppercase tracking-[0.2em]">{{ $hotline->region }}</span>
                            <div class="w-12 h-12 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                        </div>
                        
                        <h4 class="font-black text-text-primary text-2xl mb-4 tracking-tight">{{ $hotline->name }}</h4>
                        <p class="text-text-dimmed text-base font-medium mb-12 leading-relaxed h-20 line-clamp-3">{{ $hotline->description }}</p>
                        
                        <a href="tel:{{ $hotline->number }}" class="w-full btn-agency-primary shadow-suspended !rounded-2xl py-5 !text-lg">
                            {{ $hotline->number }}
                        </a>
                    </div>
                @empty
                    <div class="col-span-full py-32 text-center bg-white/50 backdrop-blur-xl rounded-[4rem] border border-dashed border-maternal-black/10 text-text-muted font-medium italic reveal-on-scroll">
                        <div class="w-24 h-24 bg-surface-dim rounded-full flex items-center justify-center mx-auto mb-8 opacity-50">
                            <svg class="w-12 h-12 text-maternal-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                        </div>
                        Loading regional hotlines... Our global response units are initializing.
                    </div>
                @endforelse
            </div>

            <div class="bg-surface-dark rounded-[4rem] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-suspended reveal-on-scroll">
                <div class="absolute inset-0 bg-grain opacity-10"></div>
                <!-- Advanced Decorative Elements -->
                <div class="absolute top-0 left-0 w-[40rem] h-[40rem] bg-[radial-gradient(circle,rgba(198,137,137,0.15)_0%,transparent_70%)] -translate-y-1/2 -translate-x-1/2"></div>
                
                <h4 class="font-outfit font-black text-4xl md:text-5xl mb-6 relative z-10 tracking-tight">Don't see your region?</h4>
                <p class="text-white/40 text-lg md:text-xl font-medium mb-12 relative z-10 max-w-2xl mx-auto leading-relaxed">We are constantly expanding our specialized network. If you need immediate assistance and your region isn't listed, please contact our national central response team.</p>
                
                <div class="relative z-10 flex flex-col items-center gap-8">
                    <a href="tel:911" class="group flex items-center space-x-6 text-maternal-rose font-black text-3xl md:text-4xl transition-all duration-500 hover:scale-105">
                         <div class="w-16 h-16 rounded-full border border-maternal-rose/20 flex items-center justify-center group-hover:bg-maternal-rose group-hover:text-white transition-all duration-500">
                             <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                         </div>
                        <span class="border-b-2 border-maternal-rose/30 group-hover:border-maternal-rose transition-colors">Emergency Services (911)</span>
                    </a>
                    <a href="{{ route('dashboard') }}" class="text-white/30 text-xs font-black uppercase tracking-[0.4em] hover:text-white transition-colors duration-500">Return to Infrastructure Overview</a>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
