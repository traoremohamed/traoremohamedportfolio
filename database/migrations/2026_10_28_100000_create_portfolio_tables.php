<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tables du portfolio : paramètres SMTP, demandes d'accès aux applications, messages de contact.
     */
    public function up(): void
    {
        Schema::create('parametres_mail', function (Blueprint $table) {
            $table->id();
            $table->string('mailer', 20)->default('smtp');
            $table->string('host')->nullable();
            $table->integer('port')->nullable();
            $table->string('encryption', 10)->nullable();
            $table->string('username')->nullable();
            $table->text('password')->nullable();
            $table->string('from_address')->nullable();
            $table->string('from_name')->nullable();
            // Adresses (séparées par des virgules) qui reçoivent les nouvelles demandes et messages
            $table->text('emails_notification')->nullable();
            $table->boolean('is_actif')->default(true);
            $table->timestamps();
        });

        Schema::create('demandes_acces', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 30)->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('contact', 30);
            $table->string('email');
            $table->string('raison_sociale');
            $table->string('nom_structure');
            $table->string('application', 30);
            $table->text('message')->nullable();
            $table->string('statut', 20)->default('EN_ATTENTE');
            $table->string('url_acces')->nullable();
            $table->string('identifiant')->nullable();
            $table->text('mot_de_passe')->nullable();
            $table->text('commentaire_traitement')->nullable();
            $table->unsignedBigInteger('traite_par')->nullable();
            $table->timestamp('traite_le')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
            $table->index(['statut', 'application']);
        });

        Schema::create('messages_contact', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->string('telephone', 30)->nullable();
            $table->string('entreprise')->nullable();
            $table->string('sujet');
            $table->text('message');
            $table->boolean('is_lu')->default(false);
            $table->text('reponse')->nullable();
            $table->unsignedBigInteger('repondu_par')->nullable();
            $table->timestamp('repondu_le')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages_contact');
        Schema::dropIfExists('demandes_acces');
        Schema::dropIfExists('parametres_mail');
    }
};
