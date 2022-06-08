<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{

    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proj')->unsigned()->nullable();
            $table->integer('id_Axe')->unsigned()->nullable();
            $table->json('name');
            $table->json('detail');
            $table->json('lieu');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('activites');
    }
}
