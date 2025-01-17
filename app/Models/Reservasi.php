<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_reservasi';
    
    protected $fillable = [
        'id_ruangan',
        'id_pengguna',
        'tanggal_reservasi',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id_pengguna');
    }
    
    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id_ruangan');
    }

}
