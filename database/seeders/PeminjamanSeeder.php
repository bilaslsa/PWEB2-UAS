<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peminjaman; // Impor model Peminjaman

class PeminjamanSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     *
     * @return void
     */
    public function run(): void
    {
        // Buat 30 data dummy Peminjaman menggunakan factory
        Peminjaman::factory()->count(30)->create();

        $this->command->info('Data Peminjaman berhasil di-seed!');
    }
}
