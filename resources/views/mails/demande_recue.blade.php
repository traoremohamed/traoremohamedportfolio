@extends('mails.layout')
@section('titre', "Votre demande d'accès a bien été reçue")
@section('contenu')
    <p>Bonjour <strong>{{ $demande->prenom }} {{ $demande->nom }}</strong>,</p>
    <p>Merci pour votre intérêt pour <strong>{{ $demande->application_info['nom'] }}</strong>.
        Votre demande de compte pour <strong>{{ $demande->nom_structure }}</strong> a bien été enregistrée.</p>
    <p style="background:#eff6ff;border-left:4px solid #2563eb;padding:14px 16px;border-radius:8px;">
        Elle sera traitée sous <strong>48 heures</strong>. Vous recevrez vos accès par e-mail dès sa validation.
    </p>
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:16px;border-collapse:collapse;">
        @include('mails._ligne', ['libelle' => 'Référence', 'valeur' => $demande->reference])
        @include('mails._ligne', ['libelle' => 'Application', 'valeur' => $demande->application_info['nom']])
        @include('mails._ligne', ['libelle' => 'Structure', 'valeur' => $demande->nom_structure])
    </table>
    <p style="margin-top:24px;">Cordialement,<br><strong>Traoré Mohamed</strong></p>
@endsection
