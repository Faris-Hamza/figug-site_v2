<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->json('nom');
            $table->json('prenom');
            $table->string('cin');
            $table->string('email');
            $table->string('Tel');
            $table->json('adresse');
            $table->string('nbrRamed');
            $table->json('genreDemande');
            $table->double('montant');
            $table->string('pieceJustifs');
            $table->boolean('Veu')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
