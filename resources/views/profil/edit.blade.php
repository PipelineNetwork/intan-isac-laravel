@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h1> Kemaskini Profil</h1>
    </div>
</div>

<form method="POST" action="/profil/edit">
    @csrf
    <div class="form-group">
        <label for="">Nama :</label>
        <input class="form-control mb-3" type="text" name="name" value="{{$user->name}}">

        <label for="">email :</label>
        <input class="form-control mb-3" type="text" name="email" value="{{$user->email}}">

        <label for="">Kod kementerian :</label>
        <input class="form-control mb-3" type="text" name="ministry_code" value="{{$user->ministry_code}}">

        <label for="">No office :</label>
        <input class="form-control mb-3" type="text" name="office_number" value="{{$user->office_number}}">

        <label for="">No fax :</label>
        <input class="form-control mb-3" type="text" name="fax_number" value="{{$user->fax_number}}">

        <label for="">No Tel :</label>
        <input class="form-control mb-3" type="text" name="telephone_number" value="{{$user->telephone_number}}">

        <!-- <label for="">Password :</label>
                        <input class="form-control mb-3" type="text" name="password"> -->

        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</form>


@stop