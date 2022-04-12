<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    {{-- <link rel="icon" type="image/png" href="../../img/intan.png"> --}}
    <link rel="icon" type="image/png" href="../../img/intan.png">
    <title>
        ISAC
    </title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.min.css?v=1.0.3" rel="stylesheet" />
    <!-- Google Tag Manager -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
</head>

<body class="coworking">
    <?php
    
    use App\Models\Jadual;
    use App\Models\LamanUtama;
    use App\Models\PengumumanLamanUtama;
    
    $current_date = date('Y-m-d');
    $jaduals = Jadual::select('TARIKH_SESI', 'KOD_MASA_MULA', 'KOD_MASA_TAMAT', 'platform', 'status', 'keterangan', 'KEKOSONGAN')
        ->orderBy('TARIKH_SESI', 'asc')
        ->where('TARIKH_SESI', '>=', $current_date)
        ->where('KOD_KATEGORI_PESERTA', '01')
        ->get();
    
    $lamanutama = LamanUtama::all();
    $lamanutama2 = LamanUtama::all();
    $pengumuman_laman_utama = PengumumanLamanUtama::get();
    // dd($pengumuman_laman_utama);
    ?>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Navbar -->

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg  blur blur-rounded top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="/">
                            {{-- INTAN ISAC --}}
                            <img src="../../img/logo-isac.png" style="width: 60px; heigth: auto">
                        </a>
                        <button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover mx-auto">
                                <li class="nav-item mx-2">
                                    <a role="button" href="#infoisac"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                        Mengenai ISAC
                                    </a>
                                </li>

                                <li class="nav-item mx-2">
                                    <a role="button" href="#jadual"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                        Jadual
                                    </a>
                                </li>

                                <li class="nav-item mx-2">
                                    <a role="button" href="#contact"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                        Hubungi Kami
                                    </a>
                                </li>

                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="/authenticate-ic"
                                        class="btn btn-sm  bg-gradient-warning  btn-round mb-0 me-1"
                                        onclick="smoothToPricing('pricing-soft-ui')">DAFTAR SEKARANG</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <!-- -------- START HEADER 1 w/ text and image on right ------- -->
    <header>
        <div class="page-header">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                    style="background-image:url('img/JPA4.jpeg')">
                </div>
            </div>
            <div class="container">
                <div class="row vh-100">

                    <div
                        class="col-lg-6 col-md-7 d-flex justify-content-center text-md-start text-center flex-column mt-7">
                        <h1 class="text-gradient text-warning">ICT SKILLS ASSESSMENT</h1>
                        <h1 class="mb-4">& CERTIFICATION (ISAC)</h1>
                        <p class="lead pe-md-5 me-md-5">Sistem Penilaian Kemahiran ICT dan Pensijilan
                            bagi Penjawat Awam.</p>
                        <div class="mt-3">
                            <div class="card-body">
                                <form method="POST" action="/login">
                                    @csrf

                                    {{-- {{ Auth::user() }} --}}
                                    <label>ID Pengguna (No MyKad/Polis/Tentera)</label>
                                    <div>
                                        <x-input id="nric" class="form-control w-75" type="nric" name="nric"
                                            :value="old('nric')" required autofocus maxlength="12" size="12"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <label>Kata Laluan</label>
                                    <div>
                                        <x-input id="password" class="form-control w-75" type="password" name="password"
                                            required autocomplete="current-password" minlength="8" />
                                    </div>

                                    <a href="/forgot-password" target="_blank" style="color: red">Lupa Kata Laluan?</a>

                                    <div>
                                        <x-button class="btn bg-gradient-warning w-75 mt-3">
                                            {{ __('Log Masuk') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    <!-- -------- END HEADER 1 w/ text and image on right ------- -->
    <!-- -------- START Features w/ 4 cols w/ colored icon & title & text -------- -->

    <section class="py-md-7 bg-gradient-warning" id="infoisac">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="primary text-start border-radius-lg p-3">
                        <div class="icon">
                            <svg class="text-primary" width="25px" height="25px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>chart-pie-35</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1720.000000, -742.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(4.000000, 451.000000)">
                                                <path class="color-background"
                                                    d="M21.6666667,18.3333333 L39.915,18.3333333 C39.11,8.635 31.365,0.89 21.6666667,0.085 L21.6666667,18.3333333 Z"
                                                    opacity="0.602864583"></path>
                                                <path class="color-foreground"
                                                    d="M20.69,21.6666667 L7.09833333,35.2583333 C10.585,38.21 15.085,40 20,40 C30.465,40 39.0633333,31.915 39.915,21.6666667 L20.69,21.6666667 Z">
                                                </path>
                                                <path class="color-foreground"
                                                    d="M18.3333333,19.31 L18.3333333,0.085 C8.085,0.936666667 0,9.535 0,20 C0,24.915 1.79,29.415 4.74166667,32.9016667 L18.3333333,19.31 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        @foreach ($lamanutama as $lamanutama)
                            @if ($lamanutama->STATUS == '02')
                                @if ($lamanutama->TAJUK == 'Objektif')
                                    <h5 class="mt-3" style="color: black">{{ $lamanutama->TAJUK }}</h5>
                                    <p>
                                        {!! $lamanutama->KETERANGAN !!}
                                    </p>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="primary text-start border-radius-lg mt-4 p-3">
                        <div class="icon">
                            <svg class="text-primary" width="25px" height="25px" viewBox="0 0 42 44" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>time-alarm</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -440.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="time-alarm" transform="translate(603.000000, 149.000000)">
                                                <path class="color-background"
                                                    d="M18.8086957,4.70034783 C15.3814926,0.343541521 9.0713063,-0.410050841 4.7145,3.01715217 C0.357693695,6.44435519 -0.395898667,12.7545415 3.03130435,17.1113478 C5.53738466,10.3360568 11.6337901,5.54042955 18.8086957,4.70034783 L18.8086957,4.70034783 Z"
                                                    opacity="0.6"></path>
                                                <path class="color-background"
                                                    d="M38.9686957,17.1113478 C42.3958987,12.7545415 41.6423063,6.44435519 37.2855,3.01715217 C32.9286937,-0.410050841 26.6185074,0.343541521 23.1913043,4.70034783 C30.3662099,5.54042955 36.4626153,10.3360568 38.9686957,17.1113478 Z"
                                                    opacity="0.6"></path>
                                                <path class="color-foreground"
                                                    d="M34.3815652,34.7668696 C40.2057958,27.7073059 39.5440671,17.3375603 32.869743,11.0755718 C26.1954189,4.81358341 15.8045811,4.81358341 9.13025701,11.0755718 C2.45593289,17.3375603 1.79420418,27.7073059 7.61843478,34.7668696 L3.9753913,40.0506522 C3.58549114,40.5871271 3.51710058,41.2928217 3.79673036,41.8941824 C4.07636014,42.4955431 4.66004722,42.8980248 5.32153275,42.9456105 C5.98301828,42.9931963 6.61830436,42.6784048 6.98113043,42.1232609 L10.2744783,37.3434783 C16.5555112,42.3298213 25.4444888,42.3298213 31.7255217,37.3434783 L35.0188696,42.1196087 C35.6014207,42.9211577 36.7169135,43.1118605 37.53266,42.5493622 C38.3484064,41.9868639 38.5667083,40.8764423 38.0246087,40.047 L34.3815652,34.7668696 Z M30.1304348,25.5652174 L21,25.5652174 C20.49574,25.5652174 20.0869565,25.1564339 20.0869565,24.6521739 L20.0869565,15.5217391 C20.0869565,15.0174791 20.49574,14.6086957 21,14.6086957 C21.50426,14.6086957 21.9130435,15.0174791 21.9130435,15.5217391 L21.9130435,23.7391304 L30.1304348,23.7391304 C30.6346948,23.7391304 31.0434783,24.1479139 31.0434783,24.6521739 C31.0434783,25.1564339 30.6346948,25.5652174 30.1304348,25.5652174 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h5 class="mt-3" style="color: black">FORMAT PENILAIAN</h5>
                        <p>
                        <ul style="color: black">
                            <li>Bahagian 1 - Ujian pengetahuan yang mengandungi 40 soalan objektif yang perlu dijawab
                                dalam masa 20 minit</li>
                            <li>Bahagian 2 - Ujian kemahiran yang mengandungi 3 soalan dan calon-calon dikehendaki
                                menjawab semua soalan tersebut dalam masa 40 minit.</li>
                        </ul>
                        </p>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="primary text-start border-radius-lg p-3">
                        <div class="icon">
                            <svg class="text-primary " width="25px" height="25px" viewBox="0 0 43 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                                <path class="color-background"
                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                    opacity="0.593633743"></path>
                                                <path class="color-foreground"
                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h5 class="mt-3" style="color: black">KURIKULUM</h5>
                        <p style="color: black">Bahagian 1 - Penilaian pengetahuan yang merangkumi : <br>
                        <ul style="color: black">
                            <li>Software </li>
                            <li>ICT Security </li>
                            <li>Inisiatif ICT Sektor Awam</li>
                            <li>Rangkaian dan Wifi </li>
                            <li>Government Mobility</li>
                            <li>Media Sosial</li>

                        </ul>
                        </p>
                        <br>
                        <p style="color: black"> Bahagian 2 - Menilai kemahiran dalam : <br>
                        <ul style="color: black">
                            <li>Mencari dan memperolehi maklumat menggunakan internet.</li>
                            <li>Menyediakan dokumen pemprosesan atau dokumen persembahan berkaitan dengan pengendalian
                                tugas-tugas asas.</li>
                            <li>Berkomunikasi secara elektronik melalui emel.</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- -------- START Features w/ icons and text on left & gradient title and text on right -------- -->
    <section class="py-sm-7 py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center" style="margin: auto;">
                    <h3 class="text-gradient text-warning mb-0 mt-2">Taklimat Penilaian ISAC</h3>
                    <br>
                    <iframe
                        src="/assets/video/Manual_Pendaftaran_Calon_ICT_Skills_Assessment_and_Certification_(ISAC).mp4"
                        frameborder="0" style="height: 500px; width:800px; border-radius: 10px"
                        sandbox></iframe>

                    <p><a href="documents/MANUAL_PENDAFTARAN_ISAC_1.pdf" download="MANUAL PENDAFTARAN ISAC.pdf"
                            target="_blank">Sila klik <span style="color: red">disini</span> untuk muat turun Manual
                            Pendaftaran ISAC</a></p>
                </div>
                <div class="col-lg-6">
                    <br>
                    <br>
                    <h3 class="text-gradient text-warning mb-0 mt-2">Mengenai ISAC</h3>
                    <h3></h3>
                    <p>Penilaian ICT Skills Assessment and Certification (ISAC) dilaksanakan untuk menilai tahap
                        kefahaman dan kemahiran penggunaan teknologi maklumat dan komunikasi (ICT) di kalangan personel
                        sektor awam. Ia merupakan satu alat bagi mengukur kesediaan personel sektor awam untuk bekerja
                        dalam persekitaran Kerajaan Elektronik dari segi pengetahuan dan kemahiran dalam penggunaan asas
                        perisian-perisian ICT yang sering di guna pakai (commonly used).
                    </p>
                </div>
                <div class="col-lg-6 ">
                    <div class="p-3 info-horizontal">
                        <br><br>
                        <div class="icon icon-shape rounded-circle bg-gradient-warning shadow text-center">
                            <i class="fas fa-handshake opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                            <p class="mb-0">VISI<br>Untuk Menjadi Institusi Pembelajaran Sektor Awam yang
                                Unggul</p>
                        </div>
                    </div>
                    <div class="p-3 info-horizontal">
                        <div class="icon icon-shape rounded-circle bg-gradient-warning shadow text-center">
                            <i class="fas fa-hourglass opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                            <p class="mb-0">MISI<br>Untuk Membangunkan Modal Insan Sektor Awam yang Kompeten
                                Melalui Pembelajaran Berkualiti</p>
                        </div>
                    </div>
                    {{-- <div class="p-3 info-horizontal">
                        <img src="https://www.intanbk.intan.my/iportal/images/adminsep.jpg" width="620" height="300">
                        <b style="text-align:center;">&emsp;&emsp;The National Institute of Public Administration
                            (INTAN) Port Dickson</b>
                    </div> --}}
                </div>
            </div>


            @foreach ($lamanutama2 as $lamanutama2)
                @if ($lamanutama2->STATUS == '02')
                    @if ($lamanutama2->TAJUK != 'Objektif')
                        <div class="row mt-4">
                            <div class="col-12">
                                <h3 class="text-gradient text-warning mb-0 mt-2">{{ $lamanutama2->TAJUK }}</h3>
                                <h3></h3>
                                <p>{!! $lamanutama2->KETERANGAN !!}</p>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach

            <div class="row pt-5" id="jadual">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Senarai Jadual Penilaian</b>
                        </div>
                        <div class="table-responsive" style="background-color:  #FAFAD2; border-radius: 10px">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-penjadualan">

                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh
                                            Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa
                                            Mula</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Saluran
                                            Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Status
                                            Jadual</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($jaduals as $jadual)
                                        <tr>
                                            {{-- <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">
                                                {{ date('d-m-Y', strtotime($jadual['TARIKH_SESI'])) }}
                                            </td> --}}
                                            <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($jadual['TARIKH_SESI'])) }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $jadual['KOD_MASA_MULA'] }}
                                                {{-- {{ date('h-i', strtotime($jadual['TARIKH_SESI'])) }} --}}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $jadual->platform }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($jadual->status == null)
                                                    @if ($jadual->KEKOSONGAN == '0')
                                                        <span class="badge badge-lg badge-danger">Penuh</span>
                                                    @elseif ($jadual->KEKOSONGAN < '0')
                                                        <span class="badge badge-lg badge-danger">Penuh</span>
                                                    @else
                                                        <span class="badge badge-lg badge-success">Dibuka</span>
                                                    @endif
                                                @elseif ($jadual->status == 'Perubahan')
                                                    @if ($jadual->KEKOSONGAN == '0')
                                                        <span class="badge badge-lg badge-danger">Penuh</span>
                                                    @elseif ($jadual->KEKOSONGAN < '0')
                                                        <span class="badge badge-lg badge-danger">Penuh</span>
                                                    @else
                                                        <span class="badge badge-lg badge-success">Dibuka</span>
                                                    @endif
                                                @else
                                                    <span
                                                        class="badge badge-lg badge-info">{{ $jadual->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($pengumuman_laman_utama as $pengumuman_laman_utama)
        @if ($pengumuman_laman_utama->status_pengumuman == 'Aktif')
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#FFA500;">
                            <h3 class="modal-title text-white">
                                {!! $pengumuman_laman_utama->tajuk_header !!}</h3>
                        </div>
                        <div class="modal-body">
                            @if ($pengumuman_laman_utama->tajuk_pengumuman != null)
                                <p>{!! $pengumuman_laman_utama->tajuk_pengumuman !!}</p>
                                @if ($pengumuman_laman_utama->subtajuk_pengumuman != null)
                                    <p>{!! $pengumuman_laman_utama->subtajuk_pengumuman !!}</p>
                                @endif
                            @endif

                            @if ($pengumuman_laman_utama->pengumuman_1 != null)
                                <p>{!! $pengumuman_laman_utama->pengumuman_1 !!}</p>
                                @if ($pengumuman_laman_utama->subpengumuman_1 != null)
                                    <p>{!! $pengumuman_laman_utama->subpengumuman_1 !!}</p>
                                @endif
                            @endif

                            @if ($pengumuman_laman_utama->pengumuman_2 != null)
                                <p>{!! $pengumuman_laman_utama->pengumuman_2 !!}</p>
                                @if ($pengumuman_laman_utama->subpengumuman_2 != null)
                                    <p>{!! $pengumuman_laman_utama->subpengumuman_2 !!}</p>
                                @endif
                            @endif

                            @if ($pengumuman_laman_utama->pengumuman_3 != null)
                                <p>{!! $pengumuman_laman_utama->pengumuman_3 !!}</p>
                                @if ($pengumuman_laman_utama->subpengumuman_3 != null)
                                    <p>{!! $pengumuman_laman_utama->subpengumuman_3 !!}</p>
                                @endif
                            @endif

                            @if ($pengumuman_laman_utama->pengumuman_4 != null)
                                <p>{!! $pengumuman_laman_utama->pengumuman_4 !!}</p>
                                @if ($pengumuman_laman_utama->subpengumuman_4 != null)
                                    <p>{!! $pengumuman_laman_utama->subpengumuman_4 !!}</p>
                                @endif
                            @endif

                            @if ($pengumuman_laman_utama->status_button_manual == 'Aktif')
                                @if ($pengumuman_laman_utama->pengumuman_button_manual != null)
                                    <p>{!! $pengumuman_laman_utama->pengumuman_button_manual !!}</p>
                                    <p><a class="btn btn-success" href="documents/MANUAL_PENDAFTARAN_ISAC_1.pdf"
                                            download="MANUAL PENDAFTARAN ISAC.pdf" target="_blank">Manual Pendaftaran
                                            ISAC</a>
                                    </p>
                                @endif
                            @endif

                            @if ($pengumuman_laman_utama->pengumuman_5 != null)
                                <p>{!! $pengumuman_laman_utama->pengumuman_5 !!}</p>
                                @if ($pengumuman_laman_utama->subpengumuman_5 != null)
                                    <p>{!! $pengumuman_laman_utama->subpengumuman_5 !!}</p>
                                @endif
                            @endif

                            @if ($pengumuman_laman_utama->pengumuman_6 != null)
                                <p>{!! $pengumuman_laman_utama->pengumuman_6 !!}</p>
                                @if ($pengumuman_laman_utama->subpengumuman_6 != null)
                                    <p>{!! $pengumuman_laman_utama->subpengumuman_6 !!}</p>
                                @endif
                            @endif

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary"
                                data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(window).on('load', function() {
                    $('#exampleModal').modal('show');
                });
            </script>
        @endif
    @endforeach

    <footer class="footer pt-4 mt-3" id="contact">
        <hr class="horizontal dark mb-5">
        <div class="container">
            <div class=" row">
                <div class="col-md-4 mb-4">
                    <div style="padding-left: 5rem">
                        <h6 class="text-gradient text-warning text-sm">
                            Alamat Surat Menyurat :</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link">
                                    Unit Aplikasi Penilaian dan Portal <br>
                                    Sub-Kluster Aplikasi, Portal dan Multimedia <br>
                                    Kluster Inovasi Teknologi Pengurusan (i-MATEC) <br>
                                    Institut Tadbiran Awam Negara (INTAN) Bukit Kiara <br>
                                    Jalan Bukit Kiara <br>
                                    50480 Kuala Lumpur, Malaysia <br>
                                    Tel: 2084 7713/7726/7703/7798 <br>
                                    E-mel: dlisachelp@intanbk.intan.my <br>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div style="padding-left: 5rem">
                        <h6 class="text-gradient text-warning text-sm">
                            Pautan :</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link">Jabatan Perkhidmatan Awam</a>
                                <a class="nav-link" href="https://www.jpa.gov.my/"
                                    target="_blank">https://www.jpa.gov.my/<br>
                                </a>
                                <br>
                                <a class="nav-link">INTAN Bukit Kiara</a>
                                <a class="nav-link" href="https://www.intanbk.intan.my/"
                                    target="_blank">https://www.intanbk.intan.my/</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h6 class="text-gradient text-warning font-weight-bolder">Institut Tadbiran Awam Negara
                                </h6>
                            </div>
                            <div class="col-12 text-center">
                                <img src="https://docs.jpa.gov.my/cdn/images/ePerkhidmatan/BLUE/EN/INTAN.jpg"
                                    width="150" height="150">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="text-center">
                        <!-- <p class="my-4 text-sm">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Soft UI Design System by <a href="https://www.creative-tim.com"
                                target="_blank">Creative Tim</a>.
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script src="../../assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasicPenjadualan = new simpleDatatables.DataTable("#datatable-penjadualan", {
            searchable: false,
            fixedHeight: true
        });
    </script>

    <script>
        $("a[href^='#']").click(function(e) {
            e.preventDefault();

            var position = $($(this).attr("href")).offset().top;

            $("body, html").animate({
                scrollTop: position
            } /* speed */ );
        });
    </script>
</body>

</html>
