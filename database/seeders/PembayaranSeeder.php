<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pembayaran; // Impor model Pembayaran

class PembayaranSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     *
     * @return void
     */
    public function run(): void
    {
        // Buat 40 data dummy Pembayaran menggunakan factory
        // Jumlah ini bisa disesuaikan, mungkin lebih banyak dari peminjaman
        // jika ada pembayaran berulang atau parsial.
        Pembayaran::factory()->count(40)->create();

        $this->command->info('Data Pembayaran berhasil di-seed!');
    }
}
