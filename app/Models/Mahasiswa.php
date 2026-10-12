<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model 
{
    use HasFactory;

    // Sesuaikan nama kolom di $fillable agar cocok dengan database dan controller Anda
    protected $fillable = [
        'nim', 
        'nama_lengkap', 
        'program_studi', 
        'email', 
        'no_hp', 
        'skema_id',
        'asesor_id',     // Diubah dari 'assesor_id' menjadi 'asesor_id'
        'status'         // Diubah dari 'status_kelulusan' menjadi 'status'
    ];

    public function skema() 
    {
        return $this->belongsTo(Skema::class);
    }
    
    public function asesor() 
    {
        return $this->belongsTo(Asesor::class, 'asesor_id');
    }
}