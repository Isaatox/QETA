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
      <th scope="col">pseudo</th>
      <th scope="col">type</th>
      <th scope="col">tag</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
      <th scope="col">setting</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    
      @foreach ($sondages as $sondage)
      <tr>
      <th scope="row">{{$sondage->id}}</th>
      <td>{{$sondage->User->pseudo}}</td>
      <td>{{$sondage->type}}</td>
      <th>{{$sondage->tag}}</th>
      <td>{{$sondage->title}}</td>
      <td>{{$sondage->description}}</td>
      <td>{{$sondage->image}}</td>
      <td>{{$sondage->setting}}</td>
      <td><a class="btn btn-success" href="{{route('admin.sondage.commentaire',['id'=>$sondage->id])}}"><i class="fas fa-comments"></i></a>
        <a class="btn btn-danger" href="{{route('admin.topic.delete',['id'=>$sondage->id])}}"><i class="fas fa-minus-circle"></i></a> 
        <a class="btn btn-info" href="{{route('admin.sondage.edit.view',['id'=>$sondage->id])}}"><i class="fas fa-pen"></i></a></td>
    </tr>
    @endforeach
    
  </tbody>
  
</table>
<a href="{{route('admin.sondage.add.view')}}" class="btn btn-success w-25">Ajouter un sondage</a>
</div>

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
