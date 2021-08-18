@extends('base')
@section('content')



<div class="container py-3">
    <div class="row">
        <h5> Daftar Penyelaras </h5>
    </div>
</div>
<form method="POST" action="/penyelaraspengguna">
    @csrf
    <div class="form-group">
        <label for="">Nama :</label>
        <input class="form-control mb-3" type="text" name="name">

        <label for="">email :</label>
        <input class="form-control mb-3" type="text" name="email">

        <label for="">Group ID :</label>
        <input class="form-control mb-3" type="text" name="user_group_id">

        <label for="">Password :</label>
        <input class="form-control mb-3" type="text" name="password">


        <!-- <label for="">Password :</label>
                        <input class="form-control mb-3" type="text" name="password"> -->

        <button class="btn btn-primary" type="submit">Simpan</button>
</form>



@stop