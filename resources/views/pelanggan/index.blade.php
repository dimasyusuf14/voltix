@extends('pelanggan.layouts.index')

@section('content')

<section class="py-20 md:py-24 px-20 md:px-24">
    <div class="container mx-auto flex flex-col-reverse md:flex-row items-center px-4 gap-12">
        <div class="md:w-1/2 text-center md:text-left">
            @php
                $pelanggan = \App\Models\Pelanggan::find(session('logged_id'));
            @endphp
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4 text-blue-600">
                Selamat datang, <br>
                <span class="text-orange-600">{{ $pelanggan->nama_pelanggan ?? 'Pelanggan' }}</span>
            </h1>
            <p class="text-gray-600 mb-8 text-lg">
                Kelola tagihan listrik anda dengan mudah. Periksa riwayat penggunaan, cek tagihan terbaru, dan lakukan pembayaran dengan cepat dan aman. </p>
            <div class="flex justify-center md:justify-start gap-4">

                <a href="#" class="bg-orange-600 text-white px-7 py-3 rounded-md font-medium hover:bg-orange-500 transition duration-200 shadow-md">Bayar Tagihan</a>

                <a href="{{ route('register') }}" class="bg-white border border-blue-600 text-blue-600 px-7 py-3 rounded-md font-medium hover:bg-blue-100 transition duration-200 shadow-md">Riwayat Penggunaan</a>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-end">
            <img src="{{ asset('assets/images/landing_image.jpg') }}" alt="Ilustrasi E-Invoice" class="max-w-xs md:max-w-sm lg:max-w-md">
        </div>
    </div>
</section>
@endsection
