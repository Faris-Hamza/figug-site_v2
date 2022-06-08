<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->json('Apropo');
            $table->json('bienvenu');
            $table->json('vision');
            $table->json('stratigie');
            $table->json('programmes');
            $table->string('whatsapp');
            $table->string('instagram');
            $table->text('fb');
            $table->text('youtube');
            $table->text('email');
            $table->text('Linkedin');
            $table->text('twitter');
            $table->json('txtAdherent');
            $table->json('txtSetunez');
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
        Schema::dropIfExists('infos');
    }
}
