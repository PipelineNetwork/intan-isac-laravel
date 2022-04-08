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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Keputusan
                                Penilaian</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row ">
                    <div class="col-6">
                        <h5 class="font-weight-bolder">Keputusan Penilaian</h5>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/semak_jawapan" class="btn bg-gradient-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Penilaian Calon {{ $ic }}</b>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-peserta">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">ID Penilaian
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Penilaian
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penilaian as $key => $penilaian)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                            <td class="text-sm text-center font-weight-normal">{{ $penilaian->id_sesi }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($penilaian->tarikh_sesi)) }}</td>
                                            <td class="text-sm text-center font-weight-normal"><a
                                                    href="/semak_jawapan/{{ $penilaian->no_ic }}/{{ $penilaian->id_sesi }}"
                                                    class="btn bg-gradient-info mt-2">Perincian</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasickategori = new simpleDatatables.DataTable("#datatable-peserta", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
