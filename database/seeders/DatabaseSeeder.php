<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        // Urutan sangat penting karena ada relasi antar tabel (foreign keys)
        $this->call([
            UserSeeder::class, // User harus ada sebelum Peminjaman
            JenisKendaraanSeeder::class, // JenisKendaraan harus ada sebelum Armada
            ArmadaSeeder::class,         // Armada harus ada sebelum Peminjaman
            PeminjamanSeeder::class,     // Peminjaman harus ada sebelum Pembayaran
            PembayaranSeeder::class,
        ]);
    }
}