@extends('mails.layout')
@section('titre', "Suite à votre demande d'accès " . $demande->reference)
@section('contenu')
    <p>Bonjour <strong>{{ $demande->prenom }} {{ $demande->nom }}</strong>,</p>
    <p>Nous ne pouvons pas donner suite à votre demande d'accès à <strong>{{ $demande->application_info['nom'] }}</strong> pour le moment.</p>
    @if($demande->commentaire_traitement)
        <p style="background:#eff6ff;border-left:4px solid #2563eb;padding:14px 16px;border-radius:8px;">{!! nl2br(e($demande->commentaire_traitement)) !!}</p>
    @endif
    <p>N'hésitez pas à me contacter pour en discuter : +225 07 09 49 51 98.</p>
    <p style="margin-top:24px;">Cordialement,<br><strong>Traoré Mohamed</strong></p>
@endsection
