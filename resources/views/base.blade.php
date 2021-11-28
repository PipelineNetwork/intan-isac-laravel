<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        ISAC
    </title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, soft ui dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, soft design, soft dashboard bootstrap 5 dashboard">
    <meta name="description"
        content="Soft UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Soft UI Dashboard PRO by Creative Tim">
    <meta name="twitter:description"
        content="Soft UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/487/thumb/opt_sdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Soft UI Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url"
        content="https://demos.creative-tim.com/soft-ui-dashboard-pro/pages/dashboards/default.html" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/487/thumb/opt_sdp_thumbnail.jpg" />
    <meta property="og:description"
        content="Soft UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />
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
    {{-- datatable.net --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!-- Anti-flicker snippet (recommended)  -->
    <style>
        .async-hide {
            opacity: 0 !important
        }

    </style>
    <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script>
    <!-- Analytics-Optimize Snippet -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script>
    <!-- end Analytics-Optimize Snippet -->
    <!-- Google Tag Manager -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php
        use Illuminate\Support\Facades\Auth;
        $current_user = Auth::user()->user_group_id;
        $checkid2 = Auth::user()->id;
        if ($current_user == 5) {
            $user_profils = DB::table('users')
                ->where('id', '=', $checkid2)
                ->join('pro_peserta', 'users.id', '=', 'pro_peserta.user_id')
                ->join('pro_tempat_tugas', 'pro_peserta.ID_PESERTA', '=', 'pro_tempat_tugas.ID_PESERTA')
                ->join('pro_perkhidmatan', 'pro_peserta.ID_PESERTA', '=', 'pro_perkhidmatan.ID_PESERTA')
                ->select('users.*', 'pro_tempat_tugas.*', 'pro_peserta.*', 'pro_perkhidmatan.*')
                ->get()->first();
        } else {
            $user_profils = Auth::user();
        }
    ?>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main" style="z-index: 98;">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" target="_blank">
                <img src="https://docs.jpa.gov.my/cdn/images/ePerkhidmatan/BLUE/EN/INTAN.jpg"
                    class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">ISAC</span>
            </a>
        </div>

        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto h-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                {{-- <li class="nav-item">
                    <a href="dashboard" class="nav-link active" aria-controls="dashboard" role="button"
                        aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                    opacity="0.598981585"></path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Dashboards</span>
                    </a>
                </li> --}}

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '5')) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-alt me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <?php
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="/profil">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-alt me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#pentadbiranpenggunadrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fas fa-house-user me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pentadbiran <br> Pengguna</span>
                    </a>
                    <div class="collapse " id="pentadbiranpenggunadrop">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/kebenaran_pengguna">
                                    <span class="sidenav-normal"> Kebenaran Kumpulan <br> Pengguna </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/pengurusanpengguna">
                                    <span class="sidenav-normal"> Pengurusan Pengguna </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                {{-- <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3')) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/pengurusanpengguna">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-users me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengurusan Pengguna</span>
                    </a>
                </li>
                <?php
                }
                ?> --}}

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2')) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/jaduals">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-calendar-alt me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengurusan Jadual</span>
                    </a>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#permohonanadrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fas fa-edit me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Permohonan <br> Penilaian</span>
                    </a>
                    <div class="collapse " id="permohonanadrop">
                        <ul class="nav ms-4 ps-3">
                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/mohonpenilaian">
                                    <span class="sidenav-normal"> Senarai Permohonan </span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="#">
                                    <span class="sidenav-normal"> Senarai Rayuan Calon <br> Blacklist </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '5')) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/mohonpenilaian">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-edit me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Permohonan <br> Penilaian</span>
                    </a>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#pengurusanpenilaiandrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fas fa-user-clock me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pengurusan <br> Penilaian</span>
                    </a>
                    <div class="collapse " id="pengurusanpenilaiandrop">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/pengurusan_penilaian/pemilihan_soalan_pengetahuan">
                                    <span class="sidenav-normal"> Pemilihan Soalan <br> Pengetahuan </span>
                                </a>
                            </li>
                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/keputusan_penilaian">
                                    <span class="sidenav-normal"> Senarai Slip Keputusan </span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/senarai_sijil">
                                    <span class="sidenav-normal"> Senarai Sijil Kelulusan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/semak_jawapan">
                                    <span class="sidenav-normal"> Semakan Jawapan </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && ( Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3' || Auth::user()->user_group_id == '4' || Auth::user()->user_group_id == '5')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#penilaiandrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fab fa-wpforms me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Penilaian</span>
                    </a>
                    <div class="collapse " id="penilaiandrop">
                        <ul class="nav ms-4 ps-3">
                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3' || Auth::user()->user_group_id == '4')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/kemasukan-id">
                                    <span class="sidenav-normal"> Jawab Penilaian <br> (Pemantauan)</span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>

                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '5')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/kemasukan-id">
                                    <span class="sidenav-normal"> Jawab Penilaian </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/semakan_keputusan_calon">
                                    <span class="sidenav-normal"> Semakan Keputusan </span>
                                </a>
                            </li>
                            {{-- <li class="nav-item ">
                                <a class="nav-link " href="/soalan-pengetahuan">
                                    <span class="sidenav-normal"> Soalan Pengetahuan </span>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item ">
                                <a class="nav-link " href="/soalan-kemahiran">
                                    <span class="sidenav-normal"> Soalan Kemahiran </span>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#soalankemahiran">
                                    <span class="sidenav-normal"> Soalan Kemahiran <b class="caret"></b></span>
                                </a>
                                <div class="collapse " id="soalankemahiran">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="/soalan-kemahiran-internet">
                                                <span class="sidenav-normal"> Internet </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="/soalan-kemahiran-word">
                                                <span class="sidenav-normal"> Pemprosesan Perkataan </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="/soalan-kemahiran-email">
                                                <span class="sidenav-normal"> E-mel </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#banksoalandrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fas fa-question-circle me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Bank Soalan</span>
                    </a>
                    <div class="collapse " id="banksoalandrop">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/bank-soalan-pengetahuan">
                                    <span class="sidenav-normal"> Bank Soalan Pengetahuan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/bank-soalan-kemahiran">
                                    <span class="sidenav-normal"> Bank Soalan Kemahiran </span>
                                </a>
                            </li>
                            {{-- <li class="nav-item ">
                                <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                    href="#banksoalankemahirandropdown">
                                    <span class="sidenav-normal"> Kemahiran</span>
                                </a>
                                <div class="collapse " id="banksoalankemahirandropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="/bank-soalan-kemahiran/internet">
                                                <span class="sidenav-normal"> Internet </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="/bank-soalan-kemahiran/pemprosesan-perkataan">
                                                <span class="sidenav-normal"> Pemprosesan <br>Perkataan </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="/bank-soalan-kemahiran/emel">
                                                <span class="sidenav-normal"> Internet </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '5')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#aduanrayuandrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fas fa-heartbeat me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Aduan dan Rayuan</span>
                    </a>
                    <div class="collapse " id="aduanrayuandrop">
                        <ul class="nav ms-4 ps-3">
                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/balasaduans">
                                    <span class="sidenav-normal"> Balas Aduan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/balasrayuans">
                                    <span class="sidenav-normal"> Balas Rayuan </span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>

                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '5')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/tambahaduans">
                                    <span class="sidenav-normal"> Hantar Aduan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/tambahrayuans">
                                    <span class="sidenav-normal"> Hantar Rayuan </span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '4' || Auth::user()->user_group_id == '6')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#laporandrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fas fa-chart-bar me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                    <div class="collapse " id="laporandrop">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                {{-- <a class="nav-link " href="/laporan/penilaian-isac-mengikut-kementerian-jabatan">
                                    <span class="sidenav-normal"> Laporan Penilaian ISAC Mengikut Kementerian & Jabatan
                                    </span>
                                </a> --}}
                                <a class="nav-link " href="/laporan/penilaian-isac-mengikut-kementerian">
                                    <span class="sidenav-normal"> Laporan Penilaian ISAC <br> Mengikut Kementerian
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/laporan/senarai-keputusan-penilaian">
                                    <span class="sidenav-normal"> Laporan Senarai <br> Keputusan Penilaian </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link "
                                    href="/laporan/statistik-penilaian-mengikut-klasifikasi-gred-jawatan">
                                    <span class="sidenav-normal"> Laporan Statistik Penilaian <br> Mengikut Klasifikasi <br> Gred
                                        & Jawatan
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/laporan/statistik-keseluruhan">
                                    <span class="sidenav-normal"> Laporan Statistik <br> Keseluruhan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link "
                                    href="/laporan/statistik-keseluruhan-pencapaian-penilaian-isac-mengikut-bulan">
                                    <span class="sidenav-normal"> Laporan Statistik <br> Keseluruhan Pencapaian <br> Penilaian
                                        ISAC Mengikut <br> Bulan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/laporan/statistik-isac-mengikut-kategori-calon">
                                    <span class="sidenav-normal"> Laporan Statistik ISAC <br> Mengikut Kategori Calon
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/laporan/keseluruhan-penilaian-isac-mengikut-iac">
                                    <span class="sidenav-normal"> Laporan Keseluruhan <br> Penilaian ISAC Mengikut <br> IAC
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/laporan/aduan">
                                    <span class="sidenav-normal"> Laporan Statistik Aduan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/laporan/rayuan">
                                    <span class="sidenav-normal"> Laporan Statistik Rayuan </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1')) {
                ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#kawalansistemdrop" class="nav-link "
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fas fa-cogs me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kawalan Sistem</span>
                    </a>
                    <div class="collapse " id="kawalansistemdrop">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/selenggara_kawalan_sistem">
                                    <span class="sidenav-normal"> Maklumat Selenggara <br> Kawalan Sistem </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/notifikasi_email">
                                    <span class="sidenav-normal"> Maklumat Notifikasi E-mel </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/laman_utama">
                                    <span class="sidenav-normal"> Maklumat Laman Utama </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/videodannota">
                                    <span class="sidenav-normal"> Maklumat Video dan <br> Nota </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </aside>

    <!-- Navbar -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
            id="navbarBlur">
            <div class="container-fluid px-0">
                @auth
                    <div class="card card-body blur shadow-blur m-0">
                        <div class="row align-items-center px-4">
                            <div class="col-lg-10">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        {{ $user_profils->name }}
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{ $user_profils->email }}
                                    </p>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        @if ($user_profils->user_group_id == 1)
                                            Pentadbir Sistem
                                        @elseif ($user_profils->user_group_id == 2)
                                            Pentadbir Penilaian
                                        @elseif ($user_profils->user_group_id == 3)
                                            Penyelaras
                                        @elseif ($user_profils->user_group_id == 4)
                                            Pengawas
                                        @elseif ($user_profils->user_group_id == 5)
                                            Calon
                                        @else
                                            Pegawai Korporat
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-2 text-end">
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button class="btn mb-0 bg-gradient-danger" type="submit">Log Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endauth
                <div class=" mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here..."> -->
                        </div>
                    </div>
                    @guest
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a href="/login" class="nav-link text-body font-weight-bold px-0" target="_self">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Log Masuk</span>
                                </a>
                            </li>
                            &emsp;&emsp;
                            <ul class="navbar-nav  justify-content-end">
                                <li class="nav-item d-flex align-items-center">
                                    <a href="/register" class="nav-link text-body font-weight-bold px-0" target="_self">
                                        <i class="fa fa-user me-sm-1"></i>
                                        <span class="d-sm-inline d-none">Daftar</span>
                                    </a>
                                </li> &emsp;&emsp;
                            </ul>
                        </ul>
                    @endguest
                    
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </div>

            </div>
        </nav>
        <!-- End Navbar -->
        @yield('content')

        <!-- <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Kanban scripts -->
    <script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="../../assets/js/plugins/threejs.js"></script>
    <script src="../../assets/js/plugins/orbit-controls.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>

</body>

</html>
