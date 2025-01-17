<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rekomendasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_rekomendasi';
    
    protected $fillable = [
        'id_pengguna',
        'judul',
        'penulis',
        'kategori',
        'tahun_terbit',
        'alasan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id_pengguna');
    }

    
}
