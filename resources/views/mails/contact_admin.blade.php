@extends('mails.layout')
@section('titre', 'Nouveau message : ' . $contact->sujet)
@section('contenu')
    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        @include('mails._ligne', ['libelle' => 'Nom', 'valeur' => $contact->nom])
        @include('mails._ligne', ['libelle' => 'Email', 'valeur' => $contact->email])
        @include('mails._ligne', ['libelle' => 'Téléphone', 'valeur' => $contact->telephone ?: '—'])
        @include('mails._ligne', ['libelle' => 'Entreprise', 'valeur' => $contact->entreprise ?: '—'])
    </table>
    <p style="background:#f8fbff;border-left:4px solid #2563eb;padding:14px 16px;border-radius:8px;margin-top:18px;">{!! nl2br(e($contact->message)) !!}</p>
    <p style="text-align:center;margin-top:24px;">
        <a href="{{ $lien }}" style="display:inline-block;background:#1d4ed8;background:linear-gradient(135deg,#1d4ed8,#06b6d4);color:#fff;padding:12px 26px;border-radius:999px;font-weight:600;text-decoration:none;">Répondre depuis le backoffice</a>
    </p>
@endsection
