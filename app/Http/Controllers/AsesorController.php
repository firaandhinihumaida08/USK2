<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asesor;

class AsesorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('cari');
        $asesors = Asesor::when($search, function ($query, $search) {
                return $query->where('nama_asesor', 'like', "%{$search}%")
                             ->orWhere('no_registrasi', 'like', "%{$search}%")
                             ->orWhere('keahlian', 'like', "%{$search}%");
            })
            ->paginate(10);
        return view('asesor.index', compact('asesors', 'search'));
    }

    public function create()
    {
        return view('asesor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_asesor' => 'required|string|max:255',
            'no_registrasi' => 'required|string|max:255|unique:asesors,no_registrasi',
            'keahlian' => 'required|string|max:255',
        ]);
        Asesor::create($request->all());
        return redirect()->route('asesor.index')->with('success', 'Data asesor berhasil ditambahkan.');
    }

    public function edit(Asesor $asesor)
    {
        return view('asesor.edit', compact('asesor'));
    }

    public function update(Request $request, Asesor $asesor)
    {
        $request->validate([
            'nama_asesor' => 'required|string|max:255',
            'no_registrasi' => 'required|string|max:255|unique:asesors,no_registrasi,' . $asesor->id,
            'keahlian' => 'required|string|max:255',
        ]);
        $asesor->update($request->all());
        return redirect()->route('asesor.index')->with('success', 'Data asesor berhasil diperbarui.');
    }

    public function destroy(Asesor $asesor)
    {
        $asesor->delete();
        return redirect()->route('asesor.index')->with('success', 'Data asesor berhasil dihapus.');
    }
}