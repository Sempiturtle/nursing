<x-landing-layout>
    <x-hero />

    <!-- Bento Features Section -->
    <section id="features" class="py-32 bg-surface-base relative overflow-hidden">
        <div class="absolute inset-0 bg-grain"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-24 reveal-on-scroll">
                <div class="max-w-3xl">
                    <span class="text-[11px] font-bold tracking-[0.4em] uppercase text-maternal-rose mb-6 block">Capabilities</span>
                    <h2 class="text-4xl md:text-6xl font-black text-text-primary tracking-[-0.03em] leading-[1.05]">Infrastructure for the <br><span class="text-text-muted italic">modern mother.</span></h2>
                </div>
                <div class="mt-8 lg:mt-0 max-w-sm">
                    <p class="text-text-dimmed font-medium leading-relaxed">Thoughtfully designed tools and professional resources to support your journey from day zero.</p>
                </div>
            </div>
            
            <!-- Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 reveal-on-scroll">
                <!-- Large Card -->
                <div class="md:col-span-8 group relative overflow-hidden rounded-[2.5rem] bg-surface-dim border border-maternal-black/5 p-12 hover:shadow-suspended transition-all duration-700">
                    <div class="absolute top-0 right-0 p-12 opacity-10 group-hover:scale-110 transition-transform duration-700">
                        <svg class="w-48 h-48 text-maternal-rose" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M15 10l4.553 2.276A1 1 0 0120 13.186V17.8a1 1 0 01-1.447.894L15 17V10zM5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="relative z-10 flex flex-col h-full justify-between max-w-md">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-maternal-rose/10 flex items-center justify-center mb-10 text-maternal-rose">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553 2.276A1 1 0 0120 13.186V17.8a1 1 0 01-1.447.894L15 17V10zM5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-3xl font-black mb-6">Expert Education</h3>
                            <p class="text-text-dimmed text-lg font-medium leading-relaxed">Access our proprietary library of expert-led video tutorials. We've distilled clinical knowledge into actionable, beautiful content for lactation techniques and infant care.</p>
                        </div>
                        <div class="pt-10">
                            <a href="{{ route('education.index') }}" class="inline-flex items-center text-maternal-rose font-bold text-sm uppercase tracking-wider group/link">
                                <span>Browse Library</span>
                                <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Small Card 1 -->
                <div class="md:col-span-4 group relative overflow-hidden rounded-[2.5rem] bg-maternal-rose text-white p-10 hover:shadow-suspended transition-all duration-700">
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center mb-8">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-black mb-4">Local Atlas</h3>
                            <p class="text-white/80 font-medium tracking-tight">A curated directory of verified breastfeeding-friendly stations across the region.</p>
                        </div>
                        <div class="pt-10">
                            <div class="h-1 w-full bg-white/20 rounded-full overflow-hidden">
                                <div class="h-full bg-white rounded-full w-2/3 group-hover:w-full transition-all duration-1000"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Small Card 2 -->
                <div class="md:col-span-4 group relative overflow-hidden rounded-[2.5rem] bg-surface-dim border border-maternal-black/5 p-10 hover:shadow-suspended transition-all duration-700">
                     <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-text-primary/5 flex items-center justify-center mb-8 text-text-primary">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-black mb-4 tracking-[-0.02em]">24/7 Hotline</h3>
                            <p class="text-text-dimmed font-medium tracking-tight">Immediate access to priority care networks whenever you need them most.</p>
                        </div>
                    </div>
                </div>

                <!-- Medium Card -->
                <div class="md:col-span-8 group relative overflow-hidden rounded-[2.5rem] bg-surface-dim border border-maternal-black/5 p-12 hover:shadow-suspended transition-all duration-700">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 items-center h-full">
                        <div class="relative z-10">
                            <h3 class="text-3xl font-black mb-6 tracking-tight">Personalized Care Path</h3>
                            <p class="text-text-dimmed text-lg font-medium leading-relaxed">Our infrastructure adapts to your unique journey, providing a tailored path of discovery and connection.</p>
                        </div>
                        <div class="relative flex justify-center">
                            <div class="w-48 h-48 bg-maternal-rose/5 rounded-full flex items-center justify-center animate-float-gentle">
                                <div class="w-32 h-32 bg-white rounded-3xl shadow-luxury flex items-center justify-center">
                                    <x-application-logo class="w-16 h-16 text-maternal-rose opacity-20" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Professional Process Section -->
    <section id="how-it-works" class="py-32 bg-surface-dim relative overflow-hidden">
        <div class="absolute inset-0 bg-grain"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-center mb-24 reveal-on-scroll">
                <span class="text-[11px] font-bold tracking-[0.4em] uppercase text-maternal-rose mb-6 block">Our Process</span>
                <h2 class="text-5xl md:text-6xl font-black text-text-primary mb-10 tracking-[-0.03em]">How we <span class="text-text-muted italic">empower</span> you.</h2>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 relative">
                <!-- Connector Line -->
                <div class="hidden lg:block absolute top-16 left-0 w-full h-px bg-maternal-black/5 px-24"></div>
                
                <!-- Step 1 -->
                <div class="relative reveal-on-scroll stagger-delay-1">
                    <div class="w-16 h-16 rounded-2xl bg-surface-base border border-maternal-black/5 shadow-luxury flex items-center justify-center font-black text-xl mb-10 relative z-10 group-hover:bg-maternal-black group-hover:text-white transition-colors">01</div>
                    <h4 class="text-2xl font-black mb-4 tracking-tight">Onboarding</h4>
                    <p class="text-text-dimmed font-medium leading-relaxed">Join our ecosystem and share your milestones. We curate a specialized path built around your specific needs.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative reveal-on-scroll stagger-delay-2">
                    <div class="w-16 h-16 rounded-2xl bg-surface-base border border-maternal-black/5 shadow-luxury flex items-center justify-center font-black text-xl mb-10 relative z-10">02</div>
                    <h4 class="text-2xl font-black mb-4 tracking-tight">Discovery</h4>
                    <p class="text-text-dimmed font-medium leading-relaxed">Explore agency-grade knowledge and expert-vetted resources tailored specifically for your current stage.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative reveal-on-scroll stagger-delay-3">
                    <div class="w-16 h-16 rounded-2xl bg-maternal-black text-white shadow-suspended flex items-center justify-center font-black text-xl mb-10 relative z-10 animate-float-gentle">03</div>
                    <h4 class="text-2xl font-black mb-4 tracking-tight">Connection</h4>
                    <p class="text-text-dimmed font-medium leading-relaxed">Bridge your digital journey with physical care locations and immediate community support networks.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Communities & Feedback Section -->
    <section class="py-32 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-grain"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="bg-maternal-black rounded-[4rem] p-16 md:p-24 lg:p-32 relative overflow-hidden reveal-on-scroll">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_100%_0%,rgba(198,137,137,0.15)_0%,transparent_50%)]"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                    <div>
                        <span class="text-[11px] font-bold tracking-[0.4em] uppercase text-maternal-rose mb-10 block">Suspended Care</span>
                        <h2 class="text-4xl md:text-6xl font-bold text-white mb-10 tracking-tight leading-[1.05]">Mother-approved <br><span class="text-maternal-rose italic">sophistication.</span></h2>
                        <p class="text-white/40 text-lg mb-16 leading-relaxed font-medium">Privacy is at the core of everything we do. Your journey is protected by industry-standard encryption and vetted by leading professionals.</p>
                        
                        <div class="flex flex-wrap gap-12">
                            <div class="flex items-center space-x-5 group">
                                <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center group-hover:bg-white/10 transition-colors animate-suspend">
                                    <svg class="w-6 h-6 text-maternal-rose" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3z"/></svg>
                                </div>
                                <span class="text-white/70 font-bold text-[12px] tracking-[0.2em] uppercase">Encrypted</span>
                            </div>
                            <div class="flex items-center space-x-5 group">
                                <div class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center group-hover:bg-white/10 transition-colors animate-suspend" style="animation-delay: -1s;">
                                    <svg class="w-6 h-6 text-maternal-rose" fill="currentColor" viewBox="0 0 24 24"><path d="M10 15l-3.5-3.5 1.42-1.42L10 12.17l5.58-5.59L17 8l-7 7z"/></svg>
                                </div>
                                <span class="text-white/70 font-bold text-[12px] tracking-[0.2em] uppercase">Verified</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-8">
                        @if($feedbacks->count() > 0)
                            <div class="space-y-6">
                                @foreach($feedbacks as $feedback)
                                    <div class="glass-morphism !bg-white/5 p-8 rounded-[2.5rem] border border-white/10 hover:bg-white/10 transition-all duration-500 reveal-on-scroll stagger-{{ $loop->iteration }}">
                                        <div class="flex items-center justify-between mb-6">
                                            <div class="flex items-center gap-1.5">
                                                @for($i = 0; $i < 5; $i++)
                                                    <div class="w-1.5 h-1.5 rounded-full {{ $i < $feedback->rating ? 'bg-maternal-rose' : 'bg-white/10' }}"></div>
                                                @endfor
                                            </div>
                                            <span class="text-[10px] uppercase tracking-[0.3em] text-white/20 font-bold">Review</span>
                                        </div>
                                        <p class="text-white/80 mb-8 italic text-lg leading-relaxed font-serif">"{{ $feedback->comment }}"</p>
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-maternal-rose font-bold text-sm border border-white/10 animate-float">
                                                {{ strtoupper(substr($feedback->name ?? 'U', 0, 1)) }}
                                            </div>
                                            <div>
                                                <h5 class="text-white font-bold tracking-tight text-[15px]">{{ $feedback->name ?? 'Anonymous User' }}</h5>
                                                <p class="text-white/30 text-[10px] uppercase tracking-[0.3em] mt-1 font-bold">Verified Mother</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="glass-morphism !bg-white/5 p-12 rounded-[3.5rem] border border-white/10 animate-suspend">
                                <p class="text-white/80 mb-12 italic text-2xl leading-relaxed font-serif">"Milky Way has been an invaluable companion. Professional advice suspended in care, giving me peace of mind."</p>
                                <div class="flex items-center space-x-6">
                                    <div class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center border border-white/5 block overflow-hidden">
                                        <div class="w-full h-full bg-maternal-rose/20 animate-pulse"></div>
                                    </div>
                                    <div>
                                        <h5 class="text-white font-bold tracking-tight text-lg">Maria Santos</h5>
                                        <p class="text-white/30 text-[10px] uppercase tracking-[0.3em] mt-1 font-bold">First-time Mother</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-landing-layout>
