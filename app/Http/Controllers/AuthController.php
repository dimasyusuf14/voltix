<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');          // ← view milikmu
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 1) cek di tabel users (admin)
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('logged_id',  $user->id);
            Session::put('logged_in', true);
            Session::put('level',      1);          // admin
            return redirect()->route('admin.dashboard.index');
        }

        // 2) cek di tabel pelanggans
        $pelanggan = Pelanggan::where('email', $request->email)->first();
        if ($pelanggan && Hash::check($request->password, $pelanggan->password)) {
            Session::put('logged_id',  $pelanggan->id_pelanggan);
            Session::put('logged_in',  true);
            Session::put('level',      2);          // pelanggan
            return redirect()->route('pelanggan.index');
        }

        // kalau keduanya gagal
        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Email / Password salah.');
    }

    public function logout()
    {
        Session::flush();        // hapus seluruh session
        return redirect()->route('login');
    }
}
