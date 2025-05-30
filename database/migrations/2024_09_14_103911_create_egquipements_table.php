<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgquipementsTable extends Migration
{
    public function up()
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->id('id_equipement');
            $table->foreignId('id_type_equipement')->constrained('type_equipement', 'id_type_equipement');
            $table->string('numero_serie');
            $table->date('date_achat');
            $table->foreignId('id_fournisseur')->constrained('fournisseur' , 'id_fournisseur');
            $table->decimal('garantie', 10, 2)->nullable();
            $table->date('date_fin_garantie')->nullable();
            $table->text('photo')->nullable();
            $table->text('localisation')->nullable();
            $table->boolean('flag_equipements')->default(true);
            $table->foreignId('id_categorie')->constrained('categories' , 'id_categorie');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipements');
    }
}

