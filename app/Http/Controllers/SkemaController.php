<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skema;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('cari'); // Menangkap input pencarian

    $skemas = Skema::when($search, function ($query, $search) {
            return $query->where('kode_skema', 'like', "%{$search}%")
                         ->orWhere('nama_skema', 'like', "%{$search}%");
        })
        ->paginate(10); // Mengubah get() menjadi paginate(10) agar firstItem() valid

    return view('skema.index', compact('skemas', 'search'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|string|max:255|unique:skemas',
            'nama_skema' => 'required|string|max:255',
            'jenis' => 'nullable|string|max:255',
        ]);

        Skema::create($request->all());

        return redirect()->route('skema.index')->with('success', 'Skema sertifikasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Opsional jika ingin menampilkan detail
        $skema = Skema::findOrFail($id);
        return view('skema.show', compact('skema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skema = Skema::findOrFail($id);
        return view('skema.edit', compact('skema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_skema' => 'required|string|max:255|unique:skemas,kode_skema,' . $id,
            'nama_skema' => 'required|string|max:255',
            'jenis' => 'nullable|string|max:255',
        ]);

        $skema = Skema::findOrFail($id);
        $skema->update($request->all());

        return redirect()->route('skema.index')->with('success', 'Skema sertifikasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skema = Skema::findOrFail($id);
        $skema->delete();

        return redirect()->route('skema.index')->with('success', 'Skema sertifikasi berhasil dihapus.');
    }
}
