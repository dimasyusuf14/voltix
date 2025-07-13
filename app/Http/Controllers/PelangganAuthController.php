<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PelangganAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Login sebagai pelanggan menggunakan guard 'pelanggan'
        if (Auth::guard('pelanggan')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            Session::put('logged_id', Auth::guard('pelanggan')->user()->id_pelanggan);
            Session::put('logged_in', true);
            Session::put('level', 2); // pelanggan
            return redirect()->route('pelanggan.index');
        }

        // Jika gagal login
        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Email / Password salah.');
    }

    public function logout()
    {
        Auth::guard('pelanggan')->logout();
        Session::flush();
        return redirect()->route('login');
    }
}
