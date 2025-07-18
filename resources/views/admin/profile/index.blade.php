@extends('admin.index')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Profile</h1>
            <p class="text-gray-600">Kelola informasi akun dan keamanan Anda</p>
        </div>

        <!-- Profile Grid -->
        @if (session('logged_in') && session('level') == 1)
            @php
                $currentUser = \App\Models\User::find(session('logged_id'));
            @endphp
            <div class="grid lg:grid-cols-2 gap-6">
                <!-- Update Profile Form -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Profile</h3>

                    @if (session('success_profile'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success_profile') }}
                        </div>
                    @endif

                    @if ($errors->has('name') || $errors->has('email'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $currentUser->name ?? '') }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $currentUser->email ?? '') }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" name="username"
                                value="{{ old('username', $currentUser->username ?? '') }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Form -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Ganti Password</h3>

                    @if (session('success_password'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success_password') }}
                        </div>
                    @endif

                    @if ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @if ($errors->has('current_password'))
                                    <li>{{ $errors->first('current_password') }}</li>
                                @endif
                                @if ($errors->has('password'))
                                    <li>{{ $errors->first('password') }}</li>
                                @endif
                                @if ($errors->has('password_confirmation'))
                                    <li>{{ $errors->first('password_confirmation') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.profile.password.update') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                            <input type="password" name="current_password"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                            <input type="password" name="password"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                            <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-red-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-700 transition-colors">
                                Ganti Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <h4 class="font-semibold">Akses Ditolak</h4>
                <p>Anda harus login sebagai admin untuk mengakses halaman ini.</p>
                <a href="{{ route('login') }}" class="text-red-800 underline font-medium">Klik di sini untuk login</a>
            </div>
        @endif

        <!-- Current Info Display -->
        <div class="mt-6 bg-blue-50 rounded-xl p-6 border border-blue-200">
            <h3 class="text-lg font-semibold text-blue-800 mb-4">Informasi Akun Saat Ini</h3>
            @if (session('logged_in') && session('level') == 1)
                @php
                    $currentUser = \App\Models\User::find(session('logged_id'));
                @endphp
                @if ($currentUser)
                    <div class="grid md:grid-cols-3 gap-4 text-sm">
                        <div>
                            <span class="text-blue-600 font-medium">Nama:</span>
                            <p class="text-gray-800">{{ $currentUser->name ?? 'Tidak tersedia' }}</p>
                        </div>
                        <div>
                            <span class="text-blue-600 font-medium">Email:</span>
                            <p class="text-gray-800">{{ $currentUser->email ?? 'Tidak tersedia' }}</p>
                        </div>
                        <div>
                            <span class="text-blue-600 font-medium">Username:</span>
                            <p class="text-gray-800">{{ $currentUser->username ?? 'Tidak tersedia' }}</p>
                        </div>
                    </div>
                @else
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                        <p>Data user tidak ditemukan.</p>
                    </div>
                @endif
            @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <p>Anda harus login untuk mengakses halaman ini.</p>
                    <a href="{{ route('login') }}" class="text-red-800 underline">Klik di sini untuk login</a>
                </div>
            @endif
        </div>
    </div>
@endsection
