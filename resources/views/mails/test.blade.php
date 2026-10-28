@extends('mails.layout')
@section('titre', 'Test de configuration SMTP')
@section('contenu')
    <p>Ce message confirme que les paramètres SMTP enregistrés dans le backoffice fonctionnent.</p>
    <p>Serveur : <strong>{{ $parametre->host }}:{{ $parametre->port }}</strong> ({{ $parametre->encryption ?: 'sans chiffrement' }})<br>
        Expéditeur : <strong>{{ $parametre->from_address }}</strong></p>
    <p>Envoyé le {{ now()->format('d/m/Y à H:i') }}.</p>
@endsection
