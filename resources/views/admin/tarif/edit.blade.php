@extends('admin.index')

@section('content')
<div class="p-6 bg-white shadow rounded max-w-xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Tarif Listrik</h2>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.tarif.update', $tarif->id_tarif) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="kode_tarif" class="block mb-1 text-sm font-medium">Kode Tarif</label>
            <input type="text" name="kode_tarif" id="kode_tarif" value="{{ old('kode_tarif', $tarif->kode_tarif) }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="daya" class="block mb-1 text-sm font-medium">Daya (VA)</label>
            <input type="number" name="daya" id="daya" value="{{ old('daya', $tarif->daya) }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="tarifperkwh" class="block mb-1 text-sm font-medium">Tarif per KWH (Rp)</label>
            <input type="number" step="0.01" name="tarifperkwh" id="tarifperkwh" value="{{ old('tarifperkwh', $tarif->tarifperkwh) }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block mb-1 text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="w-full border rounded p-2">{{ old('deskripsi', $tarif->deskripsi) }}</textarea>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.tarif.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection