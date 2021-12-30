@extends('base')
@section('content')
<form action="/keputusan_penilaian" method="POST">
    @csrf
    <label class="form-label">Nombor IC</label>
    <input type="text" name="ic" class="form-control">
    <label class="form-label">ID penilaian</label>
    <input type="text" name="id_penilaian" class="form-control">
    <button type="submit" class="btn btn-success">Hantar</button>
</form>
@stop