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
                <form method="POST" action="/pengurusanpengguna">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama :</label>
                        <input class="form-control mb-3" type="text" name="name">

                        <label for="">email :</label>
                        <input class="form-control mb-3" type="text" name="email">

                        <label for="">Group ID :</label>
                        <input class="form-control mb-3" type="text" name="user_group_id">

                        <label for="">Kod kementerian :</label>
                        <input class="form-control mb-3" type="text" name="ministry_code">

                        <label for="">No office :</label>
                        <input class="form-control mb-3" type="text" name="office_number">

                        <label for="">No fax :</label>
                        <input class="form-control mb-3" type="text" name="fax_number">

                        <label for="">No Tel :</label>
                        <input class="form-control mb-3" type="text" name="telephone_number">

                        <label for="">Password :</label>
                        <input class="form-control mb-3" type="text" name="password">


                        <!-- <label for="">Password :</label>
                        <input class="form-control mb-3" type="text" name="password"> -->

                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@stop