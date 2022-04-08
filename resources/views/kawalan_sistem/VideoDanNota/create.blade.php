@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="/dashboard">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kawalan
                                Sistem</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Video dan
                                Nota</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Cipta Maklumat Video dan Nota</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Butiran Video/Nota</b>
                    </div>
                    <div class="card-body">
                        <form action="/videodannota" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Dokumen</label>
                                <select class="form-control" name="jenis">
                                    <option value="" hidden selected>Sila Pilih</option>
                                    <option value="Nota">Nota</option>
                                    <option value="Video">Video</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tajuk" class="form-control-label">Tajuk</label>
                                <input class="form-control" type="text" id="tajuk" name="tajuk">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Keterangan</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="nota"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Fail</label>
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

    <script src="../../assets/js/plugins/dropzone.min.js"></script>

@stop
