<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin VoltPay',
            'email' => 'admin@voltpay.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Pelanggan user
        User::create([
            'name' => 'Ucup Pelanggan',
            'email' => 'ucup@voltpay.com',
            'password' => Hash::make('password'),
            'role' => 'pelanggan',
        ]);
    }
}
