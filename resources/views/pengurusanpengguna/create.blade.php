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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengurusan Pengguna</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar Pengguna</li>
        </ol>
        <h6 class="font-weight-bolder">Daftar Pengguna</h6>
    </nav>


    <div class="col-12 ">
        <div class="col-12">
            <form method="POST" action="/pengurusanpengguna">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white">Daftar Pengguna</h5>
                    </div>
                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Nama :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="name" :value="old('name')"
                                        style="text-transform: uppercase" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">E-mel :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="email" name="email" :value="old('email')"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="user_group_id">Peranan :</label>
                                <div class="form-group">
                                    @role('penyelaras')
                                        <select class="form-control mb-3" name="user_group_id" id="pilih1" required readonly>
                                            <option value="pengawas" selected>Pengawas</option>
                                        </select>
                                    @else
                                        <select class="form-control mb-3" name="user_group_id" id="pilih1" required>
                                            <option value="" selected hidden>Sila pilih</option>
                                            @foreach ($role as $role)
                                                <option value="{{ $role->id }}">{{ ucfirst(trans($role->name)) }}</option>
                                            @endforeach
                                        </select>
                                    @endrole
                                </div>
                            </div>
                            <div id="pilih2" style="display:none" class="col-6">
                                <label for="">Kementerian/Jabatan :</label>
                                <div class="input-group">
                                    <select class="form-control ml-3" name="ministry_code" id="input_kementerian" required>
                                        <option hidden selected>
                                            Sila pilih
                                        </option>
                                        @foreach ($kementerians as $kementerian)
                                            <option value="{{ $kementerian->DESCRIPTION1 }}">
                                                {{ $kementerian->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">No Kad Pengenalan :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nric" required maxlength="12"
                                        size="12" :value="old('nric')"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Kata Laluan :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="password" name="password" required minlength="8">
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-gradient-warning " type="submit">Simpan</button>
                    </div>

                </div>
            </form>

        </div>
    </div>



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#pilih1").change(function() {
                if ($(this).val() == "3") {
                    $("#pilih2").show();
                } else {
                    $("#pilih2").hide();
                }
            });
        });
    </script>
@stop
