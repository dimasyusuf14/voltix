<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
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

    /**
     * Scope untuk metode pembayaran aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('is_aktif', true);
    }

    /**
     * Accessor untuk format biaya admin
     */
    public function getBiayaAdminFormatAttribute()
    {
        return 'Rp ' . number_format($this->biaya_admin, 0, ',', '.');
    }

    /**
     * Accessor untuk status
     */
    public function getStatusAttribute()
    {
        return $this->is_aktif ? 'Aktif' : 'Nonaktif';
    }

    /**
     * Accessor untuk logo URL
     */
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/' . $this->logo);
        }
        return asset('storage/images/default-payment.png');
    }
}
