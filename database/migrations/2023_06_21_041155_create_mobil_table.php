<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilTable extends Migration
{
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('gambar');
            $table->string('plat');
            $table->string('merk');
            $table->string('tipe');
            $table->integer('kapasitas');
            $table->integer('tahunproduksi');
            $table->integer('hargasewa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobil');
    }
}

