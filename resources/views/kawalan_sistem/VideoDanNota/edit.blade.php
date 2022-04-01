@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kawalan Sistem</a></li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Video dan Nota</a>
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col">
                <h5 class="font-weight-bolder">Kemaskini Video dan Nota</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white mb-0"> Perubahan Video dan Nota</b>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="/videodannota/{{ $videodannota->id }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="tajuk" class="form-control-label">Tajuk</label>
                                <input class="form-control" type="text" id="tajuk" name="tajuk"
                                    value="{{ $videodannota->tajuk }}">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Nota</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="nota">{{ $videodannota->nota }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Video</label>
                                <input class="form-control dropzone" name="video" type="file" multiple />
                            </div>
                            <div class="form-group mt-4 text-end">
                                <button class="btn bg-gradient-success" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#pilih1").change(function() {
                if ($(this).val() == "02") {
                    $("#pilih2").show();
                } else {
                    $("#pilih2").hide();
                }
            });
        });
    </script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#pilih3").change(function() {
                if ($(this).val() == "Fizikal") {
                    $("#pilih4").show();
                } else {
                    $("#pilih4").hide();
                }
            });
        });
    </script>

    <script type="text/javascript">
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("TARIKH_SESI")[0].setAttribute('min', today);
    </script>
@stop
