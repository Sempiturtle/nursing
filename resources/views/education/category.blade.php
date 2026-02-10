<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('education.info') }}" class="inline-flex items-center text-maternal-rose font-bold hover:translate-x-1 transition">
                    <svg class="mr-2 w-5 h-5 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    Back to Info Overview
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($articles as $article)
                    <a href="{{ route('education.article', $article->slug) }}" class="flex bg-white rounded-3xl p-8 border border-maternal-peach/30 shadow-sm hover:shadow-xl transition group">
                        <div class="flex-1">
                            <span class="text-maternal-rose text-xs font-bold uppercase mb-2 block">{{ $article->category }}</span>
                            <h4 class="font-bold text-maternal-brown text-2xl mb-4 group-hover:text-maternal-rose transition">{{ $article->title }}</h4>
                            <p class="text-maternal-brown/60 text-sm mb-6 line-clamp-2">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                            <div class="flex items-center text-maternal-brown/40 text-xs space-x-4">
                                <span>{{ $article->published_at?->format('M d, Y') ?? 'Recently' }}</span>
                                <span>•</span>
                                <span>{{ str_word_count($article->content) / 200 }} min read</span>
                            </div>
                        </div>
                        <div class="ml-6 flex items-center">
                            <div class="w-12 h-12 bg-maternal-peach/20 rounded-full flex items-center justify-center text-maternal-rose group-hover:bg-maternal-rose group-hover:text-white transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-[3rem] border border-dashed border-maternal-peach text-maternal-brown/40 font-medium">
                        <svg class="mx-auto h-12 w-12 text-maternal-peach mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.75 0 3.168.477 4.5 1.253v13C19.832 18.477 18.254 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        No specialized articles for {{ $title }} yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
