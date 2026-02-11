<x-admin-layout>
    @section('title', 'Manage Hotlines')
<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-maternal-brown">Manage Hotlines</h1>
            <p class="text-maternal-brown/50">Add, edit, or remove emergency support numbers.</p>
        </div>
        <button onclick="document.getElementById('addHotlineModal').classList.remove('hidden')" class="bg-maternal-brown text-white px-6 py-3 rounded-2xl font-bold hover:bg-maternal-rose transition shadow-lg shadow-maternal-brown/20 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Hotline
        </button>
    </div>

    @if(session('success'))
        <div class="bg-maternal-sage/20 text-maternal-sage-dark p-4 rounded-2xl mb-8 border border-maternal-sage/30 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] border border-maternal-peach/30 shadow-xl shadow-maternal-peach/10 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-maternal-peach/10">
                    <th class="px-8 py-6 text-xs font-bold text-maternal-brown/40 uppercase tracking-widest">Region</th>
                    <th class="px-8 py-6 text-xs font-bold text-maternal-brown/40 uppercase tracking-widest">Agency</th>
                    <th class="px-8 py-6 text-xs font-bold text-maternal-brown/40 uppercase tracking-widest">Number</th>
                    <th class="px-8 py-6 text-xs font-bold text-maternal-brown/40 uppercase tracking-widest text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-maternal-peach/20">
                @forelse($hotlines as $hotline)
                    <tr class="hover:bg-maternal-peach/5 transition group">
                        <td class="px-8 py-6">
                            <span class="font-bold text-maternal-brown block">{{ $hotline->region }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-maternal-brown/70">{{ $hotline->agency }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="inline-block px-3 py-1 bg-maternal-rose text-white text-xs font-bold rounded-full">{{ $hotline->number }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end space-x-3">
                                <button onclick='editHotline(@json($hotline))' class="p-2 text-maternal-brown/40 hover:text-maternal-brown transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M16.5 3.5a2.121 2.121 0 113 3L13 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                </button>
                                <form action="{{ route('admin.hotlines.destroy', $hotline) }}" method="POST" onsubmit="return confirm('Delete this hotline?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-maternal-brown/40 hover:text-maternal-rose transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-maternal-brown/30 font-medium">
                            No hotlines found. Add your first one above!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div id="addHotlineModal" class="fixed inset-0 bg-maternal-brown/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] w-full max-w-lg p-10 shadow-2xl">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-2xl font-bold text-maternal-brown">Add New Hotline</h3>
            <button onclick="document.getElementById('addHotlineModal').classList.add('hidden')" class="p-2 text-maternal-brown/40 hover:text-maternal-brown">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form action="{{ route('admin.hotlines.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-bold text-maternal-brown/40 uppercase tracking-widest mb-2 px-1">Region</label>
                <input type="text" name="region" required class="w-full bg-maternal-peach/10 border-maternal-peach/30 rounded-2xl text-maternal-brown focus:border-maternal-rose focus:ring-maternal-rose/20 transition-all p-4">
            </div>
            <div>
                <label class="block text-xs font-bold text-maternal-brown/40 uppercase tracking-widest mb-2 px-1">Agency</label>
                <input type="text" name="agency" required class="w-full bg-maternal-peach/10 border-maternal-peach/30 rounded-2xl text-maternal-brown focus:border-maternal-rose focus:ring-maternal-rose/20 transition-all p-4">
            </div>
            <div>
                <label class="block text-xs font-bold text-maternal-brown/40 uppercase tracking-widest mb-2 px-1">Number</label>
                <input type="text" name="number" required class="w-full bg-maternal-peach/10 border-maternal-peach/30 rounded-2xl text-maternal-brown focus:border-maternal-rose focus:ring-maternal-rose/20 transition-all p-4">
            </div>
            <div class="flex justify-end space-x-4 pt-4">
                <button type="button" onclick="document.getElementById('addHotlineModal').classList.add('hidden')" class="px-6 py-3 font-bold text-maternal-brown/60 hover:text-maternal-brown transition">Cancel</button>
                <button type="submit" class="bg-maternal-brown text-white px-10 py-3 rounded-2xl font-bold hover:bg-maternal-rose transition shadow-xl shadow-maternal-brown/20">Save Hotline</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editHotlineModal" class="fixed inset-0 bg-maternal-brown/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-[3rem] w-full max-w-lg p-10 shadow-2xl">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-2xl font-bold text-maternal-brown">Edit Hotline</h3>
            <button onclick="document.getElementById('editHotlineModal').classList.add('hidden')" class="p-2 text-maternal-brown/40 hover:text-maternal-brown">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form id="editHotlineForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-bold text-maternal-brown/40 uppercase tracking-widest mb-2 px-1">Region</label>
                <input type="text" name="region" id="edit_region" required class="w-full bg-maternal-peach/10 border-maternal-peach/30 rounded-2xl text-maternal-brown focus:border-maternal-rose focus:ring-maternal-rose/20 transition-all p-4">
            </div>
            <div>
                <label class="block text-xs font-bold text-maternal-brown/40 uppercase tracking-widest mb-2 px-1">Agency</label>
                <input type="text" name="agency" id="edit_agency" required class="w-full bg-maternal-peach/10 border-maternal-peach/30 rounded-2xl text-maternal-brown focus:border-maternal-rose focus:ring-maternal-rose/20 transition-all p-4">
            </div>
            <div>
                <label class="block text-xs font-bold text-maternal-brown/40 uppercase tracking-widest mb-2 px-1">Number</label>
                <input type="text" name="number" id="edit_number" required class="w-full bg-maternal-peach/10 border-maternal-peach/30 rounded-2xl text-maternal-brown focus:border-maternal-rose focus:ring-maternal-rose/20 transition-all p-4">
            </div>
            <div class="flex justify-end space-x-4 pt-4">
                <button type="button" onclick="document.getElementById('editHotlineModal').classList.add('hidden')" class="px-6 py-3 font-bold text-maternal-brown/60 hover:text-maternal-brown transition">Cancel</button>
                <button type="submit" class="bg-maternal-brown text-white px-10 py-3 rounded-2xl font-bold hover:bg-maternal-rose transition shadow-xl shadow-maternal-brown/20">Update Hotline</button>
            </div>
        </form>
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
