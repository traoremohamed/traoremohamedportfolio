@extends('mails.layout')
@section('titre', 'Re : ' . $contact->sujet)
@section('contenu')
    <p>Bonjour <strong>{{ $contact->nom }}</strong>,</p>
    <div>{!! nl2br(e($contact->reponse)) !!}</div>
    <p style="margin-top:24px;">Cordialement,<br><strong>Traoré Mohamed</strong></p>
    <hr style="border:none;border-top:1px solid #e2e8f0;margin:24px 0;">
    <p style="font-size:13px;color:#64748b;">Votre message du {{ $contact->created_at->format('d/m/Y à H:i') }} :<br>{!! nl2br(e($contact->message)) !!}</p>
@endsection
