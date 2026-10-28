@extends('layouts.backLayout.designadmin')
@section('content')
    @php($Module = 'Portfolio')
    @php($titre = 'Messages de contact')

    <h5 class="py-2 mb-1">
        <span class="text-muted fw-light"> <i class="ti ti-home"></i> Accueil / {{ $Module }} / </span> {{ $titre }}
    </h5>

    @include('portfolio.admin._alertes')

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">{{ $titre }}</h5>
            <small class="text-muted">{{ $messages->where('is_lu', false)->count() }} non lu(s)</small>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm" id="exampleData">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Expéditeur</th>
                    <th>Sujet</th>
                    <th>État</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($messages as $message)
                    <tr class="{{ $message->is_lu ? '' : 'fw-bold' }}">
                        <td data-order="{{ $message->created_at->timestamp }}">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $message->nom }}<br><small class="text-muted">{{ $message->email }}{{ $message->entreprise ? ' · ' . $message->entreprise : '' }}</small></td>
                        <td>{{ $message->sujet }}</td>
                        <td>
                            @if ($message->repondu_le)
                                <span class="badge bg-success">Répondu</span>
                            @elseif ($message->is_lu)
                                <span class="badge bg-info">Lu</span>
                            @else
                                <span class="badge bg-warning">Nouveau</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('messagescontact.show', $message->id) }}" class="btn btn-sm btn-primary"><i class="ti ti-eye me-1"></i> Ouvrir</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
