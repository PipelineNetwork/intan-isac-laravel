@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h1> Profil</h1>
    </div>
</div>

<h5 style="color:black">{{$user->name}}</h5>
<h5 style="color:black">{{$user->email}}</h5>

<a class="button" href="/kemaskiniprofil"> Kemaskini</a>




@stop