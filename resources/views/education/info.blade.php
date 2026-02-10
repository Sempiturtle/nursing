<x-app-layout>
    <x-slot name="header">
        <h2 class="font-outfit font-bold text-2xl text-maternal-brown leading-tight">
            {{ __('Breastfeeding Information') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-maternal-peach/20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tips -->
                <a href="{{ route('education.tips') }}" class="relative group h-[400px] rounded-[3rem] overflow-hidden shadow-xl">
                    <div class="absolute inset-0 bg-maternal-brown opacity-40 group-hover:opacity-60 transition duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover -z-10">
                    <div class="absolute inset-0 p-12 flex flex-col justify-end">
                        <h3 class="text-3xl font-bold text-white mb-4">Breastfeeding Tips</h3>
                        <p class="text-white/80 leading-relaxed mb-6">Essential advice for a comfortable journey.</p>
                        <span class="inline-flex items-center text-maternal-rose font-bold">Explore Tips <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                    </div>
                </a>

                <!-- Latching -->
                <a href="{{ route('education.latching') }}" class="relative group h-[400px] rounded-[3rem] overflow-hidden shadow-xl">
                    <div class="absolute inset-0 bg-maternal-rose opacity-40 group-hover:opacity-60 transition duration-500"></div>
                     <img src="https://images.unsplash.com/photo-1544126592-807daf215651?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover -z-10">
                    <div class="absolute inset-0 p-12 flex flex-col justify-end">
                        <h3 class="text-3xl font-bold text-white mb-4">Latching & Attaching</h3>
                        <p class="text-white/80 leading-relaxed mb-6">Step-by-step guides for perfect connection.</p>
                        <span class="inline-flex items-center text-white font-bold opacity-80">View Guides <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                    </div>
                </a>

                <!-- Nutrition -->
                <a href="{{ route('education.nutrition') }}" class="relative group h-[400px] rounded-[3rem] overflow-hidden shadow-xl">
                    <div class="absolute inset-0 bg-maternal-sage opacity-40 group-hover:opacity-60 transition duration-500"></div>
                     <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover -z-10">
                    <div class="absolute inset-0 p-12 flex flex-col justify-end">
                        <h3 class="text-3xl font-bold text-white mb-4">Proper Nutrition</h3>
                        <p class="text-white/80 leading-relaxed mb-6">Fueling both you and your baby's growth.</p>
                        <span class="inline-flex items-center text-white font-bold opacity-80">See Nutrition <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
