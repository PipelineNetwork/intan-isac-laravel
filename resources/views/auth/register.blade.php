<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
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
</head>

<body class="sign-up-cover">

    <section>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto mt-3">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-gradient bg-gradient-warning">Daftar Akaun ISAC
                                    </h3>
                                    <p class="mb-0">Sila isi maklumat di bawah</p>
                                </div>
                            </div>
                            <div class="card-body pb-3">
                                <form method="POST" action="/register">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-control-label">No. Kad Pengenalan</label>
                                                <input class="form-control" type="text" name="nric"
                                                    required autofocus maxlength="12" size="12"
                                                    value="{{ $nrics }}" readonly
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Nama</label>
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ $names }}" style="text-transform: uppercase"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-control-label">E-mel</label>
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ $emails }}" required />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Kata Laluan</label>
                                                <input id="password" class="form-control" type="password"
                                                    name="password" required autocomplete="new-password"
                                                    minlength="8" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Pengesahan Kata Laluan</label>
                                                <input id="password_confirmation" class="form-control" type="password"
                                                    name="password_confirmation" required minlength="8" />
                                            </div>
                                        </div>

                                        <input type="hidden" value="{{ $TARIKH_LAHIR }}" name="TARIKH_LAHIR">
                                        <input type="hidden" value="{{ $KOD_GELARAN }}" name="KOD_GELARAN">
                                        <input type="hidden" value="{{ $KOD_JANTINA }}" name="KOD_JANTINA">
                                        <input type="hidden" value="{{ $NO_TELEFON_BIMBIT }}" name="NO_TELEFON_BIMBIT">
                                        <input type="hidden" value="{{ $NO_TELEFON_PEJABAT }}" name="NO_TELEFON_PEJABAT">
                                        <input type="hidden" value="{{ $GELARAN_KETUA_JABATAN }}" name="GELARAN_KETUA_JABATAN">
                                        <input type="hidden" value="{{ $KOD_KEMENTERIAN }}" name="KOD_KEMENTERIAN">
                                        <input type="hidden" value="{{ $KOD_JABATAN }}" name="KOD_JABATAN">
                                        <input type="hidden" value="{{ $BAHAGIAN }}" name="BAHAGIAN">
                                        <input type="hidden" value="{{ $ALAMAT_1 }}" name="ALAMAT_1">
                                        <input type="hidden" value="{{ $POSKOD }}" name="POSKOD">
                                        <input type="hidden" value="{{ $BANDAR }}" name="BANDAR">
                                        <input type="hidden" value="{{ $KOD_NEGERI }}" name="KOD_NEGERI">
                                        <input type="hidden" value="{{ $NAMA_PENYELIA }}" name="NAMA_PENYELIA">
                                        <input type="hidden" value="{{ $EMEL_PENYELIA }}" name="EMEL_PENYELIA">
                                        <input type="hidden" value="{{ $NO_TELEFON_PENYELIA }}" name="NO_TELEFON_PENYELIA">
                                        <input type="hidden" value="{{ $KOD_GELARAN_JAWATAN }}" name="KOD_GELARAN_JAWATAN">
                                        <input type="hidden" value="{{ $KOD_PERINGKAT }}" name="KOD_PERINGKAT">
                                        <input type="hidden" value="{{ $KOD_KLASIFIKASI_PERKHIDMATAN }}" name="KOD_KLASIFIKASI_PERKHIDMATAN">
                                        <input type="hidden" value="{{ $KOD_GRED_JAWATAN }}" name="KOD_GRED_JAWATAN">
                                        <input type="hidden" value="{{ $KOD_TARAF_PERJAWATAN }}" name="KOD_TARAF_PERJAWATAN">
                                        <input type="hidden" value="{{ $KOD_JENIS_PERKHIDMATAN }}" name="KOD_JENIS_PERKHIDMATAN">
                                        <input type="hidden" value="{{ $TARIKH_LANTIKAN }}" name="TARIKH_LANTIKAN">
                                    </div>

                                    <div class="text-center">
                                        {{-- <button class="btn bg-gradient-warning w-100 mt-4 mb-0">
                                            {{ __('Daftar') }}
                                        </button> --}}
                                        <button class="btn bg-gradient-warning w-100 mt-4 mb-0" type="submit">Daftar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-sm-4 px-1">
                                <p class="mb-4 mx-auto">
                                    Sudah Daftar?
                                    {{-- <a  href="{{ route('login') }}" class="text-warning text-gradient font-weight-bold">Log Masuk</a> --}}
                                    <a href="/" class="text-warning text-gradient font-weight-bold">Log Masuk</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 vh-100">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('../../assets/img/test1.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
