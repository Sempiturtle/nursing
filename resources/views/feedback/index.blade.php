<x-app-layout>
    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="mb-24 text-center reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-12">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Community Voice</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-7xl text-text-primary mb-10 tracking-tight leading-[1.05]">Feedback Wall</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">See how Milky Way is supporting mothers across the community and share your own protocol experience.</p>
                
                <div class="mt-12 flex flex-col md:flex-row items-center justify-center gap-6">
                    <div class="flex items-center space-x-2 bg-white/50 backdrop-blur-sm px-6 py-3 rounded-2xl border border-maternal-black/5 shadow-luxury">
                         @for($i = 1; $i <= 5; $i++)
                            <svg class="w-6 h-6 {{ $i <= round($averageRating) ? 'text-maternal-rose fill-current' : 'text-maternal-black/5' }}" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                        <span class="text-text-primary font-black text-lg ml-2">{{ number_format($averageRating, 1) }}</span>
                    </div>
                    <span class="text-text-muted text-xs font-black uppercase tracking-[0.2em]">Clinical Satisfaction Average</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Feedback List -->
                <div class="lg:col-span-8 space-y-10">
                    @forelse($feedbacks as $index => $feedback)
                        <div class="bg-white rounded-[3rem] p-12 border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll"
                             style="transition-delay: {{ $index * 100 }}ms">
                            <div class="flex items-start justify-between mb-10">
                                <div class="flex items-center space-x-6">
                                    <div class="w-14 h-14 bg-surface-dark text-white rounded-2xl flex items-center justify-center font-black text-xl shadow-suspended">
                                        {{ strtoupper(substr($feedback->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h4 class="font-black text-text-primary text-xl leading-tight tracking-tight">{{ $feedback->name }}</h4>
                                        <p class="text-[10px] text-text-muted font-black uppercase tracking-widest mt-1">{{ $feedback->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $feedback->rating ? 'text-maternal-rose fill-current' : 'text-maternal-black/5' }}" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-text-dimmed leading-relaxed text-xl font-medium italic">"{{ $feedback->comment }}"</p>
                        </div>
                    @empty
                        <div class="bg-white/50 backdrop-blur-xl rounded-[4rem] p-32 text-center border border-dashed border-maternal-black/10 reveal-on-scroll">
                             <div class="w-24 h-24 bg-surface-dim rounded-full flex items-center justify-center mx-auto mb-10 opacity-50">
                                <svg class="w-12 h-12 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                             </div>
                             <p class="text-2xl font-black text-text-muted italic tracking-tight">No community resonance detected. <br>Initialize the wall with your experience.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Submission Column -->
                <div class="lg:col-span-4">
                    <div class="sticky top-32 bg-surface-dark rounded-[4rem] p-12 shadow-suspended text-white reveal-on-scroll stagger-delay-1">
                        <div class="absolute inset-0 bg-grain opacity-10"></div>
                        <h3 class="text-3xl font-outfit font-black mb-4 relative z-10 tracking-tight">Add Your Voice</h3>
                        <p class="text-white/40 text-sm font-medium mb-12 leading-relaxed relative z-10">Your story can help another mother. Share your clinical feedback below.</p>

                        @if(session('success'))
                            <div class="bg-white/5 border border-white/10 p-6 rounded-2xl mb-12 text-xs font-black uppercase tracking-widest text-maternal-rose animate-pulse relative z-10">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-10 relative z-10">
                            @csrf
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            
                            <div x-data="{ rating: 5 }" class="space-y-4">
                                <label class="text-[10px] font-black text-white/30 uppercase tracking-[0.3em] px-1">Your Protocol Rating</label>
                                <div class="flex space-x-4">
                                    <template x-for="i in 5">
                                        <button type="button" @click="rating = i" class="transition-all duration-500 transform hover:scale-125 focus:outline-none">
                                            <svg class="w-10 h-10" :class="i <= rating ? 'text-maternal-rose fill-current' : 'text-white/5'" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </button>
                                    </template>
                                    <input type="hidden" name="rating" :value="rating">
                                </div>
                            </div>

                            <div class="space-y-4">
                                <label class="text-[10px] font-black text-white/30 uppercase tracking-[0.3em] px-1">Experience Capture</label>
                                <textarea name="comment" rows="8" class="w-full bg-white/5 border-white/10 rounded-[2.5rem] text-white placeholder:text-white/10 focus:bg-white/10 focus:border-maternal-rose focus:ring-4 focus:ring-maternal-rose/20 transition-all duration-700 text-sm font-medium leading-relaxed p-8" placeholder="How has Milky Way infrastructure helped your journey today?"></textarea>
                                @error('comment')
                                    <p class="text-maternal-rose text-[10px] font-black mt-4 uppercase tracking-widest">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="w-full btn-agency-primary !bg-white !text-surface-dark hover:!bg-maternal-gray-soft !rounded-[2rem] py-6 shadow-suspended group">
                                <span class="group-hover:translate-x-1 transition-transform">Post Discovery</span>
                                <svg class="ml-3 w-5 h-5 group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
