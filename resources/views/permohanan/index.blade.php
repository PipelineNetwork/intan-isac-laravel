@extends('base')
@section('content')
@if(Auth::user()->user_group_id == 5)
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-3 text-dark" href="javascript:;">
                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>shop </title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(0.000000, 148.000000)">
                                    <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                    </path>
                                    <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
    </ol>
    <h5 class="font-weight-bolder">Permohonan Penilaian</h5>
</nav>

<div class="row">
    <div class="col">
        <div class="card m-3">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white mb-0">Borang permohonan penilaian</h5>
            </div>
            <div class="card-body">
                <p class="text-sm"><em>
                        Sila pastikan semua informasi berikut adalah benar dan tepat. Sekiranya ada sebarang
                        pertukaran dalam profil anda, Sila kemaskini di platfom yang disediakan. Jika ada sebarang
                        pertanyaan sila hubungi Penolong Pegawai Teknologi maklumat. Sekian Terima Kasih.</em>
                </p>
                <div class="pl-lg-4 pb-lg-4 mt-lg-4">
                    <form action="#">
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    No MyKad/Polis/Tentera/Pasport
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" value="{{Auth::user()->nric}}" name="nric" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    E-mel
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="text" value="{{Auth::user()->email}}" name="email" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Gelaran
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" value="" name="GELARAN" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Nama
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" value="{{Auth::user()->name}}" name="name" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Tarikh Lahir
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="date" value="{{Auth::user()->TARIKH_LAHIR}}" name="TARIKH_LAHIR" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Jantina
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="KOD_JANTINA">
                                    <option hidden selected>Sila Pilih</option>
                                    <option value="01">Lelaki</option>
                                    <option value="02">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Gelaran Jawatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="KOD_JAWATAN">
                                    <option hidden selected>Sila Pilih</option>
                                    @foreach($gelarans as $gelaran)
                                    <option value="{{$gelaran->REFERENCECODE}}">{{$gelaran->DESCRIPTION1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Peringkat
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="KOD_PERINGKAT">
                                    <option hidden selected>Sila Pilih</option>
                                    @foreach($peringkats as $peringkat)
                                    <option value="{{$peringkat->REFERENCECODE}}">{{$peringkat->DESCRIPTION1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Klasifikasi perkhidmatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" value="" name="KLASIFIKASI_PERKHIDMATAN" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Gred Jawatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="GRED_JAWATAN">
                                    <option hidden selected>Sila Pilih</option>
                                    @foreach($gred_jawatans as $gred_jawatan)
                                    <option value="{{$gred_jawatan->REFERENCECODE}}">{{$gred_jawatan->DESCRIPTION1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Taraf Jawatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="TARAF_JAWATAN">
                                    <option hidden selected>Sila Pilih</option>
                                    @foreach($taraf_jawatans as $taraf_jawatan)
                                    <option value="{{$taraf_jawatan->REFERENCECODE}}">{{$taraf_jawatan->DESCRIPTION1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Jenis perkhidmatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="JENIS_JAWATAN">
                                    <option hidden selected>Sila Pilih</option>
                                    @foreach($jenis_jawatans as $jenis_jawatan)
                                    <option value="{{$jenis_jawatan->REFERENCECODE}}">{{$jenis_jawatan->DESCRIPTION1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Tarikh Lantikan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="date" value="{{Auth::user()->TARIKH_LANTIKAN}}" name="TARIKH_LANTIKAN">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    No Telefon Pejabat
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="text" value="{{Auth::user()->office_number}}" name="office_number">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    No Telefon Bimbit
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" value="{{Auth::user()->telephone_number}}" name="telephone_number">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Jawatan ketua jabatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control " type="text" value="" name="JAWATAN_KETUA_JABATAN">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Kementerian/Agensi
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="KEMENTERIAN_AGENSI">
                                    <option hidden selected>Sila Pilih</option>
                                    @foreach($kementerians as $kementerian)
                                    <option value="{{$kementerian->REFERENCECODE}}">{{$kementerian->DESCRIPTION1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Bahagian
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control" type="text" value="" name="BAHAGIAN">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Alamat 1
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="text" value="{{Auth::user()->ALAMAT_1}}" name="ALAMAT_1">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Alamat 2
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="text" value="{{Auth::user()->ALAMAT_2}}" name="ALAMAT_2">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Poskod
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="text" value="{{Auth::user()->POSKOD}}" name="POSKOD">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Negeri
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="NEGERI">
                                    <option hidden selected>Sila Pilih</option>
                                    @foreach($negeris as $negeri)
                                    <option value="{{$negeri->REFERENCECODE}}">{{$negeri->DESCRIPTION1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Nama Penyelia
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="text" value="{{Auth::user()->NAMA_PENYELIA}}" name="NAMA_PENYELIA">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    E-mel Penyelia
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="email" value="{{Auth::user()->EMEL_PENYELIA}}" name="EMEL_PENYELIA">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    No Tel Penyelia
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control  " type="text" value="{{Auth::user()->NO_TELEFON_PENYELIA}}" maxlength="11" name="TELEFON_PENYELIA">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center mt-3">
                                <button class="btn bg-gradient-info" type="submit">Simpan & seterusnya</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Auth::user()->user_group_id == 3)
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-3 text-dark" href="javascript:;">
                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>shop </title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(0.000000, 148.000000)">
                                    <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                    </path>
                                    <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
    </ol>
    <h5 class="font-weight-bolder">Pengurusan Penilaian</h5>
</nav>

<div class="row">
    <div class="col">
        <div class="card m-3">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white mb-0">Borang permohonan penilaian</h5>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label>Sila pilih jadual</label>
                        <select class="form-control">
                            <option hidden selected >Sila Pilih</option>
                            @foreach($jadual_penyelia as $jadual)
                            <option value="{{$jadual->ID_SESI}}">{{date('d-m-Y', strtotime($jadual->TARIKH_SESI))}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <button class="btn bg-gradient-info">Seterusnya</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<!-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-3 text-dark" href="javascript:;">
                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>shop </title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(0.000000, 148.000000)">
                                    <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                    </path>
                                    <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai Penilaian</a></li>
    </ol>
    </br>
    <h5 class="font-weight-bolder">Pengurusan Penilaian</h5>
</nav>

<div>
    <div class="row">
        <div class="column-12">
            <a href="/permohanans/create" class="btn bg-gradient-warning " type="submit" style="float: right;">Permohonan Penilaian </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header" style="background-color:#FFA500;">
        <b class="text-white">Senarai Penilaian</b>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

            <thead>
                <tr>

                    <th>ID Pengguna</th>
                    <th>Nama</th>
                    <th>No.Pejabat</th>
                    <th>No.Tel</th>
                    <th>Jantina</th>
                    <th>Tarikh Lahir</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pro_peserta as $pro_peserta)
                <tr>



                    <td>{{ $pro_peserta['NO_KAD_PENGENALAN'] }}</td>
                    <td>{{ $pro_peserta['NAMA_PESERTA'] }}</td>
                    <td>{{ $pro_peserta['NO_TELEFON_PEJABAT'] }}</td>
                    <td>{{ $pro_peserta['NO_TELEFON_BIMBIT'] }}</td>
                    <td>{{ $pro_peserta['KOD_JANTINA'] }}</td>
                    <td>{{ $pro_peserta['TARIKH_LAHIR'] }}</td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div> -->
@endif


<script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js" type="text/javascript"></script>
<script type="text/javascript">
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
        searchable: true,
        fixedHeight: true
    });
</script>

@stop