<x-admin-layout>
    @section('title', 'Edit Video')

    <div class="max-w-4xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('admin.videos.index') }}" class="p-2 bg-white border border-zinc-200 rounded-xl hover:bg-zinc-50 transition active:scale-95 shadow-sm">
                <svg class="w-5 h-5 text-zinc-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 tracking-tight font-outfit">Edit Video</h1>
                <p class="text-sm text-zinc-500">Modify video details and settings</p>
            </div>
        </div>

        <div class="bg-white border border-zinc-200 rounded-2xl shadow-sm overflow-hidden animate-fade-up">
            <form action="{{ route('admin.videos.update', $video) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Video Title</label>
                        <input type="text" name="title" value="{{ old('title', $video->title) }}" required
                               class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                               placeholder="e.g., Proper Latching Technique">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Category</label>
                        <select name="category" required
                                class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition">
                            <option value="Breastfeeding" {{ old('category', $video->category) == 'Breastfeeding' ? 'selected' : '' }}>Breastfeeding</option>
                            <option value="Nutrition" {{ old('category', $video->category) == 'Nutrition' ? 'selected' : '' }}>Nutrition</option>
                            <option value="Infant Care" {{ old('category', $video->category) == 'Infant Care' ? 'selected' : '' }}>Infant Care</option>
                            <option value="Mental Health" {{ old('category', $video->category) == 'Mental Health' ? 'selected' : '' }}>Mental Health</option>
                        </select>
                        @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Embed/Video URL</label>
                        <input type="url" name="url" value="{{ old('url', $video->url) }}" required
                               class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                               placeholder="https://youtube.com/embed/...">
                        @error('url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Thumbnail URL</label>
                        <input type="url" name="thumbnail" value="{{ old('thumbnail', $video->thumbnail) }}"
                               class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                               placeholder="https://images.unsplash.com/...">
                        @error('thumbnail') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2">Description</label>
                        <textarea name="description" rows="4" required
                                  class="w-full bg-zinc-50 border border-zinc-200 rounded-xl px-4 py-3 text-zinc-900 focus:ring-2 focus:ring-[var(--maternal-rose)] focus:border-transparent transition"
                                  placeholder="Provide a brief overview of the video content...">{{ old('description', $video->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-zinc-100 flex justify-end gap-3">
                    <a href="{{ route('admin.videos.index') }}" class="px-6 py-3 border border-zinc-200 rounded-xl text-zinc-500 font-bold hover:bg-zinc-50 transition active:scale-95">Cancel</a>
                    <button type="submit" class="px-8 py-3 bg-[var(--maternal-rose)] text-white rounded-xl font-bold hover:bg-[var(--maternal-rose-dark)] transition active:scale-95 shadow-lg shadow-rose-200">
                        Update Video
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
