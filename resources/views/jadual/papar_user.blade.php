@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="/dashboard">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Tambah
                                Calon</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <h5 class="font-weight-bolder">Calon</h5>
    </div>

    <div class="col-12 mb-3">
        <form method="POST" action="/jaduals/{{$id_sesis}}/daftar_calon">
            @csrf
            <div class="card mt-4" id="basic-info">
                <div class="card-header" style="background-color:#FFA500;">
                    <h5 class="text-white">Kemaskini Maklumat Peserta</h5>
                </div>
                <br>
                <div class="card-body pt-0">
                    <p class="text-sm">
                        Sila pastikan semua informasi berikut adalah benar dan tepat. Sekiranya ada
                        sebarang
                        pertukaran dalam profil anda, Sila kemaskini di form yang dibawah. Jika
                        ada sebarang
                        pertanyaan sila hubungi Penolong Pegawai Teknologi maklumat. Sekian Terima
                        Kasih.
                    </p>
                    <div class="pl-lg-4 pb-lg-4">
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    ID Penilaian
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="id_sesi"
                                    value="{{ $id_penilaian }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <input type="hidden" name="ID_PESERTA" value="{{ $users->ID_PESERTA }}">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    No MyKad/Polis/Tentera/Pasport<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" type="text"
                                    value="{{ $users->NO_KAD_PENGENALAN }}" maxlength="12" size="12" required
                                    name="NO_KAD_PENGENALAN"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->EMEL_PESERTA }}">
                                    E-mel
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" id="{{ $users->EMEL_PESERTA }}"
                                    type="email" name="EMEL_PESERTA" value="{{ $users->EMEL_PESERTA }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kod_gelaran">
                                    Gelaran
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                @if (!empty($users->KOD_GELARAN))
                                    <select class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                        id="input_kod_gelaran" required>
                                        {{-- <option hidden selected>{{ $gelaran_user->DESCRIPTION1 }}</option> --}}
                                        <option hidden selected value="{{ $users->KOD_GELARAN }}">
                                            {{ $users->KOD_GELARAN }}</option>
                                        @foreach ($kod_gelarans as $kod_gelaran)
                                            <option value="{{ $kod_gelaran->REFERENCECODE }}">
                                                {{ $kod_gelaran->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <select class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                        id="input_kod_gelaran" required>
                                        <option hidden selected value="">Sila Pilih</option>
                                        @foreach ($kod_gelarans as $kod_gelaran)
                                            <option value="{{ $kod_gelaran->REFERENCECODE }}">
                                                {{ $kod_gelaran->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->NAMA_PESERTA }}}">
                                    Nama Penuh<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" id="{{ $users->NAMA_PESERTA }}"
                                    type="text" name="NAMA_PESERTA" value=" {{ $users->NAMA_PESERTA }}"
                                    style="text-transform:uppercase" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->TARIKH_LAHIR }}">
                                    Tarikh Lahir<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" id="{{ $users->TARIKH_LAHIR }}"
                                    type="date" name="TARIKH_LAHIR" value="{{ $users->TARIKH_LAHIR }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kod_jantina">
                                    Jantina<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                @if ($users->KOD_JANTINA != null)
                                    <select class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                        id="input_kod_jantina" required>
                                        <option hidden selected value="{{ $users->KOD_JANTINA }}">
                                            {{ $users->KOD_JANTINA }}</option>
                                        <option value="Lelaki">Lelaki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                @else
                                    <select class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                        id="input_kod_jantina" required>
                                        <option hidden selected value="">Sila Pilih</option>
                                        <option value="Lelaki">Lelaki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kod_gelaran_jawatan">
                                    Gelaran Jawatan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="KOD_GELARAN_JAWATAN"
                                    id="input_kod_gelaran_jawatan" type="text"
                                    value="{{ $users->KOD_GELARAN_JAWATAN }}">
                                <span><small><i>Contoh: Pegawai Teknologi Maklumat, Gred
                                            F41/F44</i></small></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_peringkat">
                                    Peringkat<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_PERINGKAT" id="input_peringkat"
                                    required>
                                    <option hidden selected value="{{ $users->KOD_PERINGKAT }}">
                                        {{ $users->KOD_PERINGKAT }}</option>
                                    @foreach ($peringkats as $peringkat)
                                        <option value="{{ $peringkat->DESCRIPTION1 }}">
                                            {{ $peringkat->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_PERINGKAT"
                                id="{{ $users->KOD_PERINGKAT }}" type="text"
                                value="{{ $users->KOD_PERINGKAT }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_klasifikasi_perkhidmatan">
                                    Klasifikasi Perkhidmatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_KLASIFIKASI_PERKHIDMATAN"
                                    id="input_klasifikasi_perkhidmatan" required>
                                    <option hidden selected value="{{ $users->KOD_KLASIFIKASI_PERKHIDMATAN }}">
                                        {{ $users->KOD_KLASIFIKASI_PERKHIDMATAN }}
                                    </option>
                                    @foreach ($klasifikasi_perkhidmatans as $klasifikasi_perkhidmatan)
                                        <option value="{{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}">
                                            {{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3"
                                name="KOD_KLASIFIKASI_PERKHIDMATAN"
                                id="{{ $users->KOD_KLASIFIKASI_PERKHIDMATAN }}" type="text"
                                value="{{ $users->KOD_KLASIFIKASI_PERKHIDMATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_gred_jawatan">
                                    Gred Jawatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_GRED_JAWATAN"
                                    id="input_gred_jawatan" required>
                                    <option hidden selected value="{{ $users->KOD_GRED_JAWATAN }}">
                                        {{ $users->KOD_GRED_JAWATAN }}</option>
                                    @foreach ($gred_jawatans as $gred_jawatan)
                                        <option value="{{ $gred_jawatan->DESCRIPTION1 }}">
                                            {{ $gred_jawatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_GRED_JAWATAN"
                                id="{{ $users->KOD_GRED_JAWATAN }}" type="text"
                                value="{{ $users->KOD_GRED_JAWATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_taraf_perjawatan">
                                    Taraf Perjawatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_TARAF_PERJAWATAN"
                                    id="input_taraf_perjawatan" required>
                                    <option hidden selected value="{{ $users->KOD_TARAF_PERJAWATAN }}">
                                        {{ $users->KOD_TARAF_PERJAWATAN }}
                                    </option>
                                    @foreach ($taraf_perjawatans as $taraf_perjawatan)
                                        <option value="{{ $taraf_perjawatan->DESCRIPTION1 }}">
                                            {{ $taraf_perjawatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_TARAF_PERJAWATAN"
                                id="{{ $users->KOD_TARAF_PERJAWATAN }}" type="text"
                                value="{{ $users->KOD_TARAF_PERJAWATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_jenis_perkhidmatan">
                                    Jenis Perkhidmatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_JENIS_PERKHIDMATAN"
                                    id="input_jenis_perkhidmatan" required>
                                    <option hidden selected value="{{ $users->KOD_JENIS_PERKHIDMATAN }}">
                                        {{ $users->KOD_JENIS_PERKHIDMATAN }}
                                    </option>
                                    @foreach ($jenis_perkhidmatans as $jenis_perkhidmatan)
                                        <option value="{{ $jenis_perkhidmatan->DESCRIPTION1 }}">
                                            {{ $jenis_perkhidmatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_JENIS_PERKHIDMATAN"
                                id="{{ $users->KOD_JENIS_PERKHIDMATAN }}" type="text"
                                value="{{ $users->KOD_JENIS_PERKHIDMATAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->TARIKH_LANTIKAN }}">
                                    Tarikh Lantikan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="TARIKH_LANTIKAN"
                                    id="{{ $users->TARIKH_LANTIKAN }}" type="date"
                                    value="{{ $users->TARIKH_LANTIKAN }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_no_tel_pejabat">
                                    No Telefon Pejabat<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PEJABAT"
                                    id="input_no_tel_pejabat" type="text" maxlength="10"
                                    value="{{ $users->NO_TELEFON_PEJABAT }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_no_tel_bimbit">
                                    No Telefon Bimbit
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NO_TELEFON_BIMBIT"
                                    id="input_no_tel_bimbit" type="text" value="{{ $users->NO_TELEFON_BIMBIT }}"
                                    maxlength="11"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_gelaran_ketua_jabatan">
                                    Jawatan Ketua Jabatan<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="GELARAN_KETUA_JABATAN"
                                    id="input_gelaran_ketua_jabatan" type="text"
                                    value="{{ $users->GELARAN_KETUA_JABATAN }}" style="text-transform:uppercase"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_kementerian">
                                    Kementerian<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                    id="input_kementerian" required>
                                    <option hidden selected value="{{ $users->KOD_KEMENTERIAN }}">
                                        {{ $users->KOD_KEMENTERIAN }}
                                    </option>
                                    @foreach ($kementerians as $kementerian)
                                        <option value="{{ $kementerian->DESCRIPTION1 }}">
                                            {{ $kementerian->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                id="input_kementerian" type="text"
                                value="{{ $users->KOD_KEMENTERIAN }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4">
                                    Agensi<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_JABATAN" id="input_kementerian"
                                    required>
                                    <option hidden selected value="{{ $users->KOD_JABATAN }}">
                                        {{ $users->KOD_JABATAN }}
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
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->BAHAGIAN }}">
                                    Bahagian
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="BAHAGIAN"
                                    id="{{ $users->BAHAGIAN }}" type="text"
                                    value="{{ $users->BAHAGIAN }}">
                                <span><small><i>Sila masukkan maklumat lengkap tempat bertugas
                                            anda</i></small></span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_alamat_1">
                                    Alamat Pejabat 1<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="ALAMAT_1" id="input_alamat_1"
                                    type="text" value="{{ $users->ALAMAT_1 }}" style="text-transform:uppercase"
                                    required>
                            </div>
                        </div>
                        {{-- <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_alamat_2">
                                    Alamat Pejabat 2
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="ALAMAT_2"
                                    id="input_alamat_2" type="text" value="{{ $users->ALAMAT_2 }}"
                                    style="text-transform:uppercase">
                            </div>
                        </div> --}}
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_poskod">
                                    Poskod<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="POSKOD" id="input_poskod"
                                    type="text"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="5" size="5" value="{{ $users->POSKOD }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->BANDAR }}">
                                    Bandar<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="BANDAR"
                                    id="{{ $users->BANDAR }}" type="text" value="{{ $users->BANDAR }}"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_negeri">
                                    Negeri<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control form-control-sm ml-3" name="KOD_NEGERI" id="input_negeri"
                                    required>
                                    <option hidden selected value="{{ $users->KOD_NEGERI }}">
                                        {{ $users->KOD_NEGERI }}
                                    </option>
                                    @foreach ($negeris as $negeri)
                                        <option value="{{ $negeri->DESCRIPTION1 }}">
                                            {{ $negeri->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control form-control-sm ml-3" name="KOD_NEGERI"
                                id="input_negeri" type="text"
                                value="{{ $users->KOD_NEGERI }}" required> --}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="input_nama_penyelia">
                                    Nama Penyelia
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NAMA_PENYELIA"
                                    id="input_nama_penyelia" type="text" style="text-transform:uppercase"
                                    value="{{ $users->NAMA_PENYELIA }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->EMEL_PENYELIA }}">
                                    E-mel Penyelia<span style="color: red">*</span>
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="EMEL_PENYELIA"
                                    id="{{ $users->EMEL_PENYELIA }}" type="email"
                                    value="{{ $users->EMEL_PENYELIA }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <label class="form-control-label mr-4" for="{{ $users->NO_TELEFON_PENYELIA }}">
                                    No Telefon Penyelia
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control form-control-sm ml-3" name="NO_TELEFON_PENYELIA"
                                    id="{{ $users->NO_TELEFON_PENYELIA }}" type="text"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    value="{{ $users->NO_TELEFON_PENYELIA }}" maxlength="11">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn bg-gradient-success text-center" type="submit" id="tekan">Hantar</button>
                        </div>
                    </div>

                    <section class="preloader" id="preload">
                        <div class="spinner" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="word">
                            <span>Sila Tunggu...</span>
                        </div>
                    </section>

                </div>
            </div>
        </form>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script>
        $(document).ready(function() {
            $('#preload').hide();
        });

        $(document).on('submit', 'form', function() {
            $('#tekan').click(function() {
                $(this).attr('disabled', 'disabled');
            })
            $('#preload').show();
            setTimeout(function() {
                window.location = "/mohonpenilaian";
            }, 9000);
        });
    </script>
@stop
