@extends('auth.index')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden w-full max-w-4xl grid grid-cols-1 md:grid-cols-2">

        <!-- Kiri: Form Login -->
        <div class="p-8">
            <h2 class="text-2xl font-bold text-[#ff654d] mb-1 text-center">⚡ Voltix</h2>
            <p class="text-center text-sm text-gray-500 mb-6">Masuk ke akun Anda untuk mengakses layanan</p>

            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
            @endif

            <form>
                @csrf

                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email"
                        class="w-full rounded-full px-4 py-2.5 bg-blue-50 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#ff654d]"
                        required autofocus>
                </div>

                <div class="mb-4">
                    <input type="password" name="password" placeholder="Kata Sandi"
                        class="w-full rounded-full px-4 py-2.5 bg-blue-50 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#ff654d]"
                        required>
                </div>

                <a type="submit" href="{{ route('dashboard.index') }}"
                    class="text-center w-full bg-[#ff654d] text-white py-2.5 mt-2 rounded-full font-semibold hover:bg-[#e14b3b] transition">
                    Masuk
                </a>

                <div class="mt-4 flex justify-between text-sm">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-[#ff654d]">&larr; Beranda</a>
                    <a href="{{ route('register') }}" class="text-[#ff654d] hover:underline">Belum punya akun? Daftar</a>
                </div>
            </form>


            <!-- <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-4">
                    <input type="email" name="email" placeholder="Email"
                        class="w-full rounded-full px-4 py-2.5 bg-blue-50 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#ff654d]"
                        required autofocus>
                </div>

                <div class="mb-4">
                    <input type="password" name="password" placeholder="Kata Sandi"
                        class="w-full rounded-full px-4 py-2.5 bg-blue-50 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#ff654d]"
                        required>
                </div>

                <a type="submit" href="{{ route('dashboard.index') }}"
                    class="text-center w-full bg-[#ff654d] text-white py-2.5 mt-2 rounded-full font-semibold hover:bg-[#e14b3b] transition">
                    Masuk
                </a>

                <div class="mt-4 flex justify-between text-sm">
                    <a href="{{ url('/') }}" class="text-gray-600 hover:text-[#ff654d]">&larr; Beranda</a>
                    <a href="{{ route('register') }}" class="text-[#ff654d] hover:underline">Belum punya akun? Daftar</a>
                </div>
            </form> -->


        </div>

        <!-- Kanan: Branding -->
        <div class="bg-gradient-to-br from-[#ff654d] to-[#ff7e66] text-white flex flex-col justify-center items-center p-8">
            <div class="text-center">
                <div class="text-4xl font-bold mb-2">∞ Voltix</div>
                <p class="text-sm max-w-xs">
                    Login dan mulai kelola tagihan listrik pascabayar Anda secara praktis dan aman.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
