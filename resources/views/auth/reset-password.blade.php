<x-guest-layout>
    <div class="mb-12 text-center reveal-on-scroll">
        <h2 class="font-outfit font-black text-3xl text-text-primary mb-4 tracking-tight">Access Restoration</h2>
        <p class="text-text-dimmed text-sm font-medium leading-relaxed">
            Securely update your credentials to regain access to the Milky Way clinical infrastructure.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-8">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="reveal-on-scroll stagger-delay-1">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-3" />
        </div>

        <!-- Password -->
        <div class="reveal-on-scroll stagger-delay-2">
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-3" />
        </div>

        <!-- Confirm Password -->
        <div class="reveal-on-scroll stagger-delay-3">
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
            <x-text-input id="password_confirmation" class="block w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-3" />
        </div>

        <div class="pt-6 reveal-on-scroll stagger-delay-4">
            <x-primary-button class="w-full">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
