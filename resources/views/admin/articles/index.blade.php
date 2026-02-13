<x-admin-layout>
    <x-slot name="header">Education</x-slot>

    {{-- Page header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-8 mb-12 animate-slide-up-fade">
        <div class="space-y-1">
            <h1 class="text-3xl lg:text-4xl font-black text-white tracking-tighter font-outfit uppercase italic">
                Knowledge <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(base)</span>
            </h1>
            <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-accent-purple shadow-glow-purple"></span>
                Nurturing resources and clinical guides for our constellation.
            </p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="group flex items-center gap-3 px-8 py-4 bg-white/5 border border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest text-white hover:bg-accent-purple hover:border-accent-purple transition-all shadow-lift">
            Synthesize New Article
            <svg class="w-4 h-4 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
        </a>
    </div>

    @if(session('success'))
        <div class="glass animate-slide-up-fade border-accent-emerald/20 p-6 rounded-3xl mb-12 flex items-center gap-4 group">
            <div class="w-12 h-12 rounded-2xl bg-accent-emerald/10 border border-accent-emerald/20 flex items-center justify-center text-accent-emerald shadow-glow-emerald">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </div>
            <div>
                <h4 class="text-sm font-black text-white font-outfit uppercase tracking-wider">Transmission Successful</h4>
                <p class="text-slate-500 text-xs font-medium italic mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- Content Table --}}
    <div class="glass rounded-[2.5rem] border-white/5 overflow-hidden animate-slide-up-fade stagger-1">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/2 border-b border-white/5">
                        <th class="pl-10 pr-3 py-6 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Signal & Metadata</th>
                        <th class="px-3 py-6 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Cluster</th>
                        <th class="px-3 py-6 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Synchronization</th>
                        <th class="px-3 py-6 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Deployed</th>
                        <th class="px-3 pr-10 py-6 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">Control</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/2">
                    @forelse($articles as $article)
                        <tr class="hover:bg-white/5 transition-all duration-500 group">
                            <td class="pl-10 pr-3 py-6">
                                <div class="flex items-center gap-6">
                                    <div class="relative w-14 h-14 rounded-2xl bg-slate-900 border border-white/10 flex items-center justify-center text-slate-500 overflow-hidden shadow-lift group-hover:border-accent-purple/50 transition-colors">
                                        @if($article->image)
                                            <img src="{{ $article->image }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        @else
                                            <svg class="w-6 h-6 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V9a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2z"/></svg>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 to-transparent"></div>
                                    </div>
                                    <div class="flex flex-col min-w-0">
                                        <span class="text-sm font-black text-white font-outfit leading-tight mb-1 group-hover:text-accent-purple transition-colors truncate">{{ $article->title }}</span>
                                        <span class="text-[11px] text-slate-500 font-medium italic truncate max-w-[280px]">{{ $article->description }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-6">
                                <span class="inline-flex px-3 py-1 bg-white/5 border border-white/5 text-slate-300 rounded-lg text-[10px] font-black tracking-widest uppercase group-hover:bg-accent-purple/10 group-hover:border-accent-purple/20 transition-all truncate">{{ $article->category }}</span>
                            </td>
                            <td class="px-3 py-6">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-accent-emerald animate-pulse shadow-glow-emerald"></div>
                                    <span class="text-[11px] font-bold text-white font-outfit uppercase tracking-tighter italic">Active Signal</span>
                                </div>
                            </td>
                            <td class="px-3 py-6">
                                <span class="text-[12px] text-slate-400 font-bold font-outfit tabular-nums">{{ $article->created_at->format('M d, Y') }}</span>
                            </td>
                            <td class="px-3 pr-10 py-6 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-x-4 group-hover:translate-x-0">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="w-10 h-10 flex items-center justify-center bg-white/5 border border-white/10 text-slate-400 hover:text-white hover:bg-accent-purple hover:border-accent-purple rounded-xl transition-all shadow-lift">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Initiate archival sequence for this resource?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-10 h-10 flex items-center justify-center bg-white/5 border border-white/10 text-slate-400 hover:text-white hover:bg-accent-rose hover:border-accent-rose rounded-xl transition-all shadow-lift">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-10 py-24 text-center">
                                <div class="flex flex-col items-center gap-6">
                                    <div class="w-20 h-20 bg-white/2 rounded-full flex items-center justify-center text-slate-800 border-2 border-dashed border-white/5 mb-2">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V9a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-slate-600 uppercase tracking-[0.3em]">No resources deployed in this sector</p>
                                        <p class="text-[10px] text-slate-700 font-medium italic mt-2 italic">Awaiting synthetic command signal...</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($articles->hasPages())
            <div class="px-10 py-8 border-t border-white/5 bg-white/1">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
