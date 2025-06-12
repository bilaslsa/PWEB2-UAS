<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('armadas', function (Blueprint $table) {
        $table->id();
        $table->string('merk', 30)->default('Unknown');
        $table->string('nopol', 20)->nullable();
        $table->integer('thn_beli')->nullable();
        $table->string('deskripsi', 200)->nullable();
        $table->unsignedBigInteger('jenis_kendaraan_id')->nullable();
        $table->integer('kapasitas_kursi')->nullable();
        $table->integer('rating')->nullable();
        $table->timestamps();

        $table->foreign('jenis_kendaraan_id')->references('id')->on('jenis_kendaraans')->onDelete('cascade');
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
