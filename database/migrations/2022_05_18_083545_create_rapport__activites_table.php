<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport__activites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_act');
            $table->json('context');
            $table->json('lieu');
            $table->date('date');
            $table->unsignedInteger('nbr_femme');
            $table->unsignedInteger('nbr_homme');
            $table->string('reference');
            $table->timestamps();

            $table->foreign('id_act')->references('id')->on('activites')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapport__activites');
    }
}
