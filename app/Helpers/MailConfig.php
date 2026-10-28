<?php

namespace App\Helpers;

use App\Models\ParametreMail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

/**
 * Applique les paramètres SMTP enregistrés dans le backoffice (table parametres_mail)
 * à la configuration Laravel, puis envoie les mails du portfolio.
 */
class MailConfig
{
    public static function appliquer(): ?ParametreMail
    {
        if (!Schema::hasTable('parametres_mail')) {
            return null;
        }

        $parametre = ParametreMail::actif();
        if (!$parametre || !$parametre->host) {
            return $parametre;
        }

        Config::set('mail.default', $parametre->mailer ?: 'smtp');
        Config::set('mail.mailers.smtp', array_merge(config('mail.mailers.smtp', []), [
            'transport' => 'smtp',
            'host' => $parametre->host,
            'port' => $parametre->port,
            'encryption' => $parametre->encryption ?: null,
            'username' => $parametre->username,
            'password' => $parametre->password,
        ]));
        Config::set('mail.from.address', $parametre->from_address ?: $parametre->username);
        Config::set('mail.from.name', $parametre->from_name ?: config('app.name'));

        // Le mailer a pu être résolu avant la mise à jour de la configuration
        Mail::purge('smtp');

        return $parametre;
    }

    /**
     * @return string[]
     */
    public static function destinatairesAdmin(): array
    {
        $parametre = Schema::hasTable('parametres_mail') ? ParametreMail::actif() : null;
        $emails = $parametre ? $parametre->listeEmailsNotification() : [];

        return $emails ?: config('portfolio.emails_notification');
    }

    /**
     * Envoie un mail du portfolio. Retourne false (et journalise) en cas d'échec SMTP,
     * pour ne pas bloquer l'enregistrement d'une demande.
     */
    public static function envoyer($destinataires, string $sujet, string $vue, array $donnees = []): bool
    {
        try {
            static::appliquer();
            Mail::to($destinataires)->send(new \App\Mail\PortfolioMail($sujet, $vue, $donnees));

            return true;
        } catch (\Throwable $e) {
            Log::error('Envoi mail portfolio impossible : ' . $e->getMessage(), ['sujet' => $sujet]);

            return false;
        }
    }
}
