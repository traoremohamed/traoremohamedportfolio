@extends('layouts.backLayout.designadmin')
@section('content')
    @php($Module = 'Portfolio')
    @php($titre = 'Paramètres mail (SMTP)')

    <h5 class="py-2 mb-1">
        <span class="text-muted fw-light"> <i class="ti ti-home"></i> Accueil / {{ $Module }} / </span> {{ $titre }}
    </h5>

    @include('portfolio.admin._alertes')

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ $titre }}</h5>
                    <small class="text-muted">Ces paramètres remplacent ceux du fichier .env pour tous les e-mails du portfolio (demandes d'accès, messages, réponses).</small>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('parametresmail.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Serveur SMTP</label>
                                <input type="text" name="host" class="form-control" required placeholder="ssl0.ovh.net" value="{{ old('host', $parametre->host) }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Port</label>
                                <input type="number" name="port" class="form-control" required value="{{ old('port', $parametre->port) }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Chiffrement</label>
                                <select name="encryption" class="form-select">
                                    <option value="" @selected(!old('encryption', $parametre->encryption))>Aucun</option>
                                    <option value="ssl" @selected(old('encryption', $parametre->encryption) === 'ssl')>SSL (465)</option>
                                    <option value="tls" @selected(old('encryption', $parametre->encryption) === 'tls')>TLS (587)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Utilisateur</label>
                                <input type="text" name="username" class="form-control" autocomplete="off" value="{{ old('username', $parametre->username) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" name="password" class="form-control" autocomplete="new-password"
                                       placeholder="{{ $parametre->exists && $parametre->getRawOriginal('password') ? '•••••••• (laisser vide pour conserver)' : '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Adresse d'expédition</label>
                                <input type="email" name="from_address" class="form-control" required value="{{ old('from_address', $parametre->from_address) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nom d'expéditeur</label>
                                <input type="text" name="from_name" class="form-control" required value="{{ old('from_name', $parametre->from_name) }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Adresses qui reçoivent les demandes et messages</label>
                                <input type="text" name="emails_notification" class="form-control" required value="{{ old('emails_notification', $parametre->emails_notification) }}">
                                <small class="text-muted">Séparées par des virgules.</small>
                            </div>
                        </div>
                        @can('parametresmail-edit')
                            <button class="btn btn-primary"><i class="ti ti-device-floppy me-1"></i> Enregistrer</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><i class="ti ti-mail-check me-1"></i> Tester l'envoi</h5></div>
                <div class="card-body">
                    @if ($parametre->exists)
                        <form method="POST" action="{{ route('parametresmail.test') }}">
                            @csrf
                            <input type="email" name="email_test" class="form-control mb-3" value="{{ Auth::user()->email }}">
                            @can('parametresmail-edit')
                                <button class="btn btn-outline-primary w-100"><i class="ti ti-send me-1"></i> Envoyer un e-mail de test</button>
                            @endcan
                        </form>
                    @else
                        <p class="text-muted mb-0">Enregistrez d'abord les paramètres pour pouvoir tester.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
