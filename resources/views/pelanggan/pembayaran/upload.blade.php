@extends('pelanggan.layouts.index')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">

    {{-- ✨ Breadcrumb / judul sederhana --}}
    <h1 class="text-2xl font-bold text-blue-700 mb-6">
        Pembayaran Tagihan – {{ bulanIndo($tagihan->bulan) }} {{ $tagihan->tahun }}
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- ▸ 1  Detail Tagihan  --}}
        <div class="md:col-span-2 bg-white p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <i class="ti ti-file-description text-xl"></i> Detail Tagihan
            </h2>

            <div class="border rounded-xl p-4 divide-y text-sm">
                <div class="flex justify-between py-2">
                    <span class="text-gray-500">Nama Pelanggan</span>
                    <span class="font-semibold">{{ $tagihan->pelanggan->nama_pelanggan }}</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500">No. Invoice</span>
                    <span class="font-semibold">#{{ $tagihan->id_tagihan }}</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500">Nomor KWH</span>
                    <span class="font-semibold">{{ $tagihan->pelanggan->nomor_kwh }}</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500">Periode</span>
                    <span class="font-semibold">
                        {{ bulanIndo($tagihan->bulan) }} {{ $tagihan->tahun }}
                    </span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500">Jumlah Meter</span>
                    <span class="font-semibold">{{ $tagihan->jumlah_meter }} kWh</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500">Tarif / kWh</span>
                    <span class="font-semibold">
                        Rp {{ number_format($tagihan->pelanggan->tarif->tarifperkwh ?? 0 , 0, ',', '.') }}
                    </span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500">Biaya Admin</span>
                    <span class="font-semibold">Rp 2.500</span>
                </div>
                <div class="flex justify-between pt-3 text-base font-semibold">
                    <span>Total Bayar</span>
                    <span class="text-blue-600">
                        Rp {{ number_format(($tagihan->jumlah_meter * ($tagihan->pelanggan->tarif->tarifperkwh ?? 0)) + 2500 , 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>

        {{-- ▸ 2  Form Upload Bukti --}}
        <div class="bg-white p-6 rounded-xl shadow h-fit">
            <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <i class="ti ti-upload text-xl"></i> Unggah Bukti Pembayaran
            </h2>

            {{-- alert error --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 text-sm rounded p-3 mb-4">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bayar.store', $tagihan->id_tagihan) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm mb-1 font-medium text-gray-600">Bukti Transfer (jpg / png, maks 2 MB)</label>
                    <input type="file" name="bukti_pembayaran" accept="image/*"
                           class="w-full border rounded px-3 py-2 text-sm file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0 file:bg-blue-600 file:text-white
                                  hover:file:bg-blue-500 cursor-pointer" required>
                </div>

                {{-- preview optional --}}
                <div id="preview" class="hidden">
                    <p class="text-xs text-gray-500 mb-1">Pratinjau:</p>
                    <img src="#" alt="Preview" class="rounded-md shadow max-h-40">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md text-sm font-medium">
                    Kirim &amp; Minta Verifikasi
                </button>
            </form>

            <p class="text-xs text-gray-500 mt-4">
                * Tagihan akan dicek oleh admin maksimal 1×24 jam.
            </p>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
/* preview gambar kecil */
document.querySelector('input[name=bukti_pembayaran]').addEventListener('change', e=>{
    const file = e.target.files[0];
    if (!file) return;
    const img  = document.querySelector('#preview img');
    img.src = URL.createObjectURL(file);
    document.getElementById('preview').classList.remove('hidden');
});
</script>
@endpush
