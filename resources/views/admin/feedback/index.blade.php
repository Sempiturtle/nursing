<x-admin-layout>
    <x-slot name="header">System Intelligence</x-slot>

    <div class="space-y-10">
        {{-- Page header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-8 animate-slide-up-fade">
            <div class="space-y-1">
                <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tighter font-outfit uppercase italic mb-2">
                    Social <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(signals)</span>
                </h1>
                <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-purple shadow-glow-purple"></span>
                    Community pulse monitoring and real-time experience feedback loops in the network grid.
                </p>
            </div>
        </div>

        @if(session('success'))
            <div class="animate-fade-up p-5 bg-accent-emerald/10 border border-accent-emerald/20 rounded-2xl flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-accent-emerald/20 flex items-center justify-center text-accent-emerald shadow-glow-emerald">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-sm font-bold text-accent-emerald uppercase tracking-widest">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Content Table --}}
        <div class="glass rounded-[2.5rem] border-white/5 overflow-hidden animate-slide-up-fade stagger-1">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/2 border-b border-white/5">
                            <th class="pl-10 pr-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Signal Source</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Intensity Rating</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Transmission Body</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Reception Date</th>
                            <th class="pl-4 pr-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">Control Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($feedbacks as $feedback)
                            <tr class="hover:bg-white/2 transition-all group">
                                <td class="pl-10 pr-4 py-8">
                                    <div class="flex items-center gap-5">
                                        <div class="w-14 h-14 rounded-2xl bg-slate-900 border border-white/10 flex items-center justify-center text-slate-400 shadow-lift group-hover:border-accent-purple/50 transition-all duration-500">
                                            <div class="w-full h-full gradient-accent p-0.5 opacity-60 group-hover:opacity-100 transition-opacity">
                                                <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center font-black text-sm text-white uppercase italic">
                                                    {{ strtoupper(substr($feedback->name, 0, 1)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col min-w-0">
                                            <span class="text-white font-outfit font-bold text-base leading-tight mb-1 truncate">{{ $feedback->name }}</span>
                                            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest italic group-hover:text-slate-400 transition-colors truncate">{{ $feedback->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-8">
                                    <div class="flex items-center gap-1.5">
                                        @for($i=1; $i<=5; $i++)
                                            <svg class="w-3.5 h-3.5 {{ $i <= $feedback->rating ? 'text-accent-purple shadow-glow-purple fill-current' : 'text-slate-800 fill-current group-hover:text-slate-700' }} transition-colors" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        @endfor
                                        <span class="ml-2 text-[11px] font-black text-white font-outfit tabular-nums italic group-hover:text-accent-purple transition-colors">{{ $feedback->rating }}.0</span>
                                    </div>
                                </td>
                                <td class="px-4 py-8 max-w-sm">
                                    <p class="text-slate-400 font-medium text-sm leading-relaxed italic line-clamp-2">"{{ $feedback->comment }}"</p>
                                </td>
                                <td class="px-4 py-8">
                                    <div class="flex flex-col">
                                        <span class="text-white font-outfit font-bold text-sm tabular-nums">{{ $feedback->created_at->format('M d, Y') }}</span>
                                        <span class="text-[10px] text-slate-500 font-medium uppercase tracking-widest italic font-outfit">Reception Captured</span>
                                    </div>
                                </td>
                                <td class="pl-4 pr-10 py-8 text-right">
                                    <div class="flex justify-end items-center gap-4 translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                                        <form action="{{ route('admin.feedback.destroy', $feedback) }}" method="POST" class="inline" onsubmit="return confirm('Initiate archival sequence for this community signal?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-10 h-10 rounded-xl bg-accent-rose/5 border border-accent-rose/10 flex items-center justify-center text-accent-rose hover:bg-accent-rose hover:text-white transition-all shadow-glow-rose/10">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-10 py-32 text-center">
                                    <div class="flex flex-col items-center gap-6">
                                        <div class="w-20 h-20 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-700 animate-pulse">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
                                        </div>
                                        <div class="space-y-1">
                                            <p class="text-white font-outfit font-bold uppercase tracking-widest">No Community Signals</p>
                                            <p class="text-slate-500 text-sm font-medium italic">Awaiting social resonance command in this sector.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($feedbacks->count() > 0 && method_exists($feedbacks, 'links'))
                <div class="px-10 py-8 border-t border-white/5 bg-white/1">
                    {{ $feedbacks->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
