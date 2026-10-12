<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Asesor Sertifikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                <!-- Notifikasi Berhasil -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
                @endif

                <!-- Form Pencarian di Atas Kanan (Menggunakan Inline CSS agar pasti tampil) -->
                <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
                    <form action="{{ route('asesor.index') }}" method="GET" style="display: flex; gap: 8px; align-items: center;">
                        <input type="text" name="cari" value="{{ $search ?? '' }}"
                            placeholder="Cari Asesor..." 
                            style="border: 1px solid #d1d5db; border-radius: 6px; padding: 7px 12px; font-size: 14px; outline: none; width: 220px;">
                        <button type="submit" 
                            style="background-color: #111827; color: #ffffff; padding: 8px 16px; border-radius: 6px; font-size: 14px; font-weight: 500; border: none; cursor: pointer;">
                            Cari
                        </button>
                    </form>
                </div>

                <!-- Tabel Daftar Asesor -->
                <table class="w-full border-collapse border border-gray-300 text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Asesor</th>
                            <th class="border p-2">No Registrasi / MET</th>
                            <th class="border p-2">Keahlian</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asesors as $index => $asesor)
                            <tr>
                                <td class="border p-2">{{ $asesors->firstItem() + $index }}</td>
                                <td class="border p-2 font-medium">{{ $asesor->nama_asesor }}</td>
                                <td class="border p-2">{{ $asesor->no_registrasi ?? '-' }}</td>
                                <td class="border p-2">{{ $asesor->keahlian ?? '-' }}</td>
                                <td class="border p-2">
                                    <div class="flex gap-2 items-center">
                                        <a href="{{ route('asesor.edit', $asesor->id) }}" class="text-indigo-600 hover:underline">Ubah</a>
                                        
                                        <form action="{{ route('asesor.destroy', $asesor->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data asesor ini?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4 text-gray-500">Belum ada data asesor sertifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Tombol Tambah Asesor di Bawah Kiri -->
                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <a href="{{ route('asesor.create') }}"
                        style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block;">
                        + Tambah Asesor
                    </a>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $asesors->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>