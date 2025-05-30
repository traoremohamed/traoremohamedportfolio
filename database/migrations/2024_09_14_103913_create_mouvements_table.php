<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementsTable extends Migration
{
    public function up()
    {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id('id_mouvement');
            $table->foreignId('id_equipement')
                  ->constrained('equipements','id_equipement')
                  ->onDelete('cascade');
            $table->date('date_mouvement');
            $table->string('type_mouvement', 50);
            $table->boolean('flag_mouvements')->default(true);
            $table->foreignId('id_type_mouvement')
                  ->constrained('type_mouvement','id_type_mouvement')
                  ->onDelete('cascade');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mouvements');
    }
}
