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
                        <th class="px-4 py-3 border">Logo</th>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Kode</th>
                        <th class="px-4 py-3 border">Atas Nama</th>
                        <th class="px-4 py-3 border">Nomor Rekening</th>
                        <th class="px-4 py-3 border">Biaya Admin</th>
                        <th class="px-4 py-3 border">Deskripsi</th>
                        <th class="px-4 py-3 border">Status</th>
                        <th class="px-4 py-3 border text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($metodePembayarans as $metode)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border">
                                <img src="{{ $metode->logo_url }}" alt="Logo {{ $metode->nama }}"
                                    class="w-8 h-8 object-contain">
                            </td>
                            <td class="px-4 py-3 border font-semibold text-gray-900">
                                {{ $metode->nama }}
                            </td>
                            <td class="px-4 py-3 border">
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                    {{ $metode->kode }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border">{{ $metode->atas_nama }}</td>
                            <td class="px-4 py-3 border">
                                {{ $metode->nomor_rekening ?: '-' }}
                            </td>
                            <td class="px-4 py-3 border" data-order="{{ $metode->biaya_admin }}">
                                {{ $metode->biaya_admin_format }}
                            </td>
                            <td class="px-4 py-3 border">
                                <div class="max-w-xs truncate" title="{{ $metode->deskripsi }}">
                                    {{ $metode->deskripsi ?: '-' }}
                                </div>
                            </td>
                            <td class="px-4 py-3 border" data-order="{{ $metode->is_aktif ? 1 : 0 }}">
                                @if ($metode->is_aktif)
                                    <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">Aktif</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 border text-right">
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
    $('#metodePembayaranTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
        },
        "responsive": true,
        "pageLength": 10,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "order": [[1, 'asc']], // Sort by nama column
        "columnDefs": [
            {
                "targets": [0, 8], // Logo and Aksi columns
                "orderable": false,
                "searchable": false
            },
            {
                "targets": [5], // Biaya Admin column
                "type": "num"
            },
            {
                "targets": [7], // Status column
                "type": "num"
            }
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "drawCallback": function(settings) {
            // Reinitialize tooltips after table redraw
            $('[title]').tooltip();
        }
    });

    // Custom styling for DataTables
    $('.dataTables_wrapper .dataTables_length select').addClass('form-select form-select-sm');
    $('.dataTables_wrapper .dataTables_filter input').addClass('form-control form-control-sm');
    
    // Add custom CSS classes
    $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('btn btn-sm');
    $('.dataTables_wrapper .dataTables_paginate .paginate_button.current').addClass('btn-primary');
    $('.dataTables_wrapper .dataTables_paginate .paginate_button:not(.current)').addClass('btn-outline-secondary');
});
</script>

<style>
/* Custom DataTables styling */
.dataTables_wrapper {
    font-size: 0.875rem;
}

.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_paginate {
    margin-bottom: 1rem;
}

.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label {
    font-weight: 500;
    color: #6b7280;
    margin-bottom: 0;
}

.dataTables_wrapper .dataTables_filter {
    text-align: right;
}

.dataTables_wrapper .dataTables_filter input {
    margin-left: 0.5rem;
    padding: 0.375rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    font-size: 0.875rem;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
    outline: none;
}

.dataTables_wrapper .dataTables_length select {
    margin: 0 0.5rem;
    padding: 0.25rem 2rem 0.25rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    font-size: 0.875rem;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    appearance: none;
}

.dataTables_wrapper .dataTables_info {
    color: #6b7280;
    font-size: 0.875rem;
}

.dataTables_wrapper .dataTables_paginate {
    margin-top: 1rem;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0.375rem 0.75rem;
    margin-left: 0.25rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    color: #374151;
    text-decoration: none;
    font-size: 0.875rem;
    transition: all 0.15s ease-in-out;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #f3f4f6;
    border-color: #9ca3af;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: #3b82f6;
    border-color: #3b82f6;
    color: white;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    color: #9ca3af;
    cursor: not-allowed;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
    background-color: transparent;
    border-color: #d1d5db;
}

/* Table styling */
#metodePembayaranTable thead th {
    background-color: #f9fafb !important;
    border-bottom: 2px solid #e5e7eb;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-size: 0.75rem;
    color: #6b7280;
}

#metodePembayaranTable tbody tr:hover {
    background-color: #f9fafb !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        text-align: center;
        margin-bottom: 1rem;
    }
    
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        text-align: center;
    }
}
</style>
@endpush
