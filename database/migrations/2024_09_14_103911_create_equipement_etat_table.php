<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipementEtatTable extends Migration
{
    public function up()
    {
        Schema::create('equipement_etat', function (Blueprint $table) {
            $table->id('id_equipement_etat');
            $table->foreignId('id_etat')->constrained('etat', 'id_etat');
            $table->foreignId('id_equipement')->constrained('equipements', 'id_equipement');
            $table->boolean('flag_equipement_etat')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipement_etat');
    }
}
