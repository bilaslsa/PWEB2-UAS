<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Armada; // Impor model Armada

class ArmadaSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     *
     * @return void
     */
    public function run(): void
    {
        // Buat 20 data dummy Armada menggunakan factory
        // Ini akan secara otomatis membuat jenis_kendaraan jika belum ada,
        // berkat logika di ArmadaFactory.
        Armada::factory()->count(20)->create();

        $this->command->info('Data Armada berhasil di-seed!');
    }
}
