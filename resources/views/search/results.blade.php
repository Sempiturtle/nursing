<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            Search Results for "{{ $query }}"
        </h2>
    </x-slot>

    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="mb-24 text-center reveal-on-scroll">
                 <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-8">
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Global Indexing</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-7xl text-text-primary mb-6 tracking-tight leading-[1.05]">
                    Discoveries for <span class="text-maternal-rose italic">"{{ $query }}"</span>
                </h2>
                <p class="text-text-muted text-lg font-medium">Cross-referencing clinical archives and localized support nodes.</p>
            </div>
            
            @if(!$results || $results['total'] == 0)
                <div class="text-center py-32 bg-white/50 backdrop-blur-xl rounded-[4rem] border border-dashed border-maternal-black/10 reveal-on-scroll">
                     <div class="w-24 h-24 bg-surface-dim rounded-full flex items-center justify-center mx-auto mb-10 opacity-50">
                        <svg class="w-12 h-12 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <h3 class="text-3xl font-black text-text-primary mb-6 tracking-tight">No data points located</h3>
                    <p class="text-text-dimmed text-lg font-medium mb-12 max-w-md mx-auto">We couldn't synchronize clinical results with "{{ $query }}". Please refine your inquiry.</p>
                    <div class="max-w-xl mx-auto">
                        <form action="{{ route('search') }}" method="GET">
                            <input name="q" class="w-full bg-white border border-maternal-black/5 rounded-3xl py-6 px-10 text-center text-xl font-black font-outfit focus:ring-4 focus:ring-maternal-rose/10 transition-all duration-500 shadow-luxury" placeholder="Try 'latching' or 'clinical support'..." />
                        </form>
                    </div>
                </div>
            @else
                <div class="space-y-32">
                    <!-- Articles -->
                    @if($results['articles']->count() > 0)
                        <div class="reveal-on-scroll">
                            <div class="flex items-center justify-between mb-12 border-b border-maternal-black/5 pb-8">
                                <h3 class="font-outfit font-black text-3xl text-text-primary tracking-tight flex items-center">
                                    <div class="w-12 h-12 bg-surface-dark text-white rounded-2xl flex items-center justify-center mr-6 text-xs font-black shadow-suspended">A</div>
                                    Clinical Insights
                                </h3>
                                <span class="text-[10px] font-black text-text-muted uppercase tracking-widest">{{ $results['articles']->count() }} indexed</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                                @foreach($results['articles'] as $index => $article)
                                    <a href="{{ route('education.article', $article->slug) }}" class="group bg-white p-10 rounded-[3rem] border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll" style="transition-delay: {{ $index * 100 }}ms">
                                        <span class="text-[10px] font-black uppercase text-maternal-rose tracking-wider mb-4 block">{{ $article->category }}</span>
                                        <h4 class="font-black text-text-primary text-2xl mb-6 group-hover:text-maternal-rose transition-colors duration-300 leading-tight">{{ $article->title }}</h4>
                                        <p class="text-text-dimmed text-lg font-medium line-clamp-2 leading-relaxed italic mb-8">"{{ Str::limit(strip_tags($article->content), 150) }}"</p>
                                        <div class="flex items-center text-text-muted text-[10px] font-black uppercase tracking-widest">
                                             <span>Identify Discovery</span>
                                             <svg class="ml-2 w-4 h-4 group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Videos -->
                    @if($results['videos']->count() > 0)
                        <div class="reveal-on-scroll stagger-delay-1">
                            <div class="flex items-center justify-between mb-12 border-b border-maternal-black/5 pb-8">
                                <h3 class="font-outfit font-black text-3xl text-text-primary tracking-tight flex items-center">
                                    <div class="w-12 h-12 bg-maternal-rose text-white rounded-2xl flex items-center justify-center mr-6 text-xs font-black shadow-suspended">V</div>
                                    Instructional Nodes
                                </h3>
                                <span class="text-[10px] font-black text-text-muted uppercase tracking-widest">{{ $results['videos']->count() }} streaming</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                                @foreach($results['videos'] as $index => $video)
                                    <div class="bg-white rounded-[2.5rem] overflow-hidden border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 group cursor-pointer reveal-on-scroll" style="transition-delay: {{ $index * 100 }}ms" @click="$dispatch('open-video', { url: '{{ $video->url }}' })">
                                        <div class="aspect-video relative overflow-hidden">
                                            <img src="{{ $video->thumbnail }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-surface-dark/20 group-hover:bg-surface-dark/40 transition-all duration-700 flex items-center justify-center">
                                                <div class="w-16 h-16 bg-white/90 backdrop-blur-md rounded-full flex items-center justify-center text-maternal-rose shadow-luxury transform group-hover:scale-110 transition-transform duration-500">
                                                    <svg class="w-8 h-8 fill-current translate-x-1" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6V4z"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-8">
                                            <h4 class="font-black text-text-primary text-base group-hover:text-maternal-rose transition-colors duration-300">{{ $video->title }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Clinics -->
                    @if($results['clinics']->count() > 0)
                        <div class="reveal-on-scroll stagger-delay-2">
                            <div class="flex items-center justify-between mb-12 border-b border-maternal-black/5 pb-8">
                                <h3 class="font-outfit font-black text-3xl text-text-primary tracking-tight flex items-center">
                                    <div class="w-12 h-12 bg-maternal-sage text-white rounded-2xl flex items-center justify-center mr-6 text-xs font-black shadow-suspended">C</div>
                                    Clinical Nodes
                                </h3>
                                <span class="text-[10px] font-black text-text-muted uppercase tracking-widest">{{ $results['clinics']->count() }} localized</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                                @foreach($results['clinics'] as $index => $clinic)
                                    <div class="bg-white p-10 rounded-[3rem] border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll" style="transition-delay: {{ $index * 100 }}ms">
                                        <h4 class="font-black text-text-primary text-xl mb-4 tracking-tight">{{ $clinic->name }}</h4>
                                        <p class="text-[10px] text-text-muted font-black uppercase tracking-widest mb-8 leading-relaxed">{{ $clinic->address }}</p>
                                        <a href="tel:{{ $clinic->contact_number }}" class="inline-flex items-center text-xs font-black text-maternal-rose group">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                            {{ $clinic->contact_number }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </div>

    </div>
</x-app-layout>
