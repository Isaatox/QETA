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
        <form action="{{ route('admin.report.edit', ['id' => $report->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="update" value="{{ $report->updated_at }}">
            <div class="form-group">
                <label for="User">Utilisateur qui a signalé :</label>
                <input name="User" type="User" class="form-control" id="User" value="{{ $report->User->pseudo }}" readonly>
            </div>
            <div class="form-group">
                <label for="topic">Topic signalé :</label>
                <input name="topic" type="topic" class="form-control" id="topic" value="{{ $report->topic_id }}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Titre</label>
                <input name="title" type="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" value="{{ $report->title }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Type</label>
                <input name="type" type="type" class="form-control" id="exampleInputEmail1" value="{{ $report->type }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input name="description" type="decription" class="form-control" id="exampleInputEmail1"
                    value="{{ $report->description }}">
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Créer le :</label>
                <input name="date" type="text" class="form-control" id="exampleInputEmail1"
                    value="{{ $report->created_at }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
