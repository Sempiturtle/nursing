<x-app-layout>
    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="mb-24 text-center reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-8">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Knowledge Base</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-6xl text-text-primary mb-6 tracking-tight leading-[1.1]">Watch & Learn</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">Master the art of nursing with our proprietary library of expert-led video guides and clinical demonstrations.</p>
            </div>

            <!-- Videos Section -->
            <div class="mb-24">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    @forelse($videos as $index => $video)
                        <div @click="$dispatch('open-video', { url: '{{ $video->embed_url }}' })" 
                             class="group bg-white rounded-[2.5rem] overflow-hidden border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 transform hover:-translate-y-2 cursor-pointer reveal-on-scroll"
                             style="transition-delay: {{ $index * 100 }}ms">
                            <div class="aspect-video bg-surface-dark/5 relative overflow-hidden">
                                <img src="{{ $video->thumbnail }}" class="w-full h-full object-cover transition duration-1000 group-hover:scale-110">
                                <div class="absolute inset-0 bg-surface-dark/40 opacity-0 group-hover:opacity-100 transition-opacity duration-700 backdrop-blur-[2px]"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-20 h-20 bg-white text-surface-dark rounded-full flex items-center justify-center transform scale-90 group-hover:scale-100 transition-all duration-700 shadow-suspended">
                                        <svg class="w-10 h-10 fill-current ml-1" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="p-10">
                                <div class="flex items-center justify-between mb-6">
                                    <span class="text-maternal-rose text-[10px] font-black uppercase tracking-[0.2em] block">{{ $video->category }}</span>
                                    <div class="flex items-center space-x-1">
                                        <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                                        <span class="text-[9px] font-black text-text-muted uppercase tracking-widest">Available</span>
                                    </div>
                                </div>
                                <h4 class="font-black text-text-primary text-2xl mb-4 leading-tight group-hover:text-maternal-rose transition-colors duration-300">{{ $video->title }}</h4>
                                <p class="text-text-dimmed text-base font-medium leading-relaxed line-clamp-2">{{ $video->description }}</p>
                                
                                <div class="mt-8 pt-8 border-t border-maternal-black/5 flex items-center text-text-primary">
                                    <span class="text-[10px] font-black uppercase tracking-[0.2em]">Play Video</span>
                                    <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-2 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-32 text-center bg-white/50 backdrop-blur-xl rounded-[4rem] border border-dashed border-maternal-black/10 text-text-muted font-medium italic reveal-on-scroll">
                            <div class="w-24 h-24 bg-surface-dim rounded-full flex items-center justify-center mx-auto mb-8 opacity-50">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 10l4.553 2.276A1 1 0 0120 13.186V17.8a1 1 0 01-1.447.894L15 17V10zM5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            No instructional videos available yet. Check back soon for our latest clinical guides.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
