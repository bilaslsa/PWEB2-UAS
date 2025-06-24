<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Nama kelas model sebaiknya diawali dengan huruf kapital (PascalCase)
class Armada extends Model
{
    // Menggunakan trait HasFactory agar bisa memakai metode factory()
    use HasFactory;

    // Menentukan nama tabel di database
    protected $table = 'armadas';

    // Kolom yang boleh diisi secara massal (mass assignable)
    protected $fillable = [
        'merk',
        'nopol',
        'thn_beli',
        'deskripsi',
        'jenis_kendaraan_id', // Foreign key ke tabel jenis_kendaraan
        'kapasitas_kursi',
        'rating',
        'foto'
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model JenisKendaraan.
     * Artinya, setiap Armada dimiliki oleh satu JenisKendaraan.
     */
    public function jenisKendaraan()
    {
        // Pastikan nama model JenisKendaraan (dengan J kapital)
        // dan foreign key 'jenis_kendaraan_id' sesuai di migrasi Anda.
        return $this->belongsTo(jenis_kendaraan::class);
    }
}
