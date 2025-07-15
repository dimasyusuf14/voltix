@extends('pelanggan.layouts.index')

@push('styles')
<style>
    .step-content {
        transition: all 0.3s ease-in-out;
    }

    .step-item {
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .step-circle {
        transition: all 0.2s ease;
    }

    .payment-option {
        transition: all 0.2s ease;
    }

    .payment-option:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .fade-in {
        animation: fadeIn 0.3s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .btn-loading {
        position: relative;
        color: transparent !important;
    }

    .btn-loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        left: 50%;
        margin-left: -8px;
        margin-top: -8px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>
@endpush

@section('content')
    <div class="bg-gray-100 min-h-screen px-4 py-8">
        <div class="max-w-7xl mx-auto">

            {{-- ===== Heading ===== --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-blue-800">
                    Transaksi Pembayaran Listrik
                </h1>
                <p class="mt-2 text-gray-500">
                    Ikuti langkah‑langkah berikut untuk menyelesaikan pembayaran dengan mudah dan aman.
                </p>
            </div>

            {{-- ===== Grid 2 kolom ===== --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

                {{-- ────────────────  K O L O M   K I R I  ──────────────── --}}
                <div class="space-y-3 col-span-2">

                    {{-- ▸ Step Navigation --}}
                    <div class="bg-white rounded-2xl shadow flex justify-between px-6 py-4" id="step-navigation">
                        <div class="step-item flex flex-col items-center gap-1 w-1/3 active" data-step="1">
                            <div class="step-circle w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-xl text-white">
                                <i class="fa-solid fa-file-invoice"></i>
                            </div>
                            <span class="text-xs font-medium text-blue-600">Detail Tagihan</span>
                        </div>
                        <div class="step-item flex flex-col items-center gap-1 w-1/3 text-gray-400" data-step="2">
                            <div class="step-circle w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                            <span class="text-xs font-medium">Rekening Tujuan</span>
                        </div>
                        <div class="step-item flex flex-col items-center gap-1 w-1/3 text-gray-400" data-step="3">
                            <div class="step-circle w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-upload"></i>
                            </div>
                            <span class="text-xs font-medium">Unggah Bukti</span>
                        </div>
                    </div>

                    {{-- ▸ Step 1: Detail Tagihan --}}
                    <div class="step-content bg-white p-6 rounded-xl shadow" id="step-1">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="ti ti-file-description text-xl"></i> Detail Tagihan
                        </h2>

                        {{-- tabel ringkas --}}
                        <div class="border rounded-xl divide-y text-sm">
                            @foreach (['Nama Pelanggan' => $tagihan->pelanggan->nama_pelanggan, 'No. Invoice' => $tagihan->no_invoice, 'Nomor KWH' => $tagihan->pelanggan->nomor_kwh, 'Periode' => bulanIndo($tagihan->bulan) . ' ' . $tagihan->tahun, 'Jumlah Meter' => number_format($tagihan->jumlah_meter) . ' kWh', 'Tarif / kWh' => 'Rp ' . number_format($tagihan->pelanggan->tarif->tarifperkwh ?? 0, 0, ',', '.')] as $label => $value)
                                {{-- baris detail --}}
                                <div class="flex justify-between px-4 py-3">
                                    <span class="text-gray-500">{{ $label }}</span>
                                    <span class="font-semibold">{{ $value }}</span>
                                </div>
                            @endforeach
                            <div class="flex justify-between px-4 py-3 font-semibold text-base">
                                <span>Total Bayar</span>
                                <span class="text-blue-600" id="total-bayar">
                                    Rp {{ number_format($tagihan->jumlah_meter * ($tagihan->pelanggan->tarif->tarifperkwh ?? 0), 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <div class="text-right mt-6">
                            <button id="btn-step-1" class="inline-flex items-center gap-1 text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                                Lanjut ke Rekening Tujuan
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    {{-- ▸ Step 2: Rekening Tujuan --}}
                    <div class="step-content bg-white p-6 rounded-xl shadow hidden" id="step-2">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-building-columns text-xl"></i> Rekening Tujuan
                        </h2>

                        <p class="text-gray-600 mb-6">
                            Pilih rekening tujuan sesuai metode pembayaran yang Anda inginkan.<br>
                            Pastikan Anda mentransfer sesuai nominal <span class="font-semibold text-blue-600">
                                Rp {{ number_format($tagihan->jumlah_meter * ($tagihan->pelanggan->tarif->tarifperkwh ?? 0), 0, ',', '.') }}
                            </span> a.n PT Voltix.
                        </p>

                        {{-- Two‑column box: Bank | E‑Wallet --}}
                        @php
                            $banks = [
                                ['logo' => '/storage/images/bca.png', 'nama' => 'BCA', 'norek' => '789‑012‑3456'],
                                ['logo' => '/storage/images/bni.png', 'nama' => 'BNI', 'norek' => '3344‑5566‑7788'],
                            ];
                            $ewallets = [
                                ['logo' => '/storage/images/gopay.png', 'nama' => 'GoPay', 'norek' => '0812‑3456‑7890'],
                                ['logo' => '/storage/images/ovo.png', 'nama' => 'OVO', 'norek' => '0812‑3456‑7891'],
                                ['logo' => '/storage/images/dana.png', 'nama' => 'DANA', 'norek' => '0812‑3456‑7892'],
                            ];
                        @endphp

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            {{-- ==== BANKS ==== --}}
                            <div class="bg-gray-50 rounded-xl p-6 border">
                                <h3 class="text-center font-semibold text-lg mb-4">Bank</h3>

                                @foreach ($banks as $b)
                                    <label class="flex items-center gap-4 bg-white hover:bg-blue-50 border rounded-lg p-4 mb-3 cursor-pointer payment-option">
                                        <input type="radio" name="metode_pembayaran" value="{{ $b['nama'] }}" class="form-radio text-blue-600" required>
                                        <img src="{{ $b['logo'] }}" alt="{{ $b['nama'] }}" class="w-14 h-8 object-contain">
                                        <div class="flex-1">
                                            <p class="font-semibold">{{ $b['nama'] }}</p>
                                            <p class="text-xs text-gray-500">No.Rekening</p>
                                            <p class="text-sm">{{ $b['norek'] }}</p>
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            {{-- ==== E‑Wallets ==== --}}
                            <div class="bg-gray-50 rounded-xl p-6 border">
                                <h3 class="text-center font-semibold text-lg mb-4">E‑Wallet</h3>

                                @foreach ($ewallets as $e)
                                    <label class="flex items-center gap-4 bg-white hover:bg-blue-50 border rounded-lg p-4 mb-3 cursor-pointer payment-option">
                                        <input type="radio" name="metode_pembayaran" value="{{ $e['nama'] }}" class="form-radio text-blue-600" required>
                                        <img src="{{ $e['logo'] }}" alt="{{ $e['nama'] }}" class="w-14 h-8 object-contain">
                                        <div class="flex-1">
                                            <p class="font-semibold">{{ $e['nama'] }}</p>
                                            <p class="text-xs text-gray-500">No.Akun</p>
                                            <p class="text-sm">{{ $e['norek'] }}</p>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex justify-between mt-6">
                            <button id="btn-back-step-2" class="inline-flex items-center gap-2 border px-5 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-arrow-left"></i> Kembali ke Detail Tagihan
                            </button>
                            <button id="btn-step-2" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md shadow disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                Lanjut ke Unggah Bukti <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    {{-- ▸ Step 3: Unggah Bukti --}}
                    <div class="step-content bg-white p-6 rounded-xl shadow hidden" id="step-3">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-upload text-xl"></i> Unggah Bukti Pembayaran
                        </h2>

                        <p class="text-sm text-gray-600 mb-6">
                            Unggah bukti pembayaran yang jelas (JPG, JPEG, PNG, atau PDF, maksimal 2 MB) sebagai konfirmasi pembayaran Anda.
                        </p>

                        {{-- Info metode pembayaran terpilih --}}
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6" id="selected-payment-info" style="display: none;">
                            <p class="text-sm text-blue-800">
                                <strong>Metode Pembayaran Terpilih:</strong> <span id="selected-payment-name"></span>
                            </p>
                        </div>

                        <form id="form-upload" action="{{ route('bayar.store', $tagihan->id_tagihan) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="metode_pembayaran" id="selected-method" value="">

                            <label class="block text-sm font-medium text-gray-700 mb-1">Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" accept="image/*,application/pdf"
                                class="block w-full border border-gray-300 rounded-md px-3 py-2 text-sm file:mr-4 file:px-4 file:py-2 file:rounded-md file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-500 cursor-pointer"
                                required>

                            <p class="text-xs text-gray-500 mt-2">
                                Pastikan file yang diunggah berukuran maksimal 2 MB.
                            </p>

                            {{-- preview sederhana --}}
                            <div id="preview" class="hidden mt-4">
                                <p class="text-xs text-gray-500 mb-1">Pratinjau:</p>
                                <img src="#" alt="preview" class="max-h-40 rounded-md shadow">
                            </div>
                        </form>

                        <div class="flex justify-between mt-6">
                            <button id="btn-back-step-3" class="inline-flex items-center gap-2 border border-gray-300 text-gray-700 px-6 py-2 rounded-md text-sm hover:bg-gray-100">
                                <i class="ti ti-arrow-left text-base"></i> Kembali ke Rekening Tujuan
                            </button>
                            <button type="submit" form="form-upload" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-2 rounded-md shadow">
                                <i class="ti ti-upload text-base"></i> Unggah Bukti Pembayaran
                            </button>
                        </div>
                    </div>
                </div>

                {{-- ────────────────  K O L O M   K A N A N  ──────────────── --}}
                <div class="bg-white p-6 rounded-xl shadow h-fit col-span-1">
                    <h2 class="text-lg font-semibold mb-4">Cara Pembayaran</h2>

                    @foreach (['Periksa Tagihan' => 'Pastikan semua data tagihan telah sesuai dan benar.', 'Pilih Metode Pembayaran' => 'Tentukan rekening bank atau e‑wallet yang ingin Anda gunakan.', 'Transfer Nominal Tepat' => 'Lakukan transfer sesuai dengan jumlah total yang tertera.', 'Unggah Bukti Pembayaran' => 'Upload bukti transfer sebagai konfirmasi pembayaran.'] as $i => $desc)
                        <div class="flex items-start gap-3 mb-4">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-600 text-white text-xs flex items-center justify-center">
                                {{ $loop->iteration }}
                            </span>
                            <p class="text-sm text-gray-700">{{ $desc }}</p>
                        </div>
                    @endforeach

                    <p class="mt-4 text-xs text-gray-500">
                        Butuh bantuan? Hubungi CS di
                        <a href="tel:08123456789" class="text-blue-600">0812‑3456‑789</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let currentStep = 1;

    // Function to update step navigation
    function updateStepNavigation(step) {
        $('.step-item').each(function() {
            const stepNum = $(this).data('step');
            const circle = $(this).find('.step-circle');
            const text = $(this).find('span');

            if (stepNum <= step) {
                $(this).removeClass('text-gray-400').addClass('text-blue-600');
                circle.removeClass('bg-gray-200').addClass('bg-blue-600 text-white');
                text.removeClass('text-gray-400').addClass('text-blue-600');
            } else {
                $(this).removeClass('text-blue-600').addClass('text-gray-400');
                circle.removeClass('bg-blue-600 text-white').addClass('bg-gray-200');
                text.removeClass('text-blue-600').addClass('text-gray-400');
            }
        });
    }

    // Function to show specific step with animation
    function showStep(step) {
        const currentContent = $(`.step-content:not(.hidden)`);
        const nextContent = $(`#step-${step}`);

        // Fade out current step
        currentContent.fadeOut(200, function() {
            currentContent.addClass('hidden');

            // Fade in next step
            nextContent.removeClass('hidden').hide().fadeIn(300).addClass('fade-in');

            setTimeout(() => nextContent.removeClass('fade-in'), 300);
        });

        updateStepNavigation(step);
        currentStep = step;

        // Smooth scroll to top of content
        $('html, body').animate({
            scrollTop: $('#step-navigation').offset().top - 100
        }, 400);
    }

    // Step 1 -> Step 2
    $('#btn-step-1').click(function() {
        showStep(2);
    });

    // Back from Step 2 -> Step 1
    $('#btn-back-step-2').click(function() {
        showStep(1);
    });

    // Step 2 -> Step 3
    $('#btn-step-2').click(function() {
        const selectedPayment = $('input[name="metode_pembayaran"]:checked').val();
        if (selectedPayment) {
            $('#selected-method').val(selectedPayment);
            $('#selected-payment-name').text(selectedPayment);
            $('#selected-payment-info').fadeIn(300);
            showStep(3);
        }
    });

    // Back from Step 3 -> Step 2
    $('#btn-back-step-3').click(function() {
        showStep(2);
    });

    // Enable/disable step 2 button based on payment method selection
    $('input[name="metode_pembayaran"]').change(function() {
        if ($(this).is(':checked')) {
            $('#btn-step-2').prop('disabled', false).removeClass('opacity-50 cursor-not-allowed');

            // Add visual feedback for selected payment option
            $('.payment-option').removeClass('border-blue-500 bg-blue-50 ring-2 ring-blue-200');
            $(this).closest('.payment-option').addClass('border-blue-500 bg-blue-50 ring-2 ring-blue-200');
        }
    });

    // File preview functionality
    $('input[name="bukti_pembayaran"]').change(function(e) {
        const file = e.target.files[0];
        if (!file) {
            $('#preview').fadeOut(200);
            return;
        }

        // Check file size (2MB = 2 * 1024 * 1024 bytes)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2 MB.');
            $(this).val('');
            $('#preview').fadeOut(200);
            return;
        }

        // Show preview for images
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview img').attr('src', e.target.result);
                $('#preview').fadeIn(300);
            };
            reader.readAsDataURL(file);
        } else {
            // For PDF files, just show filename
            $('#preview').html(`
                <p class="text-xs text-gray-500 mb-1">File terpilih:</p>
                <div class="bg-gray-100 p-3 rounded-md flex items-center">
                    <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                    <span class="text-sm">${file.name}</span>
                    <span class="text-xs text-gray-500 ml-auto">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
                </div>
            `).fadeIn(300);
        }
    });

    // Form submission with loading state
    $('#form-upload').submit(function(e) {
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();

        // Show loading state
        submitBtn.prop('disabled', true).addClass('btn-loading').html('Mengunggah...');

        // Show success message on successful upload (you can modify this based on your needs)
        setTimeout(function() {
            // This is just for demo - in real app, handle actual server response
            if (!$('#form-upload')[0].checkValidity()) {
                submitBtn.prop('disabled', false).removeClass('btn-loading').html(originalText);
                return false;
            }
        }, 1000);
    });

    // Click on step navigation to go to that step (if accessible)
    $('.step-item').click(function() {
        const targetStep = $(this).data('step');

        // Only allow going to previous steps or accessible next steps
        if (targetStep === 1) {
            showStep(1);
        } else if (targetStep === 2 && currentStep >= 1) {
            showStep(2);
        } else if (targetStep === 3 && currentStep >= 2 && $('input[name="metode_pembayaran"]:checked').length > 0) {
            const selectedPayment = $('input[name="metode_pembayaran"]:checked').val();
            $('#selected-method').val(selectedPayment);
            $('#selected-payment-name').text(selectedPayment);
            $('#selected-payment-info').show();
            showStep(3);
        }
    });

    // Add hover effects to step navigation
    $('.step-item').hover(
        function() {
            const stepNum = $(this).data('step');
            if (stepNum <= currentStep || stepNum === currentStep + 1) {
                $(this).addClass('transform scale-105');
            }
        },
        function() {
            $(this).removeClass('transform scale-105');
        }
    );

    // Real-time validation feedback
    $('#form-upload input[required]').on('input change', function() {
        const form = $('#form-upload')[0];
        const submitBtn = $('#form-upload button[type="submit"]');

        if (form.checkValidity()) {
            submitBtn.removeClass('opacity-50 cursor-not-allowed');
        } else {
            submitBtn.addClass('opacity-50 cursor-not-allowed');
        }
    });

    // Add notification for successful step completion
    function showNotification(message, type = 'success') {
        const notification = $(`
            <div class="fixed top-4 right-4 z-50 max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg p-4 ${type === 'success' ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50'}">
                <div class="flex items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle text-green-500' : 'fa-exclamation-circle text-red-500'} mr-3"></i>
                    <span class="text-sm ${type === 'success' ? 'text-green-800' : 'text-red-800'}">${message}</span>
                </div>
            </div>
        `);

        $('body').append(notification);

        setTimeout(() => {
            notification.fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    }

    // Show notification when payment method is selected
    $('input[name="metode_pembayaran"]').change(function() {
        if ($(this).is(':checked')) {
            showNotification(`Metode pembayaran ${$(this).val()} telah dipilih`);
        }
    });
});
</script>
@endpush
