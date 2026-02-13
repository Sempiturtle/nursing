<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-surface-base pt-32 pb-24">
    <!-- Subtle Agency Background -->
    <div class="absolute inset-0 bg-grain"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--color-surface-accent-soft)_0%,rgba(255,255,255,0)_70%)]"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-8 text-center lg:text-left reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 rounded-full bg-maternal-rose/5 border border-maternal-rose/10 text-[11px] font-bold tracking-[0.3em] uppercase text-maternal-rose mb-10 animate-float-gentle">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span>Agency Grade Support</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl xl:text-display font-black text-text-primary leading-[0.95] tracking-[-0.04em] mb-10">
                    Nurturing the <br>
                    <span class="text-maternal-rose">Milky Way</span> ecosystem.
                </h1>
                
                <p class="text-lg md:text-xl text-text-dimmed font-medium leading-relaxed mb-12 max-w-2xl mx-auto lg:mx-0 tracking-tight">
                    The first-of-its-kind infrastructure for maternal care. We bridge professional guidance with community support to empower every step of your journey.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-6">
                    <a href="{{ route('register') }}" 
                       class="btn-agency-primary px-10 py-5 w-full sm:w-auto shadow-suspended">
                        Get Started Today — Free
                    </a>
                    <a href="#how-it-works" 
                       class="btn-agency-secondary px-10 py-5 w-full sm:w-auto group">
                        <span>How it works</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

                <!-- Metrics / Social Proof Counter (Built-in for Agency Feel) -->
                <div class="mt-20 pt-12 border-t border-maternal-black/5 grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center lg:text-left">
                        <div class="text-2xl font-bold text-text-primary mb-1 tracking-tight">12k+</div>
                        <div class="text-[10px] uppercase tracking-[0.2em] font-bold text-text-muted">Mothers Supported</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-2xl font-bold text-text-primary mb-1 tracking-tight">450+</div>
                        <div class="text-[10px] uppercase tracking-[0.2em] font-bold text-text-muted">Verified Clinics</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-2xl font-bold text-text-primary mb-1 tracking-tight">24/7</div>
                        <div class="text-[10px] uppercase tracking-[0.2em] font-bold text-text-muted">Expert Support</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-2xl font-bold text-text-primary mb-1 tracking-tight">98%</div>
                        <div class="text-[10px] uppercase tracking-[0.2em] font-bold text-text-muted">Success Rate</div>
                    </div>
                </div>
            </div>

            <!-- Visual Decorative Element (Abstract / Agency Style) -->
            <div class="hidden lg:block lg:col-span-4 relative h-full">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[radial-gradient(circle,rgba(198,137,137,0.1)_0%,transparent_70%)] animate-float-gentle"></div>
                <div class="relative z-10 glass-morphism rounded-[3rem] p-12 shadow-suspended border border-white/40">
                    <div class="w-16 h-16 bg-maternal-black rounded-2xl flex items-center justify-center mb-8 shadow-luxury">
                        <x-application-logo class="w-8 h-8 text-white" />
                    </div>
                    <div class="space-y-4 mb-8">
                        <div class="h-2 w-3/4 bg-maternal-black/10 rounded-full"></div>
                        <div class="h-2 w-1/2 bg-maternal-black/10 rounded-full"></div>
                    </div>
                    <div class="flex items-center space-x-4 pt-8 border-t border-maternal-black/5">
                        <div class="w-10 h-10 rounded-full bg-maternal-rose/20"></div>
                        <div class="flex-1 space-y-2">
                            <div class="h-2 w-1/2 bg-maternal-black/10 rounded-full"></div>
                            <div class="h-1.5 w-1/3 bg-maternal-black/5 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
