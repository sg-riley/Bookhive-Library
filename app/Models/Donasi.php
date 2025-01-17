<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;

class Donasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_donasi';
    
    protected $fillable = [
        'id_pengguna',
        'id_kategori',
        'judul',
        'isbn',
        'tahun_terbit',
        'penulis',
        'penerbit',
        'deskripsi',
        'jumlah',
        'gambar_sampul',
        'status_pengajuan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id_pengguna');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
