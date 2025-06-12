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
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->double('jumlah_bayar');
        $table->unsignedBigInteger('peminjaman_id');
        $table->timestamps();

        $table->foreign('peminjaman_id')->references('id')->on('peminjamans')->onDelete('cascade');
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
