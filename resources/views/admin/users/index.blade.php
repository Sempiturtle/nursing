@section('title', 'Users')

<x-admin-layout>

    {{-- Page header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 animate-fade-up">
        <div>
            <h1 class="text-xl font-semibold text-zinc-900 tracking-tight">Registered Users</h1>
            <p class="text-sm text-zinc-500 mt-1">{{ $users->count() }} accounts on the platform</p>
        </div>
    </div>

    {{-- Users Table --}}
    <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden animate-fade-up delay-1">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-zinc-100 bg-zinc-50/50">
                        <th class="pl-5 pr-3 py-3 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">#</th>
                        <th class="px-3 py-3 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">User</th>
                        <th class="px-3 py-3 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Email</th>
                        <th class="px-3 py-3 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Role</th>
                        <th class="px-3 py-3 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Registered</th>
                        <th class="px-3 pr-5 py-3 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-50">
                    @forelse($users as $idx => $user)
                        <tr class="hover:bg-zinc-50/70 transition-colors animate-slide-in" style="animation-delay: {{ 100 + ($idx * 60) }}ms">
                            <td class="pl-5 pr-3 py-3.5">
                                <span class="text-[12px] text-zinc-400 font-medium tabular-nums">{{ $idx + 1 }}</span>
                            </td>
                            <td class="px-3 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 bg-zinc-100 rounded-full flex items-center justify-center text-[11px] font-semibold text-zinc-500 flex-shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="text-[13px] font-medium text-zinc-800">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-3.5">
                                <span class="text-[13px] text-zinc-500">{{ $user->email }}</span>
                            </td>
                            <td class="px-3 py-3.5">
                                @if($user->is_admin)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-zinc-900 text-white text-[11px] font-semibold rounded-md">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 bg-zinc-100 text-zinc-500 text-[11px] font-semibold rounded-md">
                                        User
                                    </span>
                                @endif
                            </td>
                            <td class="px-3 py-3.5">
                                <span class="text-[12px] text-zinc-400 font-medium">{{ $user->created_at->format('M d, Y') }}</span>
                            </td>
                            <td class="px-3 pr-5 py-3.5 text-right">
                                <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-emerald-600">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    Active
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-16 text-center">
                                <p class="text-sm text-zinc-400">No users registered yet</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>
