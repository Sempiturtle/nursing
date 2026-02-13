<x-guest-layout>
    <div class="mb-12 text-center reveal-on-scroll">
        <h2 class="font-outfit font-black text-3xl text-text-primary mb-4 tracking-tight">Recovery Axis</h2>
        <p class="text-text-dimmed text-sm font-medium leading-relaxed">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-8" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div class="reveal-on-scroll stagger-delay-1">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-3" />
        </div>

        <div class="reveal-on-scroll stagger-delay-2">
            <x-primary-button class="w-full">
                {{ __('Email Reset Link') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-8 reveal-on-scroll stagger-delay-3">
            <a href="{{ route('login') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-maternal-rose hover:text-text-primary transition-colors">
                Return to Login
            </a>
        </div>
    </form>
</x-guest-layout>
