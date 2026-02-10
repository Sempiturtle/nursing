<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            Search Results for "{{ $query }}"
        </h2>
    </x-slot>

    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if(!$results || $results['total'] == 0)
                <div class="text-center py-20 bg-white rounded-[3rem] border border-dashed border-maternal-peach">
                    <h3 class="text-2xl font-bold text-maternal-brown mb-4">No results found</h3>
                    <p class="text-maternal-brown/60 mb-8">We couldn't find anything matching "{{ $query }}". Try different keywords.</p>
                    <div class="max-w-md mx-auto">
                        <form action="{{ route('search') }}" method="GET">
                            <x-text-input name="q" class="w-full text-center" placeholder="Try searching 'latching' or 'clinics'..." />
                        </form>
                    </div>
                </div>
            @else
                <div class="space-y-16">
                    <!-- Articles -->
                    @if($results['articles']->count() > 0)
                        <div>
                            <h3 class="font-outfit font-bold text-2xl text-maternal-brown mb-6 flex items-center">
                                <span class="w-8 h-8 bg-maternal-rose text-white rounded-lg flex items-center justify-center mr-3 text-sm">A</span>
                                Educational Articles ({{ $results['articles']->count() }})
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($results['articles'] as $article)
                                    <a href="{{ route('education.article', $article->slug) }}" class="bg-white p-6 rounded-3xl border border-maternal-peach/30 shadow-sm hover:shadow-md transition">
                                        <span class="text-[10px] font-bold uppercase text-maternal-rose mb-2 block">{{ $article->category }}</span>
                                        <h4 class="font-bold text-maternal-brown text-lg mb-2">{{ $article->title }}</h4>
                                        <p class="text-sm text-maternal-brown/60 line-clamp-2">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Videos -->
                    @if($results['videos']->count() > 0)
                        <div>
                            <h3 class="font-outfit font-bold text-2xl text-maternal-brown mb-6 flex items-center">
                                <span class="w-8 h-8 bg-maternal-rose text-white rounded-lg flex items-center justify-center mr-3 text-sm">V</span>
                                Instructional Videos ({{ $results['videos']->count() }})
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach($results['videos'] as $video)
                                    <div class="bg-white rounded-3xl overflow-hidden border border-maternal-peach/30 shadow-sm group cursor-pointer" @click="$dispatch('open-video', { url: '{{ $video->url }}' })">
                                        <div class="aspect-video relative">
                                            <img src="{{ $video->thumbnail }}" class="w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-maternal-brown/20 group-hover:bg-maternal-brown/40 transition flex items-center justify-center">
                                                <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center text-maternal-rose">
                                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6V4z"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <h4 class="font-bold text-maternal-brown text-sm">{{ $video->title }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Clinics -->
                    @if($results['clinics']->count() > 0)
                        <div>
                            <h3 class="font-outfit font-bold text-2xl text-maternal-brown mb-6 flex items-center">
                                <span class="w-8 h-8 bg-maternal-rose text-white rounded-lg flex items-center justify-center mr-3 text-sm">C</span>
                                Nearby Clinics ({{ $results['clinics']->count() }})
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($results['clinics'] as $clinic)
                                    <div class="bg-white p-6 rounded-3xl border border-maternal-peach/30 shadow-sm">
                                        <h4 class="font-bold text-maternal-brown mb-2">{{ $clinic->name }}</h4>
                                        <p class="text-xs text-maternal-brown/60 mb-4">{{ $clinic->address }}</p>
                                        <a href="tel:{{ $clinic->contact_number }}" class="text-xs font-bold text-maternal-rose">{{ $clinic->contact_number }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
