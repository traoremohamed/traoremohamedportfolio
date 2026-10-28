@extends('mails.layout')
@section('titre', 'Merci pour votre message')
@section('contenu')
    <p>Bonjour <strong>{{ $contact->nom }}</strong>,</p>
    <p>J'ai bien reçu votre message « <strong>{{ $contact->sujet }}</strong> » et je vous réponds dans les meilleurs délais.</p>
    <p style="margin-top:24px;">Cordialement,<br><strong>Traoré Mohamed</strong></p>
@endsection
