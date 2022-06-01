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

<div class="container">
    <table id="myTable" class="display">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Créer le</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($commentaires as $commentaire)
        <tr>
        <th scope="row">{{$commentaire->id}}</th>
        <td>{{$commentaire->User->pseudo}}</td>
        <td>{{$commentaire->content}}</td>
        <td>{{$commentaire->created_at}}</td>
        <td><a class="btn btn-danger" href="{{route('admin.sondage.commentaire.delete',['id'=>$commentaire->id])}}"><i class="fas fa-minus-circle"></i></a> 
            <a class="btn btn-info" href="{{route('admin.sondage.commentaire.edit.view',['id'=>$commentaire->id])}}"><i class="fas fa-pen"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{route('admin.sondage.commentaire.add.view',['id'=>$topic->id])}}" class="btn btn-success w-25">Ajouter un commentaire</a>

@endsection

@push('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }}
            });
        } );
    </script>
@endpush