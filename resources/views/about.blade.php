<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('About Milky Way') }}
        </h2>
    </x-slot>

    <div class="py-24 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="text-center mb-24 reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-12">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Our Identity</span>
                </div>
                
                <div class="w-24 h-24 bg-surface-dark rounded-[2.5rem] flex items-center justify-center mx-auto mb-12 shadow-suspended animate-float-gentle">
                    <x-application-logo class="w-12 h-12 text-maternal-rose" />
                </div>
                
                <h3 class="text-5xl md:text-7xl font-outfit font-black text-text-primary mb-10 leading-[1.05] tracking-tight">
                    Empowering every <br><span class="text-maternal-rose italic">unique journey</span>.
                </h3>
            </div>
            
            <div class="space-y-24">
                <section class="reveal-on-scroll">
                    <div class="flex items-center space-x-6 mb-8">
                        <div class="w-12 h-px bg-maternal-black/10"></div>
                        <h4 class="font-black text-text-primary text-xs uppercase tracking-[0.4em]">Our Mission</h4>
                    </div>
                    <p class="text-text-dimmed text-xl md:text-2xl font-medium leading-relaxed">
                        Milky Way is dedicated to providing high-quality, accessible breastfeeding support and maternal health resources. We believe that every mother deserves professional care and community support to give their baby the best start in life.
                    </p>
                </section>

                <section class="reveal-on-scroll">
                    <div class="flex items-center space-x-6 mb-8">
                        <div class="w-12 h-px bg-maternal-black/10"></div>
                        <h4 class="font-black text-text-primary text-xs uppercase tracking-[0.4em]">Our Vision</h4>
                    </div>
                    <p class="text-text-dimmed text-xl md:text-2xl font-medium leading-relaxed">
                        We envision a world where breastfeeding is simplified, supported, and normalized. Through technology and community networking, we aim to bridge the gap between medical expertise and daily maternal care.
                    </p>
                </section>

                <section class="bg-surface-dark rounded-[4rem] p-12 md:p-20 text-white relative overflow-hidden shadow-suspended reveal-on-scroll">
                    <div class="absolute inset-0 bg-grain opacity-10"></div>
                    <div class="relative z-10">
                        <h4 class="font-outfit font-black text-3xl mb-8 tracking-tight">The Team</h4>
                        <p class="text-white/40 text-lg md:text-xl font-medium leading-relaxed max-w-2xl">
                            Milky Way is led by a diverse team of maternal health experts, certified lactation consultants, and dedicated software engineers committed to maternal well-being and clinical excellence.
                        </p>
                        
                        <div class="mt-16 pt-16 border-t border-white/10 grid grid-cols-2 md:grid-cols-4 gap-12">
                             <div>
                                 <p class="text-xs font-black uppercase tracking-widest text-maternal-rose mb-2">Expertise</p>
                                 <p class="text-sm font-medium text-white/70">Clinical Care</p>
                             </div>
                             <div>
                                 <p class="text-xs font-black uppercase tracking-widest text-maternal-rose mb-2">Network</p>
                                 <p class="text-sm font-medium text-white/70">Global Reach</p>
                             </div>
                             <div>
                                 <p class="text-xs font-black uppercase tracking-widest text-maternal-rose mb-2">Tech</p>
                                 <p class="text-sm font-medium text-white/70">AI Driven</p>
                             </div>
                             <div>
                                 <p class="text-xs font-black uppercase tracking-widest text-maternal-rose mb-2">Support</p>
                                 <p class="text-sm font-medium text-white/70">24/7 Response</p>
                             </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
