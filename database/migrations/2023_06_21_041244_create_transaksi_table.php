<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->date('tanggalTransaksi');
            $table->date('tanggalSewa');
            $table->integer('lamaSewa');
            $table->time('mulaiSewa');
            $table->time('selesaiSewa');
            $table->string('idMobil');
            $table->foreign('idMobil')->references('id')->on('mobil')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('idCustomer');
            $table->foreign('idCustomer')->references('id')->on('customer')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('idSopir');
            $table->foreign('idSopir')->references('id')->on('sopir')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}