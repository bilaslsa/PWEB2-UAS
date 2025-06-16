<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class armada extends Model
{
    protected $table = 'armadas';
    protected $fillable = [
        'merk',
        'nopol',
        'thn_beli',
        'deskripsi',
        'jenis_kendaraan_id',
        'kapasitas_kursi',
        'rating',
        'foto'
    ];

    public function jenisKendaraan()
    {
        return $this->belongsTo(jenis_kendaraan::class, 'jenis_kendaraan_id');
    }


}
