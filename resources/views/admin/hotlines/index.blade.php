<x-admin-layout>
    @section('title', 'Manage Hotlines')
    <div class="space-y-10">
        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 animate-slide-up-fade">
            <div>
                <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tighter font-outfit uppercase italic mb-2">
                    Emergency <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(uplinks)</span>
                </h1>
                <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-rose shadow-glow-rose"></span>
                    Manage critical response channels and agency communication nodes.
                </p>
            </div>
            <button onclick="document.getElementById('addHotlineModal').classList.remove('hidden')" 
                    class="group inline-flex items-center gap-3 px-8 py-4 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-rose hover:text-white transition-all shadow-glow-white hover:shadow-glow-rose">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                Initialize New Uplink
            </button>
        </div>

        {{-- Success Notification --}}
        @if(session('success'))
            <div class="animate-fade-up p-5 bg-accent-emerald/10 border border-accent-emerald/20 rounded-2xl flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-accent-emerald/20 flex items-center justify-center text-accent-emerald shadow-glow-emerald">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-sm font-bold text-accent-emerald uppercase tracking-widest">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Main Intelligence Table --}}
        <div class="glass rounded-[2.5rem] border-white/5 overflow-hidden animate-slide-up-fade stagger-1">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/2 border-b border-white/5">
                            <th class="pl-10 pr-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Operational Region</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Responsible Agency</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Uplink Number</th>
                            <th class="pl-4 pr-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">Control Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($hotlines as $hotline)
                            <tr class="hover:bg-white/2 transition-all group">
                                <td class="pl-10 pr-4 py-8">
                                    <span class="text-white font-outfit font-bold text-base tracking-tight">{{ $hotline->region }}</span>
                                </td>
                                <td class="px-4 py-8">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2 h-2 rounded-full bg-slate-700"></div>
                                        <span class="text-slate-400 font-medium text-sm">{{ $hotline->agency }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-8">
                                    <span class="inline-flex px-4 py-2 bg-accent-rose/10 border border-accent-rose/20 text-accent-rose text-[11px] font-black rounded-xl tracking-widest shadow-glow-rose/20">
                                        {{ $hotline->number }}
                                    </span>
                                </td>
                                <td class="pl-4 pr-10 py-8 text-right">
                                    <div class="flex justify-end items-center gap-4 translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                                        <button onclick='editHotline(@json($hotline))' 
                                                class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white hover:border-white/30 transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                        </button>
                                        <form action="{{ route('admin.hotlines.destroy', $hotline) }}" method="POST" class="inline" onsubmit="return confirm('Initiate uplink decommissioning protocol?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="w-10 h-10 rounded-xl bg-accent-rose/5 border border-accent-rose/10 flex items-center justify-center text-accent-rose hover:bg-accent-rose hover:text-white transition-all shadow-glow-rose/10">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-10 py-32 text-center">
                                    <div class="flex flex-col items-center gap-6">
                                        <div class="w-20 h-20 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-700 animate-pulse">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                        </div>
                                        <div class="space-y-1">
                                            <p class="text-white font-outfit font-bold uppercase tracking-widest">No Active Uplinks</p>
                                            <p class="text-slate-500 text-sm font-medium italic">Emergency communication grid currently offline.</p>
                                        </div>
                                        <button onclick="document.getElementById('addHotlineModal').classList.remove('hidden')" 
                                                class="px-8 py-3 bg-white/5 border border-white/10 text-slate-400 hover:text-white hover:bg-white/10 rounded-xl text-[10px] font-black uppercase tracking-[0.2em] transition-all">
                                            Initialize Grid
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div id="addHotlineModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-xl z-[100] hidden flex items-center justify-center p-6">
        <div class="glass border-white/10 rounded-[3rem] w-full max-w-lg overflow-hidden animate-slide-up-fade">
            <div class="p-10 lg:p-12 space-y-10">
                <div class="flex justify-between items-center">
                    <div class="space-y-1">
                        <h3 class="text-2xl font-black text-white font-outfit uppercase tracking-tight">New Uplink</h3>
                        <p class="text-xs text-slate-500 font-medium">Initialize emergency communication node.</p>
                    </div>
                    <button onclick="document.getElementById('addHotlineModal').classList.add('hidden')" class="w-12 h-12 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-center text-slate-500 hover:text-white transition-all group">
                        <svg class="w-6 h-6 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form action="{{ route('admin.hotlines.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="space-y-6">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-rose">Operational Region</label>
                            <input type="text" name="region" required placeholder="Enter sector nomenclature..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-rose">Responsible Agency</label>
                            <input type="text" name="agency" required placeholder="Agency designation..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-rose">Uplink Number</label>
                            <input type="text" name="number" required placeholder="000-000-0000" 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-mono text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 flex items-center justify-center gap-3 py-5 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-rose hover:text-white transition-all shadow-glow-white hover:shadow-glow-rose group">
                            Save Hotline
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </button>
                        <button type="button" onclick="document.getElementById('addHotlineModal').classList.add('hidden')" class="px-8 py-5 border border-white/5 bg-white/2 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:text-white hover:bg-white/5 transition-all">
                            Abort
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div id="editHotlineModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-xl z-[100] hidden flex items-center justify-center p-6">
        <div class="glass border-white/10 rounded-[3rem] w-full max-w-lg overflow-hidden animate-slide-up-fade">
            <div class="p-10 lg:p-12 space-y-10">
                <div class="flex justify-between items-center">
                    <div class="space-y-1">
                        <h3 class="text-2xl font-black text-white font-outfit uppercase tracking-tight">Recalibrate Uplink</h3>
                        <p class="text-xs text-slate-500 font-medium">Modifying existing communication node.</p>
                    </div>
                    <button onclick="document.getElementById('editHotlineModal').classList.add('hidden')" class="w-12 h-12 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-center text-slate-500 hover:text-white transition-all group">
                        <svg class="w-6 h-6 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form id="editHotlineForm" method="POST" class="space-y-8">
                    @csrf @method('PUT')
                    <div class="space-y-6">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-rose">Operational Region</label>
                            <input type="text" name="region" id="edit_region" required placeholder="Enter sector nomenclature..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-rose">Responsible Agency</label>
                            <input type="text" name="agency" id="edit_agency" required placeholder="Agency designation..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-rose">Uplink Number</label>
                            <input type="text" name="number" id="edit_number" required placeholder="000-000-0000" 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-mono text-sm focus:ring-2 focus:ring-accent-rose/20 focus:border-accent-rose/40 transition-all placeholder:text-slate-700">
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 flex items-center justify-center gap-3 py-5 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-rose hover:text-white transition-all shadow-glow-white hover:shadow-glow-rose group">
                            Update Uplink
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </button>
                        <button type="button" onclick="document.getElementById('editHotlineModal').classList.add('hidden')" class="px-8 py-5 border border-white/5 bg-white/2 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:text-white hover:bg-white/5 transition-all">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editHotline(hotline) {
            const modal = document.getElementById('editHotlineModal');
            const form = document.getElementById('editHotlineForm');
            document.getElementById('edit_region').value = hotline.region;
            document.getElementById('edit_agency').value = hotline.agency;
            document.getElementById('edit_number').value = hotline.number;
            form.action = `/admin/hotlines/${hotline.id}`;
            modal.classList.remove('hidden');
        }
    </script>
</x-admin-layout>
