<x-guest-layout>
    <div class="mb-12 text-center">
        <h2 class="font-outfit font-black text-4xl text-text-primary mb-4 tracking-tight">Welcome Back</h2>
        <p class="text-text-dimmed text-sm font-medium leading-relaxed">Continue your specialized maternal journey with our clinical infrastructure.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-8" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div class="reveal-on-scroll stagger-delay-1">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="mama@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-3" />
        </div>

        <!-- Password -->
        <div class="reveal-on-scroll stagger-delay-2">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-3" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between reveal-on-scroll stagger-delay-3 px-1">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-5 h-5 rounded-lg border-maternal-black/10 text-maternal-rose shadow-sm focus:ring-maternal-rose/20 transition duration-500" name="remember">
                <span class="ms-3 text-[11px] font-black uppercase tracking-widest text-text-muted group-hover:text-text-primary transition-colors">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-[11px] font-black uppercase tracking-widest text-maternal-rose hover:text-text-primary transition-colors" href="{{ route('password.request') }}">
                    {{ __('Recovery') }}
                </a>
            @endif
        </div>

        <div class="pt-4 reveal-on-scroll stagger-delay-4">
            <x-primary-button class="w-full">
                {{ __('Secure Log in') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-8 reveal-on-scroll stagger-delay-4">
            <p class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em]">
                New to Milky Way? 
                <a href="{{ route('register') }}" class="text-maternal-rose hover:underline transition-all">Identify yourself here</a>
            </p>
        </div>
    </form>
</x-guest-layout>
