<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAxesTable extends Migration
{

    public function up()
    {
        Schema::create('axes', function (Blueprint $table) {
            $table->increments('id');
            $table->json('nom');
            $table->string('icon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('axes');
    }
}
