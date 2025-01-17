<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_peminjaman';
    
    protected $table = 'peminjaman';
    protected $fillable = [
        'id_bahan_pustaka',
        'id_pengguna',
        'tanggal_peminjaman',
        'jatuh_tempo',
        'tanggal_pengembalian',
        'status_peminjaman',
        'nilai',
        'ulasan',
    ];

    public function bahanPustaka(): BelongsTo
    {    
        return $this->belongsTo(BahanPustaka::class, 'id_bahan_pustaka', 'id_bahan_pustaka');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id_pengguna');
    }

    public function denda(): BelongsTo
    {
        return $this->belongsTo(Denda::class, 'id_peminjaman', 'id_peminjaman');
    }

}
