@extends('layouts.main');

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                @foreach ($sondages as $sondage)
                    <div class="card mt-1">
                        <div class="card-header">
                            {{ $sondage->User->pseudo }}
                            <button type="button" class="btn btn-danger btn-sm float-end" data-toggle="modal"
                                data-target="#exampleModal" data-title="{{ $sondage->title }}"
                                data-id="{{ $sondage->id }}"><i class="fas fa-exclamation-triangle"></i></button>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $sondage->title }}</h5>
                            <p class="card-text">{{ $sondage->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $sondage->tag }}</small>
                                <a href="{{ route('sondage.read', ['id' => $sondage->id]) }}" type="button"
                                    class="btn btn-primary float-end">Voir</a>
                            </p>
                        </div>
                    </div>
                    @if ($sondage == null)
                    @else
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Signaler la question de :
                                            {{ $sondage->User->pseudo }}
                                        </h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('report.add.topic') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="topId" id="topId" value="">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Titre :</label>
                                                <input type="text" class="form-control" name="title" id="title" readonly="readonly"
                                                    value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Type de signalement:</label>
                                                <div class="btn-group-vertical w-100 " data-toggle="buttons">
                
                                                    <label class="btn btn-outline-danger" for="danger-outlined">
                                                        <input type="radio" class="btn-check" name="options_outlined"
                                                            id="danger-outlined" value="racisme" autocomplete="off">
                                                        Racisme
                                                    </label>
                                                    <label class="btn btn-outline-danger" for="danger-outlined">
                                                        <input type="radio" class="btn-check" name="options_outlined"
                                                            id="danger-outlined" value="nudité" autocomplete="off">
                                                        Nudité
                                                    </label>
                                                    <label class="btn btn-outline-danger" for="danger-outlined">
                                                        <input type="radio" class="btn-check" name="options_outlined"
                                                            id="danger-outlined" value="contenu" autocomplete="off">
                                                        Contenu Indésirable
                                                    </label>
                                                    <label class="btn btn-outline-danger" for="danger-outlined">
                                                        <input type="radio" class="btn-check" name="options_outlined"
                                                            id="danger-outlined" value="harcelement" autocomplete="off">
                                                        Harcélement
                                                    </label>
                                                    <label class="btn btn-outline-secondary" for="secondary-outlined">
                                                        <input type="radio" class="btn-check" name="options_outlined"
                                                            id="secondary-outlined" value="autre" autocomplete="off">
                                                        Autre
                                                    </label>
                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Message:</label>
                                                <textarea class="form-control" id="message-text" name="description" placeholder="Insérer un message..."
                                                    required></textarea>
                                            </div>
                                    </div>
                                    <input id="type" name="type" type="hidden" value="0">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </div>
                                    </form>
                
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="col-4 mt-1">
                <div class="input-group mb-3">
                    <form action="/sondage" class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Chercher un sondage">
                        <button class="btn btn-outline-success" type="submit">Chercher</button>
                    </form>
                </div>
                <a href="{{ route('sondage.view') }}" class="btn btn-success w-100">Ajouter une sondage</a>
                <div class="card mt-3">
                    <div class="card-header">
                        Meilleurs utilisateurs
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Sondages : <span class="float-end"
                                style="font-weight: bold;">Hugo</span></li>
                        <li class="list-group-item">J'aimes : <span class="float-end"
                                style="font-weight: bold;">Evan</span></li>
                        <li class="list-group-item">Commentaires : <span class="float-end"
                                style="font-weight: bold;">Nils</span></li>
                    </ul>
                </div>
            </div>
        </div>

        @error('options_outlined')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
   

    <div class="container mt-2">
        {{-- {{ $sondages->links() }} --}}
    </div>
@endsection
@push('script')
    <script>
        $('#exampleModal').on('show.bs.modal', function(e) {
            console.log($(e.relatedTarget).data('id'))
            $('#topId').val($(e.relatedTarget).data('id'))
            $('#title').val($(e.relatedTarget).data('title'))
        })
    </script>
@endpush
