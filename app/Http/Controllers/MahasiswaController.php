<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Skema;
use Illuminate\Http\Request;

class MahasiswaController extends Controller {
    public function index(Request $request)
{
    $search = $request->input('cari'); // Menangkap dari name="cari" di view

    $mahasiswas = Mahasiswa::with('skema')
        ->when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'like', "%{$search}%")
                         ->orWhere('nim', 'like', "%{$search}%")
                         ->orWhere('program_studi', 'like', "%{$search}%");
        })
        ->paginate(10); // Menggunakan paginate agar fungsi firstItem() dan links() aktif kembali

    return view('Mahasiswa.index', compact('mahasiswas', 'search'));
}

    public function create() {
        $skemas = Skema::all();
        $asesors = \App\Models\Asesor::all();
        return view('mahasiswa.create', compact('skemas', 'asesors'));
    }

    public function store(Request $request) {
        $request->validate([
        'nim' => 'required|numeric|unique:mahasiswas,nim',
        'nama_lengkap' => 'required|string|max:255',
        'program_studi' => 'required|string|max:255',
        'email' => 'required|email',
        'no_hp' => 'required|numeric',
        'skema_id' => 'required|exists:skemas,id',
        'asesor_id' => 'nullable|exists:asesors,id',
        'status' => 'required|in:Menunggu,Kompeten,Belum Kompeten'
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa) {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa) {
        $skemas = Skema::all();
        $asesors = \App\Models\Asesor::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'skemas'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa) {
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_lengkap' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'skema_id' => 'required|exists:skemas,id',
            'asesor_id' => 'nullable|exists:asesors,id',
            'status' => 'required|in:Menunggu,Kompeten,Belum Kompeten'
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa) {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    public function cetak($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Jika statusnya 'Menunggu', tolak dan beri pesan error
        if ($mahasiswa->status == 'Menunggu') {
            return redirect()->back()->with('error', 'Mahasiswa dengan status Menunggu belum dapat dicetak.');
        }

        return view('mahasiswa.cetak', compact('mahasiswa'));
    }
}