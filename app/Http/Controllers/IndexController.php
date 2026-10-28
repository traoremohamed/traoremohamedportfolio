<?php

namespace App\Http\Controllers;

use App\Helpers\MailConfig;
use App\Models\DemandeAcces;
use App\Models\MessageContact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IndexController extends Controller
{
    public function index()
    {
        $applications = config('portfolio.applications');

        return view('welcome', compact('applications'));
    }

    public function contact(Request $request)
    {
        // Champ piège invisible : un robot le remplit, un humain non
        if ($request->filled('site_web')) {
            return response()->json(['message' => 'Merci, votre message a bien été envoyé.']);
        }

        $data = $request->validate([
            'nom' => 'required|string|max:150',
            'email' => ['required', 'email', 'max:150', 'not_regex:/[\r\n]/'],
            'telephone' => 'nullable|string|max:30',
            'entreprise' => 'nullable|string|max:150',
            'sujet' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        $contact = MessageContact::create($data + ['ip_address' => $request->ip()]);

        MailConfig::envoyer(MailConfig::destinatairesAdmin(), 'Portfolio — ' . $contact->sujet, 'contact_admin', [
            'contact' => $contact,
            'lien' => route('messagescontact.show', $contact->id),
        ]);
        MailConfig::envoyer($contact->email, 'Merci pour votre message', 'contact_accuse', ['contact' => $contact]);

        return response()->json(['message' => 'Merci ' . $contact->nom . ', votre message a bien été envoyé. Je vous réponds très vite.']);
    }

    public function demandeAcces(Request $request)
    {
        if ($request->filled('site_web')) {
            return response()->json(['message' => 'Votre demande a bien été enregistrée.']);
        }

        $data = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:150',
            'contact' => ['required', 'string', 'max:30', 'regex:/^[0-9+\s().-]{8,30}$/'],
            'email' => ['required', 'email', 'max:150', 'not_regex:/[\r\n]/'],
            'raison_sociale' => 'required|string|max:200',
            'nom_structure' => 'required|string|max:200',
            'application' => ['required', Rule::in(array_keys(config('portfolio.applications')))],
            'message' => 'nullable|string|max:2000',
        ], [
            'contact.regex' => 'Le numéro de contact n\'est pas valide.',
            'application.in' => 'Veuillez choisir une application.',
        ]);

        $demande = DemandeAcces::create($data + [
            'reference' => DemandeAcces::genererReference(),
            'statut' => 'EN_ATTENTE',
            'ip_address' => $request->ip(),
        ]);

        MailConfig::envoyer($demande->email, 'Demande ' . $demande->reference . ' reçue — traitement sous 48H', 'demande_recue', [
            'demande' => $demande,
        ]);
        MailConfig::envoyer(MailConfig::destinatairesAdmin(), 'Nouvelle demande d\'accès ' . $demande->application_info['nom'] . ' — ' . $demande->nom_structure, 'demande_nouvelle_admin', [
            'demande' => $demande,
            'lien' => route('demandesacces.show', $demande->id),
        ]);

        return response()->json([
            'message' => 'Votre demande a bien été enregistrée sous la référence ' . $demande->reference . '. Elle sera traitée sous 48H : vous recevrez vos accès par e-mail.',
            'reference' => $demande->reference,
        ]);
    }
}
