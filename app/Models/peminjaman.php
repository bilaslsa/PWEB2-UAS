<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Armada;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';

    protected $fillable = [
        'nama_peminjam',
        'ktp_peminjam',
        'keperluan_pinjam',
        'mulai',
        'selesai',
        'biaya',
        'armada_id',
        'komentar_peminjaman',
        'status_pinjam'
    ];

    /**
     * Casting atribut ke tipe data tertentu.
     * Kolom 'mulai' dan 'selesai' akan otomatis dikonversi menjadi objek DateTime.
     *
     * @var array
     */
    protected $casts = [
        'mulai' => 'datetime',
        'selesai' => 'datetime',
    ];


    public function armada()
    {
        return $this->belongsTo(Armada::class, 'armada_id');
    }
}
