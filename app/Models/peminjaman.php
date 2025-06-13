<?php

namespace App\Models;

use App\Models\armada;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
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


    public function armada()
    {
        return $this->belongsTo(armada::class, 'armada_id');
    }
}
