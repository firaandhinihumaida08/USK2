<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\ProfileController;
use App\Models\Mahasiswa;

// Halaman awal: Mengarah ke Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Halaman yang memerlukan login
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $mahasiswaKompeten = Mahasiswa::with('skema')
                ->where('status', 'Kompeten')
                ->get();

            $mahasiswaBelumKompeten = Mahasiswa::with('skema')
                ->where('status', 'Belum Kompeten')
                ->get();

            $mahasiswaMenunggu = Mahasiswa::with('skema')
                ->where('status', 'Menunggu')
                ->get();

            return view('dashboard', compact(
                'mahasiswaKompeten',
                'mahasiswaBelumKompeten',
                'mahasiswaMenunggu'
            ));
        }

        if ($user->role === 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard');
        }

        abort(403, 'Role akun belum diatur. Periksa kolom role pada tabel users.');
    })->name('dashboard');

    // Dashboard Mahasiswa
    Route::get('/mahasiswa/dashboard', function () {
        if (Auth::user()->role !== 'mahasiswa') {
            abort(403, 'Halaman ini khusus mahasiswa.');
        }

        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Cetak mahasiswa
    Route::get('/mahasiswa/{id}/cetak', [MahasiswaController::class, 'cetak'])
        ->name('mahasiswa.cetak');

    // CRUD mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class);

    // CRUD skema & asesor khusus admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('skema', SkemaController::class);
        Route::resource('asesor', AsesorController::class);
    });
});

require __DIR__ . '/auth.php';