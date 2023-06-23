<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('nama');
            $table->string('noHp');
            $table->string('email');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
