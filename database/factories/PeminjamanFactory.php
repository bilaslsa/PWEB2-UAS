<?php

namespace Database\Factories;

use App\Models\Peminjaman; // Impor model Peminjaman
use App\Models\Armada;     // Impor model Armada
use Illuminate\Database\Eloquent\Factories\Factory;

class PeminjamanFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory ini.
     *
     * @var string
     */
    protected $model = Peminjaman::class;

    /**
     * Definisikan status default model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil ID armada secara acak dari database.
        // PENTING: Pastikan Anda sudah punya seeder untuk Armada dan sudah dijalankan,
        // atau tabel armadas sudah terisi data.
        $armada = Armada::inRandomOrder()->first();

        // Jika tidak ada Armada yang ditemukan, buat satu secara otomatis.
        // Ini memastikan bahwa Peminjaman selalu memiliki armada_id yang valid.
        if (!$armada) {
            // Jika Anda belum memiliki factory untuk Armada,
            // Anda perlu membuatnya dengan `php artisan make:factory ArmadaFactory`
            // dan mendefinisikan `definition()`-nya.
            $armada = Armada::factory()->create();
        }

        // Tentukan tanggal mulai dan selesai
        $mulai = $this->faker->dateTimeBetween('-1 year', '+1 month'); // Dari 1 tahun lalu hingga 1 bulan ke depan
        $selesai = (clone $mulai)->modify('+' . $this->faker->numberBetween(1, 14) . ' days'); // Durasi 1-14 hari

        // Hitung biaya berdasarkan durasi (contoh: Rp 500.000 per hari)
        $durasiHari = $mulai->diff($selesai)->days;
        $biayaPerHari = 500000;
        $biayaTotal = $durasiHari * $biayaPerHari;

        return [
            'nama_peminjam' => $this->faker->name(),
            // Contoh format KTP: 16 digit angka
            'ktp_peminjam' => $this->faker->numerify('################'),
            'keperluan_pinjam' => $this->faker->sentence(8), // Keperluan singkat
            'mulai' => $mulai,
            'selesai' => $selesai,
            'biaya' => $biayaTotal,
            'armada_id' => $armada->id,
            'komentar_peminjam' => $this->faker->text(100), // Komentar lebih panjang
            'status_pinjam' => $this->faker->randomElement(['Diproses', 'Disetujui', 'Ditolak', 'Selesai']),
        ];
    }
}
