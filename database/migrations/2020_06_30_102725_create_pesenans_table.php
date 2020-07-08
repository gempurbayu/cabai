<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesenansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesenans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('toko_id');
            $table->date('tanggal');
            $table->string('status');
            $table->integer('jumlah_harga');
            $table->date('tanggal_ambil');
            $table->integer('kode_transaksi');
            $table->string('keterangan');
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
        Schema::dropIfExists('pesenans');
    }
}
