<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->string('merk', 30);
            $table->string('nomor_polisi', 20);
            $table->integer('tahun_beli');
            $table->string('deskripsi', 200);
            $table->biginteger('jenis_kendaraan_id')->constrained();
            $table->integer('kapasitas_kursi');
            $table->integer('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armadas');
    }
};
