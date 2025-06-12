<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class armada extends Model
{
    protected $table = 'armadas';
    protected $fillable = [
        'merk',
        'nomor_polisi',
        'tahun_beli',
        'deskripsi',
        'jenis_kendaraan_id',
        'kapasitas_kursi',
        'rating'
    ];

    public function jenisKendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class, 'jenis_kendaraan_id');
    }
}
