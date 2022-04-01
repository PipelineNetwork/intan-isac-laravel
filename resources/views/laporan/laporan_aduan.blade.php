@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Laporan</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Statistik Aduan</li>
            </ol>
            <h5 class="font-weight-bolder">Laporan Statistik Aduan</h5>
        </nav>
        <div class="card mt-3">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white"> Carian</h5>
            </div>

            <div class="card-body p-3">
                <div class="row p-3 pl-0 mb-0">
                    <form style="width: 100%;" (ngSubmit)="filterCharts()">

                        <div class="row">

                            <div class="col-12">
                                <label for="startdate">Tahun</label>
                                <input class="form-control form-control-sm" type="text" name="tahun"
                                    placeholder="Sila Pilih" id="tahun" autocomplete="off" />
                            </div>
                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                <button class="btn  bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                        class="fas fa-search"></i> cari</button>
                                <a href="/laporan/aduan" class="btn  bg-gradient-danger text-uppercases"
                                    (click)="reset()">set
                                    semula</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header" style="background-color: #FFA500;">

                <div class="row  mb-0">
                    <div class="col text-center">
                        <h5 class="text-white"> LAPORAN STATISTIK ADUAN </h5>
                        @if ($tahuns != null)
                            <h6 class="text-white">BAGI TAHUN {{ $tahuns }}</h6>
                        @else
                            <h6 class="text-white">SEHINGGA TAHUN {{ $tahun_semasas }}</h6>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body p-3 mb-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="tablelaporanaduan">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil.</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bulan</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Aduan</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Aduan Dibalas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    1</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Januari
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_jan == null)
                                        0
                                    @else
                                        {{ $aduan_jan }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_jan == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_jan }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    2</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Februari
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_feb == null)
                                        0
                                    @else
                                        {{ $aduan_feb }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_feb == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_feb }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    3</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Mac
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_mac == null)
                                        0
                                    @else
                                        {{ $aduan_mac }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_mac == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_mac }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    4</td>
                                <td class="text-sm text-center font-weight-normal">
                                    April
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_april == null)
                                        0
                                    @else
                                        {{ $aduan_april }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_april == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_april }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    5</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Mei
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_mei == null)
                                        0
                                    @else
                                        {{ $aduan_mei }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_mei == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_mei }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    6</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Jun
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_jun == null)
                                        0
                                    @else
                                        {{ $aduan_jun }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_jun == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_jun }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    7</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Julai
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_julai == null)
                                        0
                                    @else
                                        {{ $aduan_julai }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_julai == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_julai }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    8</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Ogos
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_ogos == null)
                                        0
                                    @else
                                        {{ $aduan_ogos }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_ogos == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_ogos }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    9</td>
                                <td class="text-sm text-center font-weight-normal">
                                    September
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_sep == null)
                                        0
                                    @else
                                        {{ $aduan_sep }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_sep == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_sep }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    10</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Oktober
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_okt == null)
                                        0
                                    @else
                                        {{ $aduan_okt }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_okt == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_okt }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    11</td>
                                <td class="text-sm text-center font-weight-normal">
                                    November
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_nov == null)
                                        0
                                    @else
                                        {{ $aduan_nov }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_nov == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_nov }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    12</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Disember
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dis == null)
                                        0
                                    @else
                                        {{ $aduan_dis }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($aduan_dibalas_dis == null)
                                        0
                                    @else
                                        {{ $aduan_dibalas_dis }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>Jumlah</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($jumlah_aduan == null)
                                        <b>0</b>
                                    @else
                                        <b>{{ $jumlah_aduan }}</b>
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($jumlah_aduan_dibalas == null)
                                        <b>0</b>
                                    @else
                                        <b>{{ $jumlah_aduan_dibalas }}</b>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tablelaporanaduan').DataTable({
                dom: 'Bfrtip',
                pageLength: 13,
                "ordering": false,
                "searching": false,
                "info": false,
                "paging": false,
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'LAPORAN ADUAN'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'LAPORAN ADUAN'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'LAPORAN ADUAN'
                    },
                ],
            });
        });
    </script>

    {{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        })
    </script>
@stop
