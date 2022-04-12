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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai Status
                                Calon</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h5 class="font-weight-bolder">Senarai Status Calon</h5>
            </div>
            <div class="col-6 text-end">
                <button class="btn bg-gradient-primary" onClick="window.location.reload();">Refresh</button>
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
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">No Kad Pengenalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Nama Calon</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Mula</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Pengetahuan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemahiran Internet</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemahiran Pemprosesan
                                    Perkataan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemahiran E-mel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senarai_semak_jawapans as $key => $senarai_semak_jawapan)
                                @if ($senarai_semak_jawapan['status'] != 'Gagal' && $senarai_semak_jawapan['status'] != 'Lulus')
                                    <tr>
                                        <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm text-center font-weight-normal">
                                            <b>{{ $senarai_semak_jawapan['ic'] }}</b>
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['nama'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['status'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['pengetahuan'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['kemahiran_internet'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['kemahiran_word'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['kemahiran_email'] }}
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                        <td class="text-sm text-center font-weight-normal">
                                            <b>{{ $senarai_semak_jawapan['ic'] }}</b>
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['nama'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            Selesai
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['pengetahuan'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['kemahiran_internet'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['kemahiran_word'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            {{ $senarai_semak_jawapan['kemahiran_email'] }}
                                        </td>
                                    </tr>
                                @endif
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
            // paging: false,
            // searchable: false,
        });
    </script>
@stop
