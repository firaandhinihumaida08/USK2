<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf

                        <!-- NIM -->
                        <div class="mb-4">
                            <label for="nim" class="block font-medium text-sm text-gray-700">NIM</label>
                            <input type="text" name="nim" id="nim" value="{{ old('nim') }}"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Contoh: 202301001" required>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="mb-4">
                            <label for="nama_lengkap" class="block font-medium text-sm text-gray-700">Nama
                                Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                value="{{ old('nama_lengkap') }}"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Contoh: Fira Andhini Humaida" required>
                        </div>

                        <!-- Program Studi -->
                        <div class="mb-4">
                            <label for="program_studi" class="block font-medium text-sm text-gray-700">Program
                                Studi</label>
                            <input type="text" name="program_studi" id="program_studi"
                                value="{{ old('program_studi') }}"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Contoh: Teknik Informatika" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Contoh: fira@student.ac.id" required>
                        </div>

                        <!-- No HP -->
                        <div class="mb-4">
                            <label for="no_hp" class="block font-medium text-sm text-gray-700">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Contoh: 081234567890" required>
                        </div>

                        <!-- Skema Sertifikasi -->
                        <div class="mb-4">
                            <label for="skema_id" class="block font-medium text-sm text-gray-700">Skema
                                Sertifikasi</label>
                            <select name="skema_id" id="skema_id"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                <option value="">-- Pilih Skema --</option>
                                @foreach ($skemas as $skema)
                                    <option value="{{ $skema->id }}">{{ $skema->nama_skema }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Asesor -->
                        <div class="mb-4">
                            <label for="asesor_id" class="block font-medium text-sm text-gray-700">Asesor</label>
                            <select name="asesor_id" id="asesor_id"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                <option value="">-- Pilih Asesor --</option>
                                @foreach ($asesors as $asesor)
                                    <option value="{{ $asesor->id }}">{{ $asesor->nama_asesor }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status Kelulusan -->
                        <div class="mb-6">
                            <label for="status" class="block font-medium text-sm text-gray-700">Status
                                Kelulusan</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Kompeten">Kompeten</option>
                                <option value="Belum Kompeten">Belum Kompeten</option>
                            </select>
                        </div>

                        <!-- Tombol Aksi (Tombol Simpan & Batal) -->
                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('mahasiswa.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit"
                                style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; border: none; font-weight: 500; cursor: pointer;">
                                Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
