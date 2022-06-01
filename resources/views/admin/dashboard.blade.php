@extends('layouts.mainAdmin')

@section('content')
<style>
body{
    margin-top: 60px;
    color: #1a202c;
    text-align: left;
    background:#eee;
}
.main-part{
width:80%;
margin:0 auto;
text-align: center;
padding: 0px 5px;
}
.cpanel{
width:32%;
display: inline-block;
background-color:#34495E;
color:#fff;
margin-top: 50px;
}
.icon-part i{
font-size: 30px;
padding:10px;
border:1px solid #fff;
border-radius:50%;
margin-top:-25px;
margin-bottom: 10px;
background-color:#34495E;
}
.icon-part p{
margin:0px;
font-size: 20px;
padding-bottom: 10px;
}
.card-content-part{
background-color: #2F4254;
padding: 5px 0px;
}
.cpanel .card-content-part:hover{
background-color: #5a5a5a;
cursor: pointer;
}
.card-content-part a{
color:#fff;
text-decoration: none;
}
</style>
<div class="container mt-5">
    <h1>
        Dashboard for QETA
    </h1>
    
</div>
    <div class="main-part">
        <div class="cpanel">
            <div class="icon-part">
                <i class="fa fa-users"></i><br>
                <small>Utilisateurs</small>
                <p>{{$nbutilisateur}}</p>
            </div>
            <div class="card-content-part">
                <a href="/admin/utilisateur">Plus de détail </a>
            </div>
        </div>
        <div class="cpanel bg-success">
            <div class="icon-part">
                <i class="fas fa-question-circle"></i><br>
                <small>Question</small>
                <p>{{$nbquestion}}</p>
            </div>
            <div class="card-content-part">
                <a href="{{route('admin.question')}}">Plus de détail </a>
            </div>
        </div>
        <div class="cpanel bg-warning">
            <div class="icon-part">
                <i class="fas fa-poll-h"></i></i><br>
                <small>Sondage</small>
                <p>{{$nbsondage}}</p>
            </div>
            <div class="card-content-part">
                <a href="{{route('admin.sondage')}}">Plus de détail</a> 
            </div>
        </div>
        <div class="cpanel bg-danger">
            <div class="icon-part">
                <i class="fas fa-exclamation-circle"></i><br>
                <small>Nombre de Signalement</small>
                <p>{{$nbreport}}</p>
            </div>
            <div class="card-content-part">
                <a href="{{route('admin.report')}}">Plus de détail </a>
            </div>
        </div>
        <div class="cpanel bg-primary">
            <div class="icon-part">
                <i class="fas fa-comment"></i><br>
                <small>Nombre de commentaire sur les questions</small>
                <p>{{$nbcomquest}}</p>
            </div>
            <div class="card-content-part" style="cursor:cell">
                <a href="" style="cursor:cell">Pas de détail </a>
            </div>
        </div>
        <div class="cpanel bg-info">
            <div class="icon-part">
                <i class="fas fa-comment"></i><br>
                <small>Nombre de commentaire sur les sondage</small>
                <p>{{$nbcomsond}}</p>
            </div>
            <div class="card-content-part" style="cursor:cell">
                <a href="" style="cursor:cell">Pas de détail </a>
            </div>
        </div>
    </div>
@endsection
