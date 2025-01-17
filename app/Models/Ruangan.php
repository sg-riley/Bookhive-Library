<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruangan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_ruangan';
    
    protected $fillable = [
        'nama_ruangan',
        'deskripsi',
        'gambar_ruangan',
    ];

    public function reservasi(): HasMany
    {
        return $this->hasMany(Reservasi::class, 'id_ruangan', 'id_ruangan');
    }
}
