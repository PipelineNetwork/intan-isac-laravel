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
    {{-- ck editor --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
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
                        <span class="nav-link-text ms-1">Pentadbiran Pengguna</span>
                    </a>
                    <div class="collapse " id="pentadbiranpenggunadrop">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/kebenaran-kumpulan-pengguna">
                                    <span class="sidenav-normal"> Kebenaran Kumpulan Pengguna </span>
                                </a>
                            </li>
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
                ?>

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
                        <span class="nav-link-text ms-1">Permohonan</span>
                    </a>
                    <div class="collapse " id="permohonanadrop">
                        <ul class="nav ms-4 ps-3">
                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/permohonan/senarai">
                                    <span class="sidenav-normal"> Senarai Permohonan </span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/permohonan/rayuan-calon-blacklist">
                                    <span class="sidenav-normal"> Senarai Rayuan Calon Blacklist </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                }
                ?>

                <?php
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '3' || Auth::user()->user_group_id == '5')) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/mohonpenilaian">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-edit me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Permohonan Penilaian</span>
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
                        <span class="nav-link-text ms-1">Pengurusan Penilaian</span>
                    </a>
                    <div class="collapse " id="pengurusanpenilaiandrop">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item ">
                                <a class="nav-link " href="/pemilihan-soalan-pengetahuan">
                                    <span class="sidenav-normal"> Pemilihan Soalan Pengetahuan </span>
                                </a>
                            </li>
                            <?php
                            if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '1' || Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '3')) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/senarai-slip_keputusan">
                                    <span class="sidenav-normal"> Senarai Slip Keputusan </span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link " href="/senarai-sijil-kelulusan">
                                    <span class="sidenav-normal"> Senarai Sijil Kelulusan </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/semakan-jawapan">
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
                                <a class="nav-link " href="/id-penilaian">
                                    <span class="sidenav-normal"> Kemasukan ID Penilaian </span>
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
                                    <span class="sidenav-normal"> Kemasukan ID Penilaian </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/semakan-keputusan">
                                    <span class="sidenav-normal"> Semakan Keputusan </span>
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
                        <span class="nav-link-text ms-1">Pengurusan Aduan dan Rayuan</span>
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
                if (isset(Auth::user()->user_group_id) && (Auth::user()->user_group_id == '2' || Auth::user()->user_group_id == '4' || Auth::user()->user_group_id == '6')) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/laporan">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-chart-bar me-sm-1 text-dark"></i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
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
                                <a class="nav-link " href="/balasaduans">
                                    <span class="sidenav-normal"> Maklumat Selenggara Kawalan Sistem </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/balasrayuans">
                                    <span class="sidenav-normal"> Maklumat Notifikasi E-mel </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/tambahaduans">
                                    <span class="sidenav-normal"> Maklumat Laman Utama </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/tambahrayuans">
                                    <span class="sidenav-normal"> Maklumat Video dan Nota </span>
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
        <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
            id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40"
                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title></title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <!-- <path
                                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                    </path> -->
                                                    <!-- <path
                                                        d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                    </path> -->
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <!-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li> -->
                        <!-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Default</li> -->
                    </ol>
                    <!-- <h6 class="font-weight-bolder mb-0">Default</h6> -->
                </nav>
                <!-- <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </div> -->
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
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
                            @endguest
                            @auth
                                <ul class="navbar-nav ml-auto mb-2 mb-md-0">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/welcome"></a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <a class="dropdown-item border-radius-md" href="#"
                                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        this.closest('form').submit();">
                                                <div class="d-flex py-1">

                                                    {{ __('Log Keluar') }}

                                                </div>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            @endauth
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <!-- <a href="javascript:;" class="nav-link text-body p-0">
                                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                    </a> -->
                            </li>
                            {{-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../../assets/img/team-2.jpg"
                                                        class="avatar avatar-sm  me-3 " alt="user image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span> from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../../assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm bg-gradient-dark  me-3 "
                                                        alt="logo spotify">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New album</span> by Travis
                                                        Scott
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        1 day
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>credit-card</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background"
                                                                            d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                            opacity="0.593633743"></path>
                                                                        <path class="color-background"
                                                                            d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Payment successfully completed
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        2 days
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                        </ul>
                    </ul>
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
    {{-- <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg blur">
            <div class="card-header pb-0 pt-3  bg-transparent ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark mb-1">
                <div class="mt-2">
                    <h6 class="mb-0">Sidenav Mini</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize"
                        onclick="navbarMinimize(this)">
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-info w-100"
                    href="https://www.creative-tim.com/product/soft-ui-dashboard-pro">Buy now</a>
                <a class="btn bg-gradient-dark w-100"
                    href="https://www.creative-tim.com/product/soft-ui-dashboard">Free
                    demo</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/ct-soft-ui-dashboard-pro"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20PRO%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-pro"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-pro"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

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
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        (function() {
            const container = document.getElementById("globe");
            const canvas = container.getElementsByTagName("canvas")[0];

            const globeRadius = 100;
            const globeWidth = 4098 / 2;
            const globeHeight = 1968 / 2;

            function convertFlatCoordsToSphereCoords(x, y) {
                let latitude = ((x - globeWidth) / globeWidth) * -180;
                let longitude = ((y - globeHeight) / globeHeight) * -90;
                latitude = (latitude * Math.PI) / 180;
                longitude = (longitude * Math.PI) / 180;
                const radius = Math.cos(longitude) * globeRadius;

                return {
                    x: Math.cos(latitude) * radius,
                    y: Math.sin(longitude) * globeRadius,
                    z: Math.sin(latitude) * radius
                };
            }

            function makeMagic(points) {
                const {
                    width,
                    height
                } = container.getBoundingClientRect();

                // 1. Setup scene
                const scene = new THREE.Scene();
                // 2. Setup camera
                const camera = new THREE.PerspectiveCamera(45, width / height);
                // 3. Setup renderer
                const renderer = new THREE.WebGLRenderer({
                    canvas,
                    antialias: true
                });
                renderer.setSize(width, height);
                // 4. Add points to canvas
                // - Single geometry to contain all points.
                const mergedGeometry = new THREE.Geometry();
                // - Material that the dots will be made of.
                const pointGeometry = new THREE.SphereGeometry(0.5, 1, 1);
                const pointMaterial = new THREE.MeshBasicMaterial({
                    color: "#989db5",
                });

                for (let point of points) {
                    const {
                        x,
                        y,
                        z
                    } = convertFlatCoordsToSphereCoords(
                        point.x,
                        point.y,
                        width,
                        height
                    );

                    if (x && y && z) {
                        pointGeometry.translate(x, y, z);
                        mergedGeometry.merge(pointGeometry);
                        pointGeometry.translate(-x, -y, -z);
                    }
                }

                const globeShape = new THREE.Mesh(mergedGeometry, pointMaterial);
                scene.add(globeShape);

                container.classList.add("peekaboo");

                // Setup orbital controls
                camera.orbitControls = new THREE.OrbitControls(camera, canvas);
                camera.orbitControls.enableKeys = false;
                camera.orbitControls.enablePan = false;
                camera.orbitControls.enableZoom = false;
                camera.orbitControls.enableDamping = false;
                camera.orbitControls.enableRotate = true;
                camera.orbitControls.autoRotate = true;
                camera.position.z = -265;

                function animate() {
                    // orbitControls.autoRotate is enabled so orbitControls.update
                    // must be called inside animation loop.
                    camera.orbitControls.update();
                    requestAnimationFrame(animate);
                    renderer.render(scene, camera);
                }
                animate();
            }

            function hasWebGL() {
                const gl =
                    canvas.getContext("webgl") || canvas.getContext("experimental-webgl");
                if (gl && gl instanceof WebGLRenderingContext) {
                    return true;
                } else {
                    return false;
                }
            }

            function init() {
                if (hasWebGL()) {
                    window
                    window.fetch(
                            "https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard-pro/assets/js/points.json"
                        )
                        .then(response => response.json())
                        .then(data => {
                            makeMagic(data.points);
                        });
                }
            }
            init();
        })();
    </script>
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
