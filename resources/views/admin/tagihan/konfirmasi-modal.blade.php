{{-- ===== Modal Konfirmasi Tagihan ===== --}}
<div id="modal-konfirmasi-{{ $tagihan->id_tagihan }}"
    class="fixed inset-0 z-50 hidden flex min-h-screen items-center justify-center bg-black/40">

    <div class="relative w-full max-w-lg bg-white rounded-lg shadow-lg p-6">
        {{-- judul --}}
        <h3 class="text-xl font-bold mb-4">Konfirmasi Pembayaran</h3>

        {{-- detail singkat --}}
        <div class="space-y-1 text-sm mb-6">
            <p><b>Periode:</b> {{ bulanIndo($tagihan->bulan) }} {{ $tagihan->tahun }}</p>
            <p><b>Jumlah Meter:</b> {{ $tagihan->jumlah_meter }} kWh</p>
            <p><b>Total Bayar:</b>
                Rp {{ number_format($tagihan->pembayaran->total_bayar ?? 0, 0, ',', '.') }}
            </p>
        </div>

        {{-- bukti pembayaran --}}
        <div class="mb-6">
            <label class="block font-medium mb-2">Bukti Pembayaran</label>

            @if (optional($tagihan->pembayaran)->bukti_pembayaran &&
                    Storage::disk('public')->exists($tagihan->pembayaran->bukti_pembayaran))
                <div class="flex justify-center">
                    <img class="w-100 h-100 rounded object-contain"
                        src="{{ Storage::disk('public')->url($tagihan->pembayaran->bukti_pembayaran) }}"
                        alt="Bukti pembayaran">
                </div>
            @else
                <div class="bg-gray-100 text-gray-500 text-center py-8 rounded">
                    Belum ada bukti pembayaran
                </div>
            @endif
        </div>

        {{-- form konfirmasi --}}
        <form action="{{ route('admin.pembayaran.verif', optional($tagihan->pembayaran)->id_pembayaran) }}"
            method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium mb-1">Metode Pembayaran</label>
                <select name="metode" class="w-full border rounded px-3 py-2 bg-gray-50">
                    @foreach (['Tunai', 'Transfer Bank', 'E‑Wallet', 'QRIS'] as $mtd)
                        <option value="{{ $mtd }}" @selected(optional($tagihan->pembayaran)->metode == $mtd)>{{ $mtd }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Setujui
                </button>
                <button type="button" onclick="closeModal('{{ $tagihan->id_tagihan }}')"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Tutup
                </button>
            </div>
        </form>

        {{-- tombol close X --}}
        <button type="button" onclick="closeModal('{{ $tagihan->id_tagihan }}')"
            class="absolute -top-2 -right-2 bg-grey text-gray-600 rounded-full w-8 h-8 shadow">
            &times;
        </button>
    </div>
</div>

{{-- helper JS --}}
<script>
    function openModal(id) {
        document.getElementById('modal-konfirmasi-' + id)?.classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('modal-konfirmasi-' + id)?.classList.add('hidden');
    }
</script>
