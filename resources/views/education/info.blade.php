<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Breastfeeding Information') }}
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
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Curated Resources</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-7xl text-text-primary mb-10 tracking-tight leading-[1.05]">Clinical Guides</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">Deep dive into specialized breastfeeding categories with our proprietary health archives.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Tips -->
                <a href="{{ route('education.tips') }}" class="relative group h-[500px] rounded-[3.5rem] overflow-hidden shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll">
                    <div class="absolute inset-0 bg-surface-dark/40 group-hover:bg-surface-dark/60 transition-all duration-700 backdrop-blur-[1px]"></div>
                    <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover -z-10 transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 p-12 flex flex-col justify-end">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8 border border-white/20 transition-transform duration-500 group-hover:rotate-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-3xl font-black text-white mb-4 tracking-tight">Breastfeeding Tips</h3>
                        <p class="text-white/60 text-base font-medium leading-relaxed mb-10">Essential advice for a comfortable clinical journey.</p>
                        <span class="inline-flex items-center text-maternal-rose font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-500">
                            Explore Archive 
                            <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>

                <!-- Latching -->
                <a href="{{ route('education.latching') }}" class="relative group h-[500px] rounded-[3.5rem] overflow-hidden shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll stagger-delay-1">
                    <div class="absolute inset-0 bg-maternal-rose/40 group-hover:bg-maternal-rose/60 transition-all duration-700 backdrop-blur-[1px]"></div>
                     <img src="https://images.unsplash.com/photo-1544126592-807daf215651?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover -z-10 transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 p-12 flex flex-col justify-end">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8 border border-white/20 transition-transform duration-500 group-hover:-rotate-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 003 11c0-5.523 4.477-10 10-10s10 4.477 10 10a10.003 10.003 0 00-6.257 9.248l-.054.09"></path></svg>
                        </div>
                        <h3 class="text-3xl font-black text-white mb-4 tracking-tight">Latching Logic</h3>
                        <p class="text-white/80 text-base font-medium leading-relaxed mb-10">Step-by-step connection guides for perfect clinical results.</p>
                        <span class="inline-flex items-center text-white font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-500">
                            Interface Guides 
                            <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>

                <!-- Nutrition -->
                <a href="{{ route('education.nutrition') }}" class="relative group h-[500px] rounded-[3.5rem] overflow-hidden shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll stagger-delay-2">
                    <div class="absolute inset-0 bg-maternal-sage/40 group-hover:bg-maternal-sage/60 transition-all duration-700 backdrop-blur-[1px]"></div>
                     <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover -z-10 transition-transform duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 p-12 flex flex-col justify-end">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8 border border-white/20 transition-transform duration-500 group-hover:rotate-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <h3 class="text-3xl font-black text-white mb-4 tracking-tight">Vital Nutrition</h3>
                        <p class="text-white/80 text-base font-medium leading-relaxed mb-10">Fueling both you and your baby's growth with expert protocols.</p>
                        <span class="inline-flex items-center text-white font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-500">
                            See Nutrition 
                            <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
