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
    Schema::create('transaksi', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('barang_id');
        $table->integer('jumlah');
        $table->integer('total_harga');
        $table->timestamp('tanggal_transaksi')->useCurrent();
        $table->timestamps();

        // relasi ke tabel barang
        $table->foreign('barang_id')->references('id')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
