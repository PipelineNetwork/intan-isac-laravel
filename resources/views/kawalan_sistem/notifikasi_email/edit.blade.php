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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Notifikasi
                                Email</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Kemaskini Notifikasi Email</h5>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Notifikasi</b>
                    </div>
                    <div class="card-body">

                        <form action="/notifikasi_email/{{ $noti->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Tawaran Penilaian (Individu)
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="tawaran_penilaian_individu"
                                        value="{{ $noti->tawaran_penilaian_individu }}">
                                </div>
                                <div class="col">Hari (kepada Peserta, Penyelia dan Penyelia ISAC)</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Tawaran Penilaian (Kumpulan)
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="tawaran_penilaian_kumpulan"
                                        value="{{ $noti->tawaran_penilaian_kumpulan }}">
                                </div>
                                <div class="col">Hari (kepada Penyelaras dan Penyelia ISAC)</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Peringatan (Reminder)
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="peringatan_penilaian"
                                        value="{{ $noti->peringatan_penilaian }}">
                                </div>
                                <div class="col">Hari sebelum tarikh penilaian</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Peringatan Peserta Tidak Hadir Penilaian
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="peringatan_tidak_hadir"
                                        value="{{ $noti->peringatan_tidak_hadir }}">
                                </div>
                                <div class="col">Hari selepas tarikh penilaian (Individu: Peserta dan Penyelia,
                                    Kumpulan: Penyelaras)</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Jadual Penilaian ke IAC
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="jadual_penilaian"
                                        value="{{ $noti->jadual_penilaian }}">
                                </div>
                                <div class="col">Hari sebelum tarikh penilaian</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Peringatan Tukar Katalaluan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="peringatan_tukar_katalaluan"
                                        value="{{ $noti->peringatan_tukar_katalaluan }}">
                                </div>
                                <div class="col">Bulan selepas tarikh pendaftaran akaun</div>
                            </div>

                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn btn-info" type="submit">Kemaskini</button>
                                    <a href="/notifikasi_email" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>

@stop
