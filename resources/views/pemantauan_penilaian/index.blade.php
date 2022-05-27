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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pemantauan
                                Penilaian</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Carian Pemantauan Penilaian</h5>
            </div>
            <div class="col-lg-6">
                <a href="/pemantauan-penilaian" class="btn bg-gradient-warning" style="float: right;">Kembali
                </a>
            </div>
        </div>

        <div class="card card-frame mt-3">
            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row align-items-center">
                    <div class="col-8">
                        <b class="text-white mb-0">Senarai Penilaian</b>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable_pemantauan_penilaian">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Id Penilaian</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Sesi</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Sesi</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa Mula</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa Tamat</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penilaian_lists as $penilaian_list)
                                <tr>
                                    <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        <b>{{ $penilaian_list->ID_PENILAIAN }}</b>
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ date('d-m-Y', strtotime($penilaian_list->TARIKH_SESI)) }}</td>
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $penilaian_list->KOD_SESI_PENILAIAN }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $penilaian_list->KOD_MASA_MULA }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $penilaian_list->KOD_MASA_TAMAT }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal"><a data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Lihat Status Calon" data-container="body"
                                            data-animation="true"
                                            href="/pemantauan-penilaian/{{ $penilaian_list->ID_PENILAIAN }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="/assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        const dataTablePemantauanPenilaian = new simpleDatatables.DataTable("#datatable_pemantauan_penilaian", {
            searchable: true,
            fixedHeight: true,
            sortable: false,
        });
    </script>
@stop
