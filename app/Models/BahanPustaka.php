<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BahanPustaka extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'bahanPustakas';

    protected $primaryKey = 'id_bahan_pustaka';

    protected $fillable = [
        'id_kategori',
        'judul',
        'isbn',
        'tahun_terbit',
        'penulis',
        'penerbit',
        'deskripsi',
        'jumlah',
        'gambar_sampul',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'id_bahan_pustaka', 'id_bahan_pustaka');
    }
}
