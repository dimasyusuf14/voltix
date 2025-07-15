@extends('pelanggan.layouts.index')

@section('content')
    <section class="max-w-3xl mx-auto px-4 md:px-6 py-10">

        {{-- Title & subtitle --}}
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">Rekening Tujuan</h1>
        <p class="text-gray-600 mb-6">
            Pilih rekening tujuan sesuai metode pembayaran yang Anda inginkan.<br>
            Pastikan Anda mentransfer sesuai nominal <span class="font-semibold text-blue-600">
                Rp {{ number_format($tagihan->total_bayar ?? 0, 0, ',', '.') }}
            </span> a.n&nbsp;PT Voltix.
        </p>

        {{-- Two‑column box: Bank | E‑Wallet --}}
        @php
            // Contoh data; gantikan dengan query MetodePembayaran::where('is_aktif',1)->get()
            $banks = [
                ['logo' => '/storage/images/bca.png', 'nama' => 'BCA', 'norek' => '789‑012‑3456'],
                ['logo' => '/storage/images/bni.png', 'nama' => 'BNI', 'norek' => '3344‑5566‑7788'],
            ];
            $ewallets = [
                ['logo' => '/storage/images/gopay.png', 'nama' => 'GoPay', 'norek' => '0812‑3456‑7890'],
                ['logo' => '/storage/images/ovo.png', 'nama' => 'OVO', 'norek' => '0812‑3456‑7891'],
                ['logo' => '/storage/images/dana.png', 'nama' => 'DANA', 'norek' => '0812‑3456‑7892'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            {{-- ==== BANKS ==== --}}
            <div class="bg-gray-50 rounded-xl p-6 border">
                <h3 class="text-center font-semibold text-lg mb-4">Bank</h3>

                @foreach ($banks as $b)
                    <label
                        class="flex items-center gap-4 bg-white hover:bg-blue-50 border rounded-lg p-4 mb-3 cursor-pointer">
                        <input type="radio" name="metode_pembayaran" value="{{ $b['nama'] }}"
                            class="form-radio text-blue-600" required>
                        <img src="{{ $b['logo'] }}" alt="{{ $b['nama'] }}" class="w-14 h-8 object-contain">
                        <div class="flex-1">
                            <p class="font-semibold">{{ $b['nama'] }}</p>
                            <p class="text-xs text-gray-500">No.Rekening</p>
                            <p class="text-sm">{{ $b['norek'] }}</p>
                        </div>
                    </label>
                @endforeach
            </div>

            {{-- ==== E‑Wallets ==== --}}
            <div class="bg-gray-50 rounded-xl p-6 border">
                <h3 class="text-center font-semibold text-lg mb-4">E‑Wallet</h3>

                @foreach ($ewallets as $e)
                    <label
                        class="flex items-center gap-4 bg-white hover:bg-blue-50 border rounded-lg p-4 mb-3 cursor-pointer">
                        <input type="radio" name="metode_pembayaran" value="{{ $e['nama'] }}"
                            class="form-radio text-blue-600" required>
                        <img src="{{ $e['logo'] }}" alt="{{ $e['nama'] }}" class="w-14 h-8 object-contain">
                        <div class="flex-1">
                            <p class="font-semibold">{{ $e['nama'] }}</p>
                            <p class="text-xs text-gray-500">No.Akun</p>
                            <p class="text-sm">{{ $e['norek'] }}</p>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Action buttons --}}
        <div class="mt-10 flex justify-between">
            <a href="{{ route('bayar.create', $tagihan->id_tagihan) }}"
                class="inline-flex items-center gap-2 border px-5 py-2 rounded-md text-gray-700
                  hover:bg-gray-100">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Detail Tagihan
            </a>

            <a href="{{ route('bayar.create', $tagihan->id_tagihan) }}?step=upload"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700
                       text-white px-6 py-2 rounded-md shadow">
                Lanjut ke Unggah Bukti <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </section>
@endsection
