@extends('base')
@section('content')

<div class="container py-5">
    <div class="row">
        <h3> Rayuan</h3>
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
                <form method="POST" action="/tambahrayuans" enctype ="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="tajuk">Tajuk :</label>
                        <input class="form-control mb-3" type="text" name="tajuk">

                        <label for="keterangan_rayuan_send">Keterangan :</label>
                        <input class="form-control mb-3" type="text" name="keterangan_rayuan_send">

                        <label for="file_rayuan_send">File rayuan :</label>
                        <input class="form-control mb-3" type="file" name="file_rayuan_send">

                        <button class="btn btn-primary" type="submit">Hantar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@stop