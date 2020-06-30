<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomoditasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('komoditas');
        Schema::create('komoditas', function (Blueprint $table) {
            $table->increments('id_komoditas');
            $table->string('nama_komoditas');
            $table->string('jenis');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('img_komoditas')->nullable();
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
        Schema::dropIfExists('komoditas');
    }
}
