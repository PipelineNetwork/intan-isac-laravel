@extends('base')
@section('content')

<div class="container py-5">
    <div class="row">
        <h3>Daftar Pengguna</h3>
        <div class="col-6 bg-light">
            <div class="col-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="/tambahrayuans/{{$tambahrayuan->id}}" enctype ="multipart/form-data">
                @method('PUT')
                    @csrf
                    <div class="form-group">

                        <label for="keterangan_rayuan_reply">Keterangan Balas :</label>
                        <input class="form-control mb-3" type="text" name="keterangan_rayuan_reply">

                        <label for="file_aduan_send">File Balas :</label>
                        <input class="form-control mb-3" type="file" name="file_rayuan_reply">

                        <input type="hidden" name="id" value="{{$id}}">

                        <button class="btn btn-primary" type="submit">Hantar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@stop