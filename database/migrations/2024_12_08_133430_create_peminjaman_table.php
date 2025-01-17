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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_bahan_pustaka');
            $table->foreign('id_bahan_pustaka')->references('id_bahan_pustaka')->on('bahanPustakas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->date('jatuh_tempo');
            $table->enum('status_peminjaman', ['menunggu konfirmasi', 'diterima', 'ditolak', 'dikembalikan'])->default('menunggu konfirmasi');
            $table->integer('nilai')->nullable();
            $table->string('ulasan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
