<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Sertifikasi Mahasiswa</h2>
        {{ __('Mahasiswa') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
                @endif

                <div class="flex justify-between mb-4">
                    <a href="{{ route('mahasiswa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah
                        Mahasiswa</a>

                    <!-- Form Pencarian -->
                    <form action="{{ route('mahasiswa.index') }}" method="GET" class="flex gap-2">
                        <input type="text" name="cari" value="{{ $search ?? '' }}"
                            placeholder="Cari NIM, Nama, Prodi..." class="border rounded px-3 py-1">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-1 rounded">Cari</button>
                    </form>
                </div>

                <table class="w-full border-collapse border border-gray-300 text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">NIM</th>
                            <th class="border p-2">Nama Lengkap</th>
                            <th class="border p-2">Program Studi</th>
                            <th class="border p-2">Skema & Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mahasiswas as $key => $m)
                            <tr>
                                <td class="border p-2">{{ $mahasiswas->firstItem() + $key }}</td>
                                <td class="border p-2">{{ $m->nim }}</td>
                                <td class="border p-2">{{ $m->nama_lengkap }}</td>
                                <td class="border p-2">{{ $m->program_studi }}</td>
                                <td class="border p-2">
                                    {{ $m->skema->nama_skema ?? '-' }} <br>
                                    <span
                                        class="text-xs px-2 py-0.5 rounded 
                                    @if ($m->status == 'Kompeten') bg-green-100 text-green-800 
                                    @elseif($m->status == 'Belum Kompeten') bg-red-100 text-red-800 
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ $m->status }}
                                    </span>
                                </td>
                                <td class="border p-2">
                                    <div class="flex gap-2 items-center">
                                        <a href="{{ route('mahasiswa.show', $m->id) }}"
                                            class="text-blue-600 hover:underline">Detail</a>
                                        <a href="{{ route('mahasiswa.edit', $m->id) }}"
                                            class="text-yellow-600 hover:underline">Ubah</a>

                                        <!-- Tombol Cetak dengan Validasi Status Menunggu -->
                                        @if ($m->status != 'Menunggu')
                                            <a href="{{ route('mahasiswa.cetak', $m->id) }}" target="_blank"
                                                class="text-green-600 hover:underline font-semibold">Cetak</a>
                                        @else
                                            <span class="text-gray-400 cursor-not-allowed select-none"
                                                title="Status masih Menunggu, belum dapat dicetak">Cetak</span>
                                        @endif

                                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-4">Belum ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <a href="{{ route('mahasiswa.create') }}"
                        style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block;">
                        + Tambah Mahasiswa
                    </a>
                </div>

                <div class="mt-4">
                    {{ $mahasiswas->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
