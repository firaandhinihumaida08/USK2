<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ubah Data Mahasiswa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">NIM</label>
                        <input type="text" name="nim" value="{{ $mahasiswa->nim }}"
                            class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ $mahasiswa->nama_lengkap }}"
                            class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ $mahasiswa->program_studi }}"
                            class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $mahasiswa->email }}"
                            class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">No HP</label>
                        <input type="text" name="no_hp" value="{{ $mahasiswa->no_hp }}"
                            class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Skema Sertifikasi</label>
                        <select name="skema_id" class="w-full border rounded p-2" required>
                            @foreach (\App\Models\Skema::all() as $s)
                                <option value="{{ $s->id }}"
                                    {{ $mahasiswa->skema_id == $s->id ? 'selected' : '' }}>{{ $s->nama_skema }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Asesor Penguji</label>
                        <select name="asesor_id" class="w-full border rounded p-2">
                            <option value="">-- Pilih Asesor --</option>
                            @foreach (\App\Models\Asesor::all() as $asesor)
                                <option value="{{ $asesor->id }}"
                                    {{ $mahasiswa->asesor_id == $asesor->id ? 'selected' : '' }}>
                                    {{ $asesor->nama_asesor }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Status Kelulusan</label>
                        <select name="status" class="w-full border rounded p-2" required>
                            <option value="Menunggu" {{ $mahasiswa->status == 'Menunggu' ? 'selected' : '' }}>Menunggu
                            </option>
                            <option value="Kompeten" {{ $mahasiswa->status == 'Kompeten' ? 'selected' : '' }}>Kompeten
                            </option>
                            <option value="Belum Kompeten"
                                {{ $mahasiswa->status == 'Belum Kompeten' ? 'selected' : '' }}>Belum Kompeten</option>
                        </select>
                    </div>
                    <button type="submit"
                        style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; border: none; font-weight: 500; cursor: pointer;">
                        Perbarui
                    </button>
                    <a href="{{ route('mahasiswa.index') }}" class="ml-2 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
