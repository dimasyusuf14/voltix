<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelanggans')->insert([
            [
                'email' => 'pelanggan1@example.com',
                'password' => Hash::make('password123'),
                'nomor_kwh' => '1234567890',
                'nama_pelanggan' => 'Budi Santoso',
                'alamat' => 'Jl. Merdeka No.1, Jakarta',
                'id_tarif' => 1, // pastikan ini ada di tabel 'tarifs'
                'status' => 'waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'pelanggan2@example.com',
                'password' => Hash::make('password123'),
                'nomor_kwh' => '0987654321',
                'nama_pelanggan' => 'Siti Aminah',
                'alamat' => 'Jl. Sudirman No.5, Bandung',
                'id_tarif' => 2,
                'status' => 'waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'amat@example.com',
                'password' => Hash::make('password123'),
                'nomor_kwh' => '0987654739',
                'nama_pelanggan' => 'amat tongtong',
                'alamat' => 'Jl. Sudirman No.7 depok',
                'id_tarif' => 2,
                'status' => 'waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
