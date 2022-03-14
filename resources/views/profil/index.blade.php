@extends('base')
@section('content')

    @role('calon')
        <div class="container-fluid py-4">
            <div class="row mt-3">
                <div class="col-12 ">
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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profil</li>
                        </ol>
                        {{-- <h5 class="font-weight-bolder">Profil</h5> --}}
                    </nav>

                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="font-weight-bolder">Profil</h5>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-3" style="background-color:#FFA500;">
                            <div class="row align-item-center">
                                <div class="col-md-8 d-flex align-items-center">
                                    <b class="mb-0 text-white">Profil</b>
                                </div>
                                {{-- <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <a href="/profil/{{ $user_profils->id }}"
                                            class="fas fa-user-edit text-secondary text-sm button  text-white "
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Kemaskini"></a>
                                    </a>
                                </div> --}}

                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-sm">
                                Sila pastikan semua informasi berikut adalah benar dan tepat. Sekiranya ada sebarang
                                pertukaran dalam profil anda, Sila kemaskini di platfom yang disediakan. Jika ada
                                sebarang
                                pertanyaan sila hubungi Penolong Pegawai Teknologi maklumat. Sekian Terima Kasih.
                            </p>
                            <div class="pl-lg-4 pb-lg-4">
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Nama Penuh
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="NAMA_PESERTA" type="text"
                                        value="{{ $user_profils['name'] }}" readonly required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            No MyKad/Polis/Tentera/Pasport
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="NO_KAD_PENGENALAN" type="text"
                                            value="{{ $user_profils['NO_KAD_PENGENALAN'] }}" readonly required maxlength="12"
                                            size="12">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            E-mel
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="EMEL_PESERTA" type="email"
                                            value="{{ $user_profils->EMEL_PESERTA }}" readonly required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header p-3" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <b class="mb-0 text-white">Maklumat Permohonan</b>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="/profil/{{ $user_profils->id }}"
                                        class="fas fa-user-edit text-secondary text-sm button  text-white "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Kemaskini"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="card-body">
                                <p class="text-sm">
                                    Sila pastikan semua informasi berikut adalah benar dan tepat. Sekiranya ada
                                    sebarang
                                    pertukaran dalam profil anda, Sila kemaskini di platfom yang disediakan. Jika
                                    ada sebarang
                                    pertanyaan sila hubungi Penolong Pegawai Teknologi maklumat. Sekian Terima
                                    Kasih.
                                </p>
                                <div class="pl-lg-4 pb-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                No MyKad/Polis/Tentera/Pasport
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="NO_KAD_PENGENALAN"
                                                type="text" value="{{ $user_profils->NO_KAD_PENGENALAN }}" readonly required
                                                maxlength="12" size="12">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                E-mel
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="EMEL_PESERTA" type="email"
                                                value="{{ $user_profils->EMEL_PESERTA }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Gelaran
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            @if ($user_profils->KOD_GELARAN == '01')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Brigidier Jeneral Dato" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '02')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Cik" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '03')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '04')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Amar" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '05')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '06')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Paduka" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '07')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Patinggi" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '08')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Professor Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '09')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Seri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '10')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Seri Utama" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '11')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Sri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '12')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Sri Cempaka" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '13')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Sri Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '14')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datin Wira" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '15')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '16')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Ir." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '17')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Ir Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '18')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Paduka" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '19')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato  Paduka Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '20')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Pahlawan" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '21')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Professor Madya Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '22')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Senara Muda" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '23')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Seri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '24')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Seri Panglima" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '25')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Seri Utama" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '26')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Sri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '27')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dato Wira" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '28')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datu" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '29')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '30')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Amar" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '31')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Bentara Luar" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '32')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Bentara Raja" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '33')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '34')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Kol." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '35')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Patinggi" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '36')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Professor" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '37')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Professor Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '38')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Seri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '39')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Seri Panglima" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '40')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Seri Utama" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '41')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Setia" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '42')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Setia Wangsa" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '43')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Sri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '44')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Sri Amar Diraja" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '45')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Sri Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '46')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Wira" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '47')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Datuk Wira Jaya" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '48')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Doktor" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '49')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '50')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Encik" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '51')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Hajjah" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '52')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Haji" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '53')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Ir" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '54')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Ir. Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '55')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Jeneral" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '56')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Kapten" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '57')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Kolonel" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '58')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Major" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '59')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Pehin Sri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '60')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Professor" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '61')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Professor Diraja" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '62')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Professor Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '63')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Professor Madya" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '64')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Professor Madya Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '65')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Puan" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '66')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Puan Sri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '67')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Puan Sri Datin" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '68')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Puan Sri Datin Professor" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '69')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Puan Sri Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '70')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Puan Sri Utama" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '71')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '72')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Dato Seri" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '73')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Dato" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '74')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Datuk" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '75')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Datuk Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '76')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Datuk Professor" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '77')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Datuk Professor Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '78')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Dr." readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '79')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Jeneral" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '80')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tan Sri Professor" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '81')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="To Puan" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '82')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Toh Puan Seri Utama" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '83')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tuan" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '84')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tuan Haji" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '85')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Tun" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == '86')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="Yang Mulia" readonly required>
                                            @elseif ($user_profils->KOD_GELARAN == null)
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="" readonly required>
                                            @else
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN" type="text"
                                                    value="{{ $user_profils->KOD_GELARAN }}" readonly required>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Nama Penuh
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="NAMA_PESERTA" type="text"
                                                value="{{ $user_profils->NAMA_PESERTA }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Tarikh Lahir
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="TARIKH_LAHIR" type="date"
                                                value="{{ $user_profils->TARIKH_LAHIR }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Jantina
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            @if ($user_profils->KOD_JANTINA == '01')
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA" type="text"
                                                    value="Lelaki" readonly required>
                                            @elseif($user_profils->KOD_JANTINA == '02')
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA" type="text"
                                                    value="Perempuan" readonly required>
                                            @elseif($user_profils->KOD_JANTINA == 'Lelaki')
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA" type="text"
                                                    value="Lelaki" readonly required>
                                            @elseif($user_profils->KOD_JANTINA == 'Perempuan')
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA" type="text"
                                                    value="Perempuan" readonly required>
                                            @else
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA" type="text"
                                                    value="" readonly required>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Gelaran Jawatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_GELARAN_JAWATAN"
                                                type="text" value="{{ $user_profils->KOD_GELARAN_JAWATAN }}" readonly
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Peringkat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_PERINGKAT" type="text"
                                                value="{{ $user_profils->KOD_PERINGKAT }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Klasifikasi Perkhidmatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                name="KOD_KLASIFIKASI_PERKHIDMATAN" type="text"
                                                value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Gred Jawatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_GRED_JAWATAN"
                                                type="text" value="{{ $user_profils->KOD_GRED_JAWATAN }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Taraf Perjawatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_TARAF_PERJAWATAN"
                                                type="text" value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" readonly
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Jenis Perkhidmatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_JENIS_PERKHIDMATAN"
                                                type="text" value="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}" readonly
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Tarikh Lantikan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="TARIKH_LANTIKAN" type="text"
                                                value="{{ date('d/m/Y', strtotime($user_profils->TARIKH_LANTIKAN)) }}"
                                                readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                No Telefon Pejabat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PEJABAT"
                                                type="text" value="{{ $user_profils->NO_TELEFON_PEJABAT }}" readonly
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                No Telefon Bimbit
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="NO_TELEFON_BIMBIT"
                                                type="text" value="{{ $user_profils->NO_TELEFON_BIMBIT }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Jawatan Ketua Jabatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="GELARAN_KETUA_JABATAN"
                                                type="text" value="{{ $user_profils->GELARAN_KETUA_JABATAN }}" readonly
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Kementerian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN" type="text"
                                                value="{{ $user_profils->KOD_KEMENTERIAN }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Agensi
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_JABATAN" type="text"
                                                value="{{ $user_profils->KOD_JABATAN }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Bahagian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="BAHAGIAN" type="text"
                                                value="{{ $user_profils->BAHAGIAN }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Alamat Pejabat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="ALAMAT_1" type="text"
                                                value="{{ $user_profils->ALAMAT_1 }}" readonly required>
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->ALAMAT_2 }}">
                                                Alamat Pejabat 2
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="ALAMAT_2"
                                                id="{{ $user_profils->ALAMAT_2 }}" type="text"
                                                value="{{ $user_profils->ALAMAT_2 }}" readonly>
                                        </div>
                                    </div> --}}
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Poskod
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="POSKOD" type="text"
                                                value="{{ $user_profils->POSKOD }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Bandar
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" type="text" name="BANDAR"
                                                value="{{ $user_profils->BANDAR }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Negeri
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="KOD_NEGERI" type="text"
                                                value="{{ $user_profils->KOD_NEGERI }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Nama Penyelia
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="NAMA_PENYELIA" type="text"
                                                value="{{ $user_profils->NAMA_PENYELIA }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                E-mel Penyelia
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="EMEL_PENYELIA" type="email"
                                                value="{{ $user_profils->EMEL_PENYELIA }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                No Telefon Penyelia
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PENYELIA"
                                                type="text" value="{{ $user_profils->NO_TELEFON_PENYELIA }}" readonly
                                                maxlength="11">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card my-4">
                        <div class="card-header">
                            <h6 class="mb-1">Kata Laluan</h6>
                            <p class="text-sm">Tukar Kata Laluan</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/change-password">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Kata Laluan
                                        Lama
                                    </label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="current_password"
                                            autocomplete="current-password" minlength="8">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Kata Laluan
                                        Baru</label>

                                    <div class="col-md-6">
                                        <input id="new_password" type="password" class="form-control" name="new_password"
                                            autocomplete="current-password" minlength="8">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Sah Kata
                                        Laluan
                                    </label>

                                    <div class="col-md-6">
                                        <input id="new_confirm_password" type="password" class="form-control"
                                            name="new_confirm_password" autocomplete="current-password" minlength="8">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn bg-gradient-warning">
                                            Kemaskini Kata Laluan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    @else
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
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Profil</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <h5 class="font-weight-bolder">Profil</h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header p-3" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <b class="mb-0 text-white">Profil</b>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <a href="/profil/{{ $user_profils->id }}"
                                            class="btn bg-gradient-info text-white mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Kemaskini">Kemaskini
                                            Maklumat</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="card-body">
                                <p class="text-sm">
                                    Sila pastikan semua informasi berikut adalah benar dan tepat. Sekiranya ada sebarang
                                    pertukaran dalam profil anda, Sila kemaskini di platfom yang disediakan. Jika ada
                                    sebarang
                                    pertanyaan sila hubungi Penolong Pegawai Teknologi maklumat. Sekian Terima Kasih.
                                </p>
                                <div class="pl-lg-4 pb-lg-4">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                Nama Penuh
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" type="text"
                                                value=" {{ $user_profils->name }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                No Kad Pengenalan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" type="text"
                                                value="{{ $user_profils->nric }}" readonly required maxlength="12" size="12">
                                        </div>
                                    </div>
                                    <div class="row mb-2 divSektor">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4">
                                                E-mel
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" type="email"
                                                value="{{ $user_profils->email }}" readonly required>
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->ministry_code }}">
                                                Kod Kementerian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->ministry_code }}" type="text"
                                                value="{{ $user_profils->ministry_code }}" readonly required>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>

                            <hr class="horizontal gray-light my-4">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-1">Kata Laluan</h6>
                            <p class="text-sm">Tukar Kata Laluan</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/change-password">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Kata Laluan
                                        Lama
                                    </label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="current_password"
                                            autocomplete="current-password" minlength="8">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Kata Laluan
                                        Baru</label>

                                    <div class="col-md-6">
                                        <input id="new_password" type="password" class="form-control" name="new_password"
                                            autocomplete="current-password" minlength="8">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Sah Kata
                                        Laluan
                                    </label>

                                    <div class="col-md-6">
                                        <input id="new_confirm_password" type="password" class="form-control"
                                            name="new_confirm_password" autocomplete="current-password" minlength="8">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn bg-gradient-warning">
                                            Kemaskini Kata Laluan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@stop
