<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Breastfeeding Education') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Videos Section -->
            <div class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="font-outfit font-bold text-3xl text-maternal-brown">Watch & Learn</h3>
                    <div class="flex space-x-2">
                        <!-- Add category filters here -->
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($videos as $video)
                        <div class="bg-white rounded-3xl overflow-hidden border border-maternal-peach/30 shadow-sm hover:shadow-xl transition duration-500">
                            <div class="aspect-video bg-maternal-brown/10 relative">
                                <img src="{{ $video->thumbnail }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <button @click="$dispatch('open-video', { url: '{{ $video->url }}' })" class="w-16 h-16 bg-maternal-rose/90 text-white rounded-full flex items-center justify-center transform hover:scale-110 transition">
                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6V4z"/></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <span class="bg-maternal-peach/50 text-maternal-rose text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-3 inline-block">{{ $video->category }}</span>
                                <h4 class="font-bold text-maternal-brown text-xl mb-2">{{ $video->title }}</h4>
                                <p class="text-maternal-brown/60 text-sm line-clamp-2">{{ $video->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center bg-white rounded-3xl border border-dashed border-maternal-peach text-maternal-brown/40 font-medium">
                            No instructional videos available yet.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Articles Section -->
            <div>
                <h3 class="font-outfit font-bold text-3xl text-maternal-brown mb-8">Breastfeeding Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($articles as $article)
                        <a href="{{ route('education.article', $article->slug) }}" class="flex bg-white rounded-3xl p-6 border border-maternal-peach/30 shadow-sm hover:shadow-xl transition group">
                            <div class="flex-1">
                                <span class="text-maternal-rose text-xs font-bold uppercase mb-2 block">{{ $article->category }}</span>
                                <h4 class="font-bold text-maternal-brown text-2xl mb-4 group-hover:text-maternal-rose transition">{{ $article->title }}</h4>
                                <div class="flex items-center text-maternal-brown/40 text-sm space-x-4">
                                    <span>By {{ $article->author->name ?? 'Milky Way Expert' }}</span>
                                    <span>•</span>
                                    <span>{{ $article->published_at?->format('F d, Y') ?? 'Recently' }}</span>
                                </div>
                            </div>
                            <div class="ml-6 flex items-center">
                                <div class="w-10 h-10 bg-maternal-peach/20 rounded-full flex items-center justify-center text-maternal-rose group-hover:bg-maternal-rose group-hover:text-white transition">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-12 text-center bg-white rounded-3xl border border-dashed border-maternal-peach text-maternal-brown/40 font-medium">
                            No articles published yet.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
