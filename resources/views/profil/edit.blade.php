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
                        <input class="form-control mb-3" type="text" name="email"  value="{{$user->email}}">

                        <!-- <label for="">Password :</label>
                        <input class="form-control mb-3" type="text" name="password"> -->

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>


@stop