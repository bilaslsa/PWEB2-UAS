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
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_peminjam', 45);
        $table->string('ktp_peminjam', 20);
        $table->string('keperluan_pinjam', 100);
        $table->date('mulai');
        $table->date('selesai');
        $table->double('biaya');
        $table->unsignedBigInteger('armada_id');
        $table->string('komentar_peminjam', 100)->nullable();
        $table->string('status_pinjam', 20);
        $table->timestamps();

        $table->foreign('armada_id')->references('id')->on('armadas')->onDelete('cascade');
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
