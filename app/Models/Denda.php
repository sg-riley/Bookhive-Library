<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Denda extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_denda';
    
    protected $fillable = [
        'id_peminjaman',
        'jumlah_denda',
        'status_pembayaran',
    ];

    public function peminjaman(): HasOne
    {
        return $this->hasOne(Peminjaman::class, 'id_peminjaman', 'id_peminjaman');
    }
}
