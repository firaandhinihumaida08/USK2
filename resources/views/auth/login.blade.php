<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-sm text-green-800">
                {{ session('status') }}
            </div>
        @endif


        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">

                <span class="ms-2 text-sm text-gray-600">
                    Remember me
                </span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                Forgot your password?
            </a>
            @endif

            <x-primary-button class="ms-3">
                Log in
            </x-primary-button>
        </div>
    </form>

    <!-- Register Link -->
    @if (Route::has('register'))
    <div class="mt-6 border-t border-gray-200 pt-4 text-center">
        <p class="text-sm text-gray-600">
            Belum punya akun?

            <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-800 underline">
                Register sekarang
            </a>
        </p>
    </div>
    @endif
</x-guest-layout>
