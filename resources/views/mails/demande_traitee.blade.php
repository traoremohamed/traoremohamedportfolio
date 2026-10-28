@extends('mails.layout')
@section('titre', 'Vos accès ' . $demande->application_info['nom'] . ' sont prêts')
@section('contenu')
    <p>Bonjour <strong>{{ $demande->prenom }} {{ $demande->nom }}</strong>,</p>
    <p>Bonne nouvelle : votre demande <strong>{{ $demande->reference }}</strong> a été validée.
        Voici vos accès à <strong>{{ $demande->application_info['nom'] }}</strong> :</p>
    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;background:#f8fbff;border-radius:10px;">
        @include('mails._ligne', ['libelle' => 'Adresse', 'valeur' => $demande->url_acces])
        @include('mails._ligne', ['libelle' => 'Identifiant', 'valeur' => $demande->identifiant])
        @include('mails._ligne', ['libelle' => 'Mot de passe', 'valeur' => $motDePasse])
    </table>
    <p style="color:#b45309;font-size:13px;margin-top:12px;">Pour votre sécurité, changez ce mot de passe dès votre première connexion.</p>
    @if($demande->commentaire_traitement)
        <p style="background:#eff6ff;border-left:4px solid #2563eb;padding:14px 16px;border-radius:8px;">{!! nl2br(e($demande->commentaire_traitement)) !!}</p>
    @endif
    <p style="text-align:center;margin-top:24px;">
        <a href="{{ $demande->url_acces }}" style="display:inline-block;background:#1d4ed8;background:linear-gradient(135deg,#1d4ed8,#06b6d4);color:#fff;padding:12px 26px;border-radius:999px;font-weight:600;text-decoration:none;">Accéder à l'application</a>
    </p>
    <p style="margin-top:24px;">Bienvenue à bord,<br><strong>Traoré Mohamed</strong></p>
@endsection
