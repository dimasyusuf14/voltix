<?php

if (!function_exists('bulanIndo')) {
    function bulanIndo($bulan) {
        $daftar = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
        return $daftar[(int)$bulan] ?? $bulan;
    }
}
