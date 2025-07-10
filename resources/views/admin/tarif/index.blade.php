@extends('admin.index')

@section('content')
<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Daftar Tarif Listrik</h2>
    <a href="{{ route('admin.tarif.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Tarif</a>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mt-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
                <th class="px-4 py-2">Kode</th>
                <th class="px-4 py-2">Daya</th>
                <th class="px-4 py-2">Tarif/KWh</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarifs as $tarif)
            <tr>
                <td class="border px-4 py-2">{{ $tarif->kode_tarif }}</td>
                <td class="border px-4 py-2">{{ $tarif->daya }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($tarif->tarifperkwh, 2, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ $tarif->deskripsi }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.tarif.edit', $tarif->id_tarif) }}" class="text-blue-600">Edit</a> |
                    <form action="{{ route('admin.tarif.destroy', $tarif->id_tarif) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection