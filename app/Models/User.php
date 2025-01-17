<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    public $timestamps = false;

    protected $table = 'users';

    protected $primaryKey = 'id_pengguna';
   
    protected $fillable = [
        'id_role',
        'nama_lengkap',
        'email',
        'password',
        'nomor_telepon',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }
   
    public function reservasi(): HasMany
    {
        return $this->hasMany(Reservasi::class, 'id_pengguna', 'id_pengguna');
    }

    public function rekomendasi(): HasMany
    {
        return $this->hasMany(Rekomendasi::class, 'id_pengguna', 'id_pengguna');
    }
    
    public function donasi(): HasMany
    {
        return $this->hasMany(Donasi::class, 'id_pengguna', 'id_pengguna');
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'id_pengguna', 'id_pengguna');
    }


}
