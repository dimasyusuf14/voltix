<nav class="bg-white shadow-sm py-4 px-20 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold text-blue-600">VOLTIX.ID</span>
        </div>
        <ul class="flex space-x-6 text-sm text-gray-700">
            <li><a href="{{ route('landing-page') }}" class="hover:text-white font-medium hover:bg-orange-500 transition duration-200 p-2 rounded-md">Beranda</a></li>
            <li><a href="{{ route('cek-tagihan') }}" class="hover:text-white font-medium hover:bg-orange-500 transition duration-200 p-2 rounded-md">Cek Tagihan</a></li>
            <li><a href="{{ route('tarif.listrik.pelanggan') }}" class="hover:text-white font-medium hover:bg-orange-500 transition duration-200 p-2 rounded-md">Tarif Listrik</a></li>
        </ul>
        <div class="space-x-2">
            <a href="{{ route('register') }}" class="border border-blue-600 text-blue-600 px-4 py-2 rounded-md hover:bg-blue-100 text-sm font-semibold transition duration-200">Daftar</a>
            <a href="{{ route('login') }}" class="bg-orange-600 text-white px-4 py-2 rounded-md hover:bg-orange-500 text-sm font-semibold transition duration-200">Login</a>
        </div>
    </div>
</nav>
