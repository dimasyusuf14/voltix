<nav class="bg-white shadow-sm py-4 px-20 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold text-blue-600">VOLTIX.ID</span>
        </div>
        <ul class="flex space-x-6 text-sm text-gray-700">
            <li>
                <a href="{{ route('pelanggan.index') }}" class="hover:text-white font-medium hover:bg-orange-500 transition duration-200 p-2 rounded-md">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('tagihan') }}" class="hover:text-white font-medium hover:bg-orange-500 transition duration-200 p-2 rounded-md">
                    Tagihan
                </a>
            </li>
            <li class="relative group">
                <a class="hover:text-white font-medium hover:bg-orange-500 transition duration-200 p-2 rounded-md cursor-pointer">
                    Riwayat
                </a>
                <ul class="absolute hidden group-hover:block z-10 bg-white rounded shadow mt-2 w-48 p-2 space-y-1 border text-sm">
                    <li><a href="{{ route('riwayat-penggunaan')}}" class="block px-4 py-2 hover:bg-gray-100 rounded">Riwayat Penggunaan</a></li>
                    <li><a href="{{ route('riwayat-pembayaran')}}" class="block px-4 py-2 hover:bg-gray-100 rounded">Riwayat Pembayaran</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('tarif.listrik.pelanggan') }}" class="hover:text-white font-medium hover:bg-orange-500 transition duration-200 p-2 rounded-md">
                    Tarif Listrik
                </a>
            </li>
        </ul>

        {{-- Avatar Dropdown --}}
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        alt="User Profile"
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-10 mt-3 w-52 p-2 shadow">
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                <li><a>Settings</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
