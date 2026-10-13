<x-guest-layout>
    <div class="mb-4 text-center">
        <h2 class="text-xl font-bold text-gray-800">
            Register Akun
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Buat akun untuk mengakses aplikasi sertifikasi.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div>
            <x-input-label for="name" value="Nama Lengkap" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                value="Konfirmasi Password"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <!-- Tombol -->
        <div class="flex items-center justify-between mt-6">
            <a
                href="{{ route('login') }}"
                class="text-sm text-indigo-600 underline hover:text-indigo-800"
            >
                Kembali ke Login
            </a>

            <x-primary-button>
                Register
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>