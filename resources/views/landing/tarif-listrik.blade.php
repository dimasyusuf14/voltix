@extends('layouts.index')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Daftar Tarif Listrik</h2>
    <p class="text-center text-gray-600 mb-8">Lihat tarif listrik yang tersedia untuk membantu Anda memilih paket yang tepat.</p>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Tarif -->
        <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- 450 VA -->
            <div class="bg-white p-4 rounded-lg shadow-md border">
                <div class="text-blue-600 text-xl mb-2"><i class="fas fa-bolt"></i> 450 VA</div>
                <p class="text-gray-900 font-semibold mb-1">Rp 417 / kWh</p>
                <p class="text-gray-600 text-sm">Kapasitas 450 VA ini cocok untuk instalasi dengan kebutuhan listrik minimal, mendukung peralatan dasar dengan beban rendah.</p>
            </div>

            <!-- 900 VA -->
            <div class="bg-white p-4 rounded-lg shadow-md border">
                <div class="text-blue-600 text-xl mb-2"><i class="fas fa-bolt"></i> 900 VA</div>
                <p class="text-gray-900 font-semibold mb-1">Rp 1.352 / kWh</p>
                <p class="text-gray-600 text-sm">Daya 900 VA menyediakan kapasitas yang cukup untuk instalasi dengan beban sedang, mendukung sejumlah perangkat standar.</p>
            </div>

            <!-- 1300 VA -->
            <div class="bg-white p-4 rounded-lg shadow-md border">
                <div class="text-blue-600 text-xl mb-2"><i class="fas fa-bolt"></i> 1300 VA</div>
                <p class="text-gray-900 font-semibold mb-1">Rp 1.445 / kWh</p>
                <p class="text-gray-600 text-sm">Instalasi dengan kapasitas 1300 VA ideal untuk kebutuhan listrik yang lebih beragam, menyediakan ruang bagi perangkat dengan beban menengah.</p>
            </div>

            <!-- 2200 VA -->
            <div class="bg-white p-4 rounded-lg shadow-md border">
                <div class="text-blue-600 text-xl mb-2"><i class="fas fa-bolt"></i> 2200 VA</div>
                <p class="text-gray-900 font-semibold mb-1">Rp 1.445 / kWh</p>
                <p class="text-gray-600 text-sm">Daya 2200 VA dirancang untuk mendukung instalasi dengan peningkatan beban listrik, memberikan performa stabil untuk perangkat tambahan.</p>
            </div>

            <!-- 2200 VA -->
            <div class="bg-white p-4 rounded-lg shadow-md border">
                <div class="text-blue-600 text-xl mb-2"><i class="fas fa-bolt"></i> 2200 VA</div>
                <p class="text-gray-900 font-semibold mb-1">Rp 1.445 / kWh</p>
                <p class="text-gray-600 text-sm">Daya 2200 VA dirancang untuk mendukung instalasi dengan peningkatan beban listrik, memberikan performa stabil untuk perangkat tambahan.</p>
            </div>
            
            <!-- 2200 VA -->
            <div class="bg-white p-4 rounded-lg shadow-md border">
                <div class="text-blue-600 text-xl mb-2"><i class="fas fa-bolt"></i> 2200 VA</div>
                <p class="text-gray-900 font-semibold mb-1">Rp 1.445 / kWh</p>
                <p class="text-gray-600 text-sm">Daya 2200 VA dirancang untuk mendukung instalasi dengan peningkatan beban listrik, memberikan performa stabil untuk perangkat tambahan.</p>
            </div>
        </div>

        <!-- Kolom Kalkulator -->
        <div class="sticky top-24 self-start h-fit">
            <div class="bg-white p-6 rounded-lg shadow-md border">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">🔢 Kalkulator Pemakaian Listrik</h3>

                <form>
                    <div class="mb-4">
                        <label for="tarif" class="block text-sm text-gray-600 mb-1">Pilih Tarif</label>
                        <select id="tarif" name="tarif" class="w-full border-gray-300 rounded-md shadow-sm">
                            <option>-- Pilih Tarif --</option>
                            <option value="417">450 VA - Rp 417</option>
                            <option value="1352">900 VA - Rp 1.352</option>
                            <option value="1445a">1300 VA - Rp 1.445</option>
                            <option value="1445b">2200 VA - Rp 1.445</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="kwh" class="block text-sm text-gray-600 mb-1">Pemakaian (kWh)</label>
                        <input type="number" id="kwh" name="kwh" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan jumlah kWh">
                    </div>

                    <button type="button" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-500 transition duration-200">
                        Hitung Biaya
                    </button>
                </form>

                <div class="mt-4 text-sm text-gray-600">
                    <strong>Hasil Perhitungan:</strong><br>
                    -<br>
                    <span class="text-xs italic text-gray-400">* Belum termasuk biaya administrasi</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
