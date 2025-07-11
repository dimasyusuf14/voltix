@extends('pelanggan.layouts.index')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Judul -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-700">Tagihan Listrik</h1>
        <p class="text-gray-600 mt-2">Berikut adalah daftar tagihan listrik Anda.</p>
    </div>

    <!-- Filter -->
    <div class="flex flex-wrap gap-4 justify-center items-center mb-6">
        <button class="bg-white border border-gray-300 rounded-md px-4 py-2 text-sm font-medium shadow-sm hover:bg-gray-50">Filter Tagihan</button>
        <select class="border border-gray-300 rounded-md px-4 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option>Semua Status</option>
            <option>Belum Lunas</option>
            <option>Lunas</option>
        </select>
        <button class="text-blue-500 text-sm hover:underline">Reset</button>
    </div>

    <!-- Kartu Tagihan -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Kartu 1 -->
        <div class="bg-white shadow-sides-bottom rounded-xl p-6">
            <h2 class="text-lg font-bold mb-2">Februari 2025</h2>
            <p class="text-sm text-gray-500 font-medium">#0426528898</p>
            <p class="text-sm text-gray-800 font-semibold">Jonathan Muller</p>
            <p class="text-sm text-red-600 font-medium">Belum Lunas</p>
            <p class="text-xs text-gray-500 mb-4">Status Pembayaran</p>
            <div class="border-t pt-3">
                <p class="text-sm text-gray-600">Total Tagihan</p>
                <p class="text-blue-600 text-lg font-bold">Rp 257.430</p>
                <p class="text-xs text-gray-500 mb-3">Sudah Termasuk Biaya Admin</p>
                <a class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 rounded-md text-center"
                    href="{{ ('pembayaran') }}">
                    Bayar Sekarang
                </a>

            </div>
        </div>

        <!-- Kartu 2 -->
        <div class="bg-white shadow-sides-bottom rounded-xl p-6">
            <h2 class="text-lg font-bold mb-2">Maret 2025</h2>
            <p class="text-sm text-gray-500 font-medium">#2076039945</p>
            <p class="text-sm text-gray-800 font-semibold">Jonathan Muller</p>
            <p class="text-sm text-red-600 font-medium">Belum Lunas</p>
            <p class="text-xs text-gray-500 mb-4">Status Pembayaran</p>
            <div class="border-t pt-3">
                <p class="text-sm text-gray-600">Total Tagihan</p>
                <p class="text-blue-600 text-lg font-bold">Rp 257.430</p>
                <p class="text-xs text-gray-500 mb-3">Sudah Termasuk Biaya Admin</p>
                <a class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 rounded-md text-center"
                    href="{{ ('pembayaran') }}">
                    Bayar Sekarang
                </a>    
            </div>
        </div>

        <!-- Kartu 3 -->
        <div class="bg-white shadow-sides-bottom rounded-xl p-6">
            <h2 class="text-lg font-bold mb-2">Januari 2025</h2>
            <p class="text-sm text-gray-500 font-medium">#1520034839</p>
            <p class="text-sm text-gray-800 font-semibold">Jonathan Muller</p>
            <p class="text-sm text-green-600 font-medium">Lunas</p>
            <p class="text-xs text-gray-500 mb-4">Status Pembayaran</p>
            <div class="border-t pt-3">
                <p class="text-sm text-gray-600">Total Tagihan</p>
                <p class="text-blue-600 text-lg font-bold">Rp 427.383</p>
                <p class="text-xs text-gray-500 mb-3">Sudah Termasuk Biaya Admin</p>
                <!-- Tidak ada tombol bayar -->
            </div>
        </div>
    </div>
</div>

@endsection
