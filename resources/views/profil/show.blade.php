@extends('base')
@section('content')
<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
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
                    {{$user->name}}
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    {{$user->email}}
                </p>
            </div>
        </div>
    </div>
</div>
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
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Account</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profil</li>
                </ol>
                <h6 class="font-weight-bolder">Profil</h6>
            </nav>
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h4 class="mb-0">Profil</h4>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;">
                                <a href="/profil/edit" class="fas fa-user-edit text-secondary text-sm button "
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Kemaskini"></a>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="card-body">
                        <p class="text-sm">
                            Sila pastikan semua informasi berikut adalah benar dan tepat. Sekiranya ada sebarang
                            pertukaran dalam profil anda, Sila kemaskini di platfom yang disediakan. Jika ada sebarang
                            pertanyaan sila hubungi Penoloong Pegawai Teknologi maklumat. Sekian Terima Kasih.
                        </p>
                        <div class="pl-lg-4 pb-lg-4">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="{{$user->name}}}">
                                        Nama Penuh
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" id="{{$user->name}}" type="text"
                                        value=" {{$user->name}}" disabled="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="t{{$user->telephone_number}}">
                                        Mobile:
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" id="{{$user->telephone_number}}" type="text"
                                        value="{{$user->telephone_number}}" disabled="">
                                </div>
                            </div>
                            <div class="row mb-2 divSektor">
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="{{$user->email}}">
                                        Email:
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" id="sektor" type="text"
                                        value="{{$user->email}}" disabled="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="{{$user->ministry_code}}">
                                        Kod Kementerian:
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" id="{{$user->ministry_code}}" type="text"
                                        value="{{$user->ministry_code}}" disabled="">
                                </div>
                            </div>
                            <div class="row mb-2 div">
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="{{$user->office_number}}">
                                    No.Tel.Pejabat:
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" id="{{$user->office_number}}" type="text"
                                        value="{{$user->office_number}}" disabled="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4" for="{{$user->fax_number}}">
                                    No.Faks:
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3" id="{{$user->fax_number}}" type="text"
                                        value="{{$user->fax_number}}" disabled="">
                                </div>
                            </div>
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
                    <h6 class="mb-1">Password</h6>
                    <p class="text-sm">Tukar Password</p>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="../../../assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                                            class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">Project #2</p>
                                    <a href="javascript:;">
                                        <h5>
                                            Modern
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        As Uber works through a huge amount of internal management turmoil.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                            Project</button>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Elena Morison">
                                                <img alt="Image placeholder" src="../../../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                                <img alt="Image placeholder" src="../../../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                                <img alt="Image placeholder" src="../../../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                                <img alt="Image placeholder" src="../../../assets/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="../../../assets/img/home-decor-2.jpg" alt="img-blur-shadow"
                                            class="img-fluid shadow border-radius-lg">
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">Project #1</p>
                                    <a href="javascript:;">
                                        <h5>
                                            Scandinavian
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        Music is something that every person has his or her own specific opinion about.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                            Project</button>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                                <img alt="Image placeholder" src="../../../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                                <img alt="Image placeholder" src="../../../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Elena Morison">
                                                <img alt="Image placeholder" src="../../../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                                <img alt="Image placeholder" src="../../../assets/img/team-2.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="../../../assets/img/home-decor-3.jpg" alt="img-blur-shadow"
                                            class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                                    <a href="javascript:;">
                                        <h5>
                                            Minimalist
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        Different people have different taste, and various types of music.
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                            Project</button>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                                <img alt="Image placeholder" src="../../../assets/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                                <img alt="Image placeholder" src="../../../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                                <img alt="Image placeholder" src="../../../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Elena Morison">
                                                <img alt="Image placeholder" src="../../../assets/img/team-1.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card h-100 card-plain border">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <a href="javascript:;">
                                        <i class="fa fa-plus text-secondary mb-3"></i>
                                        <h5 class=" text-secondary"> New project </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@stop