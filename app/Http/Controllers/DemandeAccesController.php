<?php

namespace App\Http\Controllers;

use App\Helpers\MailConfig;
use App\Models\DemandeAcces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DemandeAccesController extends Controller
{
    public function index(Request $request)
    {
        $demandes = DemandeAcces::query()
            ->when($request->statut, fn ($q, $statut) => $q->where('statut', $statut))
            ->when($request->application, fn ($q, $app) => $q->where('application', $app))
            ->latest()
            ->get();

        $compteurs = DemandeAcces::selectRaw('statut, count(*) as total')->groupBy('statut')->pluck('total', 'statut');

        return view('portfolio.admin.demandes.index', compact('demandes', 'compteurs'));
    }

    public function show($id)
    {
        $demande = DemandeAcces::findOrFail($id);
        if ($demande->statut === 'EN_ATTENTE') {
            $demande->update(['statut' => 'EN_COURS']);
        }

        return view('portfolio.admin.demandes.show', [
            'demande' => $demande,
            'motDePasseSuggere' => Str::password(12, true, true, false),
        ]);
    }

    public function traiter(Request $request, $id)
    {
        $demande = DemandeAcces::findOrFail($id);

        $data = $request->validate([
            'url_acces' => 'required|url|max:255',
            'identifiant' => 'required|string|max:150',
            'mot_de_passe' => 'required|string|min:6|max:100',
            'commentaire_traitement' => 'nullable|string|max:2000',
        ]);

        $demande->update($data + [
            'statut' => 'TRAITEE',
            'traite_par' => Auth::id(),
            'traite_le' => now(),
        ]);

        $envoye = MailConfig::envoyer($demande->email, 'Vos accès ' . $demande->application_info['nom'] . ' — ' . $demande->reference, 'demande_traitee', [
            'demande' => $demande,
            'motDePasse' => $data['mot_de_passe'],
        ]);

        return redirect()->route('demandesacces.show', $demande->id)->with(
            $envoye ? 'success' : 'error',
            $envoye ? 'Demande traitée : les accès ont été envoyés à ' . $demande->email . '.'
                : 'Demande enregistrée comme traitée, mais l\'e-mail n\'a pas pu partir. Vérifiez les paramètres mail puis renvoyez les accès.'
        );
    }

    public function renvoyer($id)
    {
        $demande = DemandeAcces::findOrFail($id);
        abort_unless($demande->statut === 'TRAITEE', 404);

        $envoye = MailConfig::envoyer($demande->email, 'Vos accès ' . $demande->application_info['nom'] . ' — ' . $demande->reference, 'demande_traitee', [
            'demande' => $demande,
            'motDePasse' => $demande->mot_de_passe,
        ]);

        return back()->with($envoye ? 'success' : 'error', $envoye ? 'Accès renvoyés à ' . $demande->email . '.' : 'Échec de l\'envoi de l\'e-mail. Vérifiez les paramètres mail.');
    }

    public function rejeter(Request $request, $id)
    {
        $demande = DemandeAcces::findOrFail($id);
        $data = $request->validate(['commentaire_traitement' => 'required|string|max:2000']);

        $demande->update($data + [
            'statut' => 'REJETEE',
            'traite_par' => Auth::id(),
            'traite_le' => now(),
        ]);

        MailConfig::envoyer($demande->email, 'Votre demande ' . $demande->reference, 'demande_rejetee', ['demande' => $demande]);

        return redirect()->route('demandesacces.index')->with('success', 'La demande ' . $demande->reference . ' a été rejetée.');
    }
}
