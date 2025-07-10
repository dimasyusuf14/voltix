@extends('admin.index')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Konfirmasi Pelanggan Baru</h2>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600">
            <tr>
                <th class="py-2 px-4">Nama</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Nomor KWH</th>
                <th class="py-2 px-4">Alamat</th>
                <th class="py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelangganWaiting as $pelanggan)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $pelanggan->nama_pelanggan }}</td>
                <td class="py-2 px-4">{{ $pelanggan->email }}</td>
                <td class="py-2 px-4">{{ $pelanggan->nomor_kwh }}</td>
                <td class="py-2 px-4">{{ $pelanggan->alamat }}</td>
                <td class="py-2 px-4">
                    <form action="{{ route('admin.konfirmasi.submit', $pelanggan->id_pelanggan) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Konfirmasi</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada pelanggan yang menunggu konfirmasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection