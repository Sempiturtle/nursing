<x-admin-layout>
    <x-slot name="header">Tutorials</x-slot>

    <div class="max-w-4xl mx-auto">
        {{-- Navigation --}}
        <div class="mb-12 animate-slide-up-fade">
            <a href="{{ route('admin.videos.index') }}" class="group inline-flex items-center gap-3 text-[10px] font-black text-slate-500 hover:text-white transition-all uppercase tracking-[0.3em]">
                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center group-hover:border-accent-rose/50 group-hover:text-accent-rose transition-all">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                </div>
                Return to Media Intelligence
            </a>
        </div>

        {{-- Page header --}}
        <div class="mb-12 animate-slide-up-fade stagger-1">
            <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tighter font-outfit uppercase italic mb-3">
                Asset <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(upload)</span>
            </h1>
            <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-accent-rose shadow-glow-rose"></span>
                Broadcast a new clinical walkthrough that empowers our community.
            </p>
        </div>

        <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" class="animate-slide-up-fade stagger-2">
            @csrf
            <div class="glass rounded-[2.5rem] border-white/5 p-10 lg:p-12 space-y-12">
                
                {{-- Primary Data --}}
                <div class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Transmission Title</label>
                            <input type="text" name="title" required placeholder="Asset nomenclature..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Asset Cluster</label>
                            <div class="relative group">
                                <select name="category" required
                                        class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all cursor-pointer appearance-none">
                                    <option value="Tutorial">Tutorial</option>
                                    <option value="Interview">Interview</option>
                                    <option value="Workshop">Workshop</option>
                                    <option value="Quick Tip">Quick Tip</option>
                                </select>
                                <svg class="w-4 h-4 text-slate-500 absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none group-hover:text-accent-rose transition-colors" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Asset Intelligence Summary</label>
                        <textarea name="description" required rows="4" placeholder="Provide technical overview of this procedure..."
                                  class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700 resize-none"></textarea>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Transmission Path (URL)</label>
                            <input type="url" name="url" required placeholder="https://youtube.com/watch?v=..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-mono text-[10px] focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Thumbnail Source (URL)</label>
                            <input type="url" name="thumbnail" placeholder="https://cdn.maternal.io/thumbnails/..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-mono text-[10px] focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                    </div>
                </div>

                {{-- Protocol Confirmation --}}
                <div class="p-8 bg-slate-900/50 rounded-3xl border border-white/5 space-y-4">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-accent-rose/10 border border-accent-rose/20 flex items-center justify-center text-accent-rose shadow-glow-rose shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 18L18 12L12 6M6 18L12 12L6 6"/></svg>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-xs font-black text-white font-outfit uppercase tracking-widest">Global Broadcast Ready</h4>
                            <p class="text-[11px] text-slate-500 font-medium italic">Asset will be injected into the tutorial grid and propagated across all maternal nodes immediately upon transmission.</p>
                        </div>
                    </div>
                </div>

                {{-- Control Actions --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="flex-1 flex items-center justify-center gap-3 py-5 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-rose hover:text-white transition-all shadow-glow-white hover:shadow-glow-rose group">
                        Inject Asset Transmission
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </button>
                    <a href="{{ route('admin.videos.index') }}" class="sm:w-1/3 flex items-center justify-center py-5 bg-white/2 border border-white/5 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-white/5 hover:text-white transition-all">
                        Abort Sequence
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
