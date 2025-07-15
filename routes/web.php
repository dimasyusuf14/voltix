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

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/register-pelanggan', [PelangganController::class, 'showRegisterForm'])->name('pelanggan.form');
    Route::post('/register-pelanggan', [PelangganController::class, 'register'])->name('pelanggan.register');
});

// Auth logout (available for all authenticated users)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public pelanggan routes (without middleware for general access)
Route::get('/pelanggan/tarif-listrik', [TarifController::class, 'showToPelanggan'])->name('tarif.listrik.pelanggan');

// 🔐 Admin Routes (Level 1)
Route::middleware('level:1')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // Konfirmasi pelanggan
    Route::get('/konfirmasi-pelanggan', [PelangganController::class, 'konfirmasiList'])->name('admin.pelanggan.konfirmasi');
    Route::post('/konfirmasi-pelanggan/{id}', [PelangganController::class, 'konfirmasi'])->name('admin.konfirmasi.submit');

    // Pelanggan management
    Route::prefix('pelanggan')->name('admin.pelanggan.')->group(function () {
        Route::get('/', [PelangganController::class, 'index'])->name('index');
        Route::get('/create', [PelangganController::class, 'create'])->name('create');
        Route::post('/store', [PelangganController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PelangganController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PelangganController::class, 'update'])->name('update');
        Route::post('/{id}/reset-password', [PelangganController::class, 'resetPassword'])->name('reset-password');
        Route::delete('/{id}', [PelangganController::class, 'destroy'])->name('destroy');
    });

    // Penggunaan management
    Route::prefix('penggunaan')->name('admin.penggunaan.')->group(function () {
        Route::get('/', [PenggunaanController::class, 'index'])->name('index');
        Route::get('/create', [PenggunaanController::class, 'create'])->name('create');
        Route::post('/store', [PenggunaanController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PenggunaanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PenggunaanController::class, 'update'])->name('update');
        Route::delete('/{id}', [PenggunaanController::class, 'destroy'])->name('destroy');
    });

    // Tagihan management
    Route::prefix('tagihan')->name('admin.tagihan.')->group(function () {
        Route::get('/', [TagihanController::class, 'index'])->name('index');
        Route::post('/{id}/konfirmasi', [TagihanController::class, 'konfirmasi'])->name('konfirmasi');
        Route::get('/export/pdf', [TagihanController::class, 'exportPdf'])->name('exportPdf');
        Route::get('/{id}/bayar', [TagihanController::class, 'bayar'])->name('bayar');
        Route::delete('/{id}', [TagihanController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/preview', [TagihanController::class, 'preview'])->name('preview');
        Route::get('/{id}/print', [TagihanController::class, 'print'])->name('print');
    });

    // Pembayaran management
    Route::prefix('pembayaran')->name('admin.pembayaran.')->group(function () {
        Route::get('/', [PembayaranController::class, 'index'])->name('index');
        Route::post('/{id}/verifikasi', [PembayaranController::class, 'verifikasi'])->name('verif');
        Route::get('/{id}/download', [PembayaranController::class, 'downloadBukti'])->name('download');
    });

    // Tarif management
    Route::resource('tarif', TarifController::class)->except(['show']);
});

// 🔐 Pelanggan Routes (Level 2)
Route::middleware('level:2')->prefix('pelanggan')->group(function () {
    // Dashboard
    Route::view('/', 'pelanggan.index')->name('pelanggan.index');

    // Tagihan
    Route::get('/tagihan', [TagihanController::class, 'pelangganIndex'])->name('pelanggan.tagihan');
    Route::get('/tagihan/{id}/struk', [TagihanController::class, 'strukPelanggan'])->name('tagihan.struk');

    // Pembayaran
    Route::get('/tagihan/{id}/bayar', [PembayaranController::class, 'create'])->name('bayar.create');
    Route::get('/tagihan/{id}/metode-pembayaran', [PembayaranController::class, 'metodePembayaran'])->name('bayar.metode');
    Route::post('/tagihan/{id}/bayar', [PembayaranController::class, 'store'])->name('bayar.store');
    Route::get('/riwayat-pembayaran', [PembayaranController::class, 'riwayatPembayaran'])->name('riwayat-pembayaran');
    Route::get('/pembayaran/{id}/download-bukti', [PembayaranController::class, 'downloadBukti'])->name('pembayaran.download-bukti');
    Route::get('/pembayaran/{id}/print-struk', [PembayaranController::class, 'printStruk'])->name('pembayaran.print-struk');

    // Riwayat penggunaan
    Route::get('/riwayat-penggunaan', [PelangganDashboardController::class, 'riwayatPenggunaan'])->name('riwayat-penggunaan');
});

// Legacy routes for backward compatibility (will be removed eventually)
Route::view('/pelanggan', 'pelanggan.index')->name('pelanggan.index');
Route::view('/pelanggan/pembayaran', 'pelanggan.pembayaran.index')->name('pembayaran');
