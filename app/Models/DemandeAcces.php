<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Demande de compte sur une des applications SaaS (config/portfolio.php).
 */
class DemandeAcces extends Model
{
    protected $table = 'demandes_acces';

    protected $fillable = [
        'reference', 'nom', 'prenom', 'contact', 'email', 'raison_sociale', 'nom_structure',
        'application', 'message', 'statut', 'url_acces', 'identifiant', 'mot_de_passe',
        'commentaire_traitement', 'traite_par', 'traite_le', 'ip_address',
    ];

    protected $hidden = ['mot_de_passe'];

    protected $casts = [
        'mot_de_passe' => 'encrypted',
        'traite_le' => 'datetime',
    ];

    public static function genererReference(): string
    {
        do {
            $reference = 'DA-' . date('ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
        } while (static::where('reference', $reference)->exists());

        return $reference;
    }

    public function traitant()
    {
        return $this->belongsTo(User::class, 'traite_par');
    }

    public function getNomCompletAttribute(): string
    {
        return trim($this->nom . ' ' . $this->prenom);
    }

    public function getApplicationInfoAttribute(): array
    {
        return config('portfolio.applications.' . $this->application, ['nom' => $this->application, 'url' => null]);
    }

    public function getStatutInfoAttribute(): array
    {
        return config('portfolio.statuts_demande.' . $this->statut, ['libelle' => $this->statut, 'badge' => 'secondary']);
    }
}
