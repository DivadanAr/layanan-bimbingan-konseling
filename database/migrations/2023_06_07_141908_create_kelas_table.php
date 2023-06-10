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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('guru_bk_id')->nullable();
            $table->foreign('guru_bk_id')->references('id')->on('guru_bk')->onDelete('cascade');
            $table->unsignedBigInteger('wali_kelas_id')->nullable();
            $table->foreign('wali_kelas_id')->references('id')->on('wali_kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
