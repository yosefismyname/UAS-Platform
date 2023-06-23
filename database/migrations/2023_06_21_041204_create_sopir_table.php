<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopirTable extends Migration
{
    public function up()
    {
        Schema::create('sopir', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('nama');
            $table->string('nomorHP');
            $table->integer('hargaJasa');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sopir');
    }
}

