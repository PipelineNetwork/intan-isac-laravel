@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h3> Profil</h3>


        <h5 style="color:black">{{$user->name}}</h5>
        <h5 style="color:black">{{$user->email}}</h5>
        <h5 style="color:black">{{$user->ministry_code}}</h5>
        <h5 style="color:black">{{$user->office_number}}</h5>
        <h5 style="color:black">{{$user->fax_number}}</h5>
        <h5 style="color:black">{{$user->telephone_number}}</h5>

        <a class="button" href="/profil/edit"> Kemaskini</a>
    </div>
</div>
@stop