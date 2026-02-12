<x-app-layout>
    <div x-data="{}" class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-20 text-center">
                <h2 class="font-outfit font-bold text-4xl md:text-5xl text-maternal-brown mb-4 tracking-tight">Watch & Learn</h2>
                <p class="text-maternal-brown/85 text-lg font-medium max-w-2xl mx-auto">Master the art of nursing with our curated expert-led video guides.</p>
            </div>

            <!-- Videos Section -->
            <div class="mb-24">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @forelse($videos as $video)
                        <div @click="$dispatch('open-video', { url: '{{ $video->embed_url }}' })" class="group bg-white rounded-[2.5rem] overflow-hidden border border-maternal-peach/30 shadow-sm hover:shadow-2xl hover:shadow-maternal-rose/10 transition-all duration-500 transform hover:-translate-y-2 cursor-pointer">
                            <div class="aspect-video bg-maternal-brown/5 relative overflow-hidden">
                                <img src="{{ $video->thumbnail }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-maternal-brown/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-maternal-rose text-white rounded-full flex items-center justify-center transform scale-90 group-hover:scale-100 transition-all duration-500 shadow-xl shadow-maternal-rose/40">
                                        <svg class="w-8 h-8 fill-current ml-1" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6V4z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="p-8">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="bg-maternal-peach text-maternal-rose text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full inline-block border border-maternal-rose/20">{{ $video->category }}</span>
                                    <span class="text-[10px] font-black text-maternal-brown/50 uppercase tracking-widest">Instructional</span>
                                </div>
                                <h4 class="font-bold text-maternal-brown text-xl mb-3 leading-tight group-hover:text-maternal-rose transition-colors duration-300">{{ $video->title }}</h4>
                                <p class="text-maternal-brown/80 text-sm font-medium leading-relaxed line-clamp-2">{{ $video->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 text-center bg-white/50 backdrop-blur-sm rounded-[3rem] border-2 border-dashed border-maternal-peach text-maternal-brown/40 font-medium italic">
                            No instructional videos available yet. Check back soon!
                        </div>
                    @endforelse
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
