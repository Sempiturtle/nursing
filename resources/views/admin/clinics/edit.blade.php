<x-admin-layout>
    <x-slot name="header">Network</x-slot>

    <div class="max-w-4xl mx-auto">
        {{-- Navigation --}}
        <div class="mb-12 animate-slide-up-fade">
            <a href="{{ route('admin.clinics.index') }}" class="group inline-flex items-center gap-3 text-[10px] font-black text-slate-500 hover:text-white transition-all uppercase tracking-[0.3em]">
                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center group-hover:border-accent-emerald/50 group-hover:text-accent-emerald transition-all">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                </div>
                Return to Network Grid
            </a>
        </div>

        {{-- Page header --}}
        <div class="mb-12 animate-slide-up-fade stagger-1">
            <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tighter font-outfit uppercase italic mb-3">
                Node <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(recalibration)</span>
            </h1>
            <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-accent-emerald shadow-glow-emerald"></span>
                Refining care facility parameters within the community resonance network.
            </p>
        </div>

        <form action="{{ route('admin.clinics.update', $clinic) }}" method="POST" class="animate-slide-up-fade stagger-2">
            @csrf @method('PUT')
            <div class="glass rounded-[2.5rem] border-white/5 p-10 lg:p-12 space-y-12">
                
                {{-- Primary Data --}}
                <div class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Node Nomenclature</label>
                            <input type="text" name="name" value="{{ old('name', $clinic->name) }}" required placeholder="Enter facility name..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-emerald/20 focus:border-accent-emerald/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Geographic Coordinates</label>
                            <input type="text" name="address" value="{{ old('address', $clinic->address) }}" required placeholder="Physical location sector..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-emerald/20 focus:border-accent-emerald/40 transition-all placeholder:text-slate-700">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Comm Channel (Contact)</label>
                            <input type="text" name="contact_number" value="{{ old('contact_number', $clinic->contact_number) }}" required placeholder="Primary uplink number..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-mono text-sm focus:ring-2 focus:ring-accent-emerald/20 focus:border-accent-emerald/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Temporal Alignment (Hours)</label>
                            <input type="text" name="operational_hours" value="{{ old('operational_hours', $clinic->operational_hours) }}" required placeholder="0800 - 1700 SMT..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-emerald/20 focus:border-accent-emerald/40 transition-all placeholder:text-slate-700">
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Clinical Protocol (Services)</label>
                        <textarea name="services" required rows="3" placeholder="Define medical services provided at this node..."
                                  class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-emerald/20 focus:border-accent-emerald/40 transition-all placeholder:text-slate-700 resize-none">{{ old('services', $clinic->services) }}</textarea>
                    </div>
                </div>

                {{-- Protocol Confirmation --}}
                <div class="p-8 bg-slate-900/50 rounded-3xl border border-accent-rose/20 space-y-4">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-accent-rose/10 border border-accent-rose/20 flex items-center justify-center text-accent-rose shadow-glow-rose shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-xs font-black text-white font-outfit uppercase tracking-widest">Re-Authorization Required</h4>
                            <p class="text-[11px] text-slate-500 font-medium italic">Committing these details will initiate node re-mapping across the care network. High accuracy is required for medical grid integrity.</p>
                        </div>
                    </div>
                </div>

                {{-- Control Actions --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="flex-1 flex items-center justify-center gap-3 py-5 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-emerald hover:text-white transition-all shadow-glow-white hover:shadow-glow-emerald group">
                        Update Facility Node
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </button>
                    <a href="{{ route('admin.clinics.index') }}" class="sm:w-1/3 flex items-center justify-center py-5 bg-white/2 border border-white/5 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-white/5 hover:text-white transition-all">
                        Cancel Protocol
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
