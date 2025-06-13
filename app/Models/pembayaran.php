<?php

namespace App\Models;

use App\Models\peminjaman;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'tanggal',
        'jumlah_bayar',
        'peminjaman_id',
    ];


    public function peminjaman()
    {
        return $this->belongsTo(peminjaman::class, 'peminjaman_id');
    }
}

