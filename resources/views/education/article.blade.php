<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4 text-sm text-maternal-brown/60 mb-2">
            <a href="{{ route('education.index') }}" class="hover:text-maternal-rose transition">Education</a>
            <span>/</span>
            <span class="text-maternal-rose font-bold">{{ $article->category }}</span>
        </div>
        <h2 class="font-outfit font-bold text-3xl text-maternal-brown leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex items-center space-x-6 mb-12 pb-8 border-b border-maternal-peach/20">
                <div class="w-12 h-12 bg-maternal-rose text-white rounded-full flex items-center justify-center font-bold text-xl uppercase">
                    {{ substr($article->author->name ?? 'M', 0, 1) }}
                </div>
                <div>
                    <h5 class="font-bold text-maternal-brown">{{ $article->author->name ?? 'Milky Way Health Team' }}</h5>
                    <p class="text-xs text-maternal-brown/40 uppercase tracking-widest font-bold">Maternal Health Specialist</p>
                </div>
                <div class="flex-1"></div>
                <div class="text-right">
                    <p class="text-xs text-maternal-brown/40 font-bold uppercase tracking-widest mb-1">Published</p>
                    <p class="text-sm font-bold text-maternal-brown">{{ $article->published_at?->format('M d, Y') ?? 'Recently' }}</p>
                </div>
            </div>

            <article class="prose prose-lg max-w-none prose-maternal-brown prose-headings:font-outfit prose-headings:font-bold prose-headings:text-maternal-brown prose-p:text-maternal-brown/70 prose-p:leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </article>

            <div class="mt-16 pt-12 border-t border-maternal-peach/20">
                <h4 class="font-outfit font-bold text-xl text-maternal-brown mb-8 text-center uppercase tracking-widest">Share this resource</h4>
                <div class="flex justify-center space-x-4">
                     <!-- Social share buttons placeholder -->
                     <button class="p-4 bg-maternal-peach/20 text-maternal-brown rounded-2xl hover:bg-maternal-rose hover:text-white transition group">
                         <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56v14.88c0 2.48-2.03 4.56-4.56 4.56H4.56C2.08 24 0 21.92 0 19.44V4.56C0 2.08 2.03 0 4.56 0h14.88C21.92 0 24 2.03 24 4.56z"/></svg>
                     </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Related Articles Placeholder -->
    <section class="py-24 bg-maternal-peach/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="font-outfit font-bold text-2xl text-maternal-brown mb-12">More Breastfeeding Resources</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                 <!-- Related articles loop would go here -->
            </div>
        </div>
    </section>
</x-app-layout>
