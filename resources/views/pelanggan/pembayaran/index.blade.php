@extends('pelanggan.layouts.index')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- ‑‑ Judul Halaman ‑‑ --}}
    <h1 class="text-3xl font-bold text-blue-700 mb-2">
        Transaksi Pembayaran Listrik
    </h1>
    <p class="text-gray-600 mb-8">
        Pilih rekening tujuan untuk mentransfer tagihan Anda.
    </p>

    {{-- ‑‑ Wizard / Tab Navigasi ‑‑ --}}
    <div class="bg-white p-4 rounded-xl shadow flex space-x-10 items-center mb-8">
        <div class="flex items-center space-x-2 text-gray-400">
            <i class="ti ti-file-description text-xl"></i>
            <span>Detail Tagihan</span>
        </div>

        <div class="flex items-center space-x-2 text-blue-600 font-medium">
            <i class="ti ti-building-bank text-xl"></i>
            <span>Rekening Tujuan</span>
        </div>

        <div class="flex items-center space-x-2 text-gray-400">
            <i class="ti ti-upload text-xl"></i>
            <span>Unggah Bukti</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Kolom kiri: Rekening yang bisa dipilih --}}
        <div class="md:col-span-2 bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Pilih Rekening Tujuan</h2>
            <p class="text-sm text-gray-500 mb-5">
                Silakan pilih salah satu bank di bawah ini lalu klik <b>Konfirmasi</b>.
            </p>

            {{-- Contoh data; ganti dengan loop rekening dari database jika tersedia --}}
            <form method="POST" action="{{ route('bayar.konfirmasi') }}">
                @csrf
                <div class="space-y-4">
                    <label class="flex items-center justify-between border rounded-lg p-4 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/bca.png') }}" alt="BCA" class="w-10">
                            <div>
                                <p class="font-semibold">Bank BCA</p>
                                <p class="text-xs text-gray-500">PT Voltix Indonesia</p>
                            </div>
                        </div>
                        <input type="radio" name="bank" value="BCA" class="radio">
                    </label>

                    <label class="flex items-center justify-between border rounded-lg p-4 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/bri.png') }}" alt="BRI" class="w-10">
                            <div>
                                <p class="font-semibold">Bank BRI</p>
                                <p class="text-xs text-gray-500">PT Voltix Indonesia</p>
                            </div>
                        </div>
                        <input type="radio" name="bank" value="BRI" class="radio">
                    </label>

                    <label class="flex items-center justify-between border rounded-lg p-4 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/ovo.png') }}" alt="OVO" class="w-10">
                            <div>
                                <p class="font-semibold">OVO / QRIS</p>
                                <p class="text-xs text-gray-500">Akun Bisnis Voltix</p>
                            </div>
                        </div>
                        <input type="radio" name="bank" value="OVO" class="radio">
                    </label>
                </div>

                <div class="text-right mt-6">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700
                               text-white text-sm font-medium rounded-md">
                        Konfirmasi &nbsp;<i class="ti ti-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- Kolom kanan: Petunjuk transfer --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold mb-4">Cara Transfer</h2>
            <ol class="list-decimal pl-5 text-sm text-gray-700 space-y-2">
                <li>Salin nomor rekening di atas.</li>
                <li>Lakukan transfer sesuai <b>total tagihan</b>.</li>
                <li>Pastikan nama penerima <b>PT Voltix Indonesia</b>.</li>
                <li>Simpan bukti transfer untuk diunggah.</li>
            </ol>
            <p class="mt-4 text-xs text-gray-500">
                Butuh bantuan? Hubungi CS di
                <a href="https://wa.me/628123456789" class="text-blue-600 underline">
                    0812‑3456‑789
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
