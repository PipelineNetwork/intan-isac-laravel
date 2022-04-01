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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Selenggara
                                Kawalan Sistem</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="/selenggara_kawalan_sistem/{{ $kawalan->ID_KAWALAN_SISTEM }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="font-weight-bolder">Kemaskini Kawalan Sistem</h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Option Papar Keputusan</b>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Papar Keputusan Selepas Tamat Penilaian
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <select class="form-control mb-3" name="OPTION_PAPAR_KEPUTUSAN" id="pilih1">
                                            <option hidden selected value="{{ $kawalan->OPTION_PAPAR_KEPUTUSAN }}">
                                                @if ($kawalan->OPTION_PAPAR_KEPUTUSAN == '01')
                                                    Papar
                                                @else
                                                    Tidak Papar
                                                @endif
                                            </option>
                                            <option value="01">Papar</option>
                                            <option value="02">Tidak papar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Tempoh Masa Penilaian</b>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Tempoh Masa Keseluruhan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="TEMPOH_MASA_KESELURUHAN_PENILAIAN"
                                        value="{{ $kawalan->TEMPOH_MASA_KESELURUHAN_PENILAIAN }}">
                                </div>
                                <div class="col">&emsp;minit</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Reminder Tamat Soalan Pengetahuan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control"
                                        name="TEMPOH_MASA_PERINGATAN_TAMAT_SOALAN_PENGETAHUAN"
                                        value="{{ $kawalan->TEMPOH_MASA_PERINGATAN_TAMAT_SOALAN_PENGETAHUAN }}">
                                </div>
                                <div class="col">&emsp;minit</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Tempoh Sebelum Tamat Penilaian
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control"
                                        name="TEMPOH_MASA_PERINGATAN_SEBELUM_TAMAT_PENILAIAN"
                                        value="{{ $kawalan->TEMPOH_MASA_PERINGATAN_SEBELUM_TAMAT_PENILAIAN }}">
                                </div>
                                <div class="col">&emsp;minit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Tempoh Kebenaran Permohonan</b>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Peserta Gagal
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control"
                                        name="TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_GAGAL"
                                        value="{{ $kawalan->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_GAGAL }}">
                                </div>
                                <div class="col">&emsp;Hari selepas tarikh penilaian</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label class="form-control-label mr-4">
                                        Peserta Blacklist
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control"
                                        name="TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_BLACKLIST"
                                        value="{{ $kawalan->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_BLACKLIST }}">
                                </div>
                                <div class="col">
                                    &emsp;Hari selepas tarikh penilaian
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Tempoh Kebenaran Penjadualan Semula</b>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-5">
                                    <label class="form-control-label mr-4">
                                        Tempoh Penjadualan Semula/Pembatalan Jadual (Individu)
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="TEMPOH_TUTUP_TARIKH_PENILAIAN_INDIVIDU"
                                        value="{{ $kawalan->TEMPOH_TUTUP_TARIKH_PENILAIAN_INDIVIDU }}">
                                </div>
                                <div class="col">
                                    &emsp;Hari sebelum tarikh penilaian
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-5">
                                    <label class="form-control-label mr-4">
                                        Pertukaran Peserta (Kumpulan)
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control" name="TEMPOH_TUTUP_TARIKH_PENILAIAN_KUMPULAN"
                                        value="{{ $kawalan->TEMPOH_TUTUP_TARIKH_PENILAIAN_KUMPULAN }}">
                                </div>
                                <div class="col">
                                    &emsp;Hari sebelum tarikh penilaian
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-end">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a href="/selenggara_kawalan_sistem" class="btn btn-danger">Kembali</a>
                </div>
            </div>

        </form>
    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>

@stop
