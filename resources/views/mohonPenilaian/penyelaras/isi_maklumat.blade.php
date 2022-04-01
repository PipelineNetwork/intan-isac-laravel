@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
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
                        <div class="pl-lg-4 pb-lg-4 mt-lg-4">
                            @if ($details == null)
                                <div class="row mb-3">
                                    <div class="col">
                                        <p><em>Nombor MyKad/Polis/Tentera/Pasport ini tiada dalam senarai HRMIS dan
                                                pangkalan data sistem, sila arahkan calon tersebut untuk daftar ISAC
                                                menggunakan nombor
                                                MyKad/Polis/Tentera/Pasport ini.</em></p>
                                    </div>
                                </div>
                            @endif
                            <form action="/mohonpenilaian" method="POST">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            ID Sesi
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        {{ $sesi }}
                                        <input class="form-control" type="hidden" value="{{ $sesi }}"
                                            name="id_sesi">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            ID Calon
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        {{ $calon }}
                                        <input class="form-control" type="hidden" value="{{ $calon }}"
                                            name="id_calon">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Tarikh Sesi
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        {{ $sesi_id['TARIKH_SESI'] }}
                                        <input class="form-control" type="hidden" value="{{ $sesi_id['TARIKH_SESI'] }}"
                                            name="tarikh_sesi">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            No MyKad/Polis/Tentera/Pasport<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm" type="text" value="{{ $calon }}"
                                            name="no_ic">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Nama<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm" type="text" name="nama"
                                                value="{{ $details->name }}">
                                        @else
                                            <input class="form-control form-control-sm" type="text" name="nama">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Tarikh lahir<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm" type="date" name="tarikh_lahir"
                                                value="{{ $details->TARIKH_LAHIR }}">
                                        @else
                                            <input class="form-control form-control-sm" type="date" name="tarikh_lahir">
                                        @endif

                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Jantina<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control form-control-sm ml-3" name="jantina"
                                            id="input_kod_jantina" required>
                                            @if ($details != null)
                                                <option hidden selected value="{{ $details->KOD_JANTINA }}" selected
                                                    hidden>
                                                    {{ $details->KOD_JANTINA }}</option>
                                            @else
                                                <option hidden selected value="">
                                                    Sila pilih</option>
                                            @endif
                                            <option value="Lelaki">Lelaki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Jawatan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm" type="text"
                                                name="jawatan_ketua_jabatan" value="{{ $details->KOD_GELARAN_JAWATAN }}">
                                        @else
                                            <input class="form-control form-control-sm" type="text"
                                                name="jawatan_ketua_jabatan">
                                        @endif
                                        <span><small><i>Contoh: Pegawai Teknologi Maklumat, Gred
                                                    F41/F44</i></small></span>
                                    </div>

                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Taraf Jawatan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control form-control-sm ml-3" name="taraf_jawatan"
                                            id="input_taraf_perjawatan" required>
                                            @if ($details != null)
                                                <option hidden selected value="{{ $details->KOD_TARAF_PERJAWATAN }}">
                                                    {{ $details->KOD_TARAF_PERJAWATAN }}
                                                </option>
                                            @else
                                                <option hidden selected value="">Sila pilih
                                                </option>
                                            @endif
                                            @foreach ($taraf_perjawatans as $taraf_perjawatan)
                                                <option value="{{ $taraf_perjawatan->DESCRIPTION1 }}">
                                                    {{ $taraf_perjawatan->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Tarikh lantikan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm" type="date" name="tarikh_lantikan"
                                                value="{{ $details->TARIKH_LANTIKAN }}">
                                        @else
                                            <input class="form-control form-control-sm" type="date" name="tarikh_lantikan">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Klasifikasi perkhidmatan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-control form-control-sm ml-3" name="klasifikasi_perkhidmatan"
                                            id="input_klasifikasi_perkhidmatan" required>
                                            @if ($details != null)
                                                <option hidden selected
                                                    value="{{ $details->KOD_KLASIFIKASI_PERKHIDMATAN }}">
                                                    {{ $details->KOD_KLASIFIKASI_PERKHIDMATAN }}</option>
                                            @else
                                                <option hidden selected value="">Sila pilih</option>
                                            @endif
                                            @foreach ($klasifikasi_perkhidmatans as $klasifikasi_perkhidmatan)
                                                <option value="{{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}">
                                                    {{ $klasifikasi_perkhidmatan->DESCRIPTION1 }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Nombor telefon pejabat<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm " type="text"
                                                name="no_telefon_pejabat" maxlength="11"
                                                value="{{ $details->NO_TELEFON_PEJABAT }}">
                                        @else
                                            <input class="form-control form-control-sm " type="text"
                                                name="no_telefon_pejabat" maxlength="11">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Alamat pejabat 1<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm " type="text" name="alamat1_pejabat"
                                                value="{{ $details->ALAMAT_1 }}">
                                        @else
                                            <input class="form-control form-control-sm " type="text"
                                                name="alamat1_pejabat">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Alamat pejabat 2
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm " type="text" name="alamat2_pejabat"
                                                value="{{ $details->ALAMAT_2 }}">
                                        @else
                                            <input class="form-control form-control-sm " type="text"
                                                name="alamat2_pejabat">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Poskod<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm " type="text" name="poskod_pejabat"
                                                value="{{ $details->POSKOD }}" maxlength="5">
                                        @else
                                            <input class="form-control form-control-sm " type="text" name="poskod_pejabat"
                                                maxlength="5">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Nama penyelia<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm " type="text" name="nama_penyelia"
                                                value="{{ $details->NAMA_PENYELIA }}">
                                        @else
                                            <input class="form-control form-control-sm " type="text" name="nama_penyelia">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Emel penyelia<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm " type="text" name="emel_penyelia"
                                                value="{{ $details->EMEL_PENYELIA }}">
                                        @else
                                            <input class="form-control form-control-sm " type="text" name="emel_penyelia">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-3">
                                        <label class="form-control-label mr-4">
                                            Nombor telefon penyelia
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        @if ($details != null)
                                            <input class="form-control form-control-sm" type="text"
                                                name="no_telefon_penyelia" value="{{ $details->NO_TELEFON_PENYELIA }}"
                                                maxlength="11">
                                        @else
                                            <input class="form-control form-control-sm" type="text"
                                                name="no_telefon_penyelia" maxlength="11">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col text-center">
                                        <button type="submit" class="btn bg-gradient-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('submit', 'form', function() {
            setTimeout(function() {
                window.location = "/mohonpenilaian";
            }, 2000);
        });
    </script>

@stop
