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
        <form action="{{ route('admin.sondage.edit') }}" method="POST">
            @csrf
            <div class="form-group">
                <input id="id" name="id" type="hidden" value="{{ $sondage->id }}">
                <label for="exampleInputEmail1">Titre</label>
                <input name="title" type="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" value="{{ $sondage->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Tag</label>
                <input name="tag" type="tag" class="form-control" id="exampleInputEmail1" value="{{ $sondage->tag }}">
            </div>
            @error('tag')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input name="description" type="decription" class="form-control" id="exampleInputEmail1"
                    value="{{ $sondage->description }}">
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Lien d'image</label>
                <input name="image" type="text" class="form-control" id="exampleInputEmail1"
                    value="{{ $sondage->image }}">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Radios" id="public" value="0" checked>
                <label class="form-check-label" for="public">
                    Mettre la question en public
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Radios" id="privé" value="1">
                <label class="form-check-label" for="privé">
                    Mettre la question en privé
                </label>
            </div>
            @error('Radios')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
