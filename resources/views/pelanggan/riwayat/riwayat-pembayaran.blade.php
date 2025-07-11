@extends('pelanggan.layouts.index')

@section('content')
<div class="bg-gray-100 min-h-screen px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-blue-800 mb-2">Riwayat Pembayaran Listrik</h2>
        <p class="text-center text-gray-600 mb-8">Berikut adalah daftar riwayat pembayaran listrik Anda sebagai pelanggan.</p>

        <div class="grid md:grid-cols-3 gap-6">
            {{-- Riwayat Pembayaran --}}
            <div class="md:col-span-2 space-y-4">
                <div class="bg-white rounded-lg shadow p-6 flex justify-between items-center">
                    <div class="space-y-2">
                        <h3 class="text-lg font-semibold text-gray-800">Januari 2025</h3>
                        <p><span class="text-gray-500">Invoice:</span> <span class="font-medium">#1520034839</span></p>
                        <p><span class="text-gray-500">Nomor KWH:</span> <span class="font-medium">607855556446</span></p>
                        <p><span class="text-gray-500">Jumlah Meter:</span> <span class="font-medium">250 kWh</span></p>
                    </div>
                    <div class="space-y-2 text-right">
                        <p><span class="text-gray-500">Metode Pembayaran:</span> <span class="font-medium">Transfer</span></p>
                        <p><span class="text-gray-500">Biaya Admin:</span> Rp 2.500</p>
                        <p><span class="text-gray-500">Total Bayar:</span> <span class="text-blue-600 font-bold">Rp 427.383</span></p>
                        <p><span class="text-gray-500">Status Pembayaran:</span> <span class="text-green-600 font-semibold">Lunas</span> - <span class="text-gray-600">Terverifikasi</span></p>
                        <div class="flex gap-2 justify-end mt-2">
                            <button class="border border-blue-600 text-blue-600 px-3 py-1 rounded-md text-sm hover:bg-blue-50">Bukti Upload</button>
                            <button class="bg-blue-600 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-700">Unduh Struk</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="text-md font-semibold mb-2">Filter Riwayat Pembayaran</h4>
                    <div class="flex flex-col space-y-2">
                        <select class="border rounded px-3 py-2 text-sm">
                            <option>Semua Bulan</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <!-- Tambah opsi bulan -->
                        </select>
                        <select class="border rounded px-3 py-2 text-sm">
                            <option>Semua Tahun</option>
                            <option>2025</option>
                            <option>2024</option>
                            <!-- Tambah opsi tahun -->
                        </select>
                    </div>
                </div>

                {{-- Placeholder chart (optional, bisa dihapus) --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="text-md font-semibold mb-2">Grafik Pembayaran</h4>
                    <div class="w-full h-32 bg-gray-100 flex items-center justify-center text-gray-400">[Chart Placeholder]</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
