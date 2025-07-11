<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stringable;
use Illuminate\Support\Str;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelanggan';
    protected $fillable = [
        'nama_pelanggan',
        'email',
        'nomor_kwh',
        'alamat',
        'id_tarif',
        'password',
        'status',
        'no_telp', // Tambahan: Nomor Telepon
    ];

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif', 'id_tarif');
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class, 'id_pelanggan');
    }

    public function getNoTelpFormattedAttribute()
    {
        if (!$this->no_telp) {
            return '-';
        }

        // Hilangkan angka 0 di awal (jika ada), lalu ganti jadi +62
        $telp = ltrim($this->no_telp, '0');

        return '+62 ' . $telp;
    }
}
