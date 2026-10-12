<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\ProfileController;
use App\Models\Mahasiswa;

// Halaman Login
Route::get('/', function () {
    return view('auth.login');
});

// Halaman yang memerlukan login
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard dengan 3 status mahasiswa
    Route::get('/dashboard', function () {
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
    })->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Cetak data mahasiswa
    Route::get('/mahasiswa/{id}/cetak', [MahasiswaController::class, 'cetak'])
        ->name('mahasiswa.cetak');

    // Data mahasiswa, skema, dan asesor
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('skema', SkemaController::class);
    Route::resource('asesor', AsesorController::class);
});

// Route autentikasi
require __DIR__ . '/auth.php';
