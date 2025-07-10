@extends('admin.index')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">📋 Daftar Pelanggan Aktif</h2>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
        {{ session('success') }}
    </div>
    @endif


    <div class="overflow-x-auto">
        <table class="min-w-full text-sm border">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="py-2 px-4 border">#</th>
                    <th class="py-2 px-4 border">Nama</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">No. KWH</th>
                    <th class="py-2 px-4 border">Alamat</th>
                    <th class="py-2 px-4 border">Tarif</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pelanggans as $pelanggan)
                <tr>
                    <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border">{{ $pelanggan->nama_pelanggan }}</td>
                    <td class="py-2 px-4 border">{{ $pelanggan->email }}</td>
                    <td class="py-2 px-4 border">{{ $pelanggan->nomor_kwh }}</td>
                    <td class="py-2 px-4 border">{{ $pelanggan->alamat }}</td>
                    <td class="py-2 px-4 border"> {{ $pelanggan->tarif->daya ?? '-' }} VA</td>
                    <td class="py-2 px-4 border">
                        <span class="text-green-600 font-semibold capitalize">{{ $pelanggan->status }}</span>
                    </td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('admin.pelanggan.edit', $pelanggan->id_pelanggan) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                        <form action="{{ route('admin.pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')" class="text-red-600 ml-2 text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">Belum ada pelanggan aktif.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
