<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Impor model User
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        // Membuat user spesifik (misal: admin, super admin)
        User::firstOrCreate( // firstOrCreate akan membuat jika tidak ditemukan
            ['email' => 'superadmin@example.com'], // Kriteria pencarian
            [ // Data jika user tidak ditemukan dan akan dibuat
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Rental',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );

        // Membuat banyak user dummy menggunakan Factory
        User::factory()->count(10)->create(); // Membuat 10 user dengan data dari UserFactory
    }
}