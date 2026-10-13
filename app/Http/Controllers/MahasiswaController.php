<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Skema;
use App\Models\Asesor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Khusus admin: tambah, edit, dan hapus data
   
    private function hanyaAdmin(): void
    {
        $user = Auth::user();

        abort_unless(
            $user !== null && $user->role === 'admin',
            403,
        'Akses ditolak. Fitur ini hanya untuk Admin.'
    );
}


    // Menampilkan seluruh data mahasiswa: Admin dan Mahasiswa
    public function index(Request $request)
    {
        $search = $request->input('cari');

        $mahasiswas = Mahasiswa::with('skema')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%")
                      ->orWhere('nim', 'like', "%{$search}%")
                      ->orWhere('program_studi', 'like', "%{$search}%");
                });
            })
            ->paginate(10)
            ->withQueryString();

        return view('Mahasiswa.index', compact('mahasiswas', 'search'));
    }

    // Form tambah: Admin saja
    public function create()
    {
        $this->hanyaAdmin();

        $skemas = Skema::all();
        $asesors = Asesor::all();

        return view('Mahasiswa.create', compact('skemas', 'asesors'));
    }

    // Simpan data: Admin saja
    public function store(Request $request)
    {
        $this->hanyaAdmin();

        $validated = $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'nama_lengkap' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'skema_id' => 'required|exists:skemas,id',
            'asesor_id' => 'nullable|exists:asesors,id',
            'status' => 'required|in:Menunggu,Kompeten,Belum Kompeten',
        ]);

        Mahasiswa::create($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Detail data: Admin dan Mahasiswa
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('skema');

        return view('Mahasiswa.show', compact('mahasiswa'));
    }

    // Form edit: Admin saja
    public function edit(Mahasiswa $mahasiswa)
    {
        $this->hanyaAdmin();

        $skemas = Skema::all();
        $asesors = Asesor::all();

        return view('Mahasiswa.edit', compact('mahasiswa', 'skemas', 'asesors'));
    }

    // Perbarui data: Admin saja
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->hanyaAdmin();

        $validated = $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_lengkap' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'skema_id' => 'required|exists:skemas,id',
            'asesor_id' => 'nullable|exists:asesors,id',
            'status' => 'required|in:Menunggu,Kompeten,Belum Kompeten',
        ]);

        $mahasiswa->update($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    // Hapus data: Admin saja
    public function destroy(Mahasiswa $mahasiswa)
    {
        $this->hanyaAdmin();

        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    // Cetak sertifikat: Admin dan Mahasiswa
    public function cetak($id)
    {
        $mahasiswa = Mahasiswa::with('skema')->findOrFail($id);

        if ($mahasiswa->status === 'Menunggu') {
            return redirect()
                ->route('mahasiswa.index')
                ->with('error', 'Sertifikat belum dapat dicetak karena status masih Menunggu.');
        }

        return view('Mahasiswa.cetak', compact('mahasiswa'));
    }
}
