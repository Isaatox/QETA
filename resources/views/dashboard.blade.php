@extends('layouts.main')

@section('content')
    <style>
        body {
            margin-top: 60px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .counter {
            padding: 22px 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
            margin-bottom: 60px;
        }

        .counter .count-data {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .counter .count {
            font-weight: 700;
            color: #20247b;
            margin: 0 0 5px;
        }

        .counter p {
            font-weight: 600;
            margin: 0;
        }

    </style>
    <br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <h5 class="card-header">Dernier Sondage</h5>
                    <div class="card-body">
                        @if ($lastsondage != null)
                            <h5 class="card-title">{{ $lastsondage->title }}</h5>
                            <p class="card-text">{{ $lastsondage->description }}</p>
                            <a href="{{ route('sondage.read', ['id' => $lastsondage->id]) }}" class="btn btn-primary">Voir
                                plus</a>
                        @else
                            <h5 class="card-title">N/A</h5>
                            <p class="card-text">N/A</p>
                            <a href="" class="btn btn-primary">Voir plus</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h5 class="card-header">Dernière Question</h5>
                    <div class="card-body">
                        @if ($lastquestion != null)
                            <h5 class="card-title">{{ $lastquestion->title }}</h5>
                            <p class="card-text">{{ $lastquestion->description }}</p>
                            <a href="{{ route('question.read', ['id' => $lastquestion->id]) }}"
                                class="btn btn-primary">Voir
                                plus</a>
                        @else
                            <h5 class="card-title">N/A</h5>
                            <p class="card-text">N/A</p>
                            <a href="" class="btn btn-primary">Voir plus</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-4">
                            <div class="count-data text-center">
                                <h6 class="count h2">{{ $nbsondage }}</h6>
                                <p class="m-0px font-w-600">Sondage posées</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4">
                            <div class="count-data text-center">
                                <h6 class="count h2">{{ $nbquestion }}</h6>
                                <p class="m-0px font-w-600">Questions posées</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4">
                            <div class="count-data text-center">
                                <h6 class="count h2">{{ $nbutilisateur }}</h6>
                                <p class="m-0px font-w-600">Nombre d'utilisateurs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
