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
            <div class="col-12">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Borang permohonan penilaian</h5>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4 pb-lg-4 mt-lg-4">
                            <form action="/mohonpenilaian" method="POST">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-3">
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
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            ID Calon
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        {{ $id_peserta }}
                                        <input class="form-control" type="hidden" value="{{ $id_peserta }}"
                                            name="id_peserta">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Tarikh sesi
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        {{ date('d-m-Y', strtotime($sesi_id->TARIKH_SESI)) }}
                                        <input class="form-control" type="hidden" value="{{ $sesi_id['TARIKH_SESI'] }}"
                                            name="tarikh_sesi">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            No MyKad/Polis/Tentera/Pasport<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="text" value="{{ $no_ic }}" name="no_ic">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Nama<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $nama }}" name="nama">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Tarikh lahir<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control " type="text"
                                            value="{{ date('d-m-Y', strtotime($tarikh_lahir)) }}" name="tarikh_lahir">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Jantina<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $jantina }}"
                                            name="jantina">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Jawatan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $jawatan_ketua_jabatan }}"
                                            name="jawatan_ketua_jabatan">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Taraf Jawatan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $taraf_jawatan }}"
                                            name="taraf_jawatan">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Tarikh lantikan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control" type="date" value="{{ $tarikh_lantikan }}"
                                            name="tarikh_lantikan">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Klasifikasi perkhidmatan<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $klasifikasi_perkhidmatan }}"
                                            name="klasifikasi_perkhidmatan">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Nombor telefon pejabat<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $no_telefon_pejabat }}"
                                            name="no_telefon_pejabat">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Alamat pejabat 1<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" name="alamat1_pejabat"
                                            value="{{ $alamat1_pejabat }}">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Alamat pejabat 2
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" name="alamat2_pejabat"
                                            value="{{ $alamat2_pejabat }}">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Poskod<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $poskod_pejabat }}"
                                            name="poskod_pejabat">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Nama penyelia<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $nama_penyelia }}"
                                            name="nama_penyelia">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Emel penyelia<span style="color: red">*</span>
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $emel_penyelia }}"
                                            name="emel_penyelia">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <label class="form-control-label mr-4">
                                            Nombor telefon penyelia
                                        </label><label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        <input class="form-control  " type="text" value="{{ $no_telefon_penyelia }}"
                                            name="no_telefon_penyelia">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col text-center">
                                        <button type="submit" class="btn bg-gradient-success">Hantar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script>
        $(document).on('submit', 'form', function() {
            setTimeout(function() {
                window.location = "/mohonpenilaian";
            }, 8000);
        });
    </script>
@stop
