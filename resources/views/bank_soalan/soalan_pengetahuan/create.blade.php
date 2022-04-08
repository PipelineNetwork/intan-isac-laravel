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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Bank
                                Soalan</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Soalan
                                Pengetahuan</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Tambah</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Soalan Pengetahuan</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-frame mt-3">

                    <div class="card-header" style="background-color:#FFA500;">
                        <div class="row d-flex flex-nowrap">
                            <div class="col align-items-center">
                                <b class="text-white">Tambah Soalan Pengetahuan</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/bank-soalan-pengetahuan" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Tahap Soalan</label>
                                        <select class="form-control" name="id_tahap_soalan" required>
                                            <option hidden selected>Sila Pilih</option>
                                            <option value="1">Asas</option>
                                            <option value="2">Lanjutan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori Pengetahuan</label>
                                        <select class="form-control" name="id_kategori_pengetahuan" required>
                                            <option hidden selected>Sila Pilih</option>
                                            <option value="1">EG</option>
                                            <option value="2">Electronic Mail</option>
                                            <option value="3">General</option>
                                            <option value="4">Government Mobility</option>
                                            <option value="5">Hardware</option>
                                            <option value="6">ICT Security</option>
                                            <option value="7">Inisiatif ICT Sektor Awam</option>
                                            <option value="8">Internet</option>
                                            <option value="9">Media Sosial</option>
                                            <option value="10">MSC</option>
                                            <option value="11">Office Productivity</option>
                                            <option value="12">Rangkaian dan Wifi</option>
                                            <option value="13">Software</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Jenis Soalan</label>
                                        <select class="form-control" name="jenis_soalan" required>
                                            <option hidden selected>Sila Pilih</option>
                                            <option value="fill_in_the_blank">Fill in the Blank</option>
                                            <option value="multiple_choice">Multiple Choice</option>
                                            <option value="ranking">Ranking</option>
                                            <option value="single_choice">Single Choice</option>
                                            <option value="true_or_false">True or False</option>
                                            <option value="subjective">Subjective</option>
                                        </select>
                                    </div>
                                </div>

                                <div style="text-align: right">
                                    <button class="btn bg-gradient-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
