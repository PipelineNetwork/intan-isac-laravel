@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h3> Pengurusan Pengguna </h3>
    </div>
</div>

<div class="container py-3">
    <div class="row">
        <h5> Senarai Pengguna </h5>       <a href= "/pengurusanpengguna/create"class="btn btn-primary" type="submit">Daftar Pengguna</a>
    </div>
</div>


<table class="table table-bordered">
    <tr>
        <th>Merchant ID</th>
        <th>User ID</th>
        <th>Kemaskini</th>
        <th>Hapus</th>


    </tr>

    @foreach ($users as $user)
    
    <tr>
        <td>{{ $user['name'] }}</td>
        <td>{{ $user['email'] }}</td>
        <td><a href="/pengurusanpengguna/{{$user->id}}/edit" class="btn-sm" style="color:black;"> Kemaskini </a></td>
        <td><form method="POST" action="{{route('pengurusanpengguna.destroy', $user['id'] ) }}">
@method('DELETE')
@csrf
    
    <button type="submit"> Hapus</button>
</form>
</td>
    </tr>

    @endforeach
</table>



@stop