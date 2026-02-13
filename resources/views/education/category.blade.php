<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <nav class="mb-16 reveal-on-scroll">
                <a href="{{ route('education.info') }}" class="group inline-flex items-center text-[10px] font-black text-text-muted uppercase tracking-[0.3em] hover:text-maternal-rose transition-colors duration-300">
                    <div class="w-10 h-10 rounded-xl border border-maternal-black/5 flex items-center justify-center mr-4 transition-all duration-300 group-hover:bg-maternal-rose group-hover:text-white group-hover:border-transparent">
                        <svg class="w-4 h-4 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                    Back to Knowledge Base
                </a>
            </nav>

            <header class="mb-24 reveal-on-scroll">
                 <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-8">
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">{{ $category }} Protocol</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-7xl text-text-primary tracking-tight leading-[1.05]">{{ $title }}</h2>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                @forelse($articles as $index => $article)
                    <a href="{{ route('education.article', $article->slug) }}" class="group flex bg-white rounded-[3rem] p-10 border border-maternal-black/5 shadow-luxury hover:shadow-luxury-hover transition-all duration-700 reveal-on-scroll"
                       style="transition-delay: {{ $index * 100 }}ms">
                        <div class="flex-1">
                            <span class="text-maternal-rose text-[10px] font-black uppercase tracking-[0.2em] mb-4 block">{{ $article->category }}</span>
                            <h4 class="font-black text-text-primary text-2xl mb-6 tracking-tight group-hover:text-maternal-rose transition-colors duration-300">{{ $article->title }}</h4>
                            <p class="text-text-dimmed text-base font-medium mb-10 line-clamp-2 leading-relaxed italic">"{{ Str::limit(strip_tags($article->content), 120) }}"</p>
                            <div class="flex items-center text-text-muted text-[10px] font-black uppercase tracking-widest space-x-4">
                                <span>{{ $article->published_at?->format('F d, Y') ?? 'Protocol Recently Updated' }}</span>
                                <span class="text-maternal-black/10">•</span>
                                <span class="bg-surface-dim px-2 py-1 rounded-lg text-text-primary">{{ ceil(str_word_count($article->content) / 200) }} Min Insight</span>
                            </div>
                        </div>
                        <div class="ml-8 flex items-center">
                            <div class="w-14 h-14 bg-surface-dim rounded-2xl flex items-center justify-center text-text-primary border border-maternal-black/5 group-hover:bg-surface-dark group-hover:text-white group-hover:border-transparent transition-all duration-500 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-32 text-center bg-white/50 backdrop-blur-xl rounded-[4rem] border border-dashed border-maternal-black/10 text-text-muted font-medium italic reveal-on-scroll">
                        <div class="w-24 h-24 bg-surface-dim rounded-full flex items-center justify-center mx-auto mb-10 opacity-50">
                            <svg class="mx-auto h-12 w-12 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.75 0 3.168.477 4.5 1.253v13C19.832 18.477 18.254 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        No clinical insights indexed for <span class="text-text-primary not-italic font-black">{{ $title }}</span> yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
