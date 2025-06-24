<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\jenis_kendaraan;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Bus'],
            ['nama' => 'Minibus'],
            ['nama' => 'SUV'],
            ['nama' => 'MPV'],
            ['nama' => 'Sedan'],
            ['nama' => 'Pickup'],
            ['nama' => 'Truck'],
            ['nama' => 'Elf'],
            ['nama' => 'Hiace'],
            ['nama' => 'Double Cabin'],
            ['nama' => 'Box'],
            ['nama' => 'Lainnya'],
        ];

        foreach ($data as $item) {
            jenis_kendaraan::firstOrCreate($item);
        }
    }
}
