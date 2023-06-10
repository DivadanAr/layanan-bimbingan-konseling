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
        Schema::create('konseling_bk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id');
            $table->foreign('layanan_id')->references('id')->on('layanan_bk')->onDelete('cascade');
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->unsignedBigInteger('guru_bk_id');
            $table->foreign('guru_bk_id')->references('id')->on('guru_bk')->onDelete('cascade');
            $table->unsignedBigInteger('wali_kelas_id');
            $table->foreign('wali_kelas_id')->references('id')->on('wali_kelas')->onDelete('cascade');
            $table->date('tanggal');
            $table->date('jam_mulai');
            $table->date('jam_berakhir');
            $table->string('tempat');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konseling_bk');
    }
};
