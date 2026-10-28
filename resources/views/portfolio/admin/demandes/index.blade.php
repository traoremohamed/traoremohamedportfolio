@extends('layouts.backLayout.designadmin')
@section('content')
    @php($Module = 'Portfolio')
    @php($titre = "Demandes d'accès aux applications")
    @php($statuts = config('portfolio.statuts_demande'))
    @php($applications = config('portfolio.applications'))

    <h5 class="py-2 mb-1">
        <span class="text-muted fw-light"> <i class="ti ti-home"></i> Accueil / {{ $Module }} / </span> {{ $titre }}
    </h5>

    @include('portfolio.admin._alertes')

    <div class="row g-3 mb-3">
        @foreach ($statuts as $code => $statut)
            <div class="col-6 col-lg-3">
                <a href="{{ route('demandesacces.index', ['statut' => $code]) }}" class="card h-100 {{ request('statut') === $code ? 'border border-' . $statut['badge'] : '' }}">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-muted d-block">{{ $statut['libelle'] }}</small>
                            <h4 class="mb-0">{{ $compteurs[$code] ?? 0 }}</h4>
                        </div>
                        <span class="badge bg-label-{{ $statut['badge'] }} rounded p-2"><i class="ti ti-file-description ti-sm"></i></span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap gap-2 align-items-center justify-content-between">
            <h5 class="mb-0">{{ $titre }}</h5>
            <form method="GET" class="d-flex gap-2">
                <select name="application" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">Toutes les applications</option>
                    @foreach ($applications as $code => $app)
                        <option value="{{ $code }}" @selected(request('application') === $code)>{{ $app['nom'] }}</option>
                    @endforeach
                </select>
                @if (request('statut') || request('application'))
                    <a href="{{ route('demandesacces.index') }}" class="btn btn-sm btn-label-secondary">Réinitialiser</a>
                @endif
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm" id="exampleData">
                <thead>
                <tr>
                    <th>Référence</th>
                    <th>Date</th>
                    <th>Demandeur</th>
                    <th>Structure</th>
                    <th>Application</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($demandes as $demande)
                    <tr>
                        <td><strong>{{ $demande->reference }}</strong></td>
                        <td data-order="{{ $demande->created_at->timestamp }}">
                            {{ $demande->created_at->format('d/m/Y H:i') }}
                            @if (!in_array($demande->statut, ['TRAITEE', 'REJETEE']) && $demande->created_at->lt(now()->subHours(48)))
                                <br><span class="badge bg-label-danger">+48H</span>
                            @endif
                        </td>
                        <td>{{ $demande->nom_complet }}<br><small class="text-muted">{{ $demande->email }} · {{ $demande->contact }}</small></td>
                        <td>{{ $demande->nom_structure }}<br><small class="text-muted">{{ $demande->raison_sociale }}</small></td>
                        <td>{{ $demande->application_info['nom'] }}</td>
                        <td><span class="badge bg-{{ $demande->statut_info['badge'] }}">{{ $demande->statut_info['libelle'] }}</span></td>
                        <td class="text-center">
                            <a href="{{ route('demandesacces.show', $demande->id) }}" class="btn btn-sm btn-primary">
                                <i class="ti ti-eye me-1"></i> {{ in_array($demande->statut, ['TRAITEE', 'REJETEE']) ? 'Voir' : 'Traiter' }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
