<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeMouvementTable extends Migration
{
    public function up()
    {
        Schema::create('type_mouvement', function (Blueprint $table) {
            $table->id('id_type_mouvement');
            $table->string('nom_type_mouvement', 255);
            $table->boolean('flag_type_mouvement')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_mouvement');
    }
}

