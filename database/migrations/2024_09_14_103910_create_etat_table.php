<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatTable extends Migration
{
    public function up()
    {
        Schema::create('etat', function (Blueprint $table) {
            $table->id('id_etat');
            $table->string('nom_etat');
            $table->boolean('flag_etat')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etat');
    }
}

