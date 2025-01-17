<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_role';
    
    protected $fillable = [
        'nama_role',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}
