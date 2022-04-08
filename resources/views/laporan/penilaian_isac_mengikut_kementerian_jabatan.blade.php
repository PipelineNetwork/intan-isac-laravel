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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Laporan</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Penilaian ISAC
                            Mengikut Kementerian</li>
                        {{-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Penilaian ISAC
                            Mengikut
                            Kementerian & Jabatan</li> --}}
                    </ol>
                    {{-- <h5 class="font-weight-bolder">Laporan Penilaian ISAC Mengikut Kementerian & Jabatan</h5> --}}
                    <h5 class="font-weight-bolder">Laporan Penilaian ISAC Mengikut Kementerian</h5>
                </nav>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white"> Carian</h5>
            </div>

            <div class="card-body p-3">
                <div class="row p-3 pl-0 mb-0">
                    <form style="width: 100%;" (ngSubmit)="filterCharts()">

                        <div class="row">

                            <div class="col-4">
                                <label for="startdate">Tahun</label>
                                <input class="form-control form-control-sm" type="text" name="tahun"
                                    placeholder="Sila Pilih" id="tahun" autocomplete="off" />
                            </div>
                            <div class="col-8">
                                <label for="input_kementerian">Kementerian/Agensi</label>
                                <select class="form-control form-control-sm" name="input_kementerian"
                                    id="input_kementerian">
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    @foreach ($kementerians as $kementerian)
                                        <option value="{{ $kementerian->DESCRIPTION1 }}">
                                            {{ $kementerian->DESCRIPTION1 }}</option>
                                    @endforeach
                                    <option value="Universiti Tun Hussein Onn Malaysia"> Universiti Tun Hussein
                                        Onn Malaysia </option>
                                    <option value="Majlis Perbandaran Muar"> Majlis Perbandaran Muar
                                    </option>
                                    <option value="Majlis Bandaraya Alor Setar"> Majlis Bandaraya Alor Setar
                                    </option>
                                </select>
                            </div>
                            {{-- <div class="col-5">
                                <label for="input_jabatan">Jabatan</label>
                                <select class="form-control form-control-sm" name="input_jabatan" id="input_jabatan">
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->DESCRIPTION1 }}">
                                            {{ $jabatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                <button class="btn  bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                        class="fas fa-search"></i> cari</button>
                                <a href="/laporan/penilaian-isac-mengikut-kementerian"
                                    class="btn  bg-gradient-danger text-uppercases" (click)="reset()">set
                                    semula</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card m-2 mt-3">
            <div class="card-header" style="background-color: #FFA500;">

                <div class="row  mb-0">
                    <div class="col text-center">
                        <h5 class="text-white"> LAPORAN PENCAPAIAN PENILAIAN ISAC </h5>
                        @if ($tahuns != null)
                            <h6 class="text-white">BAGI TAHUN {{ $tahuns }}</h6>
                        @else
                            <h6 class="text-white">SEHINGGA TAHUN {{ $tahun_semasas }}</h6>
                        @endif
                        @if ($check_kementerians != null)
                            <h6 class="text-white" style="text-transform: uppercase">{{ $check_kementerians }}</h6>
                        @endif
                        {{-- @if ($check_jabatans != null)
                            <h6 class="text-white" style="text-transform: uppercase">{{ $check_jabatans }}</h6>
                        @endif --}}
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="tablepenilaianisacmengikutkementerianjabatan">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil.</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bulan</th>
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
                                    Januari
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_mohon_jans == null)
                                        0
                                    @else
                                        {{ $bil_mohon_jans }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_jans == null)
                                        0
                                    @else
                                        {{ $bil_duduk_jans }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_jans == null)
                                        0
                                    @else
                                        {{ $bil_lulus_jans }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_jans == null)
                                        0
                                    @else
                                        {{ $bil_gagal_jans }}
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
                                    @if ($bil_mohon_febs == null)
                                        0
                                    @else
                                        {{ $bil_mohon_febs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_febs == null)
                                        0
                                    @else
                                        {{ $bil_duduk_febs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_febs == null)
                                        0
                                    @else
                                        {{ $bil_lulus_febs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_febs == null)
                                        0
                                    @else
                                        {{ $bil_gagal_febs }}
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
                                    @if ($bil_mohon_macs == null)
                                        0
                                    @else
                                        {{ $bil_mohon_macs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_macs == null)
                                        0
                                    @else
                                        {{ $bil_duduk_macs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_macs == null)
                                        0
                                    @else
                                        {{ $bil_lulus_macs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_macs == null)
                                        0
                                    @else
                                        {{ $bil_gagal_macs }}
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
                                    @if ($bil_mohon_aprs == null)
                                        0
                                    @else
                                        {{ $bil_mohon_aprs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_aprs == null)
                                        0
                                    @else
                                        {{ $bil_duduk_aprs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_aprs == null)
                                        0
                                    @else
                                        {{ $bil_lulus_aprs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_aprs == null)
                                        0
                                    @else
                                        {{ $bil_gagal_aprs }}
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
                                    @if ($bil_mohon_meis == null)
                                        0
                                    @else
                                        {{ $bil_mohon_meis }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_meis == null)
                                        0
                                    @else
                                        {{ $bil_duduk_meis }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_meis == null)
                                        0
                                    @else
                                        {{ $bil_lulus_meis }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_meis == null)
                                        0
                                    @else
                                        {{ $bil_gagal_meis }}
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
                                    @if ($bil_mohon_juns == null)
                                        0
                                    @else
                                        {{ $bil_mohon_juns }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_juns == null)
                                        0
                                    @else
                                        {{ $bil_duduk_juns }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_juns == null)
                                        0
                                    @else
                                        {{ $bil_lulus_juns }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_juns == null)
                                        0
                                    @else
                                        {{ $bil_gagal_juns }}
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
                                    @if ($bil_mohon_julais == null)
                                        0
                                    @else
                                        {{ $bil_mohon_julais }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_julais == null)
                                        0
                                    @else
                                        {{ $bil_duduk_julais }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_julais == null)
                                        0
                                    @else
                                        {{ $bil_lulus_julais }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_julais == null)
                                        0
                                    @else
                                        {{ $bil_gagal_julais }}
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
                                    @if ($bil_mohon_ogoss == null)
                                        0
                                    @else
                                        {{ $bil_mohon_ogoss }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_ogoss == null)
                                        0
                                    @else
                                        {{ $bil_duduk_ogoss }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_ogoss == null)
                                        0
                                    @else
                                        {{ $bil_lulus_ogoss }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_ogoss == null)
                                        0
                                    @else
                                        {{ $bil_gagal_ogoss }}
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
                                    @if ($bil_mohon_seps == null)
                                        0
                                    @else
                                        {{ $bil_mohon_seps }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_seps == null)
                                        0
                                    @else
                                        {{ $bil_duduk_seps }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_seps == null)
                                        0
                                    @else
                                        {{ $bil_lulus_seps }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_seps == null)
                                        0
                                    @else
                                        {{ $bil_gagal_seps }}
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
                                    @if ($bil_mohon_okts == null)
                                        0
                                    @else
                                        {{ $bil_mohon_okts }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_okts == null)
                                        0
                                    @else
                                        {{ $bil_duduk_okts }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_okts == null)
                                        0
                                    @else
                                        {{ $bil_lulus_okts }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_okts == null)
                                        0
                                    @else
                                        {{ $bil_gagal_okts }}
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
                                    @if ($bil_mohon_novs == null)
                                        0
                                    @else
                                        {{ $bil_mohon_novs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_novs == null)
                                        0
                                    @else
                                        {{ $bil_duduk_novs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_novs == null)
                                        0
                                    @else
                                        {{ $bil_lulus_novs }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_novs == null)
                                        0
                                    @else
                                        {{ $bil_gagal_novs }}
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
                                    @if ($bil_mohon_diss == null)
                                        0
                                    @else
                                        {{ $bil_mohon_diss }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_duduk_diss == null)
                                        0
                                    @else
                                        {{ $bil_duduk_diss }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_lulus_diss == null)
                                        0
                                    @else
                                        {{ $bil_lulus_diss }}
                                    @endif
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    @if ($bil_gagal_diss == null)
                                        0
                                    @else
                                        {{ $bil_gagal_diss }}
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
                                    <b>
                                        @if ($bil_mohon_jumlahs == null)
                                            0
                                        @else
                                            {{ $bil_mohon_jumlahs }}
                                        @endif
                                    </b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>
                                        @if ($bil_duduk_jumlahs == null)
                                            0
                                        @else
                                            {{ $bil_duduk_jumlahs }}
                                        @endif
                                    </b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>
                                        @if ($bil_lulus_jumlahs == null)
                                            0
                                        @else
                                            {{ $bil_lulus_jumlahs }}
                                        @endif
                                    </b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>
                                        @if ($bil_gagal_jumlahs == null)
                                            0
                                        @else
                                            {{ $bil_gagal_jumlahs }}
                                        @endif
                                    </b>
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
            $('#tablepenilaianisacmengikutkementerianjabatan').DataTable({
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
