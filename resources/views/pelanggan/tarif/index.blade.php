@extends('pelanggan.layouts.index')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Daftar Tarif Listrik</h2>
    <p class="text-center text-gray-600 mb-8">Lihat tarif listrik yang tersedia untuk membantu Anda memilih paket yang tepat.</p>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Tarif -->
        <!-- Kolom Tarif -->
        <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Looping data tarif -->
            @foreach($tarifs as $tarif)
            <div class="bg-white p-4 rounded-lg shadow-md border">
                <div class="text-blue-600 text-xl mb-2">
                    <i class="fas fa-bolt"></i> {{ $tarif->daya }} VA
                </div>
                <p class="text-gray-900 font-semibold mb-1">
                    Rp {{ number_format($tarif->tarifperkwh, 0, ',', '.') }} / kWh
                </p>
                <p class="text-gray-600 text-sm">
                    {{ $tarif->deskripsi }}
                </p>
            </div>
            @endforeach
        </div>


        <!-- Kolom Kalkulator -->
        <div class="sticky top-24 self-start h-fit">
            <div class="bg-white p-6 rounded-lg shadow-md border">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">🔢 Kalkulator Pemakaian Listrik</h3>

                <form>
                    <div class="mb-4">
                        <label for="tarif" class="block text-sm text-gray-600 mb-1">Pilih Tarif</label>
                        <select id="tarif" name="tarif" class="w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Pilih Tarif --</option>
                            @foreach($tarifs as $tarif)
                            <option value="{{ $tarif->tarifperkwh }}">{{ $tarif->daya }} VA - Rp {{ number_format($tarif->tarifperkwh, 0, ',', '.') }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-4">
                        <label for="kwh" class="block text-sm text-gray-600 mb-1">Pemakaian (kWh)</label>
                        <input type="number" id="kwh" name="kwh" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan jumlah kWh">
                    </div>

                    <button type="button" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-500 transition duration-200">
                        Hitung Biaya
                    </button>
                </form>

                <div id="hasilBiaya" class="mt-4 text-sm text-gray-600">
                    <strong>Hasil Perhitungan:</strong><br>
                    -<br>
                    <span class="text-xs italic text-gray-400">* Belum termasuk biaya administrasi</span>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelector('button').addEventListener('click', function () {
        const tarif = parseFloat(document.getElementById('tarif').value);
        const kwh = parseFloat(document.getElementById('kwh').value);

        if (!tarif || !kwh) {
            document.getElementById('hasilBiaya').innerHTML = '<span class="text-red-500">Silakan pilih tarif dan isi kWh terlebih dahulu.</span>';
            return;
        }

        const total = tarif * kwh;
        const formatted = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(total);

        document.getElementById('hasilBiaya').innerHTML = `
            <strong>Hasil Perhitungan:</strong><br>
            Total Biaya: <span class="text-blue-600 font-semibold">${formatted}</span><br>
            <span class="text-xs italic text-gray-400">* Belum termasuk biaya administrasi</span>
        `;
    });
</script>
@endpush
