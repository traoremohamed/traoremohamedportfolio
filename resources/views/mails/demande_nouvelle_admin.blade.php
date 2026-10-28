@extends('mails.layout')
@section('titre', "Nouvelle demande d'accès — " . $demande->application_info['nom'])
@section('contenu')
    <p>Une nouvelle demande de compte vient d'être soumise depuis le portfolio.</p>
    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        @include('mails._ligne', ['libelle' => 'Référence', 'valeur' => $demande->reference])
        @include('mails._ligne', ['libelle' => 'Application', 'valeur' => $demande->application_info['nom']])
        @include('mails._ligne', ['libelle' => 'Nom & prénom', 'valeur' => $demande->nom_complet])
        @include('mails._ligne', ['libelle' => 'Contact', 'valeur' => $demande->contact])
        @include('mails._ligne', ['libelle' => 'Email', 'valeur' => $demande->email])
        @include('mails._ligne', ['libelle' => 'Raison sociale', 'valeur' => $demande->raison_sociale])
        @include('mails._ligne', ['libelle' => 'Structure', 'valeur' => $demande->nom_structure])
        @if($demande->message)
            @include('mails._ligne', ['libelle' => 'Message', 'valeur' => $demande->message])
        @endif
    </table>
    <p style="text-align:center;margin-top:28px;">
        <a href="{{ $lien }}" style="display:inline-block;background:#1d4ed8;background:linear-gradient(135deg,#1d4ed8,#06b6d4);color:#fff;padding:12px 26px;border-radius:999px;font-weight:600;text-decoration:none;">Traiter la demande</a>
    </p>
@endsection
