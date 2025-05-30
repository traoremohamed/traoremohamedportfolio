<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationsTable extends Migration
{
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id('id_affectation');
            $table->foreignId('id_equipement')->constrained('equipements', 'id_equipement')->onDelete('cascade');
            $table->foreignId('id_employe')->constrained('employes', 'id_employe')->onDelete('cascade');
            $table->date('date_affectation');
            $table->boolean('flag_affectations')->default(true);
            $table->date('date_retour')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('affectations');
    }
}


