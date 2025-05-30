<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeEquipementTable extends Migration
{
    public function up()
    {
        Schema::create('type_equipement', function (Blueprint $table) {
            $table->id('id_type_equipement');
            $table->string('nom_type_equipement');
            $table->boolean('flag_type_equipement')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_equipement');
    }
}

