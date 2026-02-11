<x-app-layout>
    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-20 text-center">
                <h2 class="font-outfit font-bold text-4xl md:text-5xl text-maternal-brown mb-4 tracking-tight">Milky Way News(article)</h2>
                <p class="text-maternal-brown/60 text-lg max-w-2xl mx-auto">Stay informed with the latest updates, medical guides, and heartwarming stories.</p>
            </div>

            <div class="bg-white rounded-[3rem] p-10 md:p-16 border border-maternal-peach/30 shadow-xl shadow-maternal-peach/10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @forelse($articles as $article)
                        <a href="{{ route('education.article', $article->slug) }}" class="group flex flex-col sm:flex-row bg-maternal-peach/5 text-maternal-brown rounded-[2.5rem] p-8 border border-transparent hover:border-maternal-rose/20 hover:bg-white hover:shadow-2xl transition-all duration-500">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-4">
                                    <span class="text-maternal-rose text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 bg-maternal-rose/10 rounded-full inline-block">{{ $article->category }}</span>
                                    <span class="text-maternal-brown/30 text-[10px] font-bold uppercase tracking-widest">{{ $article->published_at?->format('F d, Y') ?? 'Recently' }}</span>
                                </div>
                                <h4 class="font-bold text-maternal-brown text-2xl mb-4 group-hover:text-maternal-rose transition duration-300 leading-tight">{{ $article->title }}</h4>
                                <p class="text-maternal-brown/60 text-sm leading-relaxed line-clamp-2 mb-6">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                                
                                <div class="flex items-center text-maternal-brown/40 text-xs mt-auto">
                                    <div class="w-8 h-8 bg-maternal-rose/20 rounded-full mr-3 flex items-center justify-center text-maternal-rose font-bold">
                                        {{ substr($article->author->name ?? 'M', 0, 1) }}
                                    </div>
                                    <span class="font-bold text-maternal-brown/70">{{ $article->author->name ?? 'Milky Way Expert' }}</span>
                                </div>
                            </div>
                            <div class="mt-8 sm:mt-0 sm:ml-8 flex items-center justify-end sm:justify-center">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-maternal-rose shadow-lg border border-maternal-peach/30 group-hover:bg-maternal-rose group-hover:text-white transition-all duration-500 transform group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full py-24 text-center">
                             <div class="w-20 h-20 bg-maternal-peach/20 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-maternal-peach" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V9a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2z"/></svg>
                             </div>
                            <p class="text-xl font-bold text-maternal-brown/40 italic font-outfit">No news published yet. Check back soon!</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
