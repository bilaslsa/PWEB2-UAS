<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Peminjaman; // Pastikan ini mengacu pada kelas Peminjaman (PascalCase)
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';

    protected $fillable = [
        'tanggal',
        'jumlah_bayar',
        'peminjaman_id', // Foreign key ke tabel peminjamans
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model Peminjaman.
     * Artinya, setiap Pembayaran terkait dengan satu Peminjaman.
     */
    public function peminjaman()
    {
        // Pastikan ini mengacu pada kelas Peminjaman (PascalCase)
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}
