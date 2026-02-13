<x-guest-layout>
    <div class="mb-12 text-center">
        <h2 class="font-outfit font-black text-4xl text-text-primary mb-4 tracking-tight">Join Milky Way</h2>
        <p class="text-text-dimmed text-sm font-medium leading-relaxed">Initialize your supported motherhood today with our specialized infrastructure.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-8">
        @csrf

        <!-- Name -->
        <div class="reveal-on-scroll stagger-delay-1">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Juana Dela Cruz" />
            <x-input-error :messages="$errors->get('name')" class="mt-3" />
        </div>

        <!-- Email Address -->
        <div class="reveal-on-scroll stagger-delay-2">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="juana@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-3" />
        </div>

        <!-- Password -->
        <div class="reveal-on-scroll stagger-delay-3">
            <x-input-label for="password" :value="__('Create Password')" />
            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-3" />
        </div>

        <!-- Confirm Password -->
        <div class="reveal-on-scroll stagger-delay-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-3" />
        </div>

        <div class="pt-6 reveal-on-scroll stagger-delay-5">
            <x-primary-button class="w-full">
                {{ __('Start Your Journey') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-8 reveal-on-scroll stagger-delay-5">
            <p class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em]">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-maternal-rose hover:underline transition-all">Secure Log in</a>
            </p>
        </div>
    </form>
</x-guest-layout>
