<?php

namespace Database\Factories;

use App\Models\Pembayaran;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory
{
    protected $model = Pembayaran::class;

    public function definition(): array
    {
        $peminjaman = Peminjaman::inRandomOrder()->first();

        if (!$peminjaman) {
            $peminjaman = Peminjaman::factory()->create();
        }

        // Dapatkan objek DateTime untuk waktu saat ini
        $now = new \DateTime();

        // Tentukan batas akhir yang efektif untuk tanggal pembayaran:
        // Ini adalah tanggal selesai peminjaman, TAPI tidak boleh lebih dari waktu sekarang.
        // Jadi, ambil nilai terkecil antara tanggal selesai peminjaman dan waktu saat ini.
        // Karena 'mulai' dan 'selesai' di-cast ke datetime di model Peminjaman,
        // sekarang mereka sudah berupa objek DateTime dan bisa di-clone.
        $tanggalAkhirPembayaranEfektif = (clone $peminjaman->selesai); // Sekarang ini adalah objek DateTime
        if ($tanggalAkhirPembayaranEfektif > $now) {
            $tanggalAkhirPembayaranEfektif = $now;
        }

        // Tentukan tanggal awal yang efektif untuk tanggal pembayaran:
        // Ini adalah tanggal mulai peminjaman.
        $tanggalAwalPembayaranEfektif = (clone $peminjaman->mulai); // Sekarang ini adalah objek DateTime

        if ($tanggalAwalPembayaranEfektif > $tanggalAkhirPembayaranEfektif) {
            $tanggalAwalPembayaranEfektif = $tanggalAkhirPembayaranEfektif;
        }

        // Hasilkan tanggal pembayaran di antara rentang yang sudah divalidasi
        $tanggalPembayaran = $this->faker->dateTimeBetween($tanggalAwalPembayaranEfektif, $tanggalAkhirPembayaranEfektif);

        // Jumlah bayar bisa random atau sebagian dari total biaya peminjaman
        $jumlahBayar = $this->faker->randomFloat(2, $peminjaman->biaya * 0.1, $peminjaman->biaya);

        return [
            'tanggal' => $tanggalPembayaran,
            'jumlah_bayar' => $jumlahBayar,
            'peminjaman_id' => $peminjaman->id,
        ];
    }
}
