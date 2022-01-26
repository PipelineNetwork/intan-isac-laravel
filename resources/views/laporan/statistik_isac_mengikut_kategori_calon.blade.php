@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="javascript:;">
                        <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
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
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Statistik ISAC Mengikut
                    Kategori Calon</li>
            </ol>
            <h5 class="font-weight-bolder">Laporan Statistik ISAC Mengikut Kategori Calon</h5>
        </nav>
        <div class="card mt-3">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white"> Carian</h5>
            </div>

            <div class="card-body p-3">
                <div class="row p-3 pl-0 mb-0">
                    <form style="width: 100%;" (ngSubmit)="filterCharts()">

                        <div class="row">

                            <div class="col-6">
                                <label for="startdate">Tahun</label>
                                <input class="form-control form-control-sm" type="text" name="tahun"
                                    placeholder="Sila Pilih" id="tahun" autocomplete="off" />
                            </div>
                            <div class="col-6">
                                <label for="input_kategori_peserta">Kategori Peserta</label>
                                <select class="form-control form-control-sm" name="input_kategori_peserta"
                                    id="input_kategori_peserta">
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    <option value="1">Individu</option>
                                    <option value="2">Kumpulan</option>
                                </select>
                            </div>
                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                <button class="btn  bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                        class="fas fa-search"></i> cari</button>
                                <a href="/laporan/statistik-isac-mengikut-kategori-calon"
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
                        <h5 class="text-white"> STATISTIK PENCAPAIAN PENILAIAN ISAC </h5>
                        @if ($tahuns != null)
                            <h6 class="text-white">BAGI TAHUN {{ $tahuns }}</h6>
                        @else
                            <h6 class="text-white">SEHINGGA TAHUN {{ $tahun_semasas }}</h6>
                        @endif
                        @if ($kategoris == 1)
                            <h6 class="text-white">MENGIKUT KATEGORI INDIVIDU</h6>
                        @elseif ($kategoris == 2)
                            <h6 class="text-white">MENGIKUT KATEGORI KUMPULAN</h6>
                        @else
                            <h6 class="text-white">SEMUA KATEGORI </h6>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="tablepenilaianisacmengikutkategoricalon">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil.</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Kementerian</th>
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
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    1</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Jabatan Perdana Menteri
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_perdana_menteris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_perdana_menteris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_jabatan_perdana_menteris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_perdana_menteris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_perdana_menteris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_perdana_menteris }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    2</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kewangan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_kewangans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_kewangans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_kewangans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_kewangans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_kewangans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_kewangans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    3</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pengangkutan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pengangkutans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pengangkutans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pengangkutans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pengangkutans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pengangkutans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pengangkutans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    4</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kerja Raya
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_kerja_rayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_kerja_rayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_kerja_rayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_kerja_rayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_kerja_rayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_kerja_rayas }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    5</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Perdagangan Antarabangsa Dan Industri
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_perd_antarabangsa_industris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_perd_antarabangsa_industris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_perd_antarabangsa_industris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perd_antarabangsa_industris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_perd_antarabangsa_industris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_perd_antarabangsa_industris }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    6</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Perdagangan Dalam Negeri Dan Hal Ehwal Pengguna
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_perd_dalam_negeri_hal_ehwals }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_perd_dalam_negeri_hal_ehwals }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_perd_dalam_negeri_hal_ehwals }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perd_dalam_negeri_hal_ehwals }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_perd_dalam_negeri_hal_ehwals }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_perd_dalam_negeri_hal_ehwals }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    7</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Komunikasi dan Multimedia Malaysia
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_komunikasi_multimedias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_komunikasi_multimedias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_komunikasi_multimedias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_komunikasi_multimedias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_komunikasi_multimedias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_komunikasi_multimedias }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    8</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Sumber Manusia
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_sumber_manusias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_sumber_manusias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_sumber_manusias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_sumber_manusias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_sumber_manusias }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_sumber_manusias }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    9</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Perumahan Dan Kerajaan Tempatan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_perumahan_kerajaan_tempatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_perumahan_kerajaan_tempatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_perumahan_kerajaan_tempatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perumahan_kerajaan_tempatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_perumahan_kerajaan_tempatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_perumahan_kerajaan_tempatans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    10</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pertahanan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pertahanans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pertahanans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pertahanans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pertahanans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pertahanans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pertahanans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    11</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Luar Negeri
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_luar_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_luar_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_luar_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_luar_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_luar_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_luar_negeris }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    12</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Belia Dan Sukan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_belia_sukans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_belia_sukans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_belia_sukans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_belia_sukans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_belia_sukans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_belia_sukans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    13</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kesihatan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_kesihatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_kesihatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_kesihatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_kesihatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_kesihatans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_kesihatans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    14</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Perusahaan Awam
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_perusahaan_awams }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_perusahaan_awams }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_perusahaan_awams }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perusahaan_awams }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_perusahaan_awams }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_perusahaan_awams }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    15</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Wilayah Persekutuan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_wilayah_perseketuans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_wilayah_perseketuans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_wilayah_perseketuans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perusahaan_awams }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_wilayah_perseketuans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_wilayah_perseketuans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    16</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Undang-Undang/Kehakiman
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_undang_kehakimans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_undang_kehakimans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_undang_kehakimans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_undang_kehakimans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_undang_kehakimans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_undang_kehakimans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    17</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Jabatan Yang Tiada Berkementerian
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_undang_kehakimans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_tiada_kementerians }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    18</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Hal Ehwal Dalam Negeri
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_hal_ehwal_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_hal_ehwal_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_hal_ehwal_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_hal_ehwal_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_hal_ehwal_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_hal_ehwal_dalam_negeris }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    19</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Dalam Negeri
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_dalam_negeris }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_dalam_negeris }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    20</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Perusahaan, Perladangan dan Komuditi
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_perusahaan_perladangan_komuditis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_perusahaan_perladangan_komuditis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_perusahaan_perladangan_komuditis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perusahaan_perladangan_komuditis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_perusahaan_perladangan_komuditis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_perusahaan_perladangan_komuditis }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    21</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Usahawan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_usahawans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_usahawans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_usahawans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_usahawans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_usahawans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_usahawans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    22</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pertanian dan Industri Asas Tani
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pertanian_asas_tanis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pertanian_asas_tanis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pertanian_asas_tanis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pertanian_asas_tanis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pertanian_asas_tanis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pertanian_asas_tanis }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    23</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pelajaran
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pelajarans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pelajarans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pelajarans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pelajarans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pelajarans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pelajarans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    24</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pendidikan Malaysia
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pendidikans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    25</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kesenian, Kebudayaan Dan Warisan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pendidikans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pendidikans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    26</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pelancongan, Seni Dan Budaya Malaysia
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pelancongan_seni_budayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pelancongan_seni_budayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pelancongan_seni_budayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pelancongan_seni_budayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pelancongan_seni_budayas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pelancongan_seni_budayas }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    27</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Tenaga, Sains, Teknologi, Alam Sekitar & Perubahan Iklim (MESTECC)
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_tenaga_sains_teknologi_alam_sekitars }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_tenaga_sains_teknologi_alam_sekitars }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_tenaga_sains_teknologi_alam_sekitars }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_tenaga_sains_teknologi_alam_sekitars }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_tenaga_sains_teknologi_alam_sekitars }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_tenaga_sains_teknologi_alam_sekitars }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    28</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kemajuan Luar Bandar dan Wilayah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_luar_bandar_wilayahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_luar_bandar_wilayahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_luar_bandar_wilayahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_luar_bandar_wilayahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_luar_bandar_wilayahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_luar_bandar_wilayahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    29</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Air Tanah dan Sumber Asli
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_air_tanah_sumber_aslis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_air_tanah_sumber_aslis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_air_tanah_sumber_aslis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_air_tanah_sumber_aslis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_air_tanah_sumber_aslis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_air_tanah_sumber_aslis }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    30</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan dalam Negeri, Koperasi dan Kepenggunaan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_dalam_negeri_koperasis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_dalam_negeri_koperasis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_dalam_negeri_koperasis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_dalam_negeri_koperasis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_dalam_negeri_koperasis }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_dalam_negeri_koperasis }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    31</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Wanita, Keluarga dan Masyarakat
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_wanita_keluarga_masyarakats }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_wanita_keluarga_masyarakats }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_wanita_keluarga_masyarakats }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_wanita_keluarga_masyarakats }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_wanita_keluarga_masyarakats }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_wanita_keluarga_masyarakats }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    32</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Johor
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_johors }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    33</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Kedah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_kedahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_kedahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_kedahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_kedahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_kedahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_kedahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    34</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Kelantan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_johors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_johors }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    35</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Melaka
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_melakas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_melakas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_melakas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_melakas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_melakas }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_melakas }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    36</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Sembilan
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_sembilans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_sembilans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_sembilans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_sembilans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_sembilans }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_sembilans }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    37</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Pahang
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_pahangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_pahangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_pahangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_pahangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_pahangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_pahangs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    38</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Pulau Pinang
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_pulau_pinangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_pulau_pinangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_pulau_pinangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_pulau_pinangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_pulau_pinangs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_pulau_pinangs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    39</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Perak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_peraks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_peraks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_peraks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_peraks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_peraks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_peraks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    40</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Perlis
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_perliss }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_perliss }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_perliss }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_perliss }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_perliss }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_perliss }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    41</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Selangor
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_selangors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_selangors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_selangors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_selangors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_selangors }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_selangors }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    42</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Pentadbiran Kerajaan Negeri Terengganu
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_pejabat_terengganus }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_pejabat_terengganus }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_pejabat_terengganus }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_pejabat_terengganus }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_pejabat_terengganus }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_pejabat_terengganus }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    43</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Jabatan Ketua Menteri Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_ketua_menteri_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    44</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Luar Bandar Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_ketua_menteri_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    45</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kewangan Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_ketua_menteri_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_ketua_menteri_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    46</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Pertanian dan Industri Pemakanan Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_pertanian_industri_pemakanan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_pertanian_industri_pemakanan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_pertanian_industri_pemakanan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_pertanian_industri_pemakanan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_pertanian_industri_pemakanan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_pertanian_industri_pemakanan_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    47</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Insfrastruktur Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_insfrastruktur_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_insfrastruktur_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_insfrastruktur_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_insfrastruktur_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_insfrastruktur_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_insfrastruktur_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    48</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kerajaan Tempatan dan Perumahan Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_kerajaan_tempatan_perumahan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_kerajaan_tempatan_perumahan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_kerajaan_tempatan_perumahan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_kerajaan_tempatan_perumahan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_kerajaan_tempatan_perumahan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_kerajaan_tempatan_perumahan_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    49</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Masyarakat & Hal-Ehwal Pengguna Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_masyarakat_hal_ehwal_pengguna_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_masyarakat_hal_ehwal_pengguna_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_masyarakat_hal_ehwal_pengguna_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_masyarakat_hal_ehwal_pengguna_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_masyarakat_hal_ehwal_pengguna_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_masyarakat_hal_ehwal_pengguna_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    50</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Perindustrian Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_perindustrian_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_perindustrian_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_perindustrian_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_perindustrian_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_perindustrian_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_perindustrian_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    51</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kebudayaan, Belia dan Sukan Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_kebudayaan_belia_sukan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_kebudayaan_belia_sukan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_kebudayaan_belia_sukan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_kebudayaan_belia_sukan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_kebudayaan_belia_sukan_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_kebudayaan_belia_sukan_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    52</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Jabatan Sabah Yang Tiada Berkementerian
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_sabah_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_sabah_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_jabatan_sabah_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_sabah_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_sabah_tiada_kementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_sabah_tiada_kementerians }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    53</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pelancongan, Kebudayaan dan Alam Sekitar Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pelancongan_kebudayaan_alam_sekitar_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pelancongan_kebudayaan_alam_sekitar_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pelancongan_kebudayaan_alam_sekitar_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pelancongan_kebudayaan_alam_sekitar_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pelancongan_kebudayaan_alam_sekitar_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pelancongan_kebudayaan_alam_sekitar_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    54</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Sumber dan Kemajuan Teknologi Maklumat Sabah
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_sumber_kemajuan_teknologi_maklumat_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_sumber_kemajuan_teknologi_maklumat_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_sumber_kemajuan_teknologi_maklumat_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_sumber_kemajuan_teknologi_maklumat_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_sumber_kemajuan_teknologi_maklumat_sabahs }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_sumber_kemajuan_teknologi_maklumat_sabahs }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    55</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Jabatan Ketua Menteri Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_ketua_menteri_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_ketua_menteri_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_jabatan_ketua_menteri_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_ketua_menteri_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_ketua_menteri_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_ketua_menteri_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    56</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Kewangan dan Kemudahan Awam Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_kewangan_kemudahan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_kewangan_kemudahan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_kewangan_kemudahan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_kewangan_kemudahan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_kewangan_kemudahan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_kewangan_kemudahan_awam_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    57</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Infrastruktur & Perhubungan Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_insfrastruktur_perhubungan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_insfrastruktur_perhubungan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_insfrastruktur_perhubungan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_insfrastruktur_perhubungan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_insfrastruktur_perhubungan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_insfrastruktur_perhubungan_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    58</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Perancangan dan Pengurusan Sumber Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_perancangan_pengurusan_sumber_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_perancangan_pengurusan_sumber_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_perancangan_pengurusan_sumber_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perancangan_pengurusan_sumber_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_perancangan_pengurusan_sumber_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_perancangan_pengurusan_sumber_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    59</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pertanian & Industri Makanan Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pertanian_industri_makanan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pertanian_industri_makanan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pertanian_industri_makanan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pertanian_industri_makanan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pertanian_industri_makanan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pertanian_industri_makanan_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    60</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Alam Sekitar dan Kesihatan Awam Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_alam_sekitar_kesihatan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_alam_sekitar_kesihatan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_alam_sekitar_kesihatan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_alam_sekitar_kesihatan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_alam_sekitar_kesihatan_awam_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_alam_sekitar_kesihatan_awam_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    61</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Perumahan Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_perumahan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_perumahan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_perumahan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_perumahan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_perumahan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_perumahan_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    62</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Luar Bandar dan Kemajuan Tanah Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_luar_bandar_kemajuan_tanah_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_luar_bandar_kemajuan_tanah_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_luar_bandar_kemajuan_tanah_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_luar_bandar_kemajuan_tanah_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_luar_bandar_kemajuan_tanah_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_luar_bandar_kemajuan_tanah_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    63</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Perindustrian Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_perindustrian_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_perindustrian_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_perindustrian_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_perindustrian_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_perindustrian_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_perindustrian_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    64</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pelancongan Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pelancongan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pelancongan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pelancongan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pelancongan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pelancongan_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pelancongan_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    65</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Jabatan Sarawak Yang Tiada Berkementerian
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_jabatan_sarawak_tidak_berkementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_jabatan_sarawak_tidak_berkementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_jabatan_sarawak_tidak_berkementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_jabatan_sarawak_tidak_berkementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_jabatan_sarawak_tidak_berkementerians }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_jabatan_sarawak_tidak_berkementerians }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    66</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pembangunan Sosial dan Urbanisasi Sarawak
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    67</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Pengajian Tinggi
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    68</td>
                                <td class="text-sm text-center font-weight-normal">
                                    Kementerian Alam Sekitar dan Air
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_memohon_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_menduduki_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_lulus_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_lulus_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $bil_gagal_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    {{ $percent_gagal_kementerian_pembangunan_sosial_urbanisasi_sarawaks }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>Jumlah</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $bil_memohon_jumlahs }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $bil_menduduki_jumlahs }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $bil_lulus_jumlahs }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $percent_lulus_jumlahs }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $bil_gagal_jumlahs }}</b>
                                </td>
                                <td class="text-sm text-center font-weight-normal">
                                    <b>{{ $percent_gagal_jumlahs }}</b>
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
            $('#tablepenilaianisacmengikutkategoricalon').DataTable({
                dom: 'Bfrtip',
                pageLength: 70,
                // lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "ordering": false,
                "searching": true,
                "info": false,
                "paging": false,
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop
