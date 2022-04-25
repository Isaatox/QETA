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
        <form action="{{ route('admin.sondage.commentaire.add') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $sondage->id }}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Commentaire</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"
                    value=""></textarea>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
