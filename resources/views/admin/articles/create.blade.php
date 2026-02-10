<x-admin-layout>
    @section('title', 'Write Article')

    <div class="max-w-5xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('admin.articles.index') }}" class="p-2 bg-white border border-zinc-200 rounded-xl hover:bg-zinc-50 transition active:scale-95 shadow-sm">
                <svg class="w-5 h-5 text-zinc-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">Write Article</h1>
                <p class="text-sm text-zinc-500">Create new educational content for mothers</p>
            </div>
        </div>

        <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden animate-fade-up">
            <form action="{{ route('admin.articles.store') }}" method="POST" class="p-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2 space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" required
                                   class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition text-lg font-bold font-outfit"
                                   placeholder="Article Title">
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Content</label>
                            <textarea name="content" rows="15" required
                                      class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition leading-relaxed font-outfit"
                                      placeholder="Write your article content here...">{{ old('content') }}</textarea>
                            @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="p-6 bg-zinc-50 rounded-2xl border border-zinc-100">
                            <h3 class="text-sm font-bold text-zinc-900 font-outfit mb-4">Settings</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Category</label>
                                    <select name="category" required
                                            class="w-full bg-white border border-zinc-200 rounded-xl px-4 py-2.5 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition">
                                        <option value="Breastfeeding">Breastfeeding</option>
                                        <option value="Nutrition">Nutrition</option>
                                        <option value="Infant Care">Infant Care</option>
                                        <option value="Mental Health">Mental Health</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Featured Image URL</label>
                                    <input type="url" name="image" value="{{ old('image') }}"
                                           class="w-full bg-white border border-zinc-200 rounded-xl px-4 py-2.5 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                                           placeholder="https://images.unsplash.com/...">
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-rose-50 rounded-2xl border border-rose-100 italic text-[12px] text-rose-600">
                            Articles are automatically published upon submission. Use clear, helpful language to support lactating mothers.
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-zinc-100 flex justify-end gap-3">
                    <a href="{{ route('admin.articles.index') }}" class="px-6 py-3 border border-zinc-200 rounded-xl text-zinc-500 font-bold hover:bg-zinc-50 transition active:scale-95 uppercase tracking-widest text-[11px]">Discard</a>
                    <button type="submit" class="px-8 py-3 bg-[var(--maternal-brown)] text-white rounded-xl font-bold hover:bg-zinc-800 transition active:scale-95 shadow-lg shadow-zinc-200 uppercase tracking-widest text-[11px]">
                        Publish Article
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
