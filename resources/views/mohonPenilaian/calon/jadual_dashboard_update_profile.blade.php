@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="col-12 mb-3">
                <form method="POST" action="/mohonpenilaian/daftar_permohonan_calon">
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
                                        <input class="form-control form-control-sm ml-3" name="id_sesi" value="{{ $id_penilaian }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <input type="hidden" name="ID_PESERTA" value="{{ $user_profils->ID_PESERTA }}">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            No MyKad/Polis/Tentera/Pasport<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" type="text"
                                            value="{{ $user_profils->NO_KAD_PENGENALAN }}" maxlength="12" size="12"
                                            required name="NO_KAD_PENGENALAN"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="{{ $user_profils->EMEL_PESERTA }}">
                                            E-mel
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3"
                                            id="{{ $user_profils->EMEL_PESERTA }}" type="email" name="EMEL_PESERTA"
                                            value="{{ $user_profils->EMEL_PESERTA }}">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_kod_gelaran">
                                            Gelaran
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($user_profils->KOD_GELARAN != null)
                                            <select class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                id="input_kod_gelaran">
                                                {{-- <option hidden selected>{{ $gelaran_user->DESCRIPTION1 }}</option> --}}
                                                <option hidden selected value="{{ $gelaran_user->KOD_GELARAN }}">
                                                    {{ $gelaran_user->DESCRIPTION1 }}</option>
                                                @foreach ($kod_gelarans as $kod_gelaran)
                                                    <option value="{{ $kod_gelaran->REFERENCECODE }}">
                                                        {{ $kod_gelaran->DESCRIPTION1 }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select class="form-control form-control-sm ml-3" name="KOD_GELARAN"
                                                id="input_kod_gelaran">
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
                                        <label class="form-control-label mr-4" for="{{ $user_profils->NAMA_PESERTA }}}">
                                            Nama Penuh<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3"
                                            id="{{ $user_profils->NAMA_PESERTA }}" type="text" name="NAMA_PESERTA"
                                            value=" {{ $user_profils->NAMA_PESERTA }}" style="text-transform:uppercase"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="{{ $user_profils->TARIKH_LAHIR }}">
                                            Tarikh Lahir<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3"
                                            id="{{ $user_profils->TARIKH_LAHIR }}" type="date" name="TARIKH_LAHIR"
                                            value="{{ $user_profils->TARIKH_LAHIR }}" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_kod_jantina">
                                            Jantina<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($user_profils->KOD_JANTINA != null)
                                            <select class="form-control form-control-sm ml-3" name="KOD_JANTINA"
                                                id="input_kod_jantina" required>
                                                <option hidden selected value="{{ $user_profils->KOD_JANTINA }}">
                                                    {{ $user_profils->KOD_JANTINA }}</option>
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
                                            value="{{ $user_profils->KOD_GELARAN_JAWATAN }}">
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
                                        <select class="form-control form-control-sm ml-3" name="KOD_PERINGKAT"
                                            id="input_peringkat" required>
                                            <option hidden selected value="{{ $user_profils->KOD_PERINGKAT }}">{{ $user_profils->KOD_PERINGKAT }}</option>
                                            @foreach ($peringkats as $peringkat)
                                                <option value="{{ $peringkat->DESCRIPTION1 }}">
                                                    {{ $peringkat->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input class="form-control form-control-sm ml-3" name="KOD_PERINGKAT"
                                        id="{{ $user_profils->KOD_PERINGKAT }}" type="text"
                                        value="{{ $user_profils->KOD_PERINGKAT }}" required> --}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_klasifikasi_perkhidmatan">
                                            Klasifikasi Perkhidmatan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control form-control-sm ml-3"
                                            name="KOD_KLASIFIKASI_PERKHIDMATAN" id="input_klasifikasi_perkhidmatan"
                                            required>
                                            <option hidden selected value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}">{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}
                                            </option>
                                            @foreach ($klasifikasi_perkhidmatans as $klasifikasi_perkhidmatan)
                                                <option value="{{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}">
                                                    {{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input class="form-control form-control-sm ml-3"
                                        name="KOD_KLASIFIKASI_PERKHIDMATAN"
                                        id="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" type="text"
                                        value="{{ $user_profils->KOD_KLASIFIKASI_PERKHIDMATAN }}" required> --}}
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
                                            <option hidden selected value="{{ $user_profils->KOD_GRED_JAWATAN }}">{{ $user_profils->KOD_GRED_JAWATAN }}</option>
                                            @foreach ($gred_jawatans as $gred_jawatan)
                                                <option value="{{ $gred_jawatan->DESCRIPTION1 }}">
                                                    {{ $gred_jawatan->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input class="form-control form-control-sm ml-3" name="KOD_GRED_JAWATAN"
                                        id="{{ $user_profils->KOD_GRED_JAWATAN }}" type="text"
                                        value="{{ $user_profils->KOD_GRED_JAWATAN }}" required> --}}
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
                                            <option hidden selected value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}">{{ $user_profils->KOD_TARAF_PERJAWATAN }}
                                            </option>
                                            @foreach ($taraf_perjawatans as $taraf_perjawatan)
                                                <option value="{{ $taraf_perjawatan->DESCRIPTION1 }}">
                                                    {{ $taraf_perjawatan->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input class="form-control form-control-sm ml-3" name="KOD_TARAF_PERJAWATAN"
                                        id="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" type="text"
                                        value="{{ $user_profils->KOD_TARAF_PERJAWATAN }}" required> --}}
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
                                            <option hidden selected value="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}">{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}
                                            </option>
                                            @foreach ($jenis_perkhidmatans as $jenis_perkhidmatan)
                                                <option value="{{ $jenis_perkhidmatan->DESCRIPTION1 }}">
                                                    {{ $jenis_perkhidmatan->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input class="form-control form-control-sm ml-3" name="KOD_JENIS_PERKHIDMATAN"
                                        id="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}" type="text"
                                        value="{{ $user_profils->KOD_JENIS_PERKHIDMATAN }}" required> --}}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4"
                                            for="{{ $user_profils->TARIKH_LANTIKAN }}">
                                            Tarikh Lantikan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="TARIKH_LANTIKAN"
                                            id="{{ $user_profils->TARIKH_LANTIKAN }}" type="date"
                                            value="{{ $user_profils->TARIKH_LANTIKAN }}" required>
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
                                            value="{{ $user_profils->NO_TELEFON_PEJABAT }}"
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
                                            id="input_no_tel_bimbit" type="text"
                                            value="{{ $user_profils->NO_TELEFON_BIMBIT }}" maxlength="11"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_gelaran_ketua_jabatan">
                                            Jawatan Ketua Jabatan
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="GELARAN_KETUA_JABATAN"
                                            id="input_gelaran_ketua_jabatan" type="text"
                                            value="{{ $user_profils->GELARAN_KETUA_JABATAN }}"
                                            style="text-transform:uppercase">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_kementerian">
                                            Kementerian/Agensi<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                            id="input_kementerian" required>
                                            <option hidden selected value="{{ $user_profils->KOD_KEMENTERIAN }}">{{ $user_profils->KOD_KEMENTERIAN }}
                                            </option>
                                            @foreach ($kementerians as $kementerian)
                                                <option value="{{ $kementerian->DESCRIPTION1 }}">
                                                    {{ $kementerian->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input class="form-control form-control-sm ml-3" name="KOD_KEMENTERIAN"
                                        id="input_kementerian" type="text"
                                        value="{{ $user_profils->KOD_KEMENTERIAN }}" required> --}}
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
                                            value="{{ $user_profils->BAHAGIAN }}">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_alamat_1">
                                            Alamat Pejabat 1<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="ALAMAT_1"
                                            id="input_alamat_1" type="text" value="{{ $user_profils->ALAMAT_1 }}"
                                            style="text-transform:uppercase" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_alamat_2">
                                            Alamat Pejabat 2
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="ALAMAT_2"
                                            id="input_alamat_2" type="text" value="{{ $user_profils->ALAMAT_2 }}"
                                            style="text-transform:uppercase">
                                    </div>
                                </div>
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
                                            maxlength="5" size="5" value="{{ $user_profils->POSKOD }}" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="{{ $user_profils->BANDAR }}">
                                            Bandar<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="BANDAR"
                                            id="{{ $user_profils->BANDAR }}" type="text"
                                            value="{{ $user_profils->BANDAR }}" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="input_negeri">
                                            Negeri<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control form-control-sm ml-3" name="KOD_NEGERI"
                                            id="input_negeri" required>
                                            <option hidden selected value="{{ $user_profils->KOD_NEGERI }}">{{ $user_profils->KOD_NEGERI }}
                                            </option>
                                            @foreach ($negeris as $negeri)
                                                <option value="{{ $negeri->DESCRIPTION1 }}">
                                                    {{ $negeri->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input class="form-control form-control-sm ml-3" name="KOD_NEGERI"
                                        id="input_negeri" type="text"
                                        value="{{ $user_profils->KOD_NEGERI }}" required> --}}
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
                                            value="{{ $user_profils->NAMA_PENYELIA }}">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4" for="{{ $user_profils->EMEL_PENYELIA }}">
                                            E-mel Penyelia<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm ml-3" name="EMEL_PENYELIA"
                                            id="{{ $user_profils->EMEL_PENYELIA }}" type="email"
                                            value="{{ $user_profils->EMEL_PENYELIA }}" required>
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
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            value="{{ $user_profils->NO_TELEFON_PENYELIA }}" maxlength="11">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button class="btn bg-gradient-success text-center" type="submit">Hantar</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        $(document).on('submit', 'form', function() {
            setTimeout(function() {
                window.location = "/mohonpenilaian";
            }, 8000);
        });
    </script>

@stop
