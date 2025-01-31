<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftar_lomba', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sekolah');
            $table->foreign('id_sekolah')->references('id')->on('sekolah');
            $table->unsignedBigInteger('id_bidang_mata_lomba');
            $table->foreign('id_bidang_mata_lomba')->references('id')->on('bidang_mata_lomba');
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('siswa');
            $table->unsignedBigInteger('id_guru');
            $table->foreign('id_guru')->references('id')->on('guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_lomba');
    }
};
