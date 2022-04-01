@extends('base')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="/dashboard">
                    <i class="fas fa-home"></i>
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
                                    <label class="form-control-label">Tarikh Lahir<span style="color: red">*</span>
                                        :</label>
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
                                    <label class="form-control-label">Gred Jawatan<span style="color: red">*</span>
                                        :</label>
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
                                    <label class="form-control-label">Taraf Perjawatan<span style="color: red">*</span>
                                        :</label>
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
                                    <label class="form-control-label">Jenis Perkhidmatan<span style="color: red">*</span>
                                        :</label>
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
                                    <label class="form-control-label">Tarikh Lantikan<span style="color: red">*</span>
                                        :</label>
                                    <input class="form-control mb-3" name="TARIKH_LANTIKAN" type="date"
                                        value="{{ $user_profils->TARIKH_LANTIKAN }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-control-label">No Telefon Pejabat<span style="color: red">*</span>
                                        :</label>
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
                                    <label class="form-control-label">Jawatan Ketua Jabatan<span style="color: red">*</span>
                                        :</label>
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
                                        <option value="Majlis Perbandaran Muar"> Majlis Perbandaran Muar
                                        </option>
                                        <option value="Majlis Bandaraya Alor Setar"> Majlis Bandaraya Alor Setar
                                        </option>
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
                                    <label class="form-control-label">Alamat Pejabat <span style="color: red">*</span>
                                        :</label>
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
                                    <label class="form-control-label">E-mel Penyelia<span style="color: red">*</span>
                                        :</label>
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
