<!-- Topbar -->
<div class="flex justify-between items-center mt-5 bg-white rounded-2xl p-3 mb-10 shadow-md">
    <h1 class="text-2xl font-bold">Administrator</h1>

    <div class="flex items-center gap-4">


        <!-- Avatar -->
        <img src="https://i.pravatar.cc/40" alt="User" class="w-8 h-8 rounded-full">

        <!-- Dropdown -->
        <div class="relative select-none">
            <details class="group">
                <summary class="flex items-center gap-2 cursor-pointer list-none">
                    <span class="font-semibold text-gray-700 hidden md:inline">
                        {{ $currentAdmin->nama_admin ?? 'Admin' }}
                    </span>
                    <!-- Panah -->
                    <svg class="w-4 h-4 text-gray-600 transition-transform duration-200 group-open:rotate-180"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>

                <!-- Menu -->
                <ul
                    class="absolute right-0 mt-2 w-48 bg-white border shadow-md rounded-md
                   py-2 z-50 text-sm">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Lihat Profil</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Pengaturan</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </details>
        </div>
    </div>
</div>
