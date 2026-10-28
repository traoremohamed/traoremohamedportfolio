<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Paramètres SMTP gérés depuis le backoffice (une seule ligne active).
 *
 * @property int $id
 * @property string $mailer
 * @property string $host
 * @property int $port
 * @property string $encryption
 * @property string $username
 * @property string $password
 * @property string $from_address
 * @property string $from_name
 * @property string $emails_notification
 * @property bool $is_actif
 */
class ParametreMail extends Model
{
    protected $table = 'parametres_mail';

    protected $fillable = [
        'mailer', 'host', 'port', 'encryption', 'username', 'password',
        'from_address', 'from_name', 'emails_notification', 'is_actif',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'encrypted',
        'is_actif' => 'boolean',
        'port' => 'integer',
    ];

    public static function actif(): ?self
    {
        return static::where('is_actif', true)->latest('id')->first();
    }

    /**
     * @return string[]
     */
    public function listeEmailsNotification(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->emails_notification))));
    }
}
