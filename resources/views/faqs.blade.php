<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <div class="py-24 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="text-center mb-24 reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-12">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Knowledge Directory</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-7xl text-text-primary mb-10 tracking-tight leading-[1.05]">Common Enquiries</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">Browse clinical FAQs or interface with our system for protocol specific solutions.</p>
            </div>

            <div class="space-y-6" x-data="{ active: null }">
                @forelse(\App\Models\Faq::all() as $index => $faq)
                    <div class="bg-white rounded-[2.5rem] border border-maternal-black/5 overflow-hidden shadow-luxury reveal-on-scroll"
                         style="transition-delay: {{ $index * 100 }}ms">
                        <button @click="active = active === {{ $faq->id }} ? null : {{ $faq->id }}" 
                                class="w-full px-10 py-8 flex items-center justify-between text-left group transition-all duration-500"
                                :class="active === {{ $faq->id }} ? 'bg-surface-dim/30' : ''">
                            <span class="font-black text-text-primary text-xl tracking-tight group-hover:text-maternal-rose transition-colors duration-300">{{ $faq->question }}</span>
                            <div class="w-10 h-10 rounded-2xl border border-maternal-black/5 flex items-center justify-center text-maternal-rose transition-all duration-500 group-hover:bg-maternal-rose group-hover:text-white"
                                 :class="active === {{ $faq->id }} ? 'rotate-180 bg-surface-dark text-white border-transparent' : ''">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </button>
                        <div x-show="active === {{ $faq->id }}" 
                             x-collapse
                             class="px-10 pb-10 text-text-dimmed text-lg font-medium leading-relaxed">
                            <div class="pt-8 border-t border-maternal-black/5">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-32 bg-white/50 backdrop-blur-xl rounded-[4rem] border border-dashed border-maternal-black/10 text-text-muted font-medium italic reveal-on-scroll">
                        <div class="w-24 h-24 bg-surface-dim rounded-full flex items-center justify-center mx-auto mb-8 opacity-50">
                            <svg class="w-12 h-12 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        </div>
                        Our knowledge base is currently indexing for localized queries.
                    </div>
                @endforelse
            </div>

            <div class="mt-32 text-center reveal-on-scroll">
                <div class="bg-surface-dark rounded-[3.5rem] p-12 md:p-16 relative overflow-hidden shadow-suspended">
                    <div class="absolute inset-0 bg-grain opacity-10"></div>
                    <div class="relative z-10">
                        <h4 class="text-white text-2xl font-black mb-4 tracking-tight">Still have queries?</h4>
                        <p class="text-white/40 text-lg font-medium mb-10 max-w-sm mx-auto">Interface with our specialized support team for custom clinical protocols.</p>
                        <a href="mailto:support@milkyway.com" class="btn-agency-primary !bg-white !text-surface-dark hover:!bg-maternal-gray-soft">
                            Interface with Support
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
