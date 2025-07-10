@extends('admin.index')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
    <h2 class="text-xl font-bold mb-4">✏️ Edit Data Pelanggan</h2>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-medium text-sm mb-1">Nama Lengkap</label>
                <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" class="w-full border rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-medium text-sm mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}" class="w-full border rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-medium text-sm mb-1">Nomor KWH</label>
                <input type="text" name="nomor_kwh" value="{{ old('nomor_kwh', $pelanggan->nomor_kwh) }}" class="w-full border rounded px-4 py-2 bg-gray-100 text-gray-600" readonly>
            </div>

            <div>
                <label class="block font-medium text-sm mb-1">Tarif Listrik</label>
                <select name="id_tarif" class="w-full border rounded px-4 py-2">
                    @foreach($tarifs as $tarif)
                    <option value="{{ $tarif->id_tarif }}" {{ $tarif->id_tarif == $pelanggan->id_tarif ? 'selected' : '' }}>
                        {{ $tarif->kode_tarif }} - {{ $tarif->daya }} VA
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-sm mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-4 py-2" rows="3">{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <div>
                <label class="block font-medium text-sm mb-1">Status</label>
                <input type="text" name="status" value="{{ $pelanggan->status }}" readonly class="w-full border rounded px-4 py-2 bg-gray-100 text-gray-600">
            </div>


            <div>
                <label class="block font-medium text-sm mb-1">Password Baru (Opsional)</label>
                <input type="password" name="password" class="w-full border rounded px-4 py-2" autocomplete="new-password">
            </div>

            <div>
                <label class="block font-medium text-sm mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-4 py-2" autocomplete="new-password">
            </div>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.pelanggan.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">💾 Perbarui</button>
        </div>
    </form>
</div>
@endsection