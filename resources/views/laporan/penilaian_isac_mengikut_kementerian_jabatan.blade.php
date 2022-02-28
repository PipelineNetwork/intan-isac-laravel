@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path
                                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                    </path>
                                                    <path
                                                        d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
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
