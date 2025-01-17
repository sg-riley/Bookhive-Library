<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_kategori';

    public function bahanPustaka(): HasMany
    {
        return $this->hasMany(BahanPustaka::class, 'id_kategori', 'id_kategori');
    }
    
    public function donasi(): HasMany
    {
        return $this->hasMany(Donasi::class, 'id_kategori', 'id_kategori');
    }

}
