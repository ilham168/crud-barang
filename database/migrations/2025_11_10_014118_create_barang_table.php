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
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('jenis_barang_id');
        $table->string('nama_barang', 100);
        $table->string('satuan', 75);
        $table->integer('harga_pokok');
        $table->integer('harga_jual');
        $table->integer('stok')->default(0);
        $table->timestamps();

        $table->foreign('jenis_barang_id')->references('id')->on('jenis_barang');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
