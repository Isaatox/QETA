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
                <th>Auteur</th>
                <th>Signalement</th>
                <th>Sujet</th>
                <th>Type de signalement</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
            <tr>
                <td>{{$report->User->pseudo}}</td>
                @if ($report->response_id!=0)
                    <td>Commentaire</td>
                @else
                    <td>Question / Sondage</td>
                @endif
                <td>{{$report->topic_id}}</td>
                <td>{{$report->type}}</td>
                <td>{{$report->title}}</td>
                <td>{{$report->description}}</td>
                <td>{{$report->created_at->format('d/m/Y')}}</td>
                <td><a href="{{route('admin.report.delete',['id'=>$report->id])}}" class="btn btn-danger"><i class="fas fa-minus-circle"></i></a>
                    <a  href="{{route('admin.report.edit.view',['id'=>$report->id])}}" class="btn btn-info"><i class="fas fa-pen"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
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

