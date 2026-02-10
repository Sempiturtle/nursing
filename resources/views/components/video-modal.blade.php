<div x-data="{ open: false, videoUrl: '' }" 
     @open-video.window="open = true; videoUrl = $event.detail.url"
     class="relative z-[9999]" 
     x-show="open" 
     x-cloak>
    
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm"></div>

    <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 @click.away="open = false; videoUrl = ''"
                 class="w-full max-w-5xl bg-black rounded-3xl overflow-hidden shadow-2xl relative aspect-video">
                
                <button @click="open = false; videoUrl = ''" class="absolute top-4 right-4 z-50 p-2 bg-white/10 hover:bg-white/20 text-white rounded-full transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <template x-if="videoUrl">
                    <iframe class="w-full h-full" :src="videoUrl + '?autoplay=1'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </template>
            </div>
        </div>
    </div>
</div>
