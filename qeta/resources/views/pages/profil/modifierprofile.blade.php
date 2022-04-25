@extends('layouts.main')

@section('content')
<style>
    body {
        background: #f7f7ff;
        margin-top: 100px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

    .me-2 {
        margin-right: .5rem !important;
    }

    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .profile-pic input {
        display: none;
    }

    .profile-pic img {
        position: absolute;
        object-fit: cover;
        width: 165px;
        height: 165px;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, .35);
        border-radius: 100px;
        z-index: 0;
    }

    .profile-pic .-label {
        cursor: pointer;
        height: 165px;
        width: 165px;
    }

    .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, .8);
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
    }

    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
    }
</style>

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column text-center">
                            <form method="POST" action="{{ route('profile.edit') }}">
                                @csrf
                                <div class="container col-8">
                                    <label class="-label" for="file">
                                    </label>
                                    <img class="rounded-circle" src="{{ auth()->user()->image }}" id="output" width="200" />
                                </div>
                                <div class="mt-3">
                                    <h4>{{ auth()->user()->pseudo }}</h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{auth()->user()->id}}">
                        <div class="form-group row">
                            <label for="exampleInputPassword1">Pseudo</label>
                            <input value="{{auth()->user()->pseudo}}" name="pseudo" type="pseudo" class="form-control" placeholder="Pseudo">
                        </div>
                        @error('pseudo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="exampleInputEmail1">Adresse E-mail</label>
                            <input value="{{auth()->user()->email}}" name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Entrez l'e-mail">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="exampleInputPassword1">Mot de Passe</label>
                            <input name="password" type="password" class="form-control" placeholder="Mot de Passe">
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail1">Lien d'image</label>
                            <input value="{{auth()->user()->image}}" name="image" type="text" class="form-control" placeholder="image">
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="exampleInputPassword1">Website</label>
                            <input value="{{ old('website') }}" name="website" type="website" class="form-control" placeholder="Website">
                        </div>
                        @error('website')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="exampleInputEmail1">GitHub</label>
                            <input value="{{ old('github') }}" name="github" type="github" class="form-control" aria-describedby="emailHelp" placeholder="github">
                        </div>
                        @error('github')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="exampleInputPassword1">Twitter</label>
                            <input value="{{ old('twitter') }}" name="twitter" type="twitter" class="form-control" placeholder="twitter">
                        </div>
                        @error('twitter')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<script>
    var loadFile = function(event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection