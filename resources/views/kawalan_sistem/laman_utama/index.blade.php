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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paparan Laman
                                Utama</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Paparan Laman Utama</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/laman_utama/create" class="btn bg-gradient-warning mb-0" type="submit"
                        style="float: right;">TAMBAH</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Maklumat</b>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($laman_utama as $key => $laman_utama)
                                <li class="list-group-item">
                                    <div class="row mt-4">
                                        <div class="col-1">
                                            {{ $key + 1 }}.
                                        </div>
                                        <div class="col-9">
                                            <h5>{{ $laman_utama->TAJUK }}</h5>
                                            <p>{!! $laman_utama->KETERANGAN !!}</p>
                                        </div>
                                        <div class="col-2 text-end">
                                            <p class="mb-0">Status:
                                                @if ($laman_utama->STATUS == '01')
                                                    Tidak Aktif
                                                @else
                                                    Aktif
                                                @endif
                                            </p>
                                            <a href="laman_utama/{{ $laman_utama->ID }}/edit"
                                                class="btn bg-gradient-info mt-0">Kemaskini</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
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
