<x-landing-layout>
    <x-hero />

    <!-- Features Section -->
    <section id="features" class="py-40 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="mb-32">
                <span class="text-[11px] font-bold tracking-[0.3em] uppercase text-maternal-rose mb-6 block">Capabilities</span>
                <h2 class="text-4xl md:text-6xl font-bold text-maternal-brown tracking-tight mb-8">Everything you need, <br><span class="text-maternal-brown/30">nothing you don't.</span></h2>
                <p class="text-xl text-maternal-brown/40 max-w-2xl leading-relaxed">Thoughtfully designed tools and resources to support your journey from day one.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-24">
                <!-- Feature 1 -->
                <a href="{{ route('education.index') }}" class="group cursor-pointer">
                    <div class="mb-8 overflow-hidden rounded-3xl bg-maternal-peach/30 aspect-[4/3] flex items-center justify-center p-12 group-hover:shadow-luxury-hover group-hover:-translate-y-2 transition-all duration-500">
                        <svg class="w-16 h-16 text-maternal-rose/40 group-hover:text-maternal-rose transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 10l4.553 2.276A1 1 0 0120 13.186V17.8a1 1 0 01-1.447.894L15 17V10zM5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-maternal-brown mb-4 tracking-tight">Watch Education</h3>
                    <p class="text-maternal-brown/40 leading-relaxed text-[15px]">Expert-led video tutorials on latching, positions, and breastfeeding techniques, distilled for clarity.</p>
                </a>

                <!-- Feature 2 -->
                <div class="group cursor-pointer">
                    <div class="mb-8 overflow-hidden rounded-3xl bg-maternal-sage/20 aspect-[4/3] flex items-center justify-center p-12 group-hover:shadow-luxury-hover group-hover:-translate-y-2 transition-all duration-500">
                        <svg class="w-16 h-16 text-maternal-sage/60 group-hover:text-maternal-sage transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-maternal-brown mb-4 tracking-tight">Local Clinics</h3>
                    <p class="text-maternal-brown/40 leading-relaxed text-[15px]">A curated atlas of verified breastfeeding-friendly stations and clinics near you.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group cursor-pointer">
                    <div class="mb-8 overflow-hidden rounded-3xl bg-maternal-peach/20 aspect-[4/3] flex items-center justify-center p-12 group-hover:shadow-luxury-hover group-hover:-translate-y-2 transition-all duration-500">
                        <svg class="w-16 h-16 text-maternal-brown/20 group-hover:text-maternal-brown/40 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-maternal-brown mb-4 tracking-tight">24/7 Support</h3>
                    <p class="text-maternal-brown/40 leading-relaxed text-[15px]">Immediate access to priority hotlines and a community of care, whenever you need it most.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-40 bg-maternal-gray-soft">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div>
                    <span class="text-[11px] font-bold tracking-[0.3em] uppercase text-maternal-rose mb-6 block">Methodology</span>
                    <h2 class="text-5xl font-bold text-maternal-brown mb-12 tracking-tight leading-[1.1]">Your health journey, <br>distilled.</h2>
                    
                    <div class="space-y-16">
                        <div class="flex gap-8 group">
                            <span class="flex-shrink-0 w-8 h-8 rounded-full border border-maternal-brown/20 flex items-center justify-center text-[11px] font-bold text-maternal-brown group-hover:bg-maternal-brown group-hover:text-white transition-all duration-300">01</span>
                            <div>
                                <h4 class="text-lg font-bold text-maternal-brown mb-3 tracking-tight">Onboarding</h4>
                                <p class="text-maternal-brown/50 text-[15px] leading-relaxed">Join our ecosystem and share your journey to receive a curated care path.</p>
                            </div>
                        </div>
                        <div class="flex gap-8 group">
                            <span class="flex-shrink-0 w-8 h-8 rounded-full border border-maternal-brown/20 flex items-center justify-center text-[11px] font-bold text-maternal-brown group-hover:bg-maternal-brown group-hover:text-white transition-all duration-300">02</span>
                            <div>
                                <h4 class="text-lg font-bold text-maternal-brown mb-3 tracking-tight">Discovery</h4>
                                <p class="text-maternal-brown/50 text-[15px] leading-relaxed">Explore expert-vetted knowledge and instructional resources tailored for you.</p>
                            </div>
                        </div>
                        <div class="flex gap-8 group">
                            <span class="flex-shrink-0 w-8 h-8 rounded-full border border-maternal-brown/20 flex items-center justify-center text-[11px] font-bold text-maternal-brown group-hover:bg-maternal-brown group-hover:text-white transition-all duration-300">03</span>
                            <div>
                                <h4 class="text-lg font-bold text-maternal-brown mb-3 tracking-tight">Connection</h4>
                                <p class="text-maternal-brown/50 text-[15px] leading-relaxed">Locate immediate resources nearby and track your progress with precision.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[4/5] bg-white rounded-[3rem] shadow-luxury p-12 flex flex-col items-center justify-center text-center overflow-hidden border border-maternal-peach/30">
                         <div class="w-24 h-24 bg-maternal-peach/20 rounded-3xl mb-8 flex items-center justify-center">
                            <x-application-logo class="w-12 h-12 text-maternal-rose/40" />
                         </div>
                         <h5 class="text-xl font-bold text-maternal-brown mb-4 tracking-tight">Milky Way App</h5>
                         <p class="text-maternal-brown/30 text-sm font-medium">Experience the future of care.</p>
                         
                         <!-- Abstract UI elements -->
                         <div class="mt-12 w-full space-y-4 px-8 opacity-20">
                             <div class="h-2 w-full bg-maternal-brown rounded-full"></div>
                             <div class="h-2 w-2/3 bg-maternal-brown rounded-full mx-auto"></div>
                         </div>
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-maternal-rose/10 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust & Safety Section -->
    <section class="py-40 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="bg-maternal-brown rounded-[4rem] p-16 md:p-32 relative overflow-hidden">
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                    <div>
                        <span class="text-[11px] font-bold tracking-[0.3em] uppercase text-maternal-rose mb-8 block">Safety First</span>
                        <h2 class="text-4xl md:text-6xl font-bold text-white mb-10 tracking-tight leading-[1.1]">Medical-grade trust, <br><span class="text-maternal-rose">mother-approved</span> care.</h2>
                        <p class="text-white/40 text-lg mb-12 leading-relaxed">Privacy is at the core of everything we do. Your journey is protected by industry-standard encryption and vetted by leading professionals.</p>
                        
                        <div class="flex flex-wrap gap-12">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-maternal-rose" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3z"/></svg>
                                </div>
                                <span class="text-white/80 font-medium text-sm tracking-wide uppercase">Encrypted</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-maternal-rose" fill="currentColor" viewBox="0 0 24 24"><path d="M10 15l-3.5-3.5 1.42-1.42L10 12.17l5.58-5.59L17 8l-7 7z"/></svg>
                                </div>
                                <span class="text-white/80 font-medium text-sm tracking-wide uppercase">Vetted</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end">
                        <div class="bg-white/5 backdrop-blur-2xl p-12 rounded-[2.5rem] border border-white/10 max-w-md">
                            <p class="text-white/80 mb-10 italic text-xl leading-relaxed">"Milky Way has been an invaluable companion. Having professional advice and clinic locations in one place gave me so much peace of mind."</p>
                            <div class="flex items-center space-x-5">
                                <div class="w-14 h-14 bg-maternal-gray-soft rounded-full overflow-hidden opacity-50"></div>
                                <div>
                                    <h5 class="text-white font-bold tracking-tight">Maria Santos</h5>
                                    <p class="text-white/30 text-xs uppercase tracking-widest mt-1">First-time Mother</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/[0.03] rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-maternal-rose/[0.02] rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
            </div>
        </div>
    </section>

</x-landing-layout>
