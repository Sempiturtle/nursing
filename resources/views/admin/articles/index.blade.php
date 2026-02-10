<x-admin-layout>
    @section('title', 'Manage Articles')

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">Articles</h1>
            <p class="text-sm text-zinc-500 mt-0.5">Manage educational reading materials</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" 
           class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[var(--maternal-brown)] text-white text-[13.5px] font-bold rounded-xl hover:bg-zinc-800 active:scale-[0.97] transition-all shadow-md shadow-zinc-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Write New Article
        </a>
    </div>

    <div class="bg-white border border-zinc-200 rounded-2xl overflow-hidden shadow-sm animate-fade-up">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-zinc-100 bg-zinc-50/50">
                        <th class="pl-6 pr-3 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Article Details</th>
                        <th class="px-3 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Category</th>
                        <th class="px-3 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Status</th>
                        <th class="px-3 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Published</th>
                        <th class="px-3 pr-6 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-50">
                    @forelse($articles as $article)
                        <tr class="hover:bg-zinc-50/70 transition-colors group">
                            <td class="pl-6 pr-3 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-zinc-100 rounded-xl overflow-hidden flex-shrink-0 shadow-inner">
                                        @if($article->image)
                                            <img src="{{ $article->image }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-zinc-300">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-[14px] font-bold text-zinc-900 font-outfit">{{ $article->title }}</h4>
                                        <p class="text-[12px] text-zinc-400 font-medium">By {{ $article->author->name ?? 'System' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-5">
                                <span class="px-2.5 py-1 bg-zinc-100 text-zinc-600 text-[11px] font-bold rounded-lg uppercase tracking-wider">{{ $article->category }}</span>
                            </td>
                            <td class="px-3 py-5">
                                @if($article->is_published)
                                    <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-emerald-600 uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full status-pulse"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-zinc-400 uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 bg-zinc-300 rounded-full"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-3 py-5">
                                <p class="text-[12px] text-zinc-500 font-medium">{{ $article->published_at ? $article->published_at->format('M d, Y') : '—' }}</p>
                            </td>
                            <td class="px-3 pr-6 py-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.articles.edit', $article) }}" 
                                       class="p-2 text-zinc-400 hover:text-zinc-900 hover:bg-zinc-100 rounded-lg transition active:scale-95">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Delete this article forever?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-zinc-400 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition active:scale-95">
                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.053.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 bg-zinc-50 rounded-full flex items-center justify-center text-zinc-200">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                    </div>
                                    <p class="text-sm font-bold text-zinc-400 font-outfit uppercase tracking-wider">No articles found</p>
                                    <p class="text-xs text-zinc-300">Start sharing knowledge with new articles.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
