<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PelangganDashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\TagihanController;
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
Route::view('/', 'landing.landing-page')->name('landing-page');


Route::view('/pelanggan', 'pelanggan.index')->name('pelanggan.index');
Route::get('/pelanggan/riwayat-penggunaan', [PelangganDashboardController::class, 'riwayatPenggunaan'])->name('riwayat-penggunaan');
// Route::view('/pelanggan/riwayat-pembayaran', 'pelanggan.riwayat.riwayat-pembayaran')->name('riwayat-pembayaran');
Route::view('/pelanggan/pembayaran', 'pelanggan.pembayaran.index')->name('pembayaran');





Route::middleware('level:1')->prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard.index')->name('admin.dashboard.index');
    Route::get('/pembayaran',                [PembayaranController::class, 'index'])->name('admin.pembayaran.index');
    Route::post('/pembayaran/{id}/verifikasi', [PembayaranController::class, 'verifikasi'])->name('admin.pembayaran.verif');
    Route::get('/pembayaran/{id}/download',  [PembayaranController::class, 'downloadBukti'])->name('admin.pembayaran.download');
});

Route::middleware('level:2')->prefix('pelanggan')->group(function () {
    Route::view('/', 'pelanggan.index')->name('pelanggan.index');
    Route::get('/tagihan', [TagihanController::class, 'pelangganIndex'])->name('pelanggan.tagihan');
    Route::get('/tagihan/{id}/bayar', [PembayaranController::class, 'create'])->name('bayar.create');
    Route::post('/tagihan/{id}/bayar', [PembayaranController::class, 'store'])->name('bayar.store');
    Route::get('/riwayat-pembayaran', [PembayaranController::class, 'riwayatPembayaran'])->name('riwayat-pembayaran');
    Route::get('/pembayaran/{id}/download-bukti', [PembayaranController::class, 'downloadBukti'])->name('pembayaran.download-bukti');
    Route::get('/pembayaran/{id}/print-struk', [PembayaranController::class, 'printStruk'])->name('pembayaran.print-struk');
    Route::get('/tagihan/{id}/struk', [TagihanController::class, 'strukPelanggan'])->name('tagihan.struk');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');









// ✅ Pelanggan: Formulir dan penyimpanan pendaftaran
Route::controller(PelangganController::class)->group(function () {
    Route::get('/register-pelanggan', 'showRegisterForm')->name('pelanggan.form');
    Route::post('/register-pelanggan', 'register')->name('pelanggan.register');
});

// Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
});

// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

// Konfirmasi pelanggan
Route::post('/admin/konfirmasi-pelanggan/{id}', [PelangganController::class, 'konfirmasi'])->name('admin.konfirmasi.submit');
Route::get('/admin/konfirmasi-pelanggan', [PelangganController::class, 'konfirmasiList'])->name('admin.pelanggan.konfirmasi');

// Pelanggan
Route::prefix('admin/pelanggan')->name('admin.pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('/create', [PelangganController::class, 'create'])->name('create');
    Route::post('/store', [PelangganController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PelangganController::class, 'update'])->name('update');
    Route::post('/{id}/reset-password', [PelangganController::class, 'resetPassword'])->name('reset-password');
    Route::delete('/{id}', [PelangganController::class, 'destroy'])->name('destroy');
});

//Penggunaan Pelanggan
Route::prefix('admin/penggunaan')->name('admin.penggunaan.')->group(function () {
    Route::get('/', [PenggunaanController::class, 'index'])->name('index');
    Route::get('/create', [PenggunaanController::class, 'create'])->name('create');
    Route::post('/store', [PenggunaanController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PenggunaanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PenggunaanController::class, 'update'])->name('update');
    Route::delete('/{id}', [PenggunaanController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/tagihan')->name('admin.tagihan.')->group(function () {
    Route::get('/', [TagihanController::class, 'index'])->name('index');
    Route::post('/{id}/konfirmasi', [TagihanController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('/tagihan/export/pdf', [TagihanController::class, 'exportPdf'])->name('exportPdf');
    Route::get('/{id}/bayar', [TagihanController::class, 'bayar'])->name('bayar');
    Route::delete('/{id}', [TagihanController::class, 'destroy'])->name('destroy');
    // Route untuk preview/print struk tagihan
    Route::get('/{id}/preview', [TagihanController::class, 'preview'])->name('preview');
    Route::get('/{id}/print', [TagihanController::class, 'print'])->name('print');
});

// Untuk pelanggan
Route::get('/pelanggan/tarif-listrik', [TarifController::class, 'showToPelanggan'])->name('tarif.listrik.pelanggan');

// Tarif
Route::resource('admin/tarif', TarifController::class)->except(['show']);
