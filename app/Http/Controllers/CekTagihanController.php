<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekTagihanController extends Controller
{
    public function cekTagihan(Request $request)
    {
        $kwh = $request->kwh;

        $tagihanList = [];

        if ($kwh) {
            // Simulasi data, bisa dari DB
            $tagihanList = [
                (object)[
                    'tanggal' => '2025-02-01',
                    'invoice' => '0426528898',
                    'nama' => 'Jonathan Muller',
                    'status' => 'belum_lunas'
                ],
                (object)[
                    'tanggal' => '2025-03-01',
                    'invoice' => '2076039945',
                    'nama' => 'Jonathan Muller',
                    'status' => 'belum_lunas'
                ],
                (object)[
                    'tanggal' => '2025-01-01',
                    'invoice' => '1520034839',
                    'nama' => 'Jonathan Muller',
                    'status' => 'lunas'
                ]
            ];
        }

        return view('pelanggan.cek-tagihan', compact('tagihanList'));
    }
}
