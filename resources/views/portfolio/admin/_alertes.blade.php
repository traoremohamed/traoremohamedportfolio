@foreach (['success' => 'success', 'error' => 'danger'] as $cle => $classe)
    @if ($message = Session::get($cle))
        <div class="alert alert-{{ $classe }} alert-dismissible fade show" role="alert">
            <div class="alert-body">{{ $message }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $erreur)
                <li>{{ $erreur }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
