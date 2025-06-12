<?php

namespace App\Http\Controllers;

use App\Models\armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    public function store(Request $request)
    {
        // Debug: cek semua input yang diterima
        //dd($request->all());

        $validated = $request->validate([
            'merk' => 'required|string|max:30',
            'nopol' => 'required|string|max:20',
            'thn_beli' => 'required|integer',
            'deskripsi' => 'nullable|string|max:200',
            'jenis_kendaraan_id' => 'required|integer',
            'kapasitas_kursi' => 'required|integer',
            'rating' => 'nullable|integer',
        ]);

        $armada = armada::create($validated);

        return response()->json($armada);
    }
}
