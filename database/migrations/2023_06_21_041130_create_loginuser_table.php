<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginuserTable extends Migration
{
    public function up()
    {
        Schema::create('loginuser', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loginuser');
    }
}