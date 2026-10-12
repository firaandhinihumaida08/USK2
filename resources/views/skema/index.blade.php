<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Skema Sertifikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                <!-- Notifikasi Sukses -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
                @endif

                <!-- Bagian Atas: Tombol Tambah & Form Pencarian -->
                <div class="flex justify-between mb-4">
                    <a href="{{ route('skema.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Tambah Skema
                    </a>

                    <!-- Form Pencarian -->
                    <form action="{{ route('skema.index') }}" method="GET" class="flex gap-2">
                        <input type="text" name="cari" value="{{ $search ?? '' }}"
                            placeholder="Cari Kode atau Nama Skema..." class="border rounded px-3 py-1">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-1 rounded">Cari</button>
                    </form>
                </div>

                <!-- Tabel Daftar Skema Sertifikasi -->
                <table class="w-full border-collapse border border-gray-300 text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Kode Skema</th>
                            <th class="border p-2">Nama Skema</th>
                            <th class="border p-2">Jenis</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($skemas as $index => $skema)
                            <tr>
                                <td class="border p-2">{{ $skemas->firstItem() + $index }}</td>
                                <td class="border p-2 font-medium">{{ $skema->kode_skema ?? '-' }}</td>
                                <td class="border p-2">{{ $skema->nama_skema }}</td>
                                <td class="border p-2">{{ $skema->jenis ?? '-' }}</td>
                                <td class="border p-2">
                                    <div class="flex gap-2 items-center">
                                        <a href="{{ route('skema.edit', $skema->id) }}" class="text-yellow-600 hover:underline">Ubah</a>
                                        
                                        <form action="{{ route('skema.destroy', $skema->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus skema ini?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4">Belum ada data skema sertifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Tombol Tambah Skema di Bawah -->
                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <a href="{{ route('skema.create') }}"
                        style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block;">
                        + Tambah Skema
                    </a>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $skemas->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>