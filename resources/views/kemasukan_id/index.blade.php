@extends('base')
@section('content')

    <style>
        #my_camera {
            width: 100px;
            height: 70px;
            border: 1px solid black;
        }

    </style>

    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
            </ol>
            <h5 class="font-weight-bolder">Penilaian ISAC</h5>
            <div id="container">
                <div id="my_camera"></div>
            </div>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Penilaian ISAC</h5>
                    </div>
                    <div class="card-body">
                        <p><em>Sila masukkan id penilaian yang anda terima.</em></p>
                        <div class="pl-lg-4 pb-lg-4 mt-lg-4">
                            <form action="/kemasukan_id/check_id" method="POST">
                                @csrf
                                <div class="row mb-2 justify-content-center">
                                    <div class="col-auto">
                                        <label class="form-control-label">
                                            ID Penilaian
                                        </label>
                                        <label class="float-right">:</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="id_penilaian">
                                    </div>
                                    <label class="text-danger text-center"><em>Sila rujuk surat tawaran untuk mendapatkan ID
                                            penilaian.</em></label>
                                    <div class="col-auto">
                                        <button class="btn bg-gradient-success btn-sm">MULA MENJAWAB</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-end">
                            <label>Sila benarkan (allow) kamera di atas dahulu sebelum memasuki penilaian.</em></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    
    <script type="text/javascript" src="/assets/js/webcamjs/webcam.min.js"></script>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 100,
            height: 70,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    </script>
@stop
