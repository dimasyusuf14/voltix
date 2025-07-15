@extends('pelanggan.layouts.index')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">

        {{-- ***** Judul halaman ***** --}}
        <h1 class="text-2xl md:text-3xl font-bold text-blue-700 mb-6">
            Unggah Bukti Pembayaran
        </h1>

        {{-- ***** Card ***** --}}
        <div class="bg-white rounded-xl shadow p-8">

            {{-- heading & subheading --}}
            <h2 class="text-lg font-semibold text-gray-800">Unggah Bukti Pembayaran</h2>
            <p class="text-sm text-gray-600 mb-6">
                Unggah bukti pembayaran yang jelas (JPG, JPEG, PNG, atau PDF, maksimal&nbsp;2 MB)
                sebagai konfirmasi pembayaran Anda.
            </p>

            {{-- error flash --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-300 text-red-700 rounded mb-4 p-3 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- === FORM upload === --}}
            <form id="form-upload" action="{{ route('bayar.store', $tagihan->id_tagihan) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" accept="image/*,application/pdf"
                    class="block w-full border border-gray-300 rounded-md px-3 py-2
                          text-sm file:mr-4 file:px-4 file:py-2 file:rounded-md
                          file:border-0 file:bg-blue-600 file:text-white
                          hover:file:bg-blue-500 cursor-pointer"
                    required>

                <p class="text-xs text-gray-500 mt-2">
                    Pastikan file yang diunggah berukuran maksimal 2 MB.
                </p>

                {{-- preview sederhana (opsional) --}}
                <div id="preview" class="hidden mt-4">
                    <p class="text-xs text-gray-500 mb-1">Pratinjau:</p>
                    <img src="#" alt="preview" class="max-h-40 rounded-md shadow">
                </div>
            </form>

            {{-- ==== Action buttons (di luar form agar bisa flex justify‑between) ==== --}}
            <div class="flex flex-col sm:flex-row justify-between items-center mt-8 gap-4">
                <a href="{{ route('bayar.metode', $tagihan->id_tagihan) }}"
                    class="inline-flex items-center gap-2 border border-gray-300
                      text-gray-700 px-6 py-2 rounded-md text-sm hover:bg-gray-100">
                    <i class="ti ti-arrow-left text-base"></i>
                    Kembali ke Rekening Tujuan
                </a>

                <button type="submit" form="form-upload"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700
                           text-white text-sm font-medium px-6 py-2 rounded-md shadow">
                    <i class="ti ti-upload text-base"></i>
                    Unggah Bukti Pembayaran
                </button>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        // Preview image kecil
        const input = document.querySelector('input[name="bukti_pembayaran"]');
        input.addEventListener('change', e => {
            const file = e.target.files[0];
            if (!file) return;
            const img = document.querySelector('#preview img');
            img.src = URL.createObjectURL(file);
            document.getElementById('preview').classList.remove('hidden');
        });
    </script>
@endpush
