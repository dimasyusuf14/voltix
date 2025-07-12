<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_tagihan',
        'id_pelanggan',
        'tanggal_pembayaran',
        'bulan_bayar',
        'biaya_admin',
        'total_bayar',
        'id_admin',
        'bukti_pembayaran',
    ];

    protected $dates = ['tanggal_pembayaran'];

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id_tagihan');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
