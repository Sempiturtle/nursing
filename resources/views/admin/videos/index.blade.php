<x-admin-layout>
    <x-slot name="header">Tutorials</x-slot>

    {{-- Page header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-8 mb-12 animate-slide-up-fade">
        <div class="space-y-1">
            <h1 class="text-3xl lg:text-4xl font-black text-white tracking-tighter font-outfit uppercase italic">
                Media <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(intelligence)</span>
            </h1>
            <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-accent-rose shadow-glow-rose"></span>
                Visual guides and educational transmissions for the community node.
            </p>
        </div>
        <a href="{{ route('admin.videos.create') }}" class="group flex items-center gap-3 px-8 py-4 bg-white/5 border border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest text-white hover:bg-accent-rose hover:border-accent-rose transition-all shadow-lift">
            Synthesize New Media
            <svg class="w-4 h-4 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
        </a>
    </div>

    @if(session('success'))
        <div class="glass animate-slide-up-fade border-accent-emerald/20 p-6 rounded-3xl mb-12 flex items-center gap-4 group">
            <div class="w-12 h-12 rounded-2xl bg-accent-emerald/10 border border-accent-emerald/20 flex items-center justify-center text-accent-emerald shadow-glow-emerald">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </div>
            <div>
                <h4 class="text-sm font-black text-white font-outfit uppercase tracking-wider">Asset Deployed</h4>
                <p class="text-slate-500 text-xs font-medium italic mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 animate-slide-up-fade stagger-1">
        @forelse($videos as $video)
            <div class="group relative glass rounded-[2.5rem] border-white/5 overflow-hidden hover:border-accent-rose/30 transition-all duration-500 shadow-lift">
                {{-- Preview --}}
                <div class="relative aspect-video bg-slate-900 overflow-hidden border-b border-white/5">
                    <img src="{{ $video->thumbnail }}" class="w-full h-full object-cover opacity-60 group-hover:opacity-90 group-hover:scale-110 transition-all duration-1000">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
                    
                    {{-- Overlay Data --}}
                    <div class="absolute inset-x-6 bottom-6 flex items-end justify-between">
                        <div class="space-y-2">
                            <span class="inline-flex px-3 py-1 bg-white/10 backdrop-blur-xl border border-white/10 rounded-lg text-[9px] font-black text-white uppercase tracking-[0.2em]">Transmission</span>
                            <div class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-accent-rose animate-pulse shadow-glow-rose"></span>
                                <span class="text-[10px] font-bold text-white font-outfit uppercase tracking-tighter italic">Live Stream</span>
                            </div>
                        </div>
                        <div class="w-14 h-14 rounded-full bg-accent-rose text-white flex items-center justify-center shadow-glow-rose group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                </div>

                {{-- Asset Data --}}
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex px-3 py-1 bg-accent-rose/10 border border-accent-rose/20 text-accent-rose rounded-lg text-[10px] font-black tracking-widest uppercase truncate">{{ $video->category ?? 'General' }}</span>
                        <span class="text-[11px] text-slate-500 font-bold font-outfit uppercase tabular-nums">{{ $video->created_at->format('M Y') }}</span>
                    </div>
                    
                    <h3 class="text-xl font-black text-white font-outfit mb-3 leading-tight tracking-tight group-hover:text-accent-rose transition-colors">{{ $video->title }}</h3>
                    <p class="text-sm text-slate-500 font-medium italic line-clamp-2 leading-relaxed mb-8 opacity-80 group-hover:opacity-100 transition-opacity">{{ $video->description }}</p>
                    
                    <div class="pt-8 border-t border-white/5 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] font-black text-slate-600 uppercase tracking-widest italic">Node: {{ substr($video->id, 0, 8) ?? 'TRANS_AUTH' }}</span>
                        </div>
                        <div class="flex items-center gap-3 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-x-4 group-hover:translate-x-0">
                            <a href="{{ route('admin.videos.edit', $video) }}" class="w-10 h-10 flex items-center justify-center bg-white/5 border border-white/10 text-slate-400 hover:text-white hover:bg-accent-rose hover:border-accent-rose rounded-xl transition-all shadow-lift">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" onsubmit="return confirm('Archive this visual transmission sequence?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-10 h-10 flex items-center justify-center bg-white/5 border border-white/10 text-slate-400 hover:text-white hover:bg-accent-rose hover:border-accent-rose rounded-xl transition-all shadow-lift">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-32 glass rounded-[3rem] border-2 border-dashed border-white/5 text-center">
                <div class="w-24 h-24 bg-white/2 rounded-full flex items-center justify-center mx-auto mb-8 text-slate-800 border-2 border-dashed border-white/5">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path d="M15 10l4.553 2.276A1 1 0 0120 13.186V17.8a1 1 0 01-1.447.894L15 17V10zM5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <p class="text-xs font-black text-slate-600 uppercase tracking-[0.4em]">No visual transmissions synthesized</p>
                <p class="text-[10px] text-slate-700 font-medium italic mt-3 italic">Awaiting source signal uplink...</p>
            </div>
        @endforelse
    </div>
</x-admin-layout>
