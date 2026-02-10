<x-admin-layout>
    @section('title', 'Add Clinic')

    <div class="max-w-4xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('admin.clinics.index') }}" class="p-2 bg-white border border-zinc-200 rounded-xl hover:bg-zinc-50 transition active:scale-95 shadow-sm">
                <svg class="w-5 h-5 text-zinc-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">Add Clinic</h1>
                <p class="text-sm text-zinc-500">Register a new lactation station or health clinic</p>
            </div>
        </div>

        <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden animate-fade-up">
            <form action="{{ route('admin.clinics.store') }}" method="POST" class="p-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Clinic Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                               placeholder="e.g., Central Health Center">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Full Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" required
                               class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                               placeholder="Street, Barangay, City">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Contact Number</label>
                        <input type="text" name="contact_number" value="{{ old('contact_number') }}"
                               class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                               placeholder="e.g., 0912 345 6789">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Operating Hours</label>
                        <input type="text" name="operating_hours" value="{{ old('operating_hours') }}"
                               class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                               placeholder="e.g., 8:00 AM - 5:00 PM">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Services Provided</label>
                        <textarea name="services" rows="3"
                                  class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                                  placeholder="e.g., Breastfeeding counseling, Newborn checkups..."></textarea>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-zinc-100 flex justify-end gap-3">
                    <a href="{{ route('admin.clinics.index') }}" class="px-6 py-3 border border-zinc-200 rounded-xl text-zinc-500 font-bold hover:bg-zinc-50 transition active:scale-95">Cancel</a>
                    <button type="submit" class="px-8 py-3 bg-[var(--maternal-rose)] text-white rounded-xl font-bold hover:bg-[var(--maternal-rose-dark)] transition active:scale-95 shadow-lg shadow-rose-200">
                        Register Clinic
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
