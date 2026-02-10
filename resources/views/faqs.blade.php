<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-16">
                <h3 class="font-outfit font-bold text-4xl text-maternal-brown mb-4">How can we help?</h3>
                <p class="text-maternal-brown/60 text-lg">Browse common questions or use the search bar to find answers.</p>
            </div>

            <div class="space-y-6" x-data="{ active: null }">
                @forelse(\App\Models\Faq::all() as $faq)
                    <div class="bg-white rounded-3xl border border-maternal-peach/30 overflow-hidden shadow-sm">
                        <button @click="active = active === {{ $faq->id }} ? null : {{ $faq->id }}" 
                                class="w-full px-8 py-6 flex items-center justify-between text-left group">
                            <span class="font-bold text-maternal-brown text-lg group-hover:text-maternal-rose transition">{{ $faq->question }}</span>
                            <svg class="w-6 h-6 text-maternal-rose transform transition duration-300" :class="active === {{ $faq->id }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="active === {{ $faq->id }}" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 max-h-0"
                             x-transition:enter-end="opacity-100 max-h-[1000px]"
                             class="px-8 pb-8 text-maternal-brown/60 leading-relaxed border-t border-slate-50 pt-6">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 text-maternal-brown/40 italic">
                        No FAQs found.
                    </div>
                @endforelse
            </div>

            <div class="mt-16 text-center">
                <p class="text-maternal-brown/60 mb-6">Still have questions?</p>
                <a href="mailto:support@milkyway.com" class="inline-flex items-center px-8 py-4 bg-maternal-brown text-white font-bold rounded-full hover:bg-maternal-rose transition shadow-xl shadow-maternal-brown/10">
                    Get in Touch
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
