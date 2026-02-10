<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('About Milky Way') }}
        </h2>
    </x-slot>

    <div class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <x-application-logo class="w-24 h-24 text-maternal-rose mx-auto mb-12" />
            
            <h3 class="text-4xl md:text-5xl font-bold text-maternal-brown mb-8 leading-tight">Empowering every mother's <br><span class="text-maternal-rose">unique journey</span>.</h3>
            
            <div class="space-y-12 text-lg text-maternal-brown/60 leading-relaxed text-left">
                <section>
                    <h4 class="font-bold text-maternal-brown text-xl mb-4 uppercase tracking-widest">Our Mission</h4>
                    <p>Milky Way is dedicated to providing high-quality, accessible breastfeeding support and maternal health resources to mothers across the country. We believe that every mother deserves professional care and community support to give their baby the best start in life.</p>
                </section>

                <section>
                    <h4 class="font-bold text-maternal-brown text-xl mb-4 uppercase tracking-widest">Our Vision</h4>
                    <p>We envision a world where breastfeeding is simplified, supported, and normalized. Through technology and community networking, we aim to bridge the gap between medical expertise and daily maternal care.</p>
                </section>

                <section class="bg-maternal-peach/20 p-12 rounded-[3rem] border border-maternal-peach/30">
                    <h4 class="font-bold text-maternal-brown text-xl mb-4 uppercase tracking-widest">The Team</h4>
                    <p>Milky Way is led by a diverse team of maternal health experts, certified lactation consultants, and dedicated software engineers committed to maternal well-being.</p>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
