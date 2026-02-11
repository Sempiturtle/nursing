@section('title', 'User Feedback')

<x-admin-layout>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">User Feedback</h1>
            <p class="text-sm text-zinc-500 mt-0.5">Manage and review messages from mothers.</p>
        </div>
        <div class="flex items-center gap-4 bg-white px-4 py-2 rounded-xl border border-zinc-200">
            <span class="text-sm font-semibold text-zinc-400">Average Rating:</span>
            <span class="text-lg font-bold text-zinc-900">{{ $avgRating }}<span class="text-zinc-300">/5.0</span></span>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-4 py-3 rounded-xl mb-6 text-sm font-medium flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-zinc-200 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-zinc-100 bg-zinc-50/50">
                        <th class="pl-5 pr-3 py-4 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">User</th>
                        <th class="px-3 py-4 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Rating</th>
                        <th class="px-3 py-4 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Comment</th>
                        <th class="px-3 py-4 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Submitted</th>
                        <th class="px-3 pr-5 py-4 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-50">
                    @forelse($feedbacks as $fb)
                        <tr class="hover:bg-zinc-50/70 transition-colors">
                            <td class="pl-5 pr-3 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-[var(--maternal-rose)]/10 rounded-full flex items-center justify-center text-[11px] font-bold text-[var(--maternal-rose)]">
                                        {{ strtoupper(substr($fb->name, 0, 1)) }}
                                    </div>
                                    <span class="text-[14px] font-semibold text-zinc-800">{{ $fb->name }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-5">
                                <div class="flex items-center gap-2">
                                    <div class="flex gap-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-3.5 h-3.5 {{ $i <= $fb->rating ? 'text-amber-400 fill-current' : 'text-zinc-200' }}" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="text-[13px] font-medium text-zinc-500">{{ $fb->rating }}/5</span>
                                </div>
                            </td>
                            <td class="px-3 py-5">
                                <p class="text-[14px] text-zinc-600 leading-relaxed max-w-md">{{ $fb->comment }}</p>
                            </td>
                            <td class="px-3 py-5">
                                <span class="text-[13px] text-zinc-400">{{ $fb->created_at->format('M d, Y') }}</span>
                            </td>
                            <td class="px-3 pr-5 py-5 text-right">
                                <form action="{{ route('admin.feedback.destroy', $fb) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-zinc-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-20 text-center">
                                <div class="w-16 h-16 bg-zinc-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                </div>
                                <p class="text-zinc-500 font-medium">No feedback entries found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($feedbacks->hasPages())
            <div class="px-5 py-4 border-t border-zinc-100">
                {{ $feedbacks->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
