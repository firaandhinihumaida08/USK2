
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-2xl font-bold text-gray-800">
                    Selamat datang, {{ auth()->user()->name }}!
                </h3>

                <p class="mt-2 text-gray-600">
                    Selamat datang di dashboard peserta sertifikasi.
                    Kamu dapat menggunakan halaman ini untuk mengakses
                    informasi dan layanan sertifikasi.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">

                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <div class="text-3xl"></div>
                    <h3 class="mt-4 font-semibold text-gray-800">
                        Profil Peserta
                    </h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Informasi akun peserta yang sedang login.
                    </p>
                    <p class="mt-3 break-all text-sm font-medium">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <div class="text-3xl"></div>
                    <h3 class="mt-4 font-semibold text-gray-800">
                        Skema Sertifikasi
                    </h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Informasi mengenai skema sertifikasi kompetensi.
                    </p>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm">
                    <div class="text-3xl"></div>
                    <h3 class="mt-4 font-semibold text-gray-800">
                        Status Sertifikasi
                    </h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Informasi status sertifikasi akan ditampilkan
                        setelah fitur pengajuan peserta terhubung.
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
