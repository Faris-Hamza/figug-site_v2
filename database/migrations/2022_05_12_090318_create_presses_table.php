<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressesTable extends Migration
{

    public function up()
    {
        Schema::create('presses', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name');
            $table->string('logo');
            $table->json('lieu');
            $table->string('date');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presses');
    }
}
