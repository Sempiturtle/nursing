<x-app-layout>
    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-20 text-center">
                <span class="inline-block px-4 py-1.5 bg-maternal-rose text-white text-[10px] font-bold uppercase tracking-[0.2em] rounded-full mb-6">Community Voice</span>
                <h2 class="font-outfit font-bold text-4xl md:text-5xl text-maternal-brown mb-4 tracking-tight">Feedback Wall</h2>
                <p class="text-maternal-brown/60 text-lg max-w-2xl mx-auto">See how Milky Way is supporting mothers across the community and share your own experience.</p>
                
                <div class="mt-8 flex items-center justify-center space-x-4">
                    <div class="flex items-center">
                         @for($i = 1; $i <= 5; $i++)
                            <svg class="w-6 h-6 {{ $i <= round($averageRating) ? 'text-maternal-rose fill-current' : 'text-maternal-peach/30' }}" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-maternal-brown font-bold text-lg">{{ number_format($averageRating, 1) }} Average Rating</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Feedback List -->
                <div class="lg:col-span-2 space-y-8">
                    @forelse($feedbacks as $feedback)
                        <div class="bg-white rounded-[2.5rem] p-10 border border-maternal-peach/30 shadow-xl shadow-maternal-peach/5 hover:shadow-maternal-peach/10 transition duration-500">
                            <div class="flex items-start justify-between mb-8">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-maternal-rose/10 rounded-2xl flex items-center justify-center text-maternal-rose font-bold text-lg">
                                        {{ substr($feedback->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-maternal-brown text-lg">{{ $feedback->name }}</h4>
                                        <p class="text-xs text-maternal-brown/40 font-bold uppercase tracking-widest">{{ $feedback->created_at->format('F d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $feedback->rating ? 'text-maternal-rose fill-current' : 'text-maternal-peach/20' }}" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-maternal-brown/70 leading-relaxed text-lg italic">"{{ $feedback->comment }}"</p>
                        </div>
                    @empty
                        <div class="bg-white rounded-[2.5rem] p-20 text-center border border-dashed border-maternal-peach/50 mt-12">
                             <div class="w-20 h-20 bg-maternal-peach/20 rounded-full flex items-center justify-center mx-auto mb-6 text-maternal-peach">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                             </div>
                             <p class="text-xl font-bold text-maternal-brown/40 italic">No community feedback yet. Be the first to share!</p>
                        </div>
                    @endforelse
                </div>

                <!-- Submission Column -->
                <div class="lg:col-span-1">
                    <div class="sticky top-32 bg-maternal-brown rounded-[3rem] p-10 shadow-2xl shadow-maternal-brown/30 text-white">
                        <h3 class="text-2xl font-bold mb-4">Add Your Voice</h3>
                        <p class="text-white/60 text-sm mb-10 leading-relaxed">Your story can help another mother. Share your feedback below.</p>

                        @if(session('success'))
                            <div class="bg-white/10 border border-white/20 p-5 rounded-2xl mb-10 text-sm font-bold animate-pulse">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-8">
                            @csrf
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            
                            <div x-data="{ rating: 5 }" class="space-y-3">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-[0.2em] px-1">Your Rating</label>
                                <div class="flex space-x-3">
                                    <template x-for="i in 5">
                                        <button type="button" @click="rating = i" class="transition-all duration-300 transform hover:scale-125 focus:outline-none">
                                            <svg class="w-8 h-8" :class="i <= rating ? 'text-maternal-peach fill-current' : 'text-white/20'" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </button>
                                    </template>
                                    <input type="hidden" name="rating" :value="rating">
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="text-[10px] font-bold text-white/40 uppercase tracking-[0.2em] px-1">Experience</label>
                                <textarea name="comment" rows="6" class="w-full bg-white/5 border-white/10 rounded-3xl text-white placeholder:text-white/20 focus:bg-white/10 focus:border-maternal-peach focus:ring-4 focus:ring-maternal-peach/20 transition-all duration-500 text-sm leading-relaxed p-6" placeholder="How has Milky Way helped you today?"></textarea>
                                @error('comment')
                                    <p class="text-maternal-peach text-[10px] font-bold mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="w-full px-8 py-5 bg-maternal-peach text-maternal-brown rounded-[2rem] font-bold hover:bg-white transition-all duration-500 shadow-2xl shadow-black/20 transform hover:-translate-y-2 flex items-center justify-center space-x-3">
                                <span>Post to Wall</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
