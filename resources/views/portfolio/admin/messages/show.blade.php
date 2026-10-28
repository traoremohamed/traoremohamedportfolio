@extends('layouts.backLayout.designadmin')
@section('content')
    @php($Module = 'Portfolio')

    <h5 class="py-2 mb-1">
        <span class="text-muted fw-light"> <i class="ti ti-home"></i> Accueil / {{ $Module }} /
            <a href="{{ route('messagescontact.index') }}">Messages de contact</a> / </span> {{ $message->sujet }}
    </h5>

    @include('portfolio.admin._alertes')

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">{{ $message->sujet }}</h5>
                    <small class="text-muted">Reçu le {{ $message->created_at->format('d/m/Y à H:i') }}</small>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Nom</dt>
                        <dd class="col-sm-8">{{ $message->nom }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
                        <dt class="col-sm-4">Téléphone</dt>
                        <dd class="col-sm-8">{{ $message->telephone ?: '—' }}</dd>
                        <dt class="col-sm-4">Entreprise</dt>
                        <dd class="col-sm-8">{{ $message->entreprise ?: '—' }}</dd>
                    </dl>
                    <div class="p-3 rounded bg-lighter">{!! nl2br(e($message->message)) !!}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header"><h5 class="mb-0"><i class="ti ti-mail-forward me-1"></i> Réponse</h5></div>
                <div class="card-body">
                    @if ($message->repondu_le)
                        <div class="alert alert-success">
                            Répondu le {{ $message->repondu_le->format('d/m/Y à H:i') }}
                            @if ($message->repondant) par {{ $message->repondant->name }} {{ $message->repondant->prenom_users }} @endif
                        </div>
                        <div class="p-3 rounded bg-lighter mb-3">{!! nl2br(e($message->reponse)) !!}</div>
                    @endif
                    @can('messagescontact-edit')
                        <form method="POST" action="{{ route('messagescontact.repondre', $message->id) }}">
                            @csrf
                            <textarea name="reponse" class="form-control mb-3" rows="8" required placeholder="Votre réponse, envoyée à {{ $message->email }}">{{ old('reponse') }}</textarea>
                            <button class="btn btn-primary"><i class="ti ti-send me-1"></i> {{ $message->repondu_le ? 'Envoyer une nouvelle réponse' : 'Envoyer la réponse' }}</button>
                        </form>
                        <form method="POST" action="{{ route('messagescontact.destroy', $message->id) }}" class="mt-3" onsubmit="return confirm('Supprimer ce message ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="ti ti-trash me-1"></i> Supprimer</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
