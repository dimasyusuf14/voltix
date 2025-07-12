<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::with(['tagihan', 'pelanggan', 'admin'])
            ->latest('tanggal_pembayaran');

        // optional: filter berdasarkan tanggal atau status
        if ($request->filled('bulan')) {
            $query->where('bulan_bayar', $request->bulan);
        }

        $pembayarans = $query->paginate(10);

        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    /* ========== FORM UNGGAH BUKTI PEMBAYARAN ========== */
    public function create($tagihanId)
    {
        $tagihan = Tagihan::with('pelanggan')->findOrFail($tagihanId);

        // Pastikan tagihan masih “Belum Lunas”
        if ($tagihan->status === 'Sudah Lunas') {
            return redirect()->route('tagihan')->with('error', 'Tagihan sudah lunas.');
        }

        return view('pelanggan.pembayaran.upload', compact('tagihan'));
    }

    /* ========== SIMPAN DATA PEMBAYARAN ========== */
    public function store(Request $r, $tagihanId)
    {
        $tagihan = Tagihan::with('pelanggan')->findOrFail($tagihanId);

        $r->validate([
            'bukti_pembayaran' => 'required|image|max:2048',
        ]);

        // simpan file
        $path = $r->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        $biayaAdmin = 2500;
        $total      = $tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh + $biayaAdmin;

        Pembayaran::create([
            'id_tagihan'        => $tagihan->id_tagihan,
            'id_pelanggan'      => $tagihan->id_pelanggan,
            'tanggal_pembayaran' => now()->toDateString(),
            'bulan_bayar'       => $tagihan->bulan,
            'biaya_admin'       => $biayaAdmin,
            'total_bayar'       => $total,
            'id_admin'          => null,              // ⬅️ admin akan diisi saat verifikasi
            'bukti_pembayaran'  => $path,
        ]);

        $tagihan->update(['status' => 'Menunggu Verifikasi']);

        return redirect()->route('tagihan')
            ->with('success', 'Bukti pembayaran diunggah, menunggu verifikasi.');
    }

    public function verifikasi($pembayaranId)
    {
        $pembayaran = Pembayaran::with('tagihan')->findOrFail($pembayaranId);

        $pembayaran->update([
            'id_admin'           => Auth::id(),
            'tanggal_pembayaran' => now()->toDateString(),
        ]);

        $pembayaran->tagihan->update(['status' => 'Sudah Lunas']);

        return back()->with('success', 'Pembayaran telah diverifikasi.');
    }

    /* ========== UNDUH BUKTI (opsional) ========== */
    public function downloadBukti($pembayaranId)
    {
        $pembayaran = Pembayaran::findOrFail($pembayaranId);
        return response()->download(storage_path('app/public/' . $pembayaran->bukti_pembayaran));
    }
}
