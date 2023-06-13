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
    Schema::create('pemanggilans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->unsignedBigInteger('guru_bk_id');
            $table->foreign('guru_bk_id')->references('id')->on('guru_bk')->onDelete('cascade');
            $table->unsignedBigInteger('wali_kelas_id');
            $table->foreign('wali_kelas_id')->references('id')->on('wali_kelas')->onDelete('cascade');
            $table->string('hari');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('tempat');
            $table->string('acara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemanggilans');
    }
};
