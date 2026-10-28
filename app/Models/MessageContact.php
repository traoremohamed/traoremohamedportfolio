<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Message envoyé depuis le formulaire de contact du portfolio.
 */
class MessageContact extends Model
{
    protected $table = 'messages_contact';

    protected $fillable = [
        'nom', 'email', 'telephone', 'entreprise', 'sujet', 'message',
        'is_lu', 'reponse', 'repondu_par', 'repondu_le', 'ip_address',
    ];

    protected $casts = [
        'is_lu' => 'boolean',
        'repondu_le' => 'datetime',
    ];

    public function repondant()
    {
        return $this->belongsTo(User::class, 'repondu_par');
    }
}
