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
        <form action="{{ route('admin.sondage.commentaire.edit') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $response->id }}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Commentaire</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"
                    value="{{ $response->content }}"></textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
