<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Skema Sertifikasi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('skema.update', $skema->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Kode Skema</label>
                        <input type="text" name="kode_skema" value="{{ old('kode_skema', $skema->kode_skema) }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama Skema</label>
                        <input type="text" name="nama_skema" value="{{ old('nama_skema', $skema->nama_skema) }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Jenis</label>
                        <input type="text" name="jenis" value="{{ old('jenis', $skema->jenis) }}" class="w-full border rounded p-2">
                    </div>

                    <!-- Menggunakan style inline agar tombol langsung terlihat jelas berwarna biru -->
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; border: none; font-weight: 500; cursor: pointer;">Perbarui</button>
                    <a href="{{ route('skema.index') }}" class="ml-2 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>