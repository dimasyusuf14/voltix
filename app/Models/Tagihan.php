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

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_tagihan', 'id_tagihan');
    }

    public function getNoInvoiceAttribute(): string
    {
        $hash   = md5($this->attributes['id_tagihan']);
        $digits = preg_replace('/\D/', '', $hash);
        $kode   = substr(str_pad($digits, 10, '0'), 0, 10);
        return '#' . $kode;
    }
}
