<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Data Mahasiswa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">NIM</label>
                    <p class="text-gray-900">{{ $mahasiswa->nim }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Nama Lengkap</label>
                    <p class="text-gray-900">{{ $mahasiswa->nama_lengkap }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Program Studi</label>
                    <p class="text-gray-900">{{ $mahasiswa->program_studi }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Email</label>
                    <p class="text-gray-900">{{ $mahasiswa->email }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">No HP</label>
                    <p class="text-gray-900">{{ $mahasiswa->no_hp }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Skema Sertifikasi</label>
                    <p class="text-gray-900">{{ $mahasiswa->skema->nama_skema ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Status Kelulusan</label>
                    <p class="text-gray-900">{{ $mahasiswa->status }}</p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('mahasiswa.index') }}" style="background-color: #4b5563; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none;">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>