<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_barang', function (Blueprint $table) {
            $table->string("kode_transaksi", 50)->primary();
            $table->string("kode_barang", 50);
            $table->date("tanggal");
            $table->integer("qty");
            $table->string("asal_barang", 100);
            $table->string("id_users", 50);
            $table->enum("status", [1, 0]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_barang');
    }
};
