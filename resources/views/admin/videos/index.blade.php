<x-admin-layout>
    @section('title', 'Video Library')

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">Video Library</h1>
            <p class="text-sm text-zinc-500 mt-0.5">Educational video resources for maternal care</p>
        </div>
        <a href="{{ route('admin.videos.create') }}" 
           class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[var(--maternal-peach)] text-zinc-900 text-[13.5px] font-bold rounded-xl hover:bg-zinc-800 hover:text-white active:scale-[0.97] transition-all shadow-md shadow-zinc-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Upload New Video
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-up">
        @forelse($videos as $video)
            <div class="bg-white border border-zinc-200 rounded-3xl overflow-hidden shadow-sm group hover:shadow-xl hover:shadow-zinc-200 transition-all duration-300">
                <div class="aspect-video bg-zinc-100 relative overflow-hidden">
                    <img src="{{ $video->thumbnail ?: 'https://images.unsplash.com/photo-1576091160550-2173bdd99625?auto=format&fit=crop&q=80' }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-zinc-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3 backdrop-blur-[2px]">
                        <a href="{{ route('admin.videos.edit', $video) }}" 
                           class="w-10 h-10 bg-white text-zinc-900 rounded-xl flex items-center justify-center hover:bg-[var(--maternal-rose)] hover:text-white transition-colors active:scale-90">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                        </a>
                        <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" onsubmit="return confirm('Delete this video?')">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="w-10 h-10 bg-white text-rose-500 rounded-xl flex items-center justify-center hover:bg-rose-500 hover:text-white transition-colors active:scale-90">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.053.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                            </button>
                        </form>
                    </div>

                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 bg-white/90 backdrop-blur-md text-zinc-900 text-[10px] font-bold rounded-lg uppercase tracking-wider shadow-sm border border-white/20">{{ $video->category }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-[15px] font-bold text-zinc-900 font-outfit mb-2 line-clamp-1 hover:text-[var(--maternal-rose)] transition-colors cursor-pointer">{{ $video->title }}</h4>
                    <p class="text-[12px] text-zinc-500 font-medium line-clamp-2 leading-relaxed">{{ $video->description }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center bg-white border border-dashed border-zinc-200 rounded-3xl">
                <div class="w-16 h-16 bg-zinc-50 rounded-full flex items-center justify-center mx-auto text-zinc-200 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/></svg>
                </div>
                <p class="text-sm font-bold text-zinc-400 font-outfit uppercase tracking-widest">Library is empty</p>
                <p class="text-xs text-zinc-300 mt-1">Start by uploading your first educational video.</p>
            </div>
        @endforelse
    </div>
</x-admin-layout>
