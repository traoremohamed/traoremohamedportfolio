<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEfournisseurTable extends Migration
{
    public function up()
    {
        Schema::create('fournisseur', function (Blueprint $table) {
            $table->id('id_fournisseur');
            $table->string('lib_fourn');
            $table->string('adr_fourn')->nullable();
            $table->string('tel_fourn')->nullable();
            $table->string('cel_fourn')->nullable();
            $table->string('fax_fourn')->nullable();
            $table->string('mail_fourn')->nullable();
            $table->string('rccm_fourn')->nullable();
            $table->string('cpte_contr_fourn')->nullable();
            $table->boolean('flag_fournisseur')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fournisseur');
    }
}

