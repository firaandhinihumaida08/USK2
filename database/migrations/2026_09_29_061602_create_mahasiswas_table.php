<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama_lengkap');
            $table->string('program_studi');
            $table->string('email');
            $table->string('no_hp');
            $table->foreignId('skema_id')->constrained('skemas')->onDelete('cascade');
            $table->string('status_kelulusan')->default('Menunggu'); // Tambahan kolom status
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};