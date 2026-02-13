<x-admin-layout>
    <x-slot name="header">Community</x-slot>

    <div class="space-y-10">
        {{-- Page header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-8 animate-slide-up-fade">
            <div class="space-y-1">
                <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tighter font-outfit uppercase italic mb-2">
                    Access <span class="gradient-text tracking-normal not-italic lowercase font-medium opacity-80">(control)</span>
                </h1>
                <p class="text-slate-500 font-medium flex items-center gap-2 text-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-emerald shadow-glow-emerald"></span>
                    Manage authorized personnel and community nodes registered in the network hub.
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
                            <th class="pl-10 pr-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Node Identity</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Communication Channel</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Permission Tier</th>
                            <th class="px-4 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Initialization</th>
                            <th class="pl-4 pr-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">Control Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($users as $user)
                            <tr class="hover:bg-white/2 transition-all group">
                                <td class="pl-10 pr-4 py-8">
                                    <div class="flex items-center gap-5">
                                        <div class="relative group/avatar">
                                            <div class="w-14 h-14 rounded-2xl bg-slate-900 border border-white/10 flex items-center justify-center text-slate-500 shadow-lift group-hover:border-accent-emerald/50 transition-all duration-500 overflow-hidden ring-4 ring-transparent group-hover/avatar:ring-accent-emerald/10">
                                                @if(isset($user->avatar))
                                                    <img src="{{ $user->avatar }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full gradient-accent p-0.5 shadow-lift">
                                                        <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center font-black text-sm text-white uppercase italic">
                                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-accent-emerald rounded-full border-2 border-slate-950 shadow-glow-emerald"></div>
                                        </div>
                                        <div class="flex flex-col min-w-0">
                                            <span class="text-white font-outfit font-bold text-base leading-tight mb-1 truncate">{{ $user->name }}</span>
                                            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest italic group-hover:text-slate-400 transition-colors">ID: {{ substr($user->id, 0, 8) ?? 'NODE_AUTH' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-8">
                                    <span class="text-slate-300 font-mono text-xs tracking-tight">{{ $user->email }}</span>
                                </td>
                                <td class="px-4 py-8">
                                    <span class="inline-flex px-4 py-2 {{ $user->is_admin ? 'bg-accent-purple/10 border-accent-purple/20 text-accent-purple shadow-glow-purple/10' : 'bg-white/5 border-white/10 text-slate-400' }} border rounded-xl text-[10px] font-black tracking-widest uppercase">
                                        {{ $user->is_admin ? 'Administrator' : 'Standard Node' }}
                                    </span>
                                </td>
                                <td class="px-4 py-8">
                                    <div class="flex flex-col">
                                        <span class="text-white font-outfit font-bold text-sm tabular-nums">{{ $user->created_at->format('M d, Y') }}</span>
                                        <span class="text-[10px] text-slate-500 font-medium uppercase tracking-widest italic">Node Registered</span>
                                    </div>
                                </td>
                                <td class="pl-4 pr-10 py-8 text-right">
                                    <div class="flex justify-end items-center gap-4 translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                                        <button class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-white hover:border-white/30 transition-all" onclick="alert('Access privilege modification protocol...')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-10 py-32 text-center">
                                    <div class="flex flex-col items-center gap-6">
                                        <div class="w-20 h-20 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-700 animate-pulse">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                                        </div>
                                        <div class="space-y-1">
                                            <p class="text-white font-outfit font-bold uppercase tracking-widest">No Node Identity</p>
                                            <p class="text-slate-500 text-sm font-medium italic">Awaiting node authentication signal in this sector.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
