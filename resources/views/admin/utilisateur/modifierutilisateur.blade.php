@extends('layouts.mainAdmin')

@section('content')
    <style>
        body {
            margin-top: 60px;
            color: #1a202c;
            text-align: left;
            background: #eee;
        }

    </style>
    <br>
    <div class="container mt-5">
        <form action="{{ route('admin.user.edit') }}" method="POST">
            @csrf
            <div class="form-group">
                <input id="id" name="id" type="hidden" value="{{ $user->id }}">
                <label for="exampleInputEmail1">Pseudo</label>
                <input name="pseudo" type="pseudo" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter Pseudo" value="{{ $user->pseudo }}">
            </div>
            @error('pseudo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Radios" id="administrateur" value="2">
                <label class="form-check-label" for="admin">
                    Administrateur
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Radios" id="utilisateur" value="1">
                <label class="form-check-label" for="user">
                    Utilisateur
                </label>
            </div>
            @error('Radios')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
