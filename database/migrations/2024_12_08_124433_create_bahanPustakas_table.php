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
        Schema::create('bahanPustakas', function (Blueprint $table) {
            $table->id('id_bahan_pustaka');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul');
            $table->string('isbn');
            $table->integer('tahun_terbit');
            $table->string('penulis');
            $table->string('penerbit');
            
            $table->text('deskripsi');
            $table->integer('jumlah');
            $table->text('gambar_sampul');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_pustakas');
    }
};
