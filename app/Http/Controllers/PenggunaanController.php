<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class PenggunaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Penggunaan::with('pelanggan');

        if ($request->filled('nomor_kwh')) {
            $query->whereHas('pelanggan', function ($q) use ($request) {
                $q->where('nomor_kwh', 'like', '%' . $request->nomor_kwh . '%');
            });
        }

        if ($request->filled('status')) {
            $query->whereHas('pelanggan', function ($q) use ($request) {
                $q->where('status', $request->status);
            });
        }

        $penggunaans = $query->get();
        $pelanggans = Pelanggan::where('status', 'aktif')->get();

        return view('admin.penggunaan.index', compact('penggunaans', 'pelanggans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::where('status', 'aktif')->get();
        return view('admin.penggunaan.create-modal', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020',
            'meter_awal' => 'required|integer|min:0',
            'meter_akhir' => 'required|integer|gte:meter_awal',
        ]);

        // Cek duplikasi penggunaan
        $exists = Penggunaan::where('id_pelanggan', $request->id_pelanggan)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Data penggunaan sudah ada untuk pelanggan dan periode ini.')->withInput();
        }

        // Simpan penggunaan
        $penggunaan = Penggunaan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        // Buat tagihan
        $jumlah_meter = $request->meter_akhir - $request->meter_awal;
        $pelanggan = Pelanggan::with('tarif')->find($request->id_pelanggan);
        $tarif_per_kwh = $pelanggan->tarif->tarif_perkwh;

        $tagihan = Tagihan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_penggunaan' => $penggunaan->id_penggunaan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_meter' => $jumlah_meter,
            'total_tagihan' => $jumlah_meter * $tarif_per_kwh,
            'status' => 'Belum Lunas',
        ]);

        return redirect()->route('admin.penggunaan.index')->with('success', 'Data penggunaan dan tagihan berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $penggunaan = Penggunaan::findOrFail($id);
        $pelanggans = Pelanggan::where('status', 'aktif')->get();
        return view('admin.penggunaan.edit', compact('penggunaan', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $penggunaan = Penggunaan::findOrFail($id);

        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|digits:4',
            'meter_awal' => 'required|numeric|min:0',
            'meter_akhir' => 'required|numeric|min:0|gte:meter_awal',
        ]);

        $penggunaan->update([
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        return redirect()->route('admin.penggunaan.index')->with('success', 'Penggunaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Penggunaan::destroy($id);
        return redirect()->route('admin.penggunaan.index')->with('success', 'Penggunaan berhasil dihapus.');
    }
}
