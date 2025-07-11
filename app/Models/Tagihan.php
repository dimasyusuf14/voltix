<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tagihan';

    protected $fillable = [
        'id_penggunaan',
        'id_pelanggan',
        'bulan',
        'tahun',
        'jumlah_meter',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class, 'id_penggunaan', 'id_penggunaan');
    }
}
