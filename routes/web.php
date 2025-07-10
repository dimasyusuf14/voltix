<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TarifController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 💡 Halaman landing dan info umum
Route::get('/', function () {
    return view('landing.landing-page');
})->name('landing-page');

Route::get('/cek-tagihan', function () {
    return view('landing.cek-tagihan');
})->name('cek-tagihan');

Route::get('/tarif-listrik', function () {
    return view('landing.tarif-listrik');
})->name('tarif-listrik');

// ✅ Pelanggan: Formulir dan penyimpanan pendaftaran
Route::get('/register-pelanggan', [PelangganController::class, 'showRegisterForm'])->name('pelanggan.form');
Route::post('/register-pelanggan', [PelangganController::class, 'register'])->name('pelanggan.register');

// (Jika form dan proses register pelanggan pakai AuthController juga)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// ✅ Login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Group Admin (harus login dan punya level admin)
Route::middleware(['auth', 'admin'])->group(function () {});


// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');


// Aksi tombol konfirmasi pelanggan
Route::post('/admin/konfirmasi-pelanggan/{id}', [PelangganController::class, 'konfirmasi'])->name('admin.konfirmasi.submit');

// Halaman daftar pelanggan "waiting"
Route::get('/admin/konfirmasi-pelanggan', [PelangganController::class, 'konfirmasiList'])->name('admin.pelanggan.konfirmasi');



// Tambahan: Daftar pelanggan aktif (jika butuh)

Route::get('/admin/tarif', [TarifController::class, 'index'])->name('admin.tarif.index');

// Create - form tambah
Route::get('/admin/tarif/create', [TarifController::class, 'create'])->name('admin.tarif.create');

// Store - simpan data baru
Route::post('/admin/tarif', [TarifController::class, 'store'])->name('admin.tarif.store');

// Edit - form edit
Route::get('/admin/tarif/{tarif}/edit', [TarifController::class, 'edit'])->name('admin.tarif.edit');

// Update - proses update
Route::put('/admin/tarif/{tarif}', [TarifController::class, 'update'])->name('admin.tarif.update');

// Destroy - proses hapus
Route::delete('/admin/tarif/{tarif}', [TarifController::class, 'destroy'])->name('admin.tarif.destroy');

Route::prefix('admin/pelanggan')->name('admin.pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('/create', [PelangganController::class, 'create'])->name('create');
    Route::post('/store', [PelangganController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PelangganController::class, 'update'])->name('update');
    Route::post('/{id}/reset-password', [PelangganController::class, 'resetPassword'])->name('reset-password');
    Route::delete('/{id}', [PelangganController::class, 'destroy'])->name('destroy');
});
