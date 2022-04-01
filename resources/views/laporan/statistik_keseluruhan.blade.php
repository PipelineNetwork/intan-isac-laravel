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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Statistik Keseluruhan</li>
            </ol>
            <h5 class="font-weight-bolder">Laporan Statistik Keseluruhan</h5>
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
                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                <button class="btn  bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                        class="fas fa-search"></i> cari</button>
                                <a href="/laporan/statistik-keseluruhan" class="btn  bg-gradient-danger text-uppercases"
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
                        <h5 class="text-white"> STATISTIK KESELURUHAN PENCAPAIAN PENILAIAN ISAC </h5>
                        @if ($ministrys != null)
                            <h6 class="text-white" style="text-transform: uppercase">KEMENTERIAN :
                                {{ $ministrys }}</h6>
                        @else
                            <h6 class="text-white">SEMUA KEMENTERIAN</h6>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="tablestatistikkeseluruhan">
                        <thead>
                            <tr>
                                {{-- <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil.</th> --}}
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Tahun</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Sesi</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Memohon</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Menduduki</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Lulus</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    % Lulus</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil. Gagal</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    % Gagal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($bil_sesi_2021s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2021
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2021s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2021s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2022s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2022
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2022s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2022s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2023s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2023
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2023s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2023s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2024s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2024
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2024s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2024s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2025s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2025
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2025s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2025s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2026s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2026
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2026s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2026s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2027s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2027
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2027s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2027s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2028s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2028
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2028s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2028s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2029s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2029
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2029s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2029s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2030s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2030
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2030s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2030s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2031s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2031
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2031s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2031s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2032s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2032
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2032s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2032s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2033s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2033
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2033s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2033s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2034s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2034
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2034s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2034s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2035s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2035
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2035s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2035s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2036s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2036
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2036s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2036s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2037s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2037
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2037s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2037s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2038s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2038
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2038s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2038s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2039s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2039
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2039s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2039s }}
                                    </td>
                                </tr>
                            @endif
                            @if ($bil_sesi_2040s != null)
                                <tr>
                                    {{-- <td class="text-sm text-center font-weight-normal">
                                    1</td> --}}
                                    <td class="text-sm text-center font-weight-normal">
                                        2040
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_sesi_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_memohon_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_menduduki_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_lulus_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_lulus_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $bil_gagal_2040s }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $percent_gagal_2040s }}
                                    </td>
                                </tr>
                            @endif
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
            $('#tablestatistikkeseluruhan').DataTable({
                dom: 'Blfrtip',
                "ordering": true,
                "searching": true,
                "info": true,
                "paging": true,
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                ],
                "oLanguage": {
                    "sSearch": "Carian:",
                    "sZeroRecords": "Tiada rekod ditemui",
                    "oPaginate": {
                        "sNext": ">",
                        "sPrevious": "<",
                    },
                    "sInfo": "Menunjukkan _START_ ke _END_ daripada _TOTAL_ data",
                    "sInfoEmpty": "Menunjukkan 0 ke 0 daripada 0 data",
                    "sLengthMenu": "Menunjukkan _MENU_ data",
                }
            });
        });
    </script>
@stop
