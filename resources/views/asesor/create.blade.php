<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Asesor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('asesor.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="nama_asesor" class="block font-medium text-sm text-gray-700">Nama Asesor & Gelar</label>
                            <input type="text" name="nama_asesor" id="nama_asesor" value="{{ old('nama_asesor') }}" 
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                placeholder="Contoh: Dr. Budi Santoso, M.Kom." required>
                        </div>

                        <div class="mb-4">
                            <label for="no_registrasi" class="block font-medium text-sm text-gray-700">No Registrasi / MET</label>
                            <input type="text" name="no_registrasi" id="no_registrasi" value="{{ old('no_registrasi') }}" 
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                placeholder="Contoh: MET.000.001234 2023" required>
                        </div>

                        <div class="mb-6">
                            <label for="keahlian" class="block font-medium text-sm text-gray-700">Keahlian</label>
                            <input type="text" name="keahlian" id="keahlian" value="{{ old('keahlian') }}" 
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                placeholder="Contoh: Pemrograman Web / Jaringan" required>
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('asesor.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
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