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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Selenggara
                                Kawalan Sistem</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Selenggara Kawalan Sistem</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/selenggara_kawalan_sistem/{{ $kawalan->ID_KAWALAN_SISTEM }}/edit"
                        class="btn bg-gradient-primary mb-0" type="submit" style="float: right;">Kemaskini</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
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
                                @if ($kawalan->OPTION_PAPAR_KEPUTUSAN == '01')
                                    Papar
                                @else
                                    Tidak Papar
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
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
                            <div class="col-8">
                                {{ $kawalan->TEMPOH_MASA_KESELURUHAN_PENILAIAN }}&emsp;minit
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Reminder Tamat Soalan Pengetahuan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ $kawalan->TEMPOH_MASA_PERINGATAN_TAMAT_SOALAN_PENGETAHUAN }}&emsp;minit
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Tempoh Sebelum Tamat Penilaian
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ $kawalan->TEMPOH_MASA_PERINGATAN_SEBELUM_TAMAT_PENILAIAN }}&emsp;minit
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
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
                            <div class="col-8">
                                {{ $kawalan->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_GAGAL }}&emsp;Hari selepas tarikh penilaian
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Peserta Tidak Hadir
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ $kawalan->TEMPOH_KEBENARAN_PERMOHONAN_PESERTA_BLACKLIST }}&emsp;Hari selepas tarikh
                                penilaian<br>
                                <span><em><strong>Peserta tersebut tidak dibenarkan membuat permohonan dalam tempoh
                                            ini.</strong></em></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12">
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
                            <div class="col-7">
                                {{ $kawalan->TEMPOH_TUTUP_TARIKH_PENILAIAN_INDIVIDU }}&emsp;Hari sebelum tarikh penilaian
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5">
                                <label class="form-control-label mr-4">
                                    Pertukaran Peserta (Kumpulan)
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-7">
                                {{ $kawalan->TEMPOH_TUTUP_TARIKH_PENILAIAN_KUMPULAN }}&emsp;Hari sebelum tarikh penilaian
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>

@stop
