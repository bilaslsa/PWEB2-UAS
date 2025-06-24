<?php

namespace Database\Factories;

use App\Models\Armada;
use App\Models\jenis_kendaraan; // <--- Impor dengan huruf kecil persis!
use Illuminate\Database\Eloquent\Factories\Factory;

class ArmadaFactory extends Factory
{
    protected $model = Armada::class;

    public function definition(): array
    {
        $merk = $this->faker->randomElement([
            'Toyota', 'Honda', 'Suzuki', 'Daihatsu', 'Mitsubishi', 'Nissan', 'BMW', 'Mercedes-Benz', 'Hino', 'Isuzu', 'Fuso'
        ]);

        // Panggil model dengan huruf kecil persis
        $jenisKendaraan = jenis_kendaraan::inRandomOrder()->first();

        if (!$jenisKendaraan) {
            // Jika tidak ada JenisKendaraan yang ditemukan, buat satu secara otomatis.
            // Panggil factory dengan huruf kecil persis
            $jenisKendaraan = jenis_kendaraan::factory()->create();
        }

        return [
            'jenis_kendaraan_id' => $jenisKendaraan->id,
            'merk' => $merk,
            'nopol' => strtoupper($this->faker->lexify('? #### ??')) . ' ' . strtoupper($this->faker->lexify('???')),
            'thn_beli' => $this->faker->numberBetween(2000, date('Y')),
            'deskripsi' => $this->faker->text(200),
            'kapasitas_kursi' => $this->faker->numberBetween(10, 60),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'foto' => 'https://placehold.co/600x400/CCCCCC/FFFFFF?text=' . urlencode($merk . ' ' . $this->faker->word()),
        ];
    }
}
