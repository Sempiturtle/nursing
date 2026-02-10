<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-maternal-brown mb-2">Welcome Back</h2>
        <p class="text-maternal-brown/60">Continue your maternal journey with us.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="mama@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded-lg border-maternal-peach/30 text-maternal-rose shadow-sm focus:ring-maternal-rose/20 transition" name="remember">
                <span class="ms-2 text-sm text-maternal-brown/60 group-hover:text-maternal-brown transition">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-maternal-rose hover:text-maternal-rose-dark font-bold transition" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full">
                {{ __('Secure Log in') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4">
            <p class="text-sm text-maternal-brown/60">
                New to Milky Way? 
                <a href="{{ route('register') }}" class="text-maternal-rose hover:text-maternal-rose-dark font-bold transition">Create an account</a>
            </p>
        </div>
    </form>
</x-guest-layout>
