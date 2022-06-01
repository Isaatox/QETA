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
<div class="container mt-5">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->pseudo}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td><a class="btn btn-danger" href="{{route('admin.user.delete',['id'=>$user->id])}}"><i class="fas fa-minus-circle"></i></a> 
                    <a class="btn btn-info" href="{{route('admin.user.edit.view',['id'=>$user->id])}}"><i class="fas fa-pen"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <a href="{{route('admin.user.add.view')}}" class="btn btn-success w-25">Ajouter un utilisateur</a>
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