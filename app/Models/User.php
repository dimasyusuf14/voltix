<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id'; // Menggunakan 'id' sesuai dengan migrasi database
    public $incrementing = true;       // Tetap auto increment
    protected $keyType = 'int';        // Bertipe integer

    protected $fillable = [
        'email',
        'password',
        'nama_admin',
        'id_level',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }
}
