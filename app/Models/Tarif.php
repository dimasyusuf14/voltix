<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tarif';
    protected $fillable = [
        'kode_tarif',
        'daya',
        'tarifperkwh',
        'deskripsi',
    ];
}
