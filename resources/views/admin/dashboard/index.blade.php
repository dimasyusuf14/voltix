@extends('admin.index')

@section('content')
<!-- Statistik Ringkasan -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-lg p-4 shadow flex items-center space-x-4">
        <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
            <i class="ti ti-user-plus text-2xl"></i>
        </div>
        <div>
            <h4 class="text-sm text-gray-500">Pelanggan Baru (Menunggu Konfirmasi)</h4>
            <p class="text-xl font-semibold">{{ $jumlahMenunggu }}</p>
        </div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow flex items-center space-x-4">
        <div class="bg-green-100 text-green-600 p-3 rounded-full">
            <i class="ti ti-users text-2xl"></i>
        </div>
        <div>
            <h4 class="text-sm text-gray-500">Pelanggan Aktif</h4>
            <p class="text-xl font-semibold">{{ $jumlahAktif }}</p>
        </div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow flex items-center space-x-4">
        <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
            <i class="ti ti-bolt text-2xl"></i>
        </div>
        <div>
            <h4 class="text-sm text-gray-500">Jumlah Tarif</h4>
            <p class="text-xl font-semibold">{{ $jumlahTarif }}</p>
        </div>
    </div>
</div>


@endsection
