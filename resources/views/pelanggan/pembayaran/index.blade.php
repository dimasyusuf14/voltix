@extends('pelanggan.layouts.index')

@section('content')
    <div class="bg-gray-100 min-h-screen px-4 py-8">
        <div class="max-w-7xl mx-auto">

            {{-- ===== Heading ===== --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-blue-800">
                    Transaksi Pembayaran Listrik
                </h1>
                <p class="mt-2 text-gray-500">
                    Ikuti langkah‑langkah berikut untuk menyelesaikan pembayaran dengan mudah dan aman.
                </p>
            </div>

            {{-- ===== Grid 2 kolom ===== --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                {{-- ────────────────  K O L O M   K I R I  ──────────────── --}}
                <div class="space-y-3 col-span-2">

                    {{-- ▸ Step Navigation --}}
                    @php
                        $step = 1; // step aktif (sesuaikan)
                        $base = 'flex flex-col items-center gap-1 text-gray-400';
                        $active = 'text-blue-600';
                    @endphp
                    <div class="bg-white rounded-2xl shadow flex justify-between px-6 py-4">
                        @foreach ([['ic' => 'fa-solid fa-file-invoice', 'lbl' => 'Detail Tagihan'], ['ic' => 'fa-solid fa-building-columns', 'lbl' => 'Rekening Tujuan'], ['ic' => 'fa-solid fa-upload', 'lbl' => 'Unggah Bukti']] as $idx => $s)
                            <div class="{{ $step === $idx + 1 ? $active : '' }} {{ $base }} w-1/3">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 flex items-center
                                justify-center text-xl">
                                    <i class="{{ $s['ic'] }}"></i>
                                </div>
                                <span class="text-xs font-medium">{{ $s['lbl'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    {{-- ▸ Detail Tagihan --}}
                    <div class="bg-white p-6 rounded-xl shadow">

                        <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="ti ti-file-description text-xl"></i> Detail Tagihan
                        </h2>

                        {{-- tabel ringkas --}}
                        <div class="border rounded-xl divide-y text-sm">
                            @foreach (['Nama Pelanggan' => $tagihan->pelanggan->nama_pelanggan, 'No. Invoice' => $tagihan->no_invoice, 'Nomor KWH' => $tagihan->pelanggan->nomor_kwh, 'Periode' => bulanIndo($tagihan->bulan) . ' ' . $tagihan->tahun, 'Jumlah Meter' => number_format($tagihan->jumlah_meter) . ' kWh', 'Tarif / kWh' => 'Rp ' . number_format($tagihan->pelanggan->tarif->tarifperkwh ?? 0, 0, ',', '.')] as $label => $value)
                                {{-- baris detail --}}
                                <div class="flex justify-between px-4 py-3">
                                    <span class="text-gray-500">{{ $label }}</span>
                                    <span class="font-semibold">{{ $value }}</span>
                                </div>
                            @endforeach
                            <div class="flex justify-between px-4 py-3 font-semibold text-base">
                                <span>Total Bayar</span>
                                <span class="text-blue-600">
                                    Rp
                                    {{ number_format($tagihan->jumlah_meter * ($tagihan->pelanggan->tarif->tarifperkwh ?? 0), 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <div class="text-right mt-6">
                            <a href="{{ route('bayar.metode', $tagihan->id_tagihan) }}"
                                class="inline-flex items-center gap-1 text-sm font-medium
                              bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                                Lanjut ke Rekening Tujuan
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- ────────────────  K O L O M   K A N A N  ──────────────── --}}
                <div class="bg-white p-6 rounded-xl shadow h-fit col-span-1">
                    <h2 class="text-lg font-semibold mb-4">Cara Pembayaran</h2>

                    @foreach (['Periksa Tagihan' => 'Pastikan semua data tagihan telah sesuai dan benar.', 'Pilih Metode Pembayaran' => 'Tentukan rekening bank atau e‑wallet yang ingin Anda gunakan.', 'Transfer Nominal Tepat' => 'Lakukan transfer sesuai dengan jumlah total yang tertera.', 'Unggah Bukti Pembayaran' => 'Upload bukti transfer sebagai konfirmasi pembayaran.'] as $i => $desc)
                        <div class="flex items-start gap-3 mb-4">
                            <span
                                class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-600 text-white text-xs
                             flex items-center justify-center">
                                {{ $loop->iteration }}
                            </span>
                            <p class="text-sm text-gray-700">{{ $desc }}</p>
                        </div>
                    @endforeach

                    <p class="mt-4 text-xs text-gray-500">
                        Butuh bantuan? Hubungi CS di
                        <a href="tel:08123456789" class="text-blue-600">0812‑3456‑789</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
