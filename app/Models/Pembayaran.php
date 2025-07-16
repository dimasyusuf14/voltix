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
        'metode_pembayaran_id',
        'biaya_admin',
        'total_bayar',
        'id', // Using 'id' instead of 'id_admin'
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
        return $this->belongsTo(User::class, 'id'); // Using 'id' field as you mentioned
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id');
    }
}
