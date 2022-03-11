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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kemaskini Pengguna</li>
        </ol>
        <h6 class="font-weight-bolder">Kemaskini Pengguna</h6>
    </nav>

    <div class="container-fluid py-4">
        <form method="POST" action="/pengurusanpengguna/{{ $user_profils->id }}">
            @csrf
            @method('PUT')
            <div class="card mt-4" id="basic-info">
                <div class="card-header" style="background-color:#FFA500;">
                    <h5 class="text-white">Kemaskini Pengguna</h5>
                </div>
                <br>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">Nama :</label>
                                <input class="form-control mb-3" type="text" name="name" value="{{ $user_profils->name }}"
                                    style="text-transform: uppercase" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">E-mel :</label>
                                <input class="form-control mb-3" type="email" name="email"
                                    value="{{ $user_profils->email }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="user_group_id">Peranan :</label>
                                <div class="form-group">
                                    <select class="form-control mb-3" type="text" name="user_group_id" id="pilih1" required>
                                        @if ($role_name->name == 'pentadbir sistem')
                                            <option value="{{ $user_profils->user_group_id }}" hidden selected>Pentadbir
                                                sistem
                                            </option>
                                        @elseif ($role_name->name == 'pentadbir penilaian')
                                            <option value="{{ $user_profils->user_group_id }}" hidden selected>Pentadbir
                                                senilaian
                                            </option>
                                        @elseif ($role_name->name == 'penyelaras')
                                            <option value="{{ $user_profils->user_group_id }}" hidden selected>Penyelaras
                                            </option>
                                        @elseif ($role_name->name == 'pengawas')
                                            <option value="{{ $user_profils->user_group_id }}" hidden selected>Pengawas
                                            </option>
                                        @elseif ($role_name->name == 'calon')
                                            <option value="{{ $user_profils->user_group_id }}" hidden selected>Calon
                                            </option>
                                        @else
                                            <option value="{{ $user_profils->user_group_id }}" hidden selected>Pegawai
                                                korporat
                                            </option>
                                        @endif
                                        @foreach ($role as $role)
                                            <option value="{{ $role->id }}">{{ ucfirst(trans($role->name)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="pilih2" style="display:none" class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">Kod Kementerian :</label>
                                <select class="form-control mb-3" name="ministry_code" id="pilih2">
                                    <option hidden selected value="{{ $user_profils->ministry_code }}">
                                        {{ $user_profils->ministry_code }}
                                    </option>
                                    @foreach ($kementerians as $kementerian)
                                        <option value="{{ $kementerian->DESCRIPTION1 }}">
                                            {{ $kementerian->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label">No. Kad Pengenalan :</label>
                                <input class="form-control mb-3" type="text" name="nric"
                                    value="{{ $user_profils->nric }}" required maxlength="12" size="12"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                        </div>
                    </div>
                    @if ($user_profils->user_group_id == '5')
                        <div class="row" id="maklumat_calon">
                            <input type="hidden" name="ID_PESERTA" value="{{ $user_profils->ID_PESERTA }}">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gelaran :</label>
                                    @if (!empty($user_profils->KOD_GELARAN))
                                        <select class="form-control mb-3" name="KOD_GELARAN" id="input_kod_gelaran">
                                            {{-- <option hidden selected>{{ $gelaran_user->DESCRIPTION1 }}</option> --}}
                                            <option hidden selected value="{{ $user_profils->KOD_GELARAN }}">
                                                {{ $user_profils->KOD_GELARAN }}</option>
                                            @foreach ($kod_gelarans as $kod_gelaran)
                                                <option value="{{ $kod_gelaran->DESCRIPTION1 }}">
                                                    {{ $kod_gelaran->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-control mb-3" name="KOD_GELARAN" id="input_kod_gelaran">
                                            <option hidden selected value="">Sila Pilih</option>
                                            @foreach ($kod_gelarans as $kod_gelaran)
                                                <option value="{{ $kod_gelaran->DESCRIPTION1 }}">
                                                    {{ $kod_gelaran->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tarikh Lahir<span style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" type="date" name="TARIKH_LAHIR"
                                        value="{{ $user_profils->TARIKH_LAHIR }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Jantina<span style="color: red">*</span> :</label>
                                    @if ($user_profils->KOD_JANTINA != null)
                                        <select class="form-control mb-3" name="KOD_JANTINA" required>
                                            <option hidden selected value="{{ $user_profils->KOD_JANTINA }}">
                                                {{ $user_profils->KOD_JANTINA }}</option>
                                            <option value="Lelaki">Lelaki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    @else
                                        <select class="form-control mb-3" name="KOD_JANTINA" required>
                                            <option hidden selected value="">Sila Pilih</option>
                                            <option value="Lelaki">Lelaki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gelaran Jawatan :</label>
                                    <input class="form-control mb-3" name="KOD_GELARAN_JAWATAN" type="text"
                                        value="{{ $user_profils->KOD_GELARAN_JAWATAN }}">
                                    <span><small><i>Contoh: Pegawai Teknologi Maklumat, Gred
                                                F41/F44</i></small></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Peringkat<span style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_PERINGKAT" id="input_peringkat" required>
                                        <option hidden selected value="{{ $user_profils->KOD_PERINGKAT }}">
                                            {{ $user_profils->KOD_PERINGKAT }}</option>
                                        @foreach ($peringkats as $peringkat)
                                            <option value="{{ $peringkat->DESCRIPTION1 }}">
                                                {{ $peringkat->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Klasifikasi Perkhidmatan<span
                                            style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_KLASIFIKASI_PERKHIDMATAN" required>
                                        <option hidden selected
                                            value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}">
                                            {{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}
                                        </option>
                                        @foreach ($klasifikasi_perkhidmatans as $klasifikasi_perkhidmatan)
                                            <option value="{{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}">
                                                {{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gred Jawatan<span style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_GRED_JAWATAN" required>
                                        <option hidden selected value="{{ $user_profils->KOD_GRED_JAWATAN }}">
                                            {{ $user_profils->KOD_GRED_JAWATAN }}</option>
                                        @foreach ($gred_jawatans as $gred_jawatan)
                                            <option value="{{ $gred_jawatan->DESCRIPTION1 }}">
                                                {{ $gred_jawatan->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Taraf Perjawatan<span
                                            style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_TARAF_PERJAWATAN" required>
                                        <option hidden selected value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}">
                                            {{ $user_profils->KOD_TARAF_PERJAWATAN }}
                                        </option>
                                        @foreach ($taraf_perjawatans as $taraf_perjawatan)
                                            <option value="{{ $taraf_perjawatan->DESCRIPTION1 }}">
                                                {{ $taraf_perjawatan->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Jenis Perkhidmatan<span
                                            style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_JENIS_PERKHIDMATAN" required>
                                        <option hidden selected value="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}">
                                            {{ $user_profils->KOD_JENIS_PERKHIDMATAN }}
                                        </option>
                                        @foreach ($jenis_perkhidmatans as $jenis_perkhidmatan)
                                            <option value="{{ $jenis_perkhidmatan->DESCRIPTION1 }}">
                                                {{ $jenis_perkhidmatan->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tarikh Lantikan<span
                                            style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="TARIKH_LANTIKAN" type="date"
                                        value="{{ $user_profils->TARIKH_LANTIKAN }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">No Telefon Pejabat<span
                                            style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="NO_TELEFON_PEJABAT" type="text" maxlength="10"
                                        value="{{ $user_profils->NO_TELEFON_PEJABAT }}"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">No Telefon Bimbit :</label>
                                    <input class="form-control mb-3" name="NO_TELEFON_BIMBIT" type=" text"
                                        value="{{ $user_profils->NO_TELEFON_BIMBIT }}" maxlength="11"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Jawatan Ketua Jabatan<span
                                            style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="GELARAN_KETUA_JABATAN" type="text"
                                        value="{{ $user_profils->GELARAN_KETUA_JABATAN }}"
                                        style="text-transform:uppercase" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kementerian<span style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_KEMENTERIAN" required>
                                        <option hidden selected value="{{ $user_profils->KOD_KEMENTERIAN }}">
                                            {{ $user_profils->KOD_KEMENTERIAN }}
                                        </option>
                                        @foreach ($kementerians as $kementerian)
                                            <option value="{{ $kementerian->DESCRIPTION1 }}">
                                                {{ $kementerian->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Agensi<span style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_JABATAN" required>
                                        <option hidden selected value="{{ $user_profils->KOD_JABATAN }}">
                                            {{ $user_profils->KOD_JABATAN }}
                                        </option>
                                        <option>TIDAK BERKAITAN</option>
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->DESCRIPTION1 }}">
                                                {{ $jabatan->DESCRIPTION1 }}</option>
                                        @endforeach
                                        <option value="Universiti Tun Hussein Onn Malaysia"> Universiti Tun Hussein
                                            Onn Malaysia </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Bahagian<span style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="BAHAGIAN" type="text"
                                        value="{{ $user_profils->BAHAGIAN }}" required>
                                    <span><small><i>Sila masukkan maklumat lengkap tempat bertugas
                                                anda</i></small></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Alamat Pejabat <span
                                            style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="ALAMAT_1" type="text"
                                        value="{{ $user_profils->ALAMAT_1 }}" style="text-transform:uppercase" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Poskod<span style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="POSKOD" type="text"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        maxlength="5" size="5" value="{{ $user_profils->POSKOD }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Bandar<span style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="BANDAR" type="text"
                                        value="{{ $user_profils->BANDAR }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Negeri<span style="color: red">*</span> :</label>
                                    <select class="form-control mb-3" name="KOD_NEGERI" required>
                                        <option hidden selected value="{{ $user_profils->KOD_NEGERI }}">
                                            {{ $user_profils->KOD_NEGERI }}
                                        </option>
                                        @foreach ($negeris as $negeri)
                                            <option value="{{ $negeri->DESCRIPTION1 }}">
                                                {{ $negeri->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Penyelia :</label>
                                    <input class="form-control mb-3" name="NAMA_PENYELIA" type="text"
                                        style="text-transform:uppercase" value="{{ $user_profils->NAMA_PENYELIA }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">E-mel Penyelia<span
                                            style="color: red">*</span> :</label>
                                    <input class="form-control mb-3" name="EMEL_PENYELIA" type="email"
                                        value="{{ $user_profils->EMEL_PENYELIA }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">No Telefon Penyelia :</label>
                                    <input class="form-control mb-3" name="NO_TELEFON_PENYELIA" type="text"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        value="{{ $user_profils->NO_TELEFON_PENYELIA }}" maxlength="11">
                                </div>
                            </div>
                            <label><i><span style="color: red">*</span>Ruang wajib diisi.</i></label><br>
                        </div>
                    @endif

                    <button class="btn bg-gradient-warning" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#pilih1").change(function() {
                if ($(this).val() == "3") {
                    $("#pilih2").show().find(':input').attr('required', true);;
                } else {
                    $("#pilih2").hide().find(':input').attr('required', false);
                }
            });
        });

        $(function() {
            $("#pilih1").change(function() {
                if ($(this).val() == "5") {
                    $("#maklumat_calon").show()
                } else {
                    $("#maklumat_calon").hide()
                }
            });
        })
    </script>
@stop
