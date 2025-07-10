<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::with('tarif')->get();
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        $tarifs = Tarif::all();
        // Generate nomor_kwh 10 karakter
        $nomor_kwh = strtoupper(Str::random(10));
        return view('admin.pelanggan.create', compact('tarifs', 'nomor_kwh'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'email' => 'required|email|unique:pelanggans,email',
            'alamat' => 'required|string',
            'id_tarif' => 'required|exists:tarifs,id_tarif',
            'password' => 'required|confirmed|min:6',
            'nomor_kwh' => 'required|string|size:10|unique:pelanggans,nomor_kwh',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email' => $request->email,
            'nomor_kwh' => $request->nomor_kwh,
            'alamat' => $request->alamat,
            'id_tarif' => $request->id_tarif,
            'password' => Hash::make($request->password),
            'status' => 'aktif',
        ]);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $tarifs = Tarif::all();
        return view('admin.pelanggan.edit', compact('pelanggan', 'tarifs'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'email' => 'required|email|unique:pelanggans,email,' . $id . ',id_pelanggan',
            'alamat' => 'required|string',
            'id_tarif' => 'required|exists:tarifs,id_tarif',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only(['nama_pelanggan', 'email', 'alamat', 'id_tarif', 'status']);

        // Optional: update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $pelanggan->update($data);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');

    }

    // Tambah fungsi reset password
    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->password = Hash::make($request->password);
        $pelanggan->save();
        return redirect()->route('admin.pelanggan.edit', $id)->with('success', 'Password berhasil direset.');
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }

    public function konfirmasiList()
    {
        $pelangganWaiting = Pelanggan::where('status', 'waiting')->get();
        return view('admin.pelanggan.konfirmasi', compact('pelangganWaiting'));
    }

    public function konfirmasi($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->status = 'aktif';
        $pelanggan->save();

        return redirect()->back()->with('success', 'Pelanggan berhasil dikonfirmasi.');
    }

    public function pelangganAktif()
    {
        $pelanggans = Pelanggan::where('status', 'aktif')->get();
        return view('admin.pelanggan.index', compact('pelanggans'));
    }
}
