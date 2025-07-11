@extends('pelanggan.layouts.index')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-blue-700 mb-2">Transaksi Pembayaran Listrik</h1>
    <p class="text-gray-600 mb-8">Ikuti langkah-langkah berikut untuk menyelesaikan pembayaran dengan mudah dan aman.</p>

    {{-- Navigasi Tab --}}
    <div class="bg-white p-4 rounded-xl shadow flex space-x-10 items-center mb-8">
        <div class="flex items-center space-x-2 text-blue-600 font-medium">
            <i class="ti ti-file-description text-xl"></i>
            <span>Detail Tagihan</span>
        </div>
        <div class="flex items-center space-x-2 text-gray-400">
            <i class="ti ti-building-bank text-xl"></i>
            <span>Rekening Tujuan</span>
        </div>
        <div class="flex items-center space-x-2 text-gray-400">
            <i class="ti ti-upload text-xl"></i>
            <span>Unggah Bukti</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Kiri: Detail Tagihan --}}
        <div class="md:col-span-2 bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Detail Tagihan</h2>
            <p class="text-sm text-gray-500 mb-5">Periksa detail tagihan Anda dengan seksama sebelum melanjutkan ke langkah berikutnya.</p>

            <div class="border rounded-xl p-4">
                <div class="grid grid-cols-2 text-sm mb-2">
                    <p class="text-gray-500">Nama Pelanggan</p>
                    <p class="text-right font-semibold">Jonathan Muller</p>
                </div>
                <div class="grid grid-cols-2 text-sm mb-2">
                    <p class="text-gray-500">No. Invoice</p>
                    <p class="text-right font-semibold">#0426528898</p>
                </div>
                <div class="grid grid-cols-2 text-sm mb-2">
                    <p class="text-gray-500">Nomor KWH</p>
                    <p class="text-right font-semibold">607855556446</p>
                </div>
                <div class="grid grid-cols-2 text-sm mb-2">
                    <p class="text-gray-500">Bulan/Tahun</p>
                    <p class="text-right font-semibold">Februari 2025</p>
                </div>
                <div class="grid grid-cols-2 text-sm mb-2">
                    <p class="text-gray-500">Jumlah Meter</p>
                    <p class="text-right font-semibold">150 kWh</p>
                </div>
                <div class="grid grid-cols-2 text-sm mb-2">
                    <p class="text-gray-500">Tarif per kWh</p>
                    <p class="text-right font-semibold">Rp 1.700</p>
                </div>
                <div class="grid grid-cols-2 text-sm mb-4">
                    <p class="text-gray-500">Biaya Admin</p>
                    <p class="text-right font-semibold">Rp 2.500</p>
                </div>
                <div class="grid grid-cols-2 border-t pt-2 text-sm">
                    <p class="font-semibold text-gray-700">Total Bayar</p>
                    <p class="text-right font-bold text-blue-600">Rp 257.430</p>
                </div>
            </div>

            <div class="text-right mt-6">
                <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                    Lanjut ke Rekening Tujuan <i class="ti ti-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

        {{-- Kanan: Cara Pembayaran --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4">Cara Pembayaran</h2>
            <ol class="list-decimal pl-5 text-sm text-gray-700 space-y-2">
                <li><strong>Periksa Tagihan:</strong> Pastikan semua data tagihan telah sesuai dan benar.</li>
                <li><strong>Pilih Metode Pembayaran:</strong> Tentukan rekening bank atau e-wallet yang ingin Anda gunakan.</li>
                <li><strong>Transfer Nominal Tepat:</strong> Lakukan transfer sesuai jumlah total tagihan.</li>
                <li><strong>Unggah Bukti Pembayaran:</strong> Upload bukti transfer sebagai konfirmasi pembayaran.</li>
            </ol>
            <p class="mt-4 text-xs text-gray-500">Butuh bantuan? Hubungi CS di <a href="#" class="text-blue-600">0812-3456-789</a></p>
        </div>
    </div>
</div>
@endsection
