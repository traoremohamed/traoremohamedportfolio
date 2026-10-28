@extends('layouts.backLayout.designadmin')
@section('content')
    @php($Module = 'Portfolio')
    @php($titre = "Demandes d'accès")
    @php($app = $demande->application_info)
    @php($cloturee = in_array($demande->statut, ['TRAITEE', 'REJETEE']))

    <h5 class="py-2 mb-1">
        <span class="text-muted fw-light"> <i class="ti ti-home"></i> Accueil / {{ $Module }} /
            <a href="{{ route('demandesacces.index') }}">{{ $titre }}</a> / </span> {{ $demande->reference }}
    </h5>

    @include('portfolio.admin._alertes')

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Demande {{ $demande->reference }}</h5>
                    <span class="badge bg-{{ $demande->statut_info['badge'] }}">{{ $demande->statut_info['libelle'] }}</span>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-5">Reçue le</dt>
                        <dd class="col-sm-7">{{ $demande->created_at->format('d/m/Y à H:i') }}
                            @if (!$cloturee)
                                <br><small class="text-{{ $demande->created_at->lt(now()->subHours(48)) ? 'danger' : 'muted' }}">
                                    Échéance 48H : {{ $demande->created_at->addHours(48)->format('d/m/Y H:i') }}</small>
                            @endif
                        </dd>
                        <dt class="col-sm-5">Application</dt>
                        <dd class="col-sm-7"><strong>{{ $app['nom'] }}</strong></dd>
                        <dt class="col-sm-5">Nom</dt>
                        <dd class="col-sm-7">{{ $demande->nom }}</dd>
                        <dt class="col-sm-5">Prénom(s)</dt>
                        <dd class="col-sm-7">{{ $demande->prenom }}</dd>
                        <dt class="col-sm-5">Contact</dt>
                        <dd class="col-sm-7"><a href="tel:{{ $demande->contact }}">{{ $demande->contact }}</a></dd>
                        <dt class="col-sm-5">Email</dt>
                        <dd class="col-sm-7"><a href="mailto:{{ $demande->email }}">{{ $demande->email }}</a></dd>
                        <dt class="col-sm-5">Raison sociale</dt>
                        <dd class="col-sm-7">{{ $demande->raison_sociale }}</dd>
                        <dt class="col-sm-5">Structure</dt>
                        <dd class="col-sm-7">{{ $demande->nom_structure }}</dd>
                        @if ($demande->message)
                            <dt class="col-sm-5">Message</dt>
                            <dd class="col-sm-7">{!! nl2br(e($demande->message)) !!}</dd>
                        @endif
                        @if ($cloturee)
                            <dt class="col-sm-5">Traitée le</dt>
                            <dd class="col-sm-7">{{ optional($demande->traite_le)->format('d/m/Y à H:i') }}
                                @if ($demande->traitant) par {{ $demande->traitant->name }} {{ $demande->traitant->prenom_users }} @endif</dd>
                        @endif
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            @if ($demande->statut === 'TRAITEE')
                <div class="card">
                    <div class="card-header"><h5 class="mb-0">Accès envoyés</h5></div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Adresse</dt>
                            <dd class="col-sm-8"><a href="{{ $demande->url_acces }}" target="_blank" rel="noopener">{{ $demande->url_acces }}</a></dd>
                            <dt class="col-sm-4">Identifiant</dt>
                            <dd class="col-sm-8">{{ $demande->identifiant }}</dd>
                            @if ($demande->commentaire_traitement)
                                <dt class="col-sm-4">Commentaire</dt>
                                <dd class="col-sm-8">{!! nl2br(e($demande->commentaire_traitement)) !!}</dd>
                            @endif
                        </dl>
                        @can('demandesacces-edit')
                            <form method="POST" action="{{ route('demandesacces.renvoyer', $demande->id) }}">
                                @csrf
                                <button class="btn btn-outline-primary btn-sm"><i class="ti ti-send me-1"></i> Renvoyer les accès par e-mail</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @elseif ($demande->statut === 'REJETEE')
                <div class="card">
                    <div class="card-header"><h5 class="mb-0">Demande rejetée</h5></div>
                    <div class="card-body">{!! nl2br(e($demande->commentaire_traitement)) !!}</div>
                </div>
            @else
                @can('demandesacces-edit')
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="ti ti-key me-1"></i> Créer et envoyer les accès</h5>
                            <small class="text-muted">Créez le compte dans {{ $app['nom'] }}, puis renseignez les accès ci-dessous : ils seront envoyés à {{ $demande->email }}.</small>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('demandesacces.traiter', $demande->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Adresse de l'application</label>
                                    <input type="url" name="url_acces" class="form-control" required value="{{ old('url_acces', $app['url'] ?? '') }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Identifiant</label>
                                        <input type="text" name="identifiant" class="form-control" required value="{{ old('identifiant', $demande->email) }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mot de passe provisoire</label>
                                        <div class="input-group">
                                            <input type="text" name="mot_de_passe" id="mot_de_passe" class="form-control" required minlength="6" value="{{ old('mot_de_passe', $motDePasseSuggere) }}">
                                            <button type="button" class="btn btn-outline-secondary" onclick="navigator.clipboard.writeText(document.getElementById('mot_de_passe').value)" title="Copier"><i class="ti ti-copy"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message au demandeur (facultatif)</label>
                                    <textarea name="commentaire_traitement" class="form-control" rows="3" placeholder="Ex. : votre période d'essai court jusqu'au…">{{ old('commentaire_traitement') }}</textarea>
                                </div>
                                <button class="btn btn-primary"><i class="ti ti-send me-1"></i> Valider et envoyer les accès</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header"><h5 class="mb-0 text-danger"><i class="ti ti-x me-1"></i> Rejeter la demande</h5></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('demandesacces.rejeter', $demande->id) }}" onsubmit="return confirm('Rejeter cette demande ? Le demandeur sera notifié par e-mail.')">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="commentaire_traitement" class="form-control" rows="2" required placeholder="Motif communiqué au demandeur"></textarea>
                                </div>
                                <button class="btn btn-outline-danger btn-sm">Rejeter</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">Vous n'avez pas le droit de traiter cette demande.</div>
                @endcan
            @endif
        </div>
    </div>
@endsection
