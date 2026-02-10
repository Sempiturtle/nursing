<x-admin-layout>
    @section('title', 'Manage Clinics')

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">Clinics & Stations</h1>
            <p class="text-sm text-zinc-500 mt-0.5">Manage health centers and lactation points</p>
        </div>
        <a href="{{ route('admin.clinics.create') }}" 
           class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[var(--maternal-peach)] text-zinc-900 text-[13.5px] font-bold rounded-xl hover:bg-zinc-800 hover:text-white active:scale-[0.97] transition-all shadow-md shadow-zinc-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Add New Clinic
        </a>
    </div>

    <div class="bg-white border border-zinc-200 rounded-2xl overflow-hidden shadow-sm animate-fade-up">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-zinc-100 bg-zinc-50/50">
                        <th class="pl-6 pr-3 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Clinic Details</th>
                        <th class="px-3 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Contact Info</th>
                        <th class="px-3 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest">Hours</th>
                        <th class="px-3 pr-6 py-4 text-[11px] font-bold text-zinc-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-50">
                    @forelse($clinics as $clinic)
                        <tr class="hover:bg-zinc-50/70 transition-colors group">
                            <td class="pl-6 pr-3 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-[var(--maternal-rose)]/10 text-[var(--maternal-rose)] rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[14px] font-bold text-zinc-900 font-outfit">{{ $clinic->name }}</h4>
                                        <p class="text-[11px] text-zinc-400 font-medium truncate max-w-[200px]">{{ $clinic->address }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-5 text-[12px] text-zinc-600 font-medium">
                                {{ $clinic->contact_number ?: 'N/A' }}
                            </td>
                            <td class="px-3 py-5">
                                <span class="px-2.5 py-1 bg-zinc-100 text-zinc-600 text-[10px] font-bold rounded-lg uppercase tracking-wider">{{ $clinic->operating_hours ?: '—' }}</span>
                            </td>
                            <td class="px-3 pr-6 py-5 text-right">
                                <div class="flex items-center justify-end gap-2 text-zinc-400">
                                    <a href="{{ route('admin.clinics.edit', $clinic) }}" class="p-2 hover:text-zinc-900 hover:bg-zinc-100 rounded-lg transition active:scale-95">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                    </a>
                                    <form action="{{ route('admin.clinics.destroy', $clinic) }}" method="POST" onsubmit="return confirm('Delete this clinic?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition active:scale-95">
                                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.053.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <p class="text-[12px] font-bold text-zinc-400 font-outfit uppercase tracking-widest">No clinics found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
