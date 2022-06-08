<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{

    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proj')->unsigned();
            $table->integer('id_activite')->unsigned();
            $table->longText('URL');
            $table->string('types');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('media');
    }
}
