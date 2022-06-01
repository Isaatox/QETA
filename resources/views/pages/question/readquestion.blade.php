@extends('layouts.main');

@section('content')
    <style>
        .frame {
            width: 450px;
            height: 350px;
            border: 3px solid #ccc;
            background: #eee;
            margin: auto;
            padding: 15px 25px;
        }

        img {
            width: 100%;
            height: 100%;
        }

    </style>



    <div class='container-fluid mt-5'>
        @error('options_outlined')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class='row'>

            <div class="col-12">
                <div class="container">

                    <div class="card">

                        <div class="card-body">
                            <button type="button" class="btn btn-danger btn-sm float-end" data-toggle="modal"
                                data-target="#exampleModal" data-title="{{ $questions->title }}"
                                data-id="{{ $questions->id }}"><i class="fas fa-exclamation-triangle"></i></button>
                            <h5 class="card-title">{{ $questions->title }}</h5>
                            <p class="card-text">{{ $questions->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $questions->tag }}</small></p>
                            <p class="card-text"><small class="text-muted">{{ $questions->updated_at }}</small>
                            </p>
                        </div>
                        <div class='text-center mb-3'>
                            <img class="img-thumbnail" src="{{ $questions->image }}" alt="Card image cap"
                                style="width:30%; height:auto">
                        </div>
                    </div>
                </div>

            <div class="container">
                <div class="card mt-1">
                    <div class='card-header'>
                        <h5 class="card-title">Ajouter une réponse</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('response.add') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <textarea class="form-control" id="message-text" name="content"></textarea>
                            </div>
                            <input type="hidden" name="topId" value="{{ $questions->id }}">
                            <button type="submit" id="form-submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card mt-1 mb-5">
                    <div class="card-header">
                        <label for="message" class="h4 ">Réponse</label>
                    </div>
                    <div class="card-body">
                        @foreach ($reponses as $reponse)
                            <button type="button" class="btn btn-danger btn-sm float-end" data-toggle="modal"
                                data-target="#response" data-title="{{ $reponse->user_id }}"
                                data-id="{{ $reponse->id }}"><i class="fas fa-exclamation-triangle"></i></button>
                            <h5 class="card-title">{{ $reponse->User->pseudo }}</h5>
                            <p class="card-text">{{ $reponse->content }}</p>
                            <hr>

                            <div class="modal fade" id="response" tabindex="-1" role="dialog"
                                aria-labelledby="response" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" name="exampleModalLabel" id="exampleModalLabel">
                                                Signaler le commentaire de
                                                : {{ $reponse->User->pseudo }}
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fas fa-times"></i>
                                            </button>

                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('report.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="comId" id="comId" value="">
                                                <input type="hidden" name="topId" id="topId"
                                                    value="{{ $reponse->id }}">
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Titre :</label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                        readonly="readonly" value="Commentaire">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Type de
                                                        signalement:</label>
                                                    <div class="btn-group-vertical w-100 " data-toggle="buttons">

                                                        <label class="btn btn-outline-danger" for="danger-outlined">
                                                            <input type="radio" class="btn-check"
                                                                name="options_outlined" id="danger-outlined"
                                                                value="racisme" autocomplete="off">
                                                            Racisme
                                                        </label>
                                                        <label class="btn btn-outline-danger" for="danger-outlined">
                                                            <input type="radio" class="btn-check"
                                                                name="options_outlined" id="danger-outlined"
                                                                value="nudité" autocomplete="off">
                                                            Nudité
                                                        </label>
                                                        <label class="btn btn-outline-danger" for="danger-outlined">
                                                            <input type="radio" class="btn-check"
                                                                name="options_outlined" id="danger-outlined"
                                                                value="contenu" autocomplete="off">
                                                            Contenu Indésirable
                                                        </label>
                                                        <label class="btn btn-outline-danger" for="danger-outlined">
                                                            <input type="radio" class="btn-check"
                                                                name="options_outlined" id="danger-outlined"
                                                                value="harcelement" autocomplete="off">
                                                            Harcélement
                                                        </label>
                                                        <label class="btn btn-outline-secondary"
                                                            for="secondary-outlined">
                                                            <input type="radio" class="btn-check"
                                                                name="options_outlined" id="secondary-outlined"
                                                                value="autre" autocomplete="off">
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
                                        <input id="type" name="type" type="hidden" value="2">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Signaler la question de :
                        {{ $questions->User->pseudo }}
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>

                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('report.add.topic') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" id="type" value="{{ $questions->type }}">
                        <input type="hidden" name="topId" id="topId" value="{{ $questions->id }}">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Titre :</label>
                            <input type="text" class="form-control" name="title" id="title" readonly="readonly"
                                value="{{ $questions->title }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Type de signalement:</label>
                            <div class="btn-group-vertical w-100 " data-toggle="buttons">

                                <label class="btn btn-outline-danger" for="danger-outlined">
                                    <input type="radio" class="btn-check" name="options_outlined" id="danger-outlined"
                                        value="racisme" autocomplete="off">
                                    Racisme
                                </label>
                                <label class="btn btn-outline-danger" for="danger-outlined">
                                    <input type="radio" class="btn-check" name="options_outlined" id="danger-outlined"
                                        value="nudité" autocomplete="off">
                                    Nudité
                                </label>
                                <label class="btn btn-outline-danger" for="danger-outlined">
                                    <input type="radio" class="btn-check" name="options_outlined" id="danger-outlined"
                                        value="contenu" autocomplete="off">
                                    Contenu Indésirable
                                </label>
                                <label class="btn btn-outline-danger" for="danger-outlined">
                                    <input type="radio" class="btn-check" name="options_outlined" id="danger-outlined"
                                        value="harcelement" autocomplete="off">
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
@endsection

@push('script')
    <script>
        $('#exampleModal').on('show.bs.modal', function(e) {
            console.log($(e.relatedTarget).data('id'))
            $('#topId').val($(e.relatedTarget).data('id'))
            $('#title').val($(e.relatedTarget).data('title'))
        })

        $('#response').on('show.bs.modal', function(e) {
            console.log($(e.relatedTarget).data('id'))
            $('#comId').val($(e.relatedTarget).data('id'))
            $('#userId').val($(e.relatedTarget).data('title'))
        })
    </script>
@endpush
