<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <div class="mb-24 text-center reveal-on-scroll">
                <div class="inline-flex items-center space-x-3 px-3 py-1 bg-surface-dark/5 border border-maternal-black/10 rounded-full mb-12">
                     <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-maternal-rose opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-maternal-rose"></span>
                    </span>
                    <span class="text-[10px] font-black text-text-primary/70 uppercase tracking-[0.3em]">Account Settings</span>
                </div>
                <h2 class="font-outfit font-black text-5xl md:text-7xl text-text-primary mb-10 tracking-tight leading-[1.05]">Profile Management</h2>
                <p class="text-text-dimmed text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">Customize your clinical interface and update your system credentials.</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-12">
                <div class="bg-white rounded-[3rem] p-10 md:p-16 border border-maternal-black/5 shadow-luxury reveal-on-scroll">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="bg-white rounded-[3rem] p-10 md:p-16 border border-maternal-black/5 shadow-luxury reveal-on-scroll stagger-delay-1">
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="bg-surface-dark rounded-[3rem] p-10 md:p-16 border border-white/5 shadow-luxury reveal-on-scroll stagger-delay-2">
                    <div class="max-w-2xl text-white">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
