<x-app-layout>
    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Pro Welcome Hero -->
            <div class="relative overflow-hidden bg-maternal-brown rounded-[3.5rem] p-12 md:p-20 mb-16 shadow-[0_25px_50px_-12px_rgba(61,48,40,0.4)]">
                <!-- Abstract Decorative Elements -->
                <div class="absolute top-0 right-0 w-[40rem] h-[40rem] bg-gradient-to-br from-maternal-rose/20 to-transparent rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-80 h-80 bg-maternal-sage/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-2xl"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12 text-center md:text-left">
                    <div class="max-w-xl">
                        <span class="inline-block px-4 py-1.5 bg-maternal-rose text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-full mb-6 shadow-lg shadow-maternal-rose/30">Mother's Dashboard</span>
                        <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Welcome back, <br><span class="text-maternal-peach">{{ Auth::user()->name }}</span></h2>
                        <p class="text-white/90 text-lg md:text-xl font-medium leading-relaxed">Your journey is unique, and we're here to make it smoother. Explore new expert guides or check specialized clinic updates today.</p>
                        
                        <div class="mt-10 flex flex-wrap justify-center md:justify-start gap-4">
                            <a href="{{ route('education.index') }}" class="px-8 py-4 bg-maternal-peach text-maternal-brown rounded-2xl font-bold hover:bg-white transition-all duration-300 shadow-xl shadow-black/10">Start Learning</a>
                            <a href="{{ route('education.news') }}" class="px-8 py-4 bg-white/10 text-white rounded-2xl font-bold hover:bg-white/20 backdrop-blur-md transition-all duration-300 border border-white/10">Read Latest News</a>
                        </div>
                    </div>
                    <div class="hidden lg:block relative">
                         <div class="w-64 h-64 bg-white/5 rounded-[4rem] flex items-center justify-center backdrop-blur-3xl border border-white/10 rotate-12">
                             <x-application-logo class="w-32 h-32 text-maternal-rose animate-pulse" />
                         </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Main Content Area -->
                <div class="lg:col-span-8 space-y-12">
                    
                    <!-- Quick Actions Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Educational Card -->
                        <a href="{{ route('education.index') }}" class="group relative bg-white rounded-[2.5rem] p-10 border-2 border-maternal-peach/50 hover:shadow-[0_40px_80px_-15px_rgba(209,154,154,0.3)] transition-all duration-500 overflow-hidden shadow-sm">
                            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:scale-125 transition duration-700">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.434.29-3.48.804v10a7.969 7.969 0 013.48-.804c1.336 0 2.577.327 3.664.91a.5.5 0 00.672-.117l.004-.005a.5.5 0 00-.001-.652c-1.157-1.023-2.636-1.636-4.24-1.636a7.971 7.971 0 00-3.48.804V4.804A7.968 7.968 0 015.5 4c1.255 0 2.434.29 3.48.804v10a7.969 7.969 0 013.48-.804c1.336 0 2.577.327 3.664.91a.5.5 0 00.672-.117l.004-.005a.5.5 0 00-.001-.652c-1.157-1.023-2.636-1.636-4.24-1.636a7.971 7.971 0 00-3.48.804V4.804z"/></svg>
                            </div>
                            <div class="w-16 h-16 bg-maternal-rose text-white rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-maternal-rose/30 group-hover:rotate-6 transition duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553 2.276A1 1 0 0120 13.186V17.8a1 1 0 01-1.447.894L15 17V10zM5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-maternal-brown mb-3 tracking-tight">Watch & Learn</h3>
                            <p class="text-maternal-brown/85 text-base font-medium leading-relaxed mb-8">Access our complete library of high-definition instructional videos led by certified lactation experts.</p>
                            <span class="inline-flex items-center text-maternal-rose font-bold text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-300">
                                Open Gallery <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>

                        <!-- Clinic Card -->
                        <a href="{{ route('support.clinics') }}" class="group relative bg-white rounded-[2.5rem] p-10 border-2 border-maternal-peach/50 hover:shadow-[0_40px_80px_-15px_rgba(183,183,164,0.3)] transition-all duration-500 overflow-hidden shadow-sm">
                            <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:scale-125 transition duration-700">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="w-16 h-16 bg-maternal-sage text-white rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-maternal-sage/30 group-hover:rotate-6 transition duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-maternal-brown mb-3 tracking-tight">Support Nearby</h3>
                            <p class="text-maternal-brown/85 text-base font-medium leading-relaxed mb-8">Locate the nearest breastfeeding stations and verified clinics in your local community.</p>
                            <span class="inline-flex items-center text-maternal-rose font-bold text-xs uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform duration-300">
                                View Locations <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>
                    </div>

                    <!-- News & Community Section -->
                    <div class="bg-white/80 backdrop-blur-xl rounded-[2.5rem] p-10 md:p-12 border border-white/50 shadow-xl shadow-maternal-peach/20">
                        <div class="flex items-center justify-between mb-10">
                            <div>
                                <h4 class="text-2xl font-bold text-maternal-brown tracking-tight">Recent Discovery</h4>
                                <p class="text-maternal-brown/70 text-sm mt-1 font-medium">Stay updated with the latest from our medical team.</p>
                            </div>
                            <a href="{{ route('education.news') }}" class="text-maternal-rose font-black text-xs uppercase tracking-widest hover:underline transition">View All News</a>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="flex items-start space-x-6 group">
                                <div class="w-20 h-20 bg-maternal-peach/20 rounded-3xl flex-shrink-0 flex items-center justify-center text-maternal-rose group-hover:bg-maternal-rose group-hover:text-white transition-all duration-500">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V9a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2z"></path></svg>
                                </div>
                                <div class="py-2">
                                     <span class="text-maternal-rose text-[10px] font-black uppercase tracking-widest block mb-2">New Article</span>
                                     <h5 class="text-maternal-brown font-bold text-lg leading-tight group-hover:text-maternal-rose transition cursor-pointer line-clamp-2">"Understanding Early Growth Milestones"</h5>
                                     <p class="text-xs text-maternal-brown/70 mt-3 font-semibold">By Milky Way Health Editorial</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-6 group">
                                <div class="w-20 h-20 bg-maternal-sage/10 rounded-3xl flex-shrink-0 flex items-center justify-center text-maternal-sage group-hover:bg-maternal-sage group-hover:text-white transition-all duration-500">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <div class="py-2">
                                     <span class="text-maternal-sage text-[10px] font-bold uppercase tracking-widest block mb-2">Community Update</span>
                                     <h5 class="text-maternal-brown font-bold text-lg leading-tight group-hover:text-maternal-sage transition cursor-pointer line-clamp-2">"New Support Group Opening in South Region"</h5>
                                     <p class="text-xs text-maternal-brown/40 mt-3 font-medium">Coming next Monday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Area -->
                <div class="lg:col-span-4">
                    <div class="sticky top-32 space-y-8">
                        <!-- Feedback Console Card -->
                        <div id="feedback-section" class="bg-white rounded-[3rem] p-10 border-2 border-maternal-peach/50 shadow-2xl shadow-maternal-peach/20 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-maternal-rose/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl"></div>
                            
                            <h3 class="text-2xl font-bold text-maternal-brown mb-2 tracking-tight">Voice Your Experience</h3>
                            <p class="text-maternal-brown/80 text-sm mb-10 font-medium leading-relaxed">Help us shape the future of mother care. Your insights drive our innovation.</p>

                            @if(session('success'))
                                <div class="bg-maternal-sage/10 text-maternal-sage text-sm font-bold p-5 rounded-2xl mb-10 border border-maternal-sage/20 animate-bounce">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('feedback.store') }}" method="POST" class="space-y-8">
                                @csrf
                                <div x-data="{ rating: 5 }" class="space-y-3">
                                    <div class="flex justify-between items-center px-1">
                                        <label class="text-[10px] font-black text-maternal-brown/70 uppercase tracking-[0.2em]">Overall Rating</label>
                                        <span class="text-maternal-rose font-black text-xs" x-text="rating + ' / 5'"></span>
                                    </div>
                                    <div class="flex space-x-3">
                                        <template x-for="i in 5">
                                            <button type="button" @click="rating = i" class="transition-all duration-300 transform hover:scale-125 focus:outline-none">
                                                <svg class="w-8 h-8" :class="i <= rating ? 'text-maternal-rose fill-current filter drop-shadow-[0_0_8px_rgba(209,154,154,0.4)]' : 'text-maternal-peach/30'" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </button>
                                        </template>
                                        <input type="hidden" name="rating" x-model="rating">
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <label class="text-[10px] font-black text-maternal-brown/70 uppercase tracking-[0.2em] px-1">Message</label>
                                    <textarea name="comment" rows="5" class="w-full bg-maternal-peach/10 border-2 border-maternal-peach/30 rounded-3xl text-maternal-brown placeholder:text-maternal-brown/50 focus:bg-white focus:border-maternal-rose focus:ring-4 focus:ring-maternal-rose/10 transition-all duration-500 text-sm font-medium leading-relaxed p-6" placeholder="Share your journey or suggest improvements..."></textarea>
                                    @error('comment')
                                        <p class="text-maternal-rose text-[10px] font-bold mt-2 ps-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="w-full px-8 py-5 bg-maternal-brown text-white rounded-[2rem] font-bold hover:bg-maternal-rose transition-all duration-500 shadow-2xl shadow-maternal-brown/30 transform hover:-translate-y-2 flex items-center justify-center space-x-3">
                                    <span>Submit Response</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </form>
                        </div>

                        <!-- System Status Micro-card -->
                        <div class="bg-maternal-sage/20 rounded-3xl p-6 border-2 border-maternal-sage/30 flex items-center justify-between">
                             <div class="flex items-center space-x-3">
                                 <span class="relative flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-sage opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-maternal-sage"></span>
                                 </span>
                                 <span class="text-xs font-black text-maternal-brown/80 uppercase tracking-widest">Support Line Active</span>
                             </div>
                             <a href="{{ route('support.hotlines') }}" class="text-[10px] font-black text-maternal-brown uppercase hover:text-maternal-rose transition">Get Help</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
