@extends('base')
@section('content')

    @if ($current_user == '5')
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
                        <h6 class="font-weight-bolder">Profil</h6>
                    </nav>
                    <div class="card card-body blur shadow-blur mx-4 my-3">
                        <div class="row gx-6">
                            <div class="col-auto">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="https://st3.depositphotos.com/13159112/17145/v/600/depositphotos_171453724-stock-illustration-default-avatar-profile-icon-grey.jpg"
                                        alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        {{-- {{ $user_profils->NAMA_PESERTA }} --}}
                                        @if ($user_profils->NAMA_PESERTA == null)
                                            {{-- {{ $user_profils->NAMA_PESERTA }} --}}
                                            {{ $user_profils->name }}
                                        @else
                                            {{-- {{ $user_profils->name }} --}}
                                            {{ $user_profils->NAMA_PESERTA }}
                                        @endif
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{-- {{ $user_profils->EMEL_PESERTA }} --}}
                                        @if ($user_profils->EMEL_PESERTA == null)
                                            {{-- {{ $user_profils->EMEL_PESERTA }} --}}
                                            {{ $user_profils->email }}
                                        @else
                                            {{-- {{ $user_profils->email }} --}}
                                            {{ $user_profils->EMEL_PESERTA }}
                                        @endif
                                    </p>
                                    <p class="mb-0 font-weight-bold text-sm">

                                        Calon
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-3" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h4 class="mb-0 text-white">Profil</h4>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <a href="/profil/{{ $user_profils->id }}"
                                            class="fas fa-user-edit text-secondary text-sm button  text-white "
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Kemaskini"></a>
                                    </a>
                                </div>
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
                                        <label class="form-control-label mr-4" for="{{ $user_profils->NAMA_PESERTA }}}">
                                            Nama Penuh
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($user_profils->NAMA_PESERTA == null)
                                            <input class="form-control form-control-sm ml-3" name="NAMA_PESERTA"
                                                id="{{ $user_profils->name }}" type="text"
                                                value=" {{ $user_profils->name }}" disabled="" required>
                                        @else
                                            <input class="form-control form-control-sm ml-3" name="NAMA_PESERTA"
                                                id="{{ $user_profils->NAMA_PESERTA }}" type="text"
                                                value=" {{ $user_profils->NAMA_PESERTA }}" disabled="" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4"
                                            for="{{ $user_profils->NO_KAD_PENGENALAN }}">
                                            No MyKad/Polis/Tentera/Pasport
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="NO_KAD_PENGENALAN"
                                            id="{{ $user_profils->NO_KAD_PENGENALAN }}" type="text"
                                            value="{{ $user_profils->NO_KAD_PENGENALAN }}" disabled="" required
                                            maxlength="12" size="12">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="{{ $user_profils->EMEL_PESERTA }}">
                                            E-mel
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="EMEL_PESERTA"
                                            id="{{ $user_profils->EMEL_PESERTA }}" type="email"
                                            value="{{ $user_profils->EMEL_PESERTA }}" disabled="" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_kod_kementerian">
                                            Kod Kementerian
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($user_profils->KOD_KEMENTERIAN != null)
                                            <input class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                                id="input_kod_kementerian" type="text"
                                                value="{{ $user_profils->KOD_KEMENTERIAN }}" disabled="" required>
                                        @else
                                            <input class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                                id="input_kod_kementerian" type="text" value="" disabled="" required>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-3" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h4 class="mb-0 text-white">Maklumat Permohonan</h4>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <a href="/profil/{{ $user_profils->id }}"
                                            class="fas fa-user-edit text-secondary text-sm button  text-white "
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Kemaskini"></a>
                                    </a>
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
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->NO_KAD_PENGENALAN }}">
                                                No MyKad/Polis/Tentera/Pasport
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="NO_KAD_PENGENALAN"
                                                id="{{ $user_profils->NO_KAD_PENGENALAN }}" type="text"
                                                value="{{ $user_profils->NO_KAD_PENGENALAN }}" disabled="" required
                                                maxlength="12" size="12">
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
                                            <input class="form-control form-control-sm ml-3" name="EMEL_PESERTA"
                                                id="{{ $user_profils->EMEL_PESERTA }}" type="email"
                                                value="{{ $user_profils->EMEL_PESERTA }}" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="input_kod_gelaran">
                                                Gelaran
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            @if ($user_profils->KOD_GELARAN == '01')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Brigidier Jeneral Dato"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '02')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Cik" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '03')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '04')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Amar" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '05')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '06')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Paduka" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '07')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Patinggi" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '08')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Professor Dr."
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '09')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Seri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '10')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Seri Utama" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '11')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Sri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '12')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Sri Cempaka" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '13')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Sri Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '14')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datin Wira" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '15')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '16')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Ir." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '17')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Ir Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '18')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Paduka" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '19')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato  Paduka Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '20')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Pahlawan" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '21')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Professor Madya Dr."
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '22')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Senara Muda" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '23')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Seri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '24')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Seri Panglima"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '25')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Seri Utama" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '26')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Sri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '27')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dato Wira" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '28')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datu" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '29')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '30')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Amar" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '31')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Bentara Luar"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '32')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Bentara Raja"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '33')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '34')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Kol." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '35')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Patinggi" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '36')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Professor" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '37')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Professor Dr."
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '38')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Seri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '39')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Seri Panglima"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '40')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Seri Utama" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '41')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Setia" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '42')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Setia Wangsa"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '43')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Sri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '44')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Sri Amar Diraja"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '45')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Sri Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '46')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Wira" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '47')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Datuk Wira Jaya" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '48')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Doktor" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '49')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Dr." disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '50')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Encik" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '51')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Hajjah" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '52')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Haji" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '53')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Ir" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '54')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Ir. Dr." disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '55')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Jeneral" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '56')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Kapten" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '57')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Kolonel" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '58')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Major" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '59')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Pehin Sri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '60')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Professor" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '61')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Professor Diraja" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '62')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Professor Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '63')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Professor Madya" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '64')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Professor Madya Dr."
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '65')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Puan" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '66')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Puan Sri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '67')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Puan Sri Datin" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '68')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Puan Sri Datin Professor"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '69')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Puan Sri Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '70')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Puan Sri Utama" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '71')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '72')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Dato Seri" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '73')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Dato" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '74')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Datuk" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '75')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Datuk Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '76')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Datuk Professor"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '77')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Datuk Professor Dr."
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '78')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Dr." disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '79')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Jeneral" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '80')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tan Sri Professor" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '81')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="To Puan" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '82')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Toh Puan Seri Utama"
                                                    disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '83')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tuan" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '84')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tuan Haji" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == '85')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Tun" disabled="" required>
                                            @elseif ($user_profils->KOD_GELARAN == '86')
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="Yang Mulia" disabled=""
                                                    required>
                                            @elseif ($user_profils->KOD_GELARAN == null)
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text" value="" disabled="" required>
                                            @else
                                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                    id="input_kod_gelaran" type="text"
                                                    value="{{ $user_profils->KOD_GELARAN }}" disabled="" required>
                                            @endif
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
                                            <input class="form-control form-control-sm ml-3" name="NAMA_PESERTA"
                                                id="{{ $user_profils->NAMA_PESERTA }}" type="text"
                                                value=" {{ $user_profils->NAMA_PESERTA }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="TARIKH_LAHIR"
                                                id="{{ $user_profils->TARIKH_LAHIR }}" type="date"
                                                value="{{ $user_profils->TARIKH_LAHIR }}" disabled="" required>
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
                                            @if ($user_profils->KOD_JANTINA == '01')
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                                    id="{{ $user_profils->KOD_JANTINA }}" type="text" value="Lelaki"
                                                    disabled="" required>
                                            @elseif($user_profils->KOD_JANTINA == "02")
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                                    id="{{ $user_profils->KOD_JANTINA }}" type="text" value="Perempuan"
                                                    disabled="" required>
                                            @elseif($user_profils->KOD_JANTINA == "Lelaki")
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                                    id="{{ $user_profils->KOD_JANTINA }}" type="text" value="Lelaki"
                                                    disabled="" required>
                                            @elseif($user_profils->KOD_JANTINA == "Perempuan")
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                                    id="{{ $user_profils->KOD_JANTINA }}" type="text" value="Perempuan"
                                                    disabled="" required>
                                            @else
                                                <input class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                                    id="{{ $user_profils->KOD_JANTINA }}" type="text" value=""
                                                    disabled="" required>
                                            @endif
                                            {{-- <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->KOD_JANTINA }}" type="text"
                                                value="{{ $user_profils->KOD_JANTINA }}" disabled="" required> --}}
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
                                            <input class="form-control form-control-sm ml-3" name="KOD_GELARAN_JAWATAN"
                                                id="{{ $user_profils->KOD_GELARAN_JAWATAN }}" type="text"
                                                value="{{ $user_profils->KOD_GELARAN_JAWATAN }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="KOD_PERINGKAT"
                                                id="{{ $user_profils->KOD_PERINGKAT }}" type="text"
                                                value="{{ $user_profils->KOD_PERINGKAT }}" disabled="" required>
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
                                                name="KOD_KLASIFIKASI_PERKHIDMATAN"
                                                id="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" type="text"
                                                value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" disabled=""
                                                required>
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
                                            <input class="form-control form-control-sm ml-3" name="KOD_GRED_JAWATAN"
                                                id="{{ $user_profils->KOD_GRED_JAWATAN }}" type="text"
                                                value="{{ $user_profils->KOD_GRED_JAWATAN }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="KOD_TARAF_PERJAWATAN"
                                                id="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" type="text"
                                                value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="KOD_JENIS_PERKHIDMATAN"
                                                id="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}" type="text"
                                                value="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="TARIKH_LANTIKAN"
                                                id="{{ $user_profils->TARIKH_LANTIKAN }}" type="text"
                                                value="{{ date('d/m/Y', strtotime($user_profils->TARIKH_LANTIKAN)) }}"
                                                disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PEJABAT"
                                                id="{{ $user_profils->NO_TELEFON_PEJABAT }}" type="text"
                                                value="{{ $user_profils->NO_TELEFON_PEJABAT }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="NO_TELEFON_BIMBIT"
                                                id="{{ $user_profils->NO_TELEFON_BIMBIT }}" type="text"
                                                value="{{ $user_profils->NO_TELEFON_BIMBIT }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="GELARAN_KETUA_JABATAN"
                                                id="{{ $user_profils->GELARAN_KETUA_JABATAN }}" type="text"
                                                value="{{ $user_profils->GELARAN_KETUA_JABATAN }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                                id="{{ $user_profils->KOD_KEMENTERIAN }}" type="text"
                                                value="{{ $user_profils->KOD_KEMENTERIAN }}" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->BAHAGIAN }}">
                                                Bahagian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="BAHAGIAN"
                                                id="{{ $user_profils->BAHAGIAN }}" type="text"
                                                value="{{ $user_profils->BAHAGIAN }}" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->ALAMAT_1 }}">
                                                Alamat Pejabat 1
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="ALAMAT_1"
                                                id="{{ $user_profils->ALAMAT_1 }}" type="text"
                                                value="{{ $user_profils->ALAMAT_1 }}" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->ALAMAT_2 }}">
                                                Alamat Pejabat 2
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="ALAMAT_2"
                                                id="{{ $user_profils->ALAMAT_2 }}" type="text"
                                                value="{{ $user_profils->ALAMAT_2 }}" disabled="">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->POSKOD }}">
                                                Poskod
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" name="POSKOD"
                                                id="{{ $user_profils->POSKOD }}" type="text"
                                                value="{{ $user_profils->POSKOD }}" disabled="" required>
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
                                                id="{{ $user_profils->BANDAR }}" type="text" name="BANDAR"
                                                value="{{ $user_profils->BANDAR }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="KOD_NEGERI"
                                                id="{{ $user_profils->KOD_NEGERI }}" type="text"
                                                value="{{ $user_profils->KOD_NEGERI }}" disabled="" required>
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
                                            <input class="form-control form-control-sm ml-3" name="NAMA_PENYELIA"
                                                id="{{ $user_profils->NAMA_PENYELIA }}" type="text"
                                                value="{{ $user_profils->NAMA_PENYELIA }}" disabled="">
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
                                            <input class="form-control form-control-sm ml-3" name="EMEL_PENYELIA"
                                                id="{{ $user_profils->EMEL_PENYELIA }}" type="email"
                                                value="{{ $user_profils->EMEL_PENYELIA }}" disabled="">
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
                                            <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PENYELIA"
                                                id="{{ $user_profils->NO_TELEFON_PENYELIA }}" type="text"
                                                value="{{ $user_profils->NO_TELEFON_PENYELIA }}" disabled=""
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
    @else
        <div class="container-fluid py-4">
            <div class="row mt-3">
                <div class="col-12 ">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a class="opacity-3 text-dark" href="javascript:;">
                                    <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
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
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                    href="javascript:;">Pages</a>
                            </li>
                            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                    href="javascript:;">Account</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profil</li>
                        </ol>
                        <h6 class="font-weight-bolder">Profil</h6>
                    </nav>
                    <div class="card card-body blur shadow-blur mx-4 my-3">
                        <div class="row gx-6">
                            <div class="col-auto">
                                <div class="avatar avatar-xl position-relative">
                                    <img src="https://st3.depositphotos.com/13159112/17145/v/600/depositphotos_171453724-stock-illustration-default-avatar-profile-icon-grey.jpg"
                                        alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-auto my-auto">
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
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header pb-0 p-3" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h4 class="mb-0 text-white">Profil</h4>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <a href="/profil/{{ $user_profils->id }}"
                                            class="fas fa-user-edit text-secondary text-sm button  text-white "
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Kemaskini"></a>
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
                                            <label class="form-control-label mr-4" for="{{ $user_profils->name }}}">
                                                Nama Penuh
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->name }}" type="text"
                                                value=" {{ $user_profils->name }}" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->nric }}">
                                                No Kad Pengenalan
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->nric }}" type="text"
                                                value="{{ $user_profils->nric }}" disabled="" required maxlength="12"
                                                size="12">
                                        </div>
                                    </div>
                                    <div class="row mb-2 divSektor">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="{{ $user_profils->email }}">
                                                E-mel
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3" id="sektor" type="email"
                                                value="{{ $user_profils->email }}" disabled="" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4"
                                                for="{{ $user_profils->ministry_code }}">
                                                Kod Kementerian
                                            </label><label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm ml-3"
                                                id="{{ $user_profils->ministry_code }}" type="text"
                                                value="{{ $user_profils->ministry_code }}" disabled="" required>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr class="horizontal gray-light my-4">

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
                                                <input id="password" type="password" class="form-control"
                                                    name="current_password" autocomplete="current-password" minlength="8">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Laluan
                                                Baru</label>

                                            <div class="col-md-6">
                                                <input id="new_password" type="password" class="form-control"
                                                    name="new_password" autocomplete="current-password" minlength="8">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Sah Kata
                                                Laluan
                                            </label>

                                            <div class="col-md-6">
                                                <input id="new_confirm_password" type="password" class="form-control"
                                                    name="new_confirm_password" autocomplete="current-password"
                                                    minlength="8">
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
            </div>
        </div>
    @endif

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop
