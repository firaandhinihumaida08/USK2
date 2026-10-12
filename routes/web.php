<?php
use App\Http\Controllers\AsesorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\ProfileController;
use App\Models\Mahasiswa;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // UBAH BAGIAN INI MENJADI 3 STATUS
    Route::get('/dashboard', function () {
        $mahasiswaKompeten = Mahasiswa::where('status', 'Kompeten')->get();
        $mahasiswaBelumKompeten = Mahasiswa::where('status', 'Belum Kompeten')->get();
        $mahasiswaMenunggu = Mahasiswa::where('status', 'Menunggu')->get(); // Tambahan data menunggu

        return view('dashboard', compact('mahasiswaKompeten', 'mahasiswaBelumKompeten', 'mahasiswaMenunggu'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mahasiswa/{id}/cetak', [MahasiswaController::class, 'cetak'])->name('mahasiswa.cetak');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('skema', SkemaController::class);
    Route::resource('asesor', AsesorController::class);
});

require __DIR__.'/auth.php';