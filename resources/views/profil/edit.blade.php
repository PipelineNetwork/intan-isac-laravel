@extends('base')
@section('content')

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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Profil</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kemaskini Profil</a></li>
        </ol>
        <h6 class="font-weight-bolder">Kemaskini Profil</h6>
    </nav>

    @if ($user_profils->user_group_id == '5')
        <div class="container-fluid py-4">
            <div class="row mt-3">
                <div class="col-12 mb-3">
                    <form method="POST" action="/profil/{{ $user_profils->id }}/edit">
                        @csrf
                        <div class="card mt-4" id="basic-info">
                            <div class="card-header" style="background-color:#FFA500;">
                                <h5 class="text-white">Kemaskini Profil</h5>
                            </div>
                            <br>
                            <div class="card-body pt-0">
                                <div class="pl-lg-4 pb-lg-4">
                                    <div class="row mb-2">
                                        <input type="hidden" name="ID_PESERTA" value="{{ $user_profils->ID_PESERTA }}">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->NO_KAD_PENGENALAN }}">
                                                No MyKad/Polis/Tentera/Pasport
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->NO_KAD_PENGENALAN }}" type="text"
                                                value="{{ $user_profils->NO_KAD_PENGENALAN }}" required maxlength="12"
                                                size="12">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->EMEL_PESERTA }}">
                                                E-mel
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->EMEL_PESERTA }}" type="email"
                                                value="{{ $user_profils->EMEL_PESERTA }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->KOD_GELARAN }}">
                                                Gelaran
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            @if ($user_profils->KOD_GELARAN == '01')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text"
                                                    value="Brigidier Jeneral Dato" required>
                                            @elseif ($user_profils->KOD_GELARAN == '02')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Cik"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '03')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '04')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Amar"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '05')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '06')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Paduka"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '07')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Patinggi"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '08')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Professor Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '09')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Seri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '10')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Seri Utama"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '11')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Sri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '12')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Sri Cempaka"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '13')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Sri Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '14')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datin Wira"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '15')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '16')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Ir."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '17')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Ir Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '18')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Paduka"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '19')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato  Paduka Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '20')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Pahlawan"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '21')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Professor Madya Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '22')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Senara Muda"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '23')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Seri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '24')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Seri Panglima"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '25')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Seri Utama"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '26')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Sri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '27')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dato Wira"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '28')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datu"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '29')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '30')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Amar"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '31')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Bentara Luar"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '32')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Bentara Raja"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '33')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '34')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Kol."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '35')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Patinggi"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '36')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Professor"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '37')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Professor Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '38')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Seri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '39')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Seri Panglima"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '40')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Seri Utama"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '41')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Setia"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '42')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Setia Wangsa"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '43')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Sri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '44')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Sri Amar Diraja"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '45')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Sri Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '46')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Wira"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '47')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Datuk Wira Jaya"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '48')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Doktor"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '49')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '50')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Encik"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '51')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Hajjah"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '52')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Haji"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '53')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Ir"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '54')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Ir. Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '55')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Jeneral"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '56')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Kapten"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '57')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Kolonel"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '58')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Major"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '59')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Pehin Sri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '60')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Professor"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '61')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Professor Diraja"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '62')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Professor Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '63')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Professor Madya"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '64')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Professor Madya Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '65')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Puan"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '66')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Puan Sri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '67')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Puan Sri Datin"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '68')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Puan Sri Datin Professor"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '69')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Puan Sri Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '70')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Puan Sri Utama"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '71')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '72')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Dato Seri"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '73')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Dato"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '74')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Datuk"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '75')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Datuk Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '76')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Datuk Professor"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '77')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Datuk Professor Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '78')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Dr."
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '79')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Jeneral"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '80')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tan Sri Professor"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '81')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="To Puan"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '82')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Toh Puan Seri Utama"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '83')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tuan"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '84')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tuan Haji"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '85')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Tun"
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '86')
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_GELARAN }}" type="text" value="Yang Mulia"
                                                    required>
                                            @else
                                                {{ $user_profils->KOD_GELARAN }}
                                            @endif
                                            {{-- <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_GELARAN }}" type="text"
                                                value="{{ $user_profils->KOD_GELARAN }}" required> --}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->NAMA_PESERTA }}}">
                                                Nama Penuh
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->NAMA_PESERTA }}" type="text"
                                                value=" {{ $user_profils->NAMA_PESERTA }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->TARIKH_LAHIR }}">
                                                Tarikh Lahir
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->TARIKH_LAHIR }}" type="date"
                                                value="{{ $user_profils->TARIKH_LAHIR }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_JANTINA }}">
                                                Jantina
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            @if ($user_profils->KOD_JANTINA == 01)
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_JANTINA }}" type="text" value="Lelaki"
                                                    required>
                                            @else
                                                <input class="form-control form-control-sm ml-3"
                                                    id="{{ $user_profils->KOD_JANTINA }}" type="text" value="Perempuan"
                                                    required>
                                            @endif
                                            {{-- <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_JANTINA }}" type="text"
                                                value="{{ $user_profils->KOD_JANTINA }}"  required> --}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_GELARAN_JAWATAN }}">
                                                Gelaran Jawatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_GELARAN_JAWATAN }}" type="text"
                                                value="{{ $user_profils->KOD_GELARAN_JAWATAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_PERINGKAT }}">
                                                Peringkat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_PERINGKAT }}" type="text"
                                                value="{{ $user_profils->KOD_PERINGKAT }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}">
                                                Klasifikasi Perkhidmatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" type="text"
                                                value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_GRED_JAWATAN }}">
                                                Gred Jawatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_GRED_JAWATAN }}" type="text"
                                                value="{{ $user_profils->KOD_GRED_JAWATAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_TARAF_PERJAWATAN }}">
                                                Taraf Perjawatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" type="text"
                                                value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}">
                                                Jenis Perkhidmatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" type="text"
                                                value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->TARIKH_LANTIKAN }}">
                                                Tarikh Lantikan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->TARIKH_LANTIKAN }}" type="text"
                                                value="{{ $user_profils->TARIKH_LANTIKAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->NO_TELEFON_PEJABAT }}">
                                                No Telefon Pejabat
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->NO_TELEFON_PEJABAT }}" type="text"
                                                value="{{ $user_profils->NO_TELEFON_PEJABAT }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->NO_TELEFON_BIMBIT }}">
                                                No Telefon Bimbit
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->NO_TELEFON_BIMBIT }}" type="text"
                                                value="{{ $user_profils->NO_TELEFON_BIMBIT }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->GELARAN_KETUA_JABATAN }}">
                                                Jawatan Ketua Jabatan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->GELARAN_KETUA_JABATAN }}" type="text"
                                                value="{{ $user_profils->GELARAN_KETUA_JABATAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_KEMENTERIAN }}">
                                                Kementerian/Agensi
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_KEMENTERIAN }}" type="text"
                                                value="{{ $user_profils->KOD_KEMENTERIAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->BAHAGIAN }}">
                                                Bahagian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->BAHAGIAN }}" type="text"
                                                value="{{ $user_profils->BAHAGIAN }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->ALAMAT_1 }}">
                                                Alamat Pejabat 1
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->ALAMAT_1 }}" type="text"
                                                value="{{ $user_profils->ALAMAT_1 }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->ALAMAT_2 }}">
                                                Alamat Pejabat 2
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->ALAMAT_2 }}" type="text"
                                                value="{{ $user_profils->ALAMAT_2 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->POSKOD }}">
                                                Poskod
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->POSKOD }}" type="text"
                                                value="{{ $user_profils->POSKOD }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->BANDAR }}">
                                                Bandar
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->BANDAR }}" type="text"
                                                value="{{ $user_profils->BANDAR }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->KOD_NEGERI }}">
                                                Negeri
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_NEGERI }}" type="text"
                                                value="{{ $user_profils->KOD_NEGERI }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->NAMA_PENYELIA }}">
                                                Nama Penyelia
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->NAMA_PENYELIA }}" type="text"
                                                value="{{ $user_profils->NAMA_PENYELIA }}">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->EMEL_PENYELIA }}">
                                                E-mel Penyelia
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->EMEL_PENYELIA }}" type="email"
                                                value="{{ $user_profils->EMEL_PENYELIA }}">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->NO_TELEFON_PENYELIA }}">
                                                No Telefon Penyelia
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->NO_TELEFON_PENYELIA }}" type="text"
                                                value="{{ $user_profils->NO_TELEFON_PENYELIA }}" maxlength="11">
                                        </div>
                                    </div>

                                </div>

                                <button class="btn bg-gradient-warning" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @else
        <div class="container-fluid py-4">
            <div class="row mt-3">
                <div class="col-12 mb-3">
                    <form method="POST" action="/profil/{{ $user_profils->id }}/edit">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="card mt-4" id="basic-info">
                            <div class="card-header" style="background-color:#FFA500;">
                                <h5 class="text-white">Kemaskini Profil</h5>
                            </div>
                            <br>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Nama :</label>
                                        <div class="input-group">
                                            <input class="form-control mb-3" type="text" name="name"
                                                value="{{ $user_profils->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Email :</label>
                                        <div class="input-group">
                                            <input class="form-control mb-3" type="text" name="email"
                                                value="{{ $user_profils->email }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Kod kementerian :</label>
                                        <div class="input-group">
                                            <input class="form-control mb-3" type="text" name="ministry_code"
                                                value="{{ $user_profils->ministry_code }}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">No Kad. Pengenalan :</label>
                                        <div class="input-group">
                                            <input class="form-control mb-3" type="text" name="nric"
                                                value="{{ $user_profils->nric }}" required maxlength="12" size="12">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4"
                                            for="{{ $user_profils->telephone_number }}">
                                            No Tel
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control form-control-sm ml-3"
                                            id="{{ $user_profils->telephone_number }}" type="text"
                                            value="{{ $user_profils->telephone_number }}" name="telephone_number"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4"
                                            for="{{ $user_profils->office_number }}">
                                            No Pejabat
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control form-control-sm ml-3"
                                            id="{{ $user_profils->office_number }}" type="text"
                                            value="{{ $user_profils->office_number }}" name="office_number" required>
                                    </div>
                                </div>

                                <button class="btn bg-gradient-warning" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    @endif

@stop
