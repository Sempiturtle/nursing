<x-app-layout>
    <div class="py-12 bg-surface-dim min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-grain pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <!-- Agency Welcome Hero -->
            <div class="relative overflow-hidden bg-surface-dark rounded-[3rem] p-12 md:p-20 mb-16 shadow-suspended reveal-on-scroll">
                <!-- Advanced Decorative Elements -->
                <div class="absolute top-0 right-0 w-[45rem] h-[45rem] bg-[radial-gradient(circle,rgba(198,137,137,0.15)_0%,transparent_70%)] -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-[radial-gradient(circle,rgba(163,163,147,0.08)_0%,transparent_70%)] translate-y-1/2 -translate-x-1/2"></div>
                
                <div class="relative z-10 flex flex-col md:grid md:grid-cols-12 items-center gap-12">
                    <div class="md:col-span-8 text-center md:text-left">
                        <div class="inline-flex items-center space-x-3 px-3 py-1 bg-white/5 border border-white/10 rounded-full mb-8">
                             <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                            </span>
                            <span class="text-[10px] font-black text-white/70 uppercase tracking-[0.3em]">Mother's Ecosystem</span>
                        </div>
                        
                        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-[1.05] tracking-tight">
                            Welcome back, <br><span class="text-maternal-rose italic">{{ Auth::user()->name }}</span>
                        </h1>
                        
                        <p class="text-white/40 text-lg md:text-xl font-medium leading-relaxed mb-10 max-w-2xl">
                            Your journey is unique, and our infrastructure is here to support every milestone. Explore expert-vetted guides and specialized local resources today.
                        </p>
                        
                        <div class="flex flex-wrap justify-center md:justify-start gap-6">
                            <a href="{{ route('education.index') }}" class="btn-agency-primary !bg-white !text-surface-dark hover:!bg-maternal-gray-soft">
                                Start Learning
                            </a>
                            <a href="{{ route('education.news') }}" class="btn-agency-secondary !bg-white/5 !border-white/10 !text-white hover:!bg-white/10">
                                Latest News
                            </a>
                        </div>
                    </div>
                    
                    <div class="hidden md:flex md:col-span-4 justify-end">
                         <div class="w-64 h-64 glass-morphism-dark rounded-[3.5rem] flex items-center justify-center rotate-6 shadow-suspended animate-float-gentle">
                             <x-application-logo class="w-24 h-24 text-maternal-rose opacity-40 blur-[1px]" />
                         </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Main Infrastructure Area -->
                <div class="lg:col-span-8 space-y-12">
                    
                    <!-- Quick Action Bento -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 reveal-on-scroll">
                        <!-- Education Card -->
                        <a href="{{ route('education.index') }}" class="group relative bg-surface-base rounded-[2.5rem] p-10 border border-maternal-black/5 hover:shadow-luxury-hover transition-all duration-700 overflow-hidden reveal-on-scroll stagger-delay-1">
                            <div class="absolute top-[-20%] right-[-10%] opacity-5 group-hover:scale-110 transition-transform duration-1000">
                                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.434.29-3.48.804v10a7.969 7.969 0 013.48-.804c1.336 0 2.577.327 3.664.91a.5.5 0 00.672-.117l.004-.005a.5.5 0 00-.001-.652c-1.157-1.023-2.636-1.636-4.24-1.636a7.971 7.971 0 00-3.48.804V4.804A7.968 7.968 0 015.5 4c1.255 0 2.434.29 3.48.804v10a7.969 7.969 0 013.48-.804c1.336 0 2.577.327 3.664.91a.5.5 0 00.672-.117l.004-.005a.5.5 0 00-.001-.652c-1.157-1.023-2.636-1.636-4.24-1.636a7.971 7.971 0 00-3.48.804V4.804z"/></svg>
                            </div>
                            <div class="w-16 h-16 bg-surface-dark text-white rounded-2xl flex items-center justify-center mb-8 shadow-luxury group-hover:rotate-6 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553 2.276A1 1 0 0120 13.186V17.8a1 1 0 01-1.447.894L15 17V10zM5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-black text-text-primary mb-3 tracking-tight">Watch Education</h3>
                            <p class="text-text-dimmed text-base font-medium leading-relaxed mb-10">Access our proprietary library of expert-led video tutorials on techniques and care.</p>
                            <span class="inline-flex items-center text-maternal-rose font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-500">
                                Open Gallery 
                                <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>

                        <!-- Support Card -->
                        <a href="{{ route('support.clinics') }}" class="group relative bg-surface-base rounded-[2.5rem] p-10 border border-maternal-black/5 hover:shadow-luxury-hover transition-all duration-700 overflow-hidden reveal-on-scroll stagger-delay-2">
                            <div class="absolute bottom-[-10%] right-[-10%] opacity-5 group-hover:scale-110 transition-transform duration-1000">
                                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="w-16 h-16 bg-maternal-rose text-white rounded-2xl flex items-center justify-center mb-8 shadow-luxury group-hover:-rotate-6 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-black text-text-primary mb-3 tracking-tight">Support Atlas</h3>
                            <p class="text-text-dimmed text-base font-medium leading-relaxed mb-10">Locate the nearest verified clinic and support stations in your local community.</p>
                            <span class="inline-flex items-center text-maternal-rose font-black text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-500">
                                View Locations 
                                <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>
                    </div>

                    <!-- Discovery News Row -->
                    <div class="bg-white rounded-[2.5rem] p-10 md:p-12 border border-maternal-black/5 shadow-luxury reveal-on-scroll">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-12">
                            <div>
                                <h4 class="text-3xl font-black text-text-primary tracking-tight">Recent Discovery</h4>
                                <p class="text-text-muted text-sm font-medium mt-1">Updates distilled by our specialized medical team.</p>
                            </div>
                            <a href="{{ route('education.news') }}" class="btn-agency-secondary !py-2.5 !px-6 !text-[11px] !rounded-xl">View Archive</a>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- News 1 -->
                            <div class="flex flex-col sm:flex-row items-start gap-6 group cursor-pointer reveal-on-scroll stagger-delay-1">
                                <div class="w-20 h-20 bg-surface-dim rounded-3xl flex-shrink-0 flex items-center justify-center text-text-muted group-hover:bg-text-primary group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-luxury">
                                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V9a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2z"></path></svg>
                                </div>
                                <div class="py-1">
                                     <span class="text-maternal-rose text-[10px] font-black uppercase tracking-[0.2em] block mb-3">Health Insights</span>
                                     <h5 class="text-text-primary font-black text-lg leading-snug group-hover:text-maternal-rose transition-colors duration-300 line-clamp-2">Understanding Early Growth Frameworks</h5>
                                     <p class="text-[11px] text-text-muted mt-3 font-bold uppercase tracking-wider">Medical Editorial — 2m Read</p>
                                </div>
                            </div>
                            <!-- News 2 -->
                            <div class="flex flex-col sm:flex-row items-start gap-6 group cursor-pointer reveal-on-scroll stagger-delay-2">
                                <div class="w-20 h-20 bg-surface-dim rounded-3xl flex-shrink-0 flex items-center justify-center text-text-muted group-hover:bg-text-primary group-hover:text-white transition-all duration-500 shadow-sm group-hover:shadow-luxury">
                                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <div class="py-1">
                                     <span class="text-text-muted text-[10px] font-black uppercase tracking-[0.2em] block mb-3">Community Hub</span>
                                     <h5 class="text-text-primary font-black text-lg leading-snug group-hover:text-text-muted transition-colors duration-300 line-clamp-2">New Support Architecture in South Region</h5>
                                     <p class="text-[11px] text-text-muted mt-3 font-bold uppercase tracking-wider">Next Monday — Launch</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Strategic Sidebar Area -->
                <div class="lg:col-span-4 space-y-8">
                    <div class="sticky top-32 space-y-8">
                        <!-- Feedback Integration Console -->
                        <div id="feedback-section" class="bg-surface-base rounded-[3rem] p-10 border border-maternal-black/5 shadow-luxury relative overflow-hidden reveal-on-scroll">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-[radial-gradient(circle,rgba(198,137,137,0.08)_0%,transparent_70%)] -translate-y-1/2 translate-x-1/2 blur-2xl"></div>
                            
                            <h3 class="text-2xl font-black text-text-primary mb-2 tracking-tight">Voice Your Experience</h3>
                            <p class="text-text-dimmed text-sm mb-10 font-medium leading-relaxed">Help us refine the Milky Way infrastructure. Your insights drive our specialized evolution.</p>

                            @if(session('success'))
                                <div class="bg-surface-accent-soft text-maternal-rose text-xs font-bold p-5 rounded-2xl mb-10 border border-maternal-rose/10 animate-float-gentle text-center">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('feedback.store') }}" method="POST" class="space-y-8">
                                @csrf
                                <div x-data="{ rating: 5 }" class="space-y-4">
                                    <div class="flex justify-between items-center px-1">
                                        <label class="text-[10px] font-black text-text-muted uppercase tracking-[0.3em]">Quality Rating</label>
                                        <span class="text-maternal-rose font-black text-xs" x-text="rating + ' / 5'"></span>
                                    </div>
                                    <div class="flex space-x-3 bg-surface-dim/50 p-4 rounded-2xl justify-center">
                                        <template x-for="i in 5">
                                            <button type="button" @click="rating = i" class="transition-all duration-500 transform hover:scale-125 focus:outline-none">
                                                <svg class="w-8 h-8" :class="i <= rating ? 'text-maternal-rose fill-current filter drop-shadow-[0_0_8px_rgba(198,137,137,0.3)]' : 'text-maternal-black/5'" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </button>
                                        </template>
                                        <input type="hidden" name="rating" x-model="rating">
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <label class="text-[10px] font-black text-text-muted uppercase tracking-[0.3em] px-1">Integrated Message</label>
                                    <textarea name="comment" rows="5" class="w-full bg-surface-dim/50 border border-maternal-black/5 rounded-3xl text-text-primary placeholder:text-text-muted focus:bg-white focus:border-maternal-rose focus:ring-4 focus:ring-maternal-rose/5 transition-all duration-700 text-sm font-medium leading-relaxed p-6" placeholder="Share your milestones or suggest optimizations..."></textarea>
                                    @error('comment')
                                        <p class="text-maternal-rose text-[10px] font-bold mt-2 ps-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="w-full btn-agency-primary shadow-suspended">
                                    <span>Submit Response</span>
                                    <svg class="w-4 h-4 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </form>
                        </div>

                        <!-- Infrastructure Status Console -->
                        <div class="bg-surface-dark text-white rounded-3xl p-6 shadow-luxury flex items-center justify-between border border-white/5 reveal-on-scroll">
                             <div class="flex items-center space-x-4">
                                 <span class="relative flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-maternal-rose"></span>
                                 </span>
                                 <span class="text-[11px] font-black uppercase tracking-[0.3em] text-white/60">Core Status Active</span>
                             </div>
                             <a href="{{ route('support.hotlines') }}" class="text-[11px] font-black uppercase tracking-widest text-maternal-rose hover:text-white transition-colors duration-300">Get Help</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
