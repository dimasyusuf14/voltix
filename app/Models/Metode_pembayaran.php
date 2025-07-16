<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode_pembayaran extends Model
{
    use HasFactory;

    protected $table = 'metode_pembayaran';

    protected $fillable = [
        'nama',
        'kode',
        'atas_nama',
        'nomor_rekening',
        'biaya_admin',
        'deskripsi',
        'logo',
        'is_aktif',
    ];

    protected $casts = [
        'biaya_admin' => 'decimal:2',
        'is_aktif' => 'boolean',
    ];

    // Accessor untuk format biaya admin
    public function getBiayaAdminFormatAttribute()
    {
        return 'Rp ' . number_format($this->biaya_admin, 0, ',', '.');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'metode_pembayaran_id');
    }
}
