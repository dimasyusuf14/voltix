{{--  resources/views/admin/metode/index.blade.php  --}}
@extends('admin.index')

@section('content')
    <!-- Wrapper -->
    <div class="bg-white shadow rounded-lg p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-800 mb-1">Daftar Metode Pembayaran</h2>
                <p class="text-sm text-gray-500">Kelola metode pembayaran yang tersedia untuk pelanggan Anda.</p>
            </div>
            <a href="{{ route('metode.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                <i class="ti ti-plus mr-2"></i>Tambah Metode
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table wrapper -->
        <div class="overflow-x-auto">
            <table id="metodePembayaranTable" class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class=" border text-center">#</th>
                        <th class=" border">Logo</th>
                        <th class=" border">Nama</th>
                        <th class=" border">Kode</th>
                        <th class=" border">Atas Nama</th>
                        <th class=" border">Nomor Rekening</th>
                        <th class=" border">Biaya Admin</th>
                        <th class=" border">Deskripsi</th>
                        <th class=" border">Status</th>
                        <th class=" border text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @forelse($metodePembayarans as $metode)
                        <tr class="hover:bg-gray-50">
                            <td class=" border">{{ $loop->iteration }}</td>
                            <td class=" border">
                                <img src="{{ $metode->logo_url }}" alt="Logo {{ $metode->nama }}"
                                    class="w-8 h-8 object-contain">
                            </td>
                            <td class=" border font-semibold text-gray-900">
                                {{ $metode->nama }}
                            </td>
                            <td class=" border">
                                <span class="bg-blue-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    {{ $metode->kode }}
                                </span>
                            </td>
                            <td class=" border">{{ $metode->atas_nama }}</td>
                            <td class=" border">
                                {{ $metode->nomor_rekening ?: '-' }}
                            </td>
                            <td class=" border" data-order="{{ $metode->biaya_admin }}">
                                {{ $metode->biaya_admin_format }}
                            </td>
                            <td class=" border">
                                <div>
                                    {{ $metode->deskripsi ?: '-' }}
                                </div>
                            </td>
                            <td class="border" data-order="{{ $metode->is_aktif ? 1 : 0 }}">
                                @if ($metode->is_aktif)
                                    <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">Aktif</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full">Nonaktif</span>
                                @endif
                            </td>
                            <td class=" border text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <!-- Toggle Status -->
                                    <form action="{{ route('metode.toggle-status', $metode) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-gray-600 hover:text-gray-800 p-1"
                                            title="{{ $metode->is_aktif ? 'Nonaktifkan' : 'Aktifkan' }}">
                                            <i class="ti ti-toggle-{{ $metode->is_aktif ? 'right' : 'left' }}"></i>
                                        </button>
                                    </form>

                                    <!-- Edit -->
                                    <a href="{{ route('metode.edit', $metode) }}"
                                        class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                        <i class="ti ti-pencil"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('metode.destroy', $metode) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus metode pembayaran ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 p-1" title="Hapus">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="ti ti-credit-card-off text-4xl mb-2"></i>
                                    <p class="text-lg font-medium mb-1">Belum ada metode pembayaran</p>
                                    <p class="text-sm">Tambahkan metode pembayaran pertama Anda.</p>
                                    <a href="{{ route('metode.create') }}"
                                        class="mt-3 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                        <i class="ti ti-plus mr-2"></i>Tambah Metode
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($metodePembayarans->count() > 0)
            <div class="mt-6 text-sm text-gray-500">
                Total: {{ $metodePembayarans->count() }} metode pembayaran
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const table = $('#metodePembayaranTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Semua"]
                ],
                order: [
                    [2, 'asc']
                ], // Sort by nama column
                columnDefs: [{
                        targets: [1, 9], // Logo and Aksi columns
                        orderable: false,
                        searchable: false
                    },
                    {
                        targets: [6], // Biaya Admin column
                        type: "num"
                    },
                    {
                        targets: [8], // Status column
                        type: "num"
                    }
                ],
                dom: '<"flex justify-between items-center mb-4 mt-5"lBf>tip',
                buttons: [{
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 2, 3, 4, 5, 6, 7, 8] // tanpa kolom logo dan aksi
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 2, 3, 4, 5, 6, 7, 8]
                        }
                    }
                ],
                drawCallback: function(settings) {
                    // Reinitialize tooltips after table redraw
                    $('[title]').tooltip();
                }
            });

            table.buttons().containers().addClass('flex gap-2');
            table.buttons().nodes().each(function(value, index) {
                $(this).removeClass('dt-button').addClass(
                    'bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition');
            });
        });
    </script>
@endpush
