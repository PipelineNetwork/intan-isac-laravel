@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h3>  Aduan </h3>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <h5>Tambah Aduan</h5>
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
                <form method="POST" action="/tambahaduans" enctype ="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tajuk :</label>
                        <input class="form-control mb-3" type="text" name="tajuk">

                        <label for="">Keterangan Aduan :</label>
                        <input class="form-control mb-3" type="text" name="keterangan_aduan_send">

                        <label for="file_aduan_send">File Aduan :</label>
                        <input class="form-control mb-3" type="file" name="file_aduan_send">

                        <button class="btn btn-primary" type="submit">Hantar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>


@stop