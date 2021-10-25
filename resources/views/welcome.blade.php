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
</head>

<body class="coworking">
    <?php
    
    use App\Models\Jadual;
    
    $jaduals = Jadual::select('TARIKH_SESI', 'KOD_MASA_MULA', 'KOD_MASA_TAMAT', 'platform', 'status')
        ->orderBy('TARIKH_SESI', 'desc')
        ->whereYear('TARIKH_SESI', '>=', 2021)
        ->get();
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
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="/ " rel="tooltip"
                            title="Designed and Coded by Creative Tim" data-placement="bottom">
                            INTAN ISAC
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
                                {{-- <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a role="button"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                        id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kampus INTAN
                                        <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow"
                                            class="arrow ms-1">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-animation dropdown-xl p-3 border-radius-xl mt-0 mt-lg-3"
                                        aria-labelledby="dropdownMenuPages">
                                        <div class="row d-none d-lg-block">
                                            <div class="col-12 px-4 py-2">
                                                <div class="row">
                                                    <div class="col-4 position-relative">
                                                        <div
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                                                            <div class="d-inline-block">
                                                                <div
                                                                    class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                                                    <svg width="12px" height="12px" viewBox="0 0 45 40"
                                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                        <title>shop </title>
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <g transform="translate(-1716.000000, -439.000000)"
                                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                                <g
                                                                                    transform="translate(1716.000000, 291.000000)">
                                                                                    <g
                                                                                        transform="translate(0.000000, 148.000000)">
                                                                                        <path
                                                                                            d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                                                                                            opacity="0.598981585">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                                                        </path>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            Semenanjung Malaysia
                                                        </div>
                                                        <a href="http://www.mytc.gov.my/index.php?page=hotels&hid=5178"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Kampus Utama</span>
                                                        </a>
                                                        <a href="https://www.intanbk.intan.my/iportal/index.php/ms/3-about-intan/organisational/47-kampus-intengah"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Kampus Tengah</span>
                                                        </a>
                                                        <a href="https://www.intanbk.intan.my/iportal/ms/kikwas"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Kampus Wilayah Selatan</span>
                                                        </a>
                                                        <a href="https://www.intanbk.intan.my/iportal/ms/kintura"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Kampus Wilayah Utara</span>
                                                        </a>
                                                        <a href="https://www.intanbk.intan.my/iportal/index.php/ms/kintim"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Kampus Wilayah Timur</span>
                                                        </a>
                                                        <a href=".https://www.jpa.gov.my/info-korporat/program-bahagian/26-maklumat-bahagian/173-intan"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Jabatan Perkhidmatan
                                                                Awam</span>
                                                        </a>
                                                        <a href="https://www.intanbk.intan.my/iportal/ms/intan-kampus-satelit-putrajaya"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">INTAN LOCAL</span>
                                                        </a>
                                                        <div
                                                            class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                                                            <div class="d-inline-block">
                                                                <div
                                                                    class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                                                                    <svg width="12px" height="12px" viewBox="0 0 42 42"
                                                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                        <title>office</title>
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <g transform="translate(-1869.000000, -293.000000)"
                                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                                <g
                                                                                    transform="translate(1716.000000, 291.000000)">
                                                                                    <g
                                                                                        transform="translate(153.000000, 2.000000)">
                                                                                        <path
                                                                                            d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"
                                                                                            opacity="0.6"></path>
                                                                                        <path
                                                                                            d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                                                        </path>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            Sabah/Sarawak
                                                        </div>
                                                        <a href="https://www.intanbk.intan.my/iportal/ms/ksabah"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Kampus INTAN Sabah</span>
                                                        </a>
                                                        <a href="https://www.intanbk.intan.my/iportal/ms/ksarawak"
                                                            class="dropdown-item border-radius-md">
                                                            <span class="ps-3">Kampus INTAN Sarawak</span>
                                                        </a>
                                                        <hr class="vertical dark">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}

                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a role="button"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                        id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                                        Hubungi kami
                                        <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow"
                                            class="arrow ms-1">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-animation dropdown-lg dropdown-lg-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                                        aria-labelledby="dropdownMenuBlocks">
                                        <div class="d-none d-lg-block">
                                            <ul class="list-group">
                                                <li
                                                    class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md">
                                                        <div class="d-flex">
                                                            <div class="icon h-10 me-3 d-flex mt-1">
                                                                <i
                                                                    class="ni ni-single-copy-04 text-gradient text-primary"></i>
                                                            </div>
                                                            <div
                                                                class="w-100 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h6
                                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                                        En. Mohd Yuzwan bin Yunan
                                                                    </h6>
                                                                    <span class="text-sm">Penolong Pegawai
                                                                        Teknologi
                                                                        Maklumat Gred FA29</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md">
                                                        <div class="d-flex">
                                                            <div class="icon h-10 me-3 d-flex mt-1">
                                                            </div>
                                                            <div
                                                                class="w-100 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <span class="text-sm">03-20847798</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>

                                                </li>
                                                <li
                                                    class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md">
                                                        <div class="d-flex">
                                                            <div class="icon h-10 me-3 d-flex mt-1">
                                                                <i class="ni ni-badge text-gradient text-primary"></i>
                                                            </div>
                                                            <div
                                                                class="w-100 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <h6
                                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                                        En. Mohd Faisal Bin Mustafah</h6>
                                                                    <span class="text-sm">Penolong Pegawai
                                                                        Teknologi
                                                                        Maklumat Gred FA29</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md">
                                                        <div class="d-flex">
                                                            <div class="icon h-10 me-3 d-flex mt-1">
                                                            </div>
                                                            <div
                                                                class="w-100 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <span class="text-sm">03-20847703</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md">
                                                        <div class="d-flex">
                                                            <div class="icon h-10 me-3 d-flex mt-1">
                                                            </div>
                                                            <div
                                                                class="w-100 d-flex align-items-center justify-content-between">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row d-lg-none">
                                            <div class="col-md-12">
                                                <div class="d-flex mb-2">
                                                    <div>
                                                        <i class="ni ni-single-copy-04 text-gradient text-primary"></i>
                                                    </div>
                                                    <div
                                                        class="w-100 d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <h6
                                                                class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                                Page Sections</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item mx-2">
                                    <a role="button" href="/tambahrayuans"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                        Rayuan
                                    </a>
                                </li>

                                <li class="nav-item mx-2">
                                    <a role="button" href="/tambahaduans"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                        Aduan
                                    </a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a role="button" href="#one"
                                        class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                        Jadual
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="/register" class="btn btn-sm  bg-gradient-warning  btn-round mb-0 me-1"
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
        <div class="page-header min-vh-75">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                    style="background-image:url('https://www.intanbk.intan.my/iportal/images/klus_imatec/kluster/imatecentrance.jpg')">
                </div>
            </div>
            <div class="container">
                <div class="row">

                    <div
                        class="col-lg-6 col-md-7 d-flex justify-content-center text-md-start text-center flex-column mt-7">
                        <h1 class="text-gradient text-warning">ICT SKILLS ASSESSMENT</h1>
                        <h1 class="mb-4">& CERTIFICATION (ISAC)</h1>
                        <p class="lead pe-md-5 me-md-5">Sistem bagi penilaian ICT dan penjanaan sijil kemahiran bagi
                            penjawat awam.</p>
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

                                    {{-- <a  href="{{ route('login') }}" class="text-warning text-gradient font-weight-bold">Log Masuk</a> --}}
                                    <div>
                                        <x-button class="btn bg-gradient-warning w-75 mt-3">
                                            {{ __('Log Masuk') }}
                                        </x-button>
                                    </div>
                                </form>
                                {{-- <a href="/register" class="btn bg-gradient-warning mt-4" target="_self">Daftar</a>
                            <a href="/login" class="btn text-warning shadow-none mt-4">Log Masuk</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    <!-- -------- END HEADER 1 w/ text and image on right ------- -->
    <!-- -------- START Features w/ 4 cols w/ colored icon & title & text -------- -->

    <section class="py-md-7 bg-gradient-warning">


        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-6">
                    <div class="primary text-start border-radius-lg">
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
                        <h5 class="mt-3">KURIKULUM</h5>
                        <p class="text-dark">Bahagian 1 - Penilaian pengetahuan yang merangkumi : <br>
                        <ul class="text-dark">
                            <li>Software </li>
                            <li>ICT Security </li>
                            <li>Inisiatif ICT Sektor Awam</li>
                            <li>Rangkaian dan Wifi </li>
                            <li>Government Mobility</li>
                            <li>Media Sosial</li>

                        </ul>
                        </p>
                        <br>
                        <p class="text-dark"> Bahagian 2 - Menilai kemahiran dalam : <br>
                        <ul class="text-dark">
                            <li>Mencari dan memperolehi maklumat menggunakan internet.</li>
                            <li>Menyediakan dokumen pemprosesan atau dokumen persembahan berkaitan dengan pengendalian
                                tugas-tugas asas.</li>
                            <li>Berkomunikasi secara elektronik melalui emel.</li>
                        </ul>

                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="primary text-start border-radius-lg">
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
                        <h5 class="mt-3 text-dark">PAKAIAN :</h5>

                        <p class="text-dark">Pastikan pakaian semasa menghadiri Penilaian ISAC adalah pakaian
                            pejabat.

                        </p>
                    </div>
                    <div class="primary text-start border-radius-lg mt-6">
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
                        <h5 class="mt-3 ">FORMAT PENILAIAN</h5>
                        <p>
                        <ul class="text-dark">
                            <li>Bahagian 1 - Ujian pengetahuan yang mengandungi 40 soalan objektif yang perlu dijawab
                                dalam masa 20 minit</li>
                            <li>Bahagian 2 - Ujian kemahiran yang mengandungi 3 soalan dan calon-calon dikehendaki
                                menjawab semua soalan tersebut dalam masa 40 minit.</li>
                        </ul>
                        </p>
                    </div>
                    {{-- <div class="primary text-start border-radius-lg mt-6">
                        <div class="icon">
                            <svg class="text-primary" width="25px" height="25px" viewBox="0 0 52 35" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>sound-wave</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2015.000000, -596.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="sound-wave" transform="translate(299.000000, 305.000000)">
                                                <path class="color-foreground"
                                                    d="M15.2941176,30.5882353 C14.6024837,30.5882353 13.9754248,30.1667974 13.7154248,29.5210458 L8.11777778,15.5269281 L6.51189542,17.9366013 C6.19581699,18.4090196 5.66562092,18.6928105 5.09803922,18.6928105 L0,18.6928105 L0,15.2941176 L4.18888889,15.2941176 L7.08287582,10.9522876 C7.43294118,10.4288889 8.03281046,10.1467974 8.67346405,10.2045752 C9.30052288,10.2708497 9.84261438,10.6769935 10.0754248,11.263268 L15.0969935,23.8214379 L22.1696732,1.19294118 C22.3905882,0.482614379 23.0465359,0 23.7908497,0 C23.792549,0 23.792549,0 23.7942484,0 C24.5385621,0.00169934641 25.1962092,0.487712418 25.4154248,1.19973856 L31.2305882,20.1015686 L34.3267974,15.9738562 C34.6462745,15.5456209 35.1509804,15.2941176 35.6862745,15.2941176 L40.7843137,15.2941176 L40.7843137,18.6928105 L36.5359477,18.6928105 L31.9477124,24.8104575 C31.5653595,25.3202614 30.9298039,25.5717647 30.2959477,25.4647059 C29.6671895,25.3542484 29.1522876,24.9005229 28.9636601,24.2904575 L23.7772549,7.43803922 L16.9152941,29.3952941 C16.7011765,30.0818301 16.0792157,30.5593464 15.3603922,30.5865359 C15.3366013,30.5882353 15.3162092,30.5882353 15.2941176,30.5882353 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M26.5098039,34.6666667 C25.8181699,34.6666667 25.1911111,34.2452288 24.9311111,33.5994771 L19.3334641,19.6053595 L17.7275817,22.0150327 C17.4115033,22.487451 16.8813072,22.7712418 16.3137255,22.7712418 L11.2156863,22.7712418 L11.2156863,19.372549 L15.4045752,19.372549 L18.2985621,15.030719 C18.6486275,14.5073203 19.2484967,14.2252288 19.8891503,14.2830065 C20.5162092,14.349281 21.0583007,14.7554248 21.2911111,15.3416993 L26.3126797,27.8998693 L33.3853595,5.27137255 C33.6062745,4.56104575 34.2622222,4.07843137 35.0065359,4.07843137 C35.0082353,4.07843137 35.0082353,4.07843137 35.0099346,4.07843137 C35.7542484,4.08013072 36.4118954,4.56614379 36.6311111,5.27816993 L42.4462745,24.18 L45.5424837,20.0522876 C45.8619608,19.6240523 46.3666667,19.372549 46.9019608,19.372549 L52,19.372549 L52,22.7712418 L47.751634,22.7712418 L43.1633987,28.8888889 C42.7810458,29.3986928 42.1454902,29.6501961 41.511634,29.5431373 C40.8828758,29.4326797 40.3679739,28.9789542 40.1793464,28.3688889 L34.9929412,11.5164706 L28.1309804,33.4737255 C27.9168627,34.1602614 27.294902,34.6377778 26.5760784,34.6649673 C26.5522876,34.6666667 26.5318954,34.6666667 26.5098039,34.6666667 Z"
                                                    id="Path-Copy" opacity="0.604957217"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h5 class="mt-3">PUSAT PENILAIAN ISAC</h5>

                        <p class="text-dark">Penilaian ISAC boleh dijalankan di pusat-pusat ISAC seperti berikut :
                        </p>

                        <ul class="text-dark">
                            <li>INTAN Kampus Utama (INTAN Bukit Kiara) </li>
                            <li>INTAN Kampus Wilayah Utara (INTURA)</li>
                            <li>INTAN Kampus Wilayah Selatan (IKWAS)</li>
                            <li>INTAN Kampus Wilayah Timur (INTIM) </li>
                            <li>INTAN Sabah</li>
                            <li>INTAN Sarawak</li>
                            <li>Agensi kerajaan dilantik</li>
                            <li>Jabatan Perkhidmatan Awam (JPA)</li>
                        </ul>

                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- -------- START Features w/ icons and text on left & gradient title and text on right -------- -->
    <section class="py-sm-7 py-4">
        <div class="container">
            <div class="row">
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

                    <a href="https://www.intanbk.intan.my/iportal/en/about-intan"
                        class="text-warning icon-move-right">Mengenai Intan
                        <i class="fas fa-arrow-right text-sm ms-1"></i>
                    </a>
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
                    <div class="p-3 info-horizontal">
                        <img src="https://www.intanbk.intan.my/iportal/images/adminsep.jpg" width="620" height="300">
                        <b style="text-align:center;">&emsp;&emsp;The National Institute of Public Administration
                            (INTAN) Port Dickson</b>
                    </div>
                </div>
            </div>

            <div class="row pt-5" id="one">
                <div class="col">
                    <div class="card">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Senarai Jadual Penilaian</b>
                        </div>
                        <div class="table-responsive" style="background-color:  #FAFAD2; border-radius: 10px">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-penjadualan">

                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Tarikh Penilaian</th>
                                        <th class="text-center">Saluran Penilaian</th>
                                        <th class="text-center">Status Permohonan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($jaduals as $jadual)
                                        <tr>
                                            {{-- <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">
                                                {{ date('d-m-Y', strtotime($jadual['TARIKH_SESI'])) }}
                                            </td> --}}
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">
                                                {{ date('d-m-Y', strtotime($jadual['TARIKH_SESI'])) }}
                                            </td>
                                            <td class="text-center">{{ $jadual['platform'] }}</td>
                                            <td class="text-center">{{ $jadual['status'] }}</td>
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
    <!-- -------- END Features w/ icons and text on left & gradient title and text on right -------- -->
    <section class="features-3 mt-n10 py-7">
        <div class="container">
            <div class="row text-center justify-content-center pt-10">
                <div class="col-lg-6">
                    <h2>Institut Tadbiran Awam Negara (INTAN) </h2>
                    <p>
                        NATIONAL INSTITUTE OF PUBLIC ADMINISTRATION
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <!-- Start Card Blog Fullbackground - text centered -->
                    <a href="/jaduals">
                        <div class="card card-background move-on-hover mb-4">
                            <div class="full-background"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/glass-wall.jpg')">
                            </div>
                            <div class="card-body pt-12">
                                <h4 class="text-white">Jadual Penilaian</h4>
                                <p>Dapatkan tarikh jadual mengikut slot yang ditetapkan.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <!-- Start Card Blog Fullbackground - text centered -->
                    <a href="/tambahrayuans">
                        <div class="card card-background move-on-hover mb-4">
                            <div class="full-background"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/books.jpg')">
                            </div>
                            <div class="card-body pt-12">
                                <h4 class="text-white">Rayuan</h4>
                                <p>Rayuan bagi pemohon yang telah gagal membuat permohonan untuk penilaian.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/tambahaduans">
                        <div class="card card-background move-on-hover">
                            <div class="full-background" style="background-image: url('assets/img/test.jpg');">
                            </div>
                            <div class="card-body pt-12">
                                <h4 class="text-white">Aduan</h4>
                                <p>Aduan bagi sebarang masalah atau pertanyaan mengenai penilaian. </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer pt-4 mt-3">
        <hr class="horizontal dark mb-5">
        <div class="container">
            <div class=" row">
                <div class="col-md-3 mb-4 ms-auto">
                    <div class="d-flex justify-content-center flex-wrap">
                        <h6 class="text-gradient text-warning font-weight-bolder">Institut Tadbiran Awam Negara</h6>
                        &nbsp;&nbsp;&nbsp;
                        <img src="https://docs.jpa.gov.my/cdn/images/ePerkhidmatan/BLUE/EN/INTAN.jpg" width="150"
                            height="150">
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-gradient text-warning text-sm">
                            Alamat Surat Menyurat :</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link">
                                    Pengarah
                                    Institut Tadbiran Awam Negara (INTAN),
                                    Kluster Inovasi Teknologi Pengurusan (i-IMATEC),
                                    Seksyen Aplikasi
                                    Jalan Bukit Kiara,
                                    50480 Kuala Lumpur
                                    (u.p. :Puan Nor Hasimah binti Che Mat)
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-gradient text-warning text-sm">En. Mohd Yuzwan bin Yunan</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link">
                                    Penolong Pegawai Teknologi Maklumat,
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Gred FA29,
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    03-20847798.

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 mb-4">
                    <div>
                        <h6 class="text-gradient text-warning text-sm">En. Mohd Faisal Bin Mustafah</h6>
                        <ul class="flex-column ms-n3 nav">
                            <li class="nav-item">
                                <a class="nav-link">
                                    Penolong Pegawai Teknologi Maklumat,
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    Gred FA29,
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    03-20847703.
                                </a>
                            </li>
                        </ul>
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
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/mattboldt/typed.js/ -->
    <script src="../assets/js/plugins/typedjs.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="../assets/js/plugins/parallax.min.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the GlideJS Carousel, full documentation here: http://kenwheeler.github.io/slick/ -->
    <script src="../assets/js/plugins/glidejs.min.js" type="text/javascript"></script>
    <!--  Plugin for the blob animation -->
    <script src="../assets/js/plugins/anime.min.js" type="text/javascript"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/soft-design-system-pro.min.js?v=1.0.8" type="text/javascript"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
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
