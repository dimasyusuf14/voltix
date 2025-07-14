@extends('pelanggan.layouts.index')

@section('content')
    <div class="bg-gray-100 min-h-screen px-4 py-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-blue-800 mb-1">Riwayat Penggunaan Listrik</h1>
            <p class="text-gray-600 mb-6">Berikut adalah daftar riwayat penggunaan listrik Anda sebagai pelanggan.</p>

            <div class="flex flex-col lg:flex-row gap-6">
                {{-- Bagian Kiri: Riwayat Penggunaan --}}
                <div class="flex-1 space-y-4">
                    {{-- Kartu Riwayat 1 --}}
                    <div
                        class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div class="space-y-1">
                            <h3 class="text-lg font-semibold">Maret 2025</h3>
                            <p class="text-sm text-gray-600">Meter Awal - Akhir<br><strong>400 - 550</strong></p>
                            <p class="text-sm text-gray-600">Tarif per kWh<br><strong>Rp 1.700</strong></p>
                        </div>
                        <div class="text-right space-y-1 mt-4 md:mt-0">
                            <p class="text-sm text-gray-600">Jumlah Meter<br><strong>150 kWh</strong></p>
                            <p class="text-sm text-gray-600">Daya Listrik<br><span class="text-blue-600 font-semibold">6600
                                    VA ke atas</span></p>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-4">
                            <button class="bg-blue-100 p-2 rounded-lg">
                                <i class="ti ti-file-text text-blue-600 text-xl"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Kartu Riwayat 2 --}}
                    <div
                        class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div class="space-y-1">
                            <h3 class="text-lg font-semibold">Februari 2025</h3>
                            <p class="text-sm text-gray-600">Meter Awal - Akhir<br><strong>250 - 400</strong></p>
                            <p class="text-sm text-gray-600">Tarif per kWh<br><strong>Rp 1.700</strong></p>
                        </div>
                        <div class="text-right space-y-1 mt-4 md:mt-0">
                            <p class="text-sm text-gray-600">Jumlah Meter<br><strong>150 kWh</strong></p>
                            <p class="text-sm text-gray-600">Daya Listrik<br><span class="text-blue-600 font-semibold">6600
                                    VA ke atas</span></p>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-4">
                            <button class="bg-blue-100 p-2 rounded-lg">
                                <i class="ti ti-file-text text-blue-600 text-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Bagian Kanan: Filter + Chart Placeholder --}}
                <div class="w-full lg:w-1/3 space-y-4">
                    {{-- Filter --}}
                    <div class="bg-white p-5 rounded-xl shadow">
                        <h4 class="font-semibold text-gray-800 mb-3">Filter Riwayat Penggunaan</h4>
                        <select class="w-full mb-2 border-gray-300 rounded p-2">
                            <option>Semua Bulan</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                        </select>
                        <select class="w-full border-gray-300 rounded p-2">
                            <option>Semua Tahun</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                    </div>

                    {{-- Placeholder Grafik --}}
                    <div class="bg-white p-5 rounded-xl shadow">
                        <h4 class="font-semibold text-gray-800 mb-3">Grafik Penggunaan</h4>
                        <div class="w-full h-48 bg-gray-100 rounded flex items-center justify-center text-gray-400">
                            (Chart Placeholder)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
