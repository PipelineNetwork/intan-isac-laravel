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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">LLaporan Keseluruhan Penilaian ISAC
                    Mengikut IAC</li>
            </ol>
            <h5 class="font-weight-bolder">Laporan Keseluruhan Penilaian ISAC Mengikut IAC</h5>
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
                                <a href="/laporan/keseluruhan-penilaian-isac-mengikut-iac"
                                    class="btn  bg-gradient-danger text-uppercases" (click)="reset()">set
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
                        <h5 class="text-white"> STATISTIK PENCAPAIAN ISAC KESELURUHAN MENGIKUT IAC </h5>
                        @if ($tahuns != null)
                            <h6 class="text-white">BAGI TAHUN {{ $tahuns }}</h6>
                        @else
                            <h6 class="text-white">SEHINGGA TAHUN {{ $tahun_semasas }}</h6>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="tablepenilaianisacmengikutiac">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil.</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Kampus</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Sesi</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Memohon</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Menduduki</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Lulus</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Gagal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    1</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kampus Utama (INTAN Bukit Kiara)
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_sesi_kampus_utamas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kampus_utamas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kampus_utamas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kampus_utamas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kampus_utamas }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    2</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kampus Wilayah Selatan (IKWAS)
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_sesi_kampus_selatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kampus_selatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kampus_selatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kampus_selatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kampus_selatans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    3</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kampus Wilayah Utara(INTURA)
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_sesi_kampus_utaras }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kampus_utaras }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kampus_utaras }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kampus_utaras }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kampus_utaras }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    4</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kampus Wilayah Timur (INTIM)
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_sesi_kampus_timurs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kampus_timurs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kampus_timurs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kampus_timurs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kampus_timurs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    5</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kampus INTAN Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_sesi_kampus_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kampus_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kampus_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kampus_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kampus_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    6</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kampus INTAN Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_sesi_kampus_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kampus_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kampus_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kampus_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kampus_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>Jumlah</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $jumlah_bil_sesis }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $jumlah_bil_memohons }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $jumlah_bil_mendudukis }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $jumlah_bil_luluss }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $jumlah_bil_gagals }}</b>
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
            $('#tablepenilaianisacmengikutiac').DataTable({
                dom: 'Bfrtip',
                pageLength: 13,
                "ordering": false,
                "searching": false,
                "info": false,
                "paging": false,
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'LAPORAN PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'LAPORAN PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'LAPORAN PENCAPAIAN PENILAIAN ISAC'
                    },
                ],
            });
        });
    </script>

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
