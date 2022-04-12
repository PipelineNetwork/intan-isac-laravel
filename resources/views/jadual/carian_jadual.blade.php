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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Carian
                                Jadual</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Carian Jadual</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/jaduals/create" class="btn bg-gradient-warning" type="submit" style="float: right;">Tambah
                        Jadual</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Carian Permohonan</b>
                    </div>

                    <div class="card-body pt-0">
                        <form action="/carian-jadual" method="get">
                            @method("GET")
                            @csrf
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label>ID Penilaian</label>
                                    <input class="form-control" type="text" name="id_penilaian" autocomplete="off"
                                        maxlength="6"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                </div>
                                <div class="col-12 mt-4">
                                    <label>Tarikh Penilaian</label>
                                    <input class="form-control" type="date" name="tarikh_penilaian" autocomplete="off" />
                                </div>
                                <div class="col d-flex justify-content-end align-items-end mt-3">
                                    <button class="btn bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                            class="fas fa-search"></i> cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
