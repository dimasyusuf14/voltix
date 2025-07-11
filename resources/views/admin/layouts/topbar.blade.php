<!-- Topbar -->
<div class="flex justify-between items-center mt-5 bg-white rounded-2xl mx-3 p-3 mb-10 shadow-md">
    <h1 class="text-2xl font-bold">Dashboard</h1>

    <div class="flex items-center gap-4">
        <!-- Notifikasi -->
        <button class="relative focus:outline-none">
            <i class="fas fa-bell text-gray-600"></i>
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] leading-none rounded-full px-[5px]">
                3
            </span>
        </button>

        <!-- Avatar -->
        <img src="https://i.pravatar.cc/40" alt="User" class="w-8 h-8 rounded-full">

        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-3 py-1.5 rounded-md transition">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>