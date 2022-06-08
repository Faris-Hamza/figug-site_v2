<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetPartenairesTable extends Migration
{
    public function up()
    {
        Schema::create('projet_partenaires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proj');
            $table->integer('id_part');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projet_partenaires');
    }
}
