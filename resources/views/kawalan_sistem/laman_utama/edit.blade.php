@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="/dashboard">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kawalan
                                Sistem</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paparan Laman
                                Utama</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Kemaskini Laman Utama</h5>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Kemaskini</b>
                    </div>
                    <div class="card-body">

                        <form action="/laman_utama/{{ $laman_utama->ID }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-1">
                                    <label class="form-control-label mr-4">
                                        Tajuk
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-lg-11">
                                    <input type="text" class="form-control" name="TAJUK"
                                        value="{{ $laman_utama->TAJUK }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label mr-4">
                                            Keterangan
                                        </label><label class="float-right">:</label>
                                        <textarea id="editor-soalan" class="form-control" name="KETERANGAN"
                                            rows="10">{{ $laman_utama->KETERANGAN }}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-1">
                                    <label class="form-control-label mr-4">
                                        Status
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-lg-11">
                                    <select class="form-control" id="exampleFormControlSelect1" name="STATUS">
                                        <option value="{{ $laman_utama->STATUS }}" selected hidden>
                                            @if ($laman_utama->STATUS == '01')
                                                Tidak Aktif
                                            @else
                                                Aktif
                                            @endif
                                        </option>
                                        <option value="01">Tidak Aktif</option>
                                        <option value="02">Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn btn-info" type="submit">Kemaskini</button>
                                    <a href="/laman_utama" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/ckeditor5/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor-soalan'))
            .catch(error => {
                console.error(error);
            });
    </script>

    {{-- <script type="text/javascript">
        CKEDITOR.replace('editor', {
            language: 'en',
            uiColor: '#0067b8',
        });
    </script> --}}

@stop
