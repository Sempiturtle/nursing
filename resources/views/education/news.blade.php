<x-app-layout>
    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="mb-24 text-center reveal-on-scroll">
                 <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-8">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Discovery Stream</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-6xl text-text-primary mb-6 tracking-tight leading-[1.1]">Milky Way News</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">Stay informed with the latest updates, medical guides, and heartwarming stories distilled by our expert team.</p>
            </div>

            <div class="bg-white rounded-[4rem] p-12 md:p-20 border border-maternal-black/5 shadow-luxury reveal-on-scroll">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    @forelse($articles as $index => $article)
                        <a href="{{ route('education.article', $article->slug) }}" 
                           class="group flex flex-col sm:flex-row bg-surface-dim/50 text-text-primary rounded-[3rem] p-10 border border-transparent hover:border-maternal-black/5 hover:bg-white hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll"
                           style="transition-delay: {{ $index * 100 }}ms">
                            <div class="flex-1">
                                <div class="flex items-center space-x-4 mb-6">
                                    <span class="text-maternal-rose text-[10px] font-black uppercase tracking-[0.2em] px-4 py-2 bg-white/80 rounded-full border border-maternal-black/5">{{ $article->category }}</span>
                                    <span class="text-text-muted text-[10px] font-black uppercase tracking-[0.2em]">{{ $article->published_at?->format('M d, Y') ?? 'LATEST' }}</span>
                                </div>
                                <h4 class="font-black text-text-primary text-2xl mb-4 group-hover:text-maternal-rose transition-colors duration-300 leading-tight tracking-tight">{{ $article->title }}</h4>
                                <p class="text-text-dimmed text-sm font-medium leading-relaxed line-clamp-2 mb-8">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                                
                                <div class="flex items-center text-text-muted text-[10px] font-black uppercase tracking-widest mt-auto">
                                    <div class="w-10 h-10 bg-surface-dark text-white rounded-xl mr-4 flex items-center justify-center shadow-luxury">
                                        {{ strtoupper(substr($article->author->name ?? 'M', 0, 1)) }}
                                    </div>
                                    <span class="text-text-primary">{{ $article->author->name ?? 'Milky Way Expert' }}</span>
                                </div>
                            </div>
                            <div class="mt-8 sm:mt-0 sm:ml-8 flex items-center justify-end sm:justify-center">
                                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-text-primary shadow-luxury border border-maternal-black/5 group-hover:bg-surface-dark group-hover:text-white transition-all duration-700 transform group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-32 text-center reveal-on-scroll">
                             <div class="w-24 h-24 bg-surface-dim rounded-full flex items-center justify-center mx-auto mb-8 opacity-50">
                                <svg class="w-12 h-12 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V9a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2z"/></svg>
                             </div>
                            <p class="text-xl font-black text-text-muted italic tracking-tight">No news published yet. Check back soon for our latest clinical dispatches.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
