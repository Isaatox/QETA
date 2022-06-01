@extends('layouts.mainAdmin')

@section('content')
<style>
body{
    margin-top: 60px;
    color: #1a202c;
    text-align: left;
    background:#eee;
}
</style>
<br>
<div class="container mt-5">
<form action="{{route('admin.question.commentaire.edit')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$commentaires->id}}">
    <div class="form-group">
      <label for="User">Utilisateur :</label>
      <input name="User" type="User" class="form-control" id="User" value="{{$commentaires->User->pseudo}}" readonly>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Contenu</label>
        <input name="description" type="decription" class="form-control" id="exampleInputEmail1" value="{{$commentaires->content}}">
      </div>
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <div class="form-group">
        <label for="exampleInputEmail1">Créer le :</label>
        <input name="image" type="text" class="form-control" id="exampleInputEmail1" value="{{$commentaires->created_at}}" readonly>
      </div>
    <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
  </form>
</div>