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

        @forelse ($tagihans as $t)
        @php
        // warna status & tombol
        $warna = $t->status == 'Sudah Lunas' ? 'text-green-600' : 'text-red-600';
        $btnShow = $t->status == 'Belum Lunas';
        @endphp

        <div class="bg-white shadow-sides-bottom rounded-xl p-6">
            <h2 class="text-lg font-bold mb-2">
                {{ \Illuminate\Support\Str::headline(\Carbon\Carbon::create($t->tahun, $t->bulan)->isoFormat('MMMM YYYY')) }}
            </h2>

            <p class="text-sm text-gray-500 font-medium">#{{ $t->id_tagihan }}</p>
            <p class="text-sm text-gray-800 font-semibold">{{ $t->pelanggan->nama_pelanggan }}</p>
            <p class="text-sm {{ $warna }} font-medium">{{ $t->status }}</p>
            <p class="text-xs text-gray-500 mb-4">Status Pembayaran</p>

            <div class="border-t pt-3">
                <p class="text-sm text-gray-600">Total Tagihan</p>
                <p class="text-blue-600 text-lg font-bold">
                    Rp {{ number_format($t->jumlah_meter * $t->pelanggan->tarif->tarifperkwh, 0, ',', '.') }}
                </p>
                <p class="text-xs text-gray-500 mb-3">Sudah Termasuk Biaya Admin</p>

                @if ($btnShow)
                <a class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2
                           rounded-md text-center">
                    Bayar Sekarang
                </a>
                @endif
            </div>
        </div>
        @empty
        <p class="col-span-3 text-center text-gray-500">Belum ada tagihan.</p>
        @endforelse
    </div>

</div>

@endsection

