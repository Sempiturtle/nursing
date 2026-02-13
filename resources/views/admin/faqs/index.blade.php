<x-admin-layout>
    @section('title', 'Manage FAQs')
    <div class="space-y-10">
        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 animate-slide-up-fade">
            <div>
                <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tighter font-outfit uppercase italic mb-2">
                    Support <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(intelligence)</span>
                </h1>
                <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-purple shadow-glow-purple"></span>
                    Synthesize frequently asked questions and community knowledge nodes.
                </p>
            </div>
            <button onclick="document.getElementById('addFaqModal').classList.remove('hidden')" 
                    class="group inline-flex items-center gap-3 px-8 py-4 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-purple hover:text-white transition-all shadow-glow-white hover:shadow-glow-purple">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                Initialize New FAQ
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
                            <th class="pl-10 pr-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Question Vector</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Response Intelligence</th>
                            <th class="pl-4 pr-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">Control Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($faqs as $faq)
                            <tr class="hover:bg-white/2 transition-all group">
                                <td class="pl-10 pr-4 py-8 max-w-sm">
                                    <span class="text-white font-outfit font-bold text-base tracking-tight block">{{ $faq->question }}</span>
                                </td>
                                <td class="px-4 py-8">
                                    <p class="text-slate-400 font-medium text-sm line-clamp-2 leading-relaxed italic">"{{ $faq->answer }}"</p>
                                </td>
                                <td class="pl-4 pr-10 py-8 text-right">
                                    <div class="flex justify-end items-center gap-4 translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                                        <button onclick='editFaq(@json($faq))' 
                                                class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white hover:border-white/30 transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                        </button>
                                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline" onsubmit="return confirm('Initiate intelligence node decommissioning protocol?')">
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
                                <td colspan="3" class="px-10 py-32 text-center">
                                    <div class="flex flex-col items-center gap-6">
                                        <div class="w-20 h-20 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-700 animate-pulse">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"/></svg>
                                        </div>
                                        <div class="space-y-1">
                                            <p class="text-white font-outfit font-bold uppercase tracking-widest">No Intelligence Nodes</p>
                                            <p class="text-slate-500 text-sm font-medium italic">Community knowledge base currently empty.</p>
                                        </div>
                                        <button onclick="document.getElementById('addFaqModal').classList.remove('hidden')" 
                                                class="px-8 py-3 bg-white/5 border border-white/10 text-slate-400 hover:text-white hover:bg-white/10 rounded-xl text-[10px] font-black uppercase tracking-[0.2em] transition-all">
                                            Initialize Knowledge Base
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
    <div id="addFaqModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-xl z-[100] hidden flex items-center justify-center p-6">
        <div class="glass border-white/10 rounded-[3rem] w-full max-w-2xl overflow-hidden animate-slide-up-fade">
            <div class="p-10 lg:p-12 space-y-10">
                <div class="flex justify-between items-center">
                    <div class="space-y-1">
                        <h3 class="text-2xl font-black text-white font-outfit uppercase tracking-tight">New Knowledge Node</h3>
                        <p class="text-xs text-slate-500 font-medium">Initialize community intelligence vector.</p>
                    </div>
                    <button onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="w-12 h-12 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-center text-slate-500 hover:text-white transition-all group">
                        <svg class="w-6 h-6 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="space-y-6">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-purple">Question Vector</label>
                            <input type="text" name="question" required placeholder="Enter community query..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-purple">Response Intelligence</label>
                            <textarea name="answer" rows="6" required placeholder="Synthesize definitive response..." 
                                      class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all placeholder:text-slate-700 resize-none"></textarea>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 flex items-center justify-center gap-3 py-5 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-purple hover:text-white transition-all shadow-glow-white hover:shadow-glow-purple group">
                            Save Knowledge Node
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </button>
                        <button type="button" onclick="document.getElementById('addFaqModal').classList.add('hidden')" class="px-8 py-5 border border-white/5 bg-white/2 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:text-white hover:bg-white/5 transition-all">
                            Abort
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div id="editFaqModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-xl z-[100] hidden flex items-center justify-center p-6">
        <div class="glass border-white/10 rounded-[3rem] w-full max-w-2xl overflow-hidden animate-slide-up-fade">
            <div class="p-10 lg:p-12 space-y-10">
                <div class="flex justify-between items-center">
                    <div class="space-y-1">
                        <h3 class="text-2xl font-black text-white font-outfit uppercase tracking-tight">Recalibrate Intelligence</h3>
                        <p class="text-xs text-slate-500 font-medium">Modifying existing community knowledge node.</p>
                    </div>
                    <button onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="w-12 h-12 rounded-2xl bg-white/5 border border-white/5 flex items-center justify-center text-slate-500 hover:text-white transition-all group">
                        <svg class="w-6 h-6 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form id="editFaqForm" method="POST" class="space-y-8">
                    @csrf @method('PUT')
                    <div class="space-y-6">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-purple">Question Vector</label>
                            <input type="text" name="question" id="edit_question" required placeholder="Enter community query..." 
                                   class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all placeholder:text-slate-700">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 text-accent-purple">Response Intelligence</label>
                            <textarea name="answer" id="edit_answer" rows="6" required placeholder="Synthesize definitive response..." 
                                      class="w-full bg-slate-900/50 border border-white/5 rounded-2xl px-6 py-4 text-white font-outfit text-sm focus:ring-2 focus:ring-accent-purple/20 focus:border-accent-purple/40 transition-all placeholder:text-slate-700 resize-none"></textarea>
                        </div>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 flex items-center justify-center gap-3 py-5 bg-white text-slate-900 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-accent-purple hover:text-white transition-all shadow-glow-white hover:shadow-glow-purple group">
                            Update Node
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </button>
                        <button type="button" onclick="document.getElementById('editFaqModal').classList.add('hidden')" class="px-8 py-5 border border-white/5 bg-white/2 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:text-white hover:bg-white/5 transition-all">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editFaq(faq) {
            const modal = document.getElementById('editFaqModal');
            const form = document.getElementById('editFaqForm');
            document.getElementById('edit_question').value = faq.question;
            document.getElementById('edit_answer').value = faq.answer;
            form.action = `/admin/faqs/${faq.id}`;
            modal.classList.remove('hidden');
        }
    </script>
</x-admin-layout>
