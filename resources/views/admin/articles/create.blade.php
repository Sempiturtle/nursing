<x-admin-layout>
    <x-slot name="header">Education</x-slot>

    <div class="max-w-4xl mx-auto">
        {{-- Navigation --}}
        <div class="mb-12 animate-slide-up-fade">
            <a href="{{ route('admin.articles.index') }}" class="group inline-flex items-center gap-3 text-[10px] font-black text-slate-500 hover:text-white transition-all uppercase tracking-[0.3em]">
                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center group-hover:border-accent-purple/50 group-hover:text-accent-purple transition-all">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                </div>
                Return to Intelligence Index
            </a>
        </div>

        {{-- Page header --}}
        <div class="mb-12 animate-slide-up-fade stagger-1">
            <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tighter font-outfit uppercase italic mb-3">
                Resource <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(synthesis)</span>
            </h1>
            <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-accent-purple shadow-glow-purple"></span>
                Initialize new educational transmission for the community node.
            </p>
        </div>

        <form action="{{ route('admin.articles.store') }}" method="POST" class="animate-slide-up-fade stagger-2">
            @csrf
            <div class="glass rounded-[2.5rem] border-white/5 p-10 lg:p-12 space-y-12">
                
                {{-- Primary Data --}}
                <div class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Transmission Title</label>
                            <input type="text" name="title" required placeholder="Enter resource nomenclature..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Classification Cluster</label>
                            <div class="relative group">
                                <select name="category" required
                                        class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all cursor-pointer appearance-none">
                                    <option value="Breastfeeding">Breastfeeding</option>
                                    <option value="Nutrition">Nutrition</option>
                                    <option value="Infant Care">Infant Care</option>
                                    <option value="Mental Health">Mental Health</option>
                                </select>
                                <svg class="w-4 h-4 text-slate-500 absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none group-hover:text-accent-purple transition-colors" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Intel Summary</label>
                        <textarea name="description" required rows="3" placeholder="Define the core transmission objectives..."
                                  class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all placeholder:text-slate-700 resize-none"></textarea>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Visual Asset Mapping (URL)</label>
                        <input type="url" name="image" placeholder="https://cdn.maternal.io/assets/..." 
                               class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-mono text-xs focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all placeholder:text-slate-700">
                    </div>
                </div>

                {{-- Protocol Confirmation --}}
                <div class="p-8 bg-slate-900/50 rounded-3xl border border-white/5 space-y-4">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-accent-emerald/10 border border-accent-emerald/20 flex items-center justify-center text-accent-emerald shadow-glow-emerald shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-xs font-black text-white font-outfit uppercase tracking-widest">Global Synchronization Ready</h4>
                            <p class="text-[11px] text-slate-500 font-medium italic">Resource will be initialized in the knowledge base and propagated across all community nodes immediately upon deployment.</p>
                        </div>
                    </div>
                </div>

                {{-- Control Actions --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="flex-1 flex items-center justify-center gap-3 py-5 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-purple hover:text-white transition-all shadow-glow-white hover:shadow-glow-purple group">
                        Deploy Final Resource
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="sm:w-1/3 flex items-center justify-center py-5 bg-white/2 border border-white/5 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-white/5 hover:text-white transition-all">
                        Discard Sequence
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
