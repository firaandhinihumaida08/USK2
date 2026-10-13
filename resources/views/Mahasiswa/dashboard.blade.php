<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800">
                    Selamat Datang, {{ Auth::user()->name }}!
                </h3>

                <p class="mt-2 text-gray-600">
                    Selamat datang di Sistem Informasi Sertifikasi Mahasiswa.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>