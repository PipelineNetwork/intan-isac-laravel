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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Tambah
                                Calon</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <h5 class="font-weight-bolder">Tambah Calon</h5>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Carian Pengguna</b>
                    </div>
                    <div class="card-body">
                        <form action="/jaduals/{{ $id_sesis }}/calon" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <label>No Kad Pengenalan Pengguna</label>
                                    <input class="form-control" type="text" name="ic" autocomplete="off" maxlength="12"
                                        size="12"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        required />
                                </div>
                                <div class="col d-flex justify-content-end align-items-end mt-3">
                                    <button class="btn bg-gradient-info text-uppercases mx-2" type="submit"><i
                                            class="fas fa-user-plus"></i>&nbsp; Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
