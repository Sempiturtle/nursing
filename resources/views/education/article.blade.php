<x-app-layout>
    <div class="py-24 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 relative z-10">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-4 text-[10px] font-black uppercase tracking-[0.3em] mb-12 reveal-on-scroll">
                <a href="{{ route('education.index') }}" class="text-text-muted hover:text-maternal-rose transition-colors duration-300">Education</a>
                <span class="text-text-muted">/</span>
                <span class="text-maternal-rose">{{ $article->category }}</span>
            </nav>

            <header class="mb-16 reveal-on-scroll">
                <h1 class="font-outfit font-black text-5xl md:text-7xl text-text-primary mb-10 tracking-tight leading-[1.05]">
                    {{ $article->title }}
                </h1>
                
                <div class="flex flex-wrap items-center gap-8 py-8 border-y border-maternal-black/5">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-surface-dark text-white rounded-2xl flex items-center justify-center font-black text-xl shadow-luxury">
                            {{ substr($article->author->name ?? 'M', 0, 1) }}
                        </div>
                        <div>
                            <h5 class="font-black text-text-primary text-sm leading-tight">{{ $article->author->name ?? 'Milky Way Specialist' }}</h5>
                            <p class="text-[9px] text-text-muted uppercase tracking-widest font-black mt-1">Health Editorial Board</p>
                        </div>
                    </div>
                    
                    <div class="h-10 w-px bg-maternal-black/5 hidden md:block"></div>
                    
                    <div>
                        <p class="text-[9px] text-text-muted font-black uppercase tracking-widest mb-1">Published</p>
                        <p class="text-xs font-black text-text-primary">{{ $article->published_at?->format('F d, Y') ?? 'Recently Updated' }}</p>
                    </div>
                </div>
            </header>

            <article class="reveal-on-scroll stagger-delay-1">
                <div class="prose prose-xl prose-maternal max-w-none 
                            prose-headings:font-outfit prose-headings:font-black prose-headings:tracking-tight prose-headings:text-text-primary
                            prose-p:text-text-dimmed prose-p:leading-relaxed prose-p:font-medium
                            prose-strong:text-text-primary prose-strong:font-black
                            prose-blockquote:border-maternal-rose prose-blockquote:bg-surface-dim prose-blockquote:rounded-3xl prose-blockquote:p-8 prose-blockquote:not-italic prose-blockquote:font-medium
                            prose-img:rounded-[3rem] prose-img:shadow-suspended">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </article>

            <div class="mt-24 pt-16 border-t border-maternal-black/5 reveal-on-scroll">
                <div class="flex flex-col md:flex-row items-center justify-between gap-8 bg-white rounded-[3rem] p-10 shadow-luxury border border-maternal-black/5">
                    <div>
                        <h4 class="text-xl font-black text-text-primary tracking-tight">Share this discovery</h4>
                        <p class="text-text-muted text-sm font-medium mt-1">Forward this clinical insight to your community.</p>
                    </div>
                    <div class="flex items-center space-x-4">
                         <button class="w-14 h-14 bg-surface-dim text-text-primary rounded-2xl flex items-center justify-center hover:bg-surface-dark hover:text-white transition-all duration-500 shadow-sm">
                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                         </button>
                         <button class="w-14 h-14 bg-surface-dim text-text-primary rounded-2xl flex items-center justify-center hover:bg-surface-dark hover:text-white transition-all duration-500 shadow-sm">
                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"/></svg>
                         </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Related Articles -->
    <section class="py-24 bg-white/30 backdrop-blur-sm border-t border-maternal-black/5 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between mb-16">
                <h3 class="font-outfit font-black text-3xl text-text-primary tracking-tight">More Discoveries</h3>
                <a href="{{ route('education.news') }}" class="text-maternal-rose font-black text-xs uppercase tracking-[0.2em] hover:translate-x-2 transition-transform duration-500 flex items-center">
                    View Archive
                    <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                 <!-- Related articles would be injected here -->
                 <div class="p-10 bg-white rounded-[2.5rem] border border-maternal-black/5 shadow-luxury opacity-40 italic text-sm font-medium text-text-muted">
                     Related content indexing...
                 </div>
            </div>
        </div>
    </section>
</x-app-layout>
