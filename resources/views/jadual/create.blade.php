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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual
                                Baru</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h5 class="font-weight-bolder">Tambah Jadual Baru</h5>
            </div>
        </div>

        <div class="col-10">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terdapat beberapa kesalahan:<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </div>
            @endif --}}


            <form method="POST" action="/jaduals" enctype="multipart/form-data">
                @csrf
                <div class="card mt-4 " id="basic-info">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white">Butiran jadual:</h5>
                    </div>
                    </br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="KOD_SESI_PENILAIAN">Sesi :</label>
                                <div class="input-group">
                                    <select class="form-control mb-0" type="text" name="KOD_SESI_PENILAIAN">
                                        <option hidden value=""> Sila Pilih </option>
                                        <option value="01" {{ old('KOD_SESI_PENILAIAN') == '01' ? 'selected' : '' }}>1
                                        </option>
                                        <option value="02" {{ old('KOD_SESI_PENILAIAN') == '02' ? 'selected' : '' }}>2
                                        </option>
                                        <option value="03" {{ old('KOD_SESI_PENILAIAN') == '03' ? 'selected' : '' }}>3
                                        </option>
                                    </select>
                                    @error('KOD_SESI_PENILAIAN')
                                        <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="KOD_TAHAP">Tahap :</label>
                                <div class="input-group">
                                    <select class="form-control mb-0" type="text" name="KOD_TAHAP">
                                        <option hidden value=""> Sila Pilih </option>
                                        <option value="01" {{ old('KOD_TAHAP') == '01' ? 'selected' : '' }}>Asas</option>
                                        <option value="02" {{ old('KOD_TAHAP') == '02' ? 'selected' : '' }}>Lanjutan
                                        </option>
                                    </select>
                                    @error('KOD_TAHAP')
                                        <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="KOD_MASA_MULA">Masa Mula :</label>
                                <div class="input-group">
                                    <input class="form-control mb-0 hide" type="time" name="KOD_MASA_MULA"
                                        value="{{ old('KOD_MASA_MULA') }}" id="masa_mula" onchange="auto_time()">
                                </div>
                                @error('KOD_MASA_MULA')
                                    <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="KOD_MASA_TAMAT">Masa Tamat :</label>
                                <div class="input-group">
                                    <input class="form-control mb-0" type="text" id="masa_tamat" readonly>
                                </div>
                                <input type="hidden" name="KOD_MASA_TAMAT" id="masa_tamat2" value="">
                                @error('KOD_MASA_TAMAT')
                                    <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="TARIKH_SESI">Tarikh :</label>
                                <div class="input-group">
                                    <input class="form-control mb-0" type="date" name="TARIKH_SESI"
                                        value="{{ old('TARIKH_SESI') }}">
                                </div>
                                @error('TARIKH_SESI')
                                    <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="JUMLAH_KESELURUHAN">Jumlah Calon</label>
                                <div class="input-group">
                                    <input class="form-control mb-0" type="text" name="JUMLAH_KESELURUHAN"
                                        value="{{ old('JUMLAH_KESELURUHAN') }}">
                                </div>
                                @error('JUMLAH_KESELURUHAN')
                                    <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="KOD_KATEGORI_PESERTA">Kategori Peserta :</label>
                                <div class="form-group">
                                    <select class="form-control mb-0" name="KOD_KATEGORI_PESERTA" id="pilih1">
                                        <option hidden value=""> Sila Pilih </option>
                                        <option value="01" {{ old('KOD_KATEGORI_PESERTA') == '01' ? 'selected' : '' }}>
                                            Individu</option>
                                        <option value="02" {{ old('KOD_KATEGORI_PESERTA') == '02' ? 'selected' : '' }}>
                                            Kumpulan</option>
                                    </select>
                                    @error('KOD_KATEGORI_PESERTA')
                                        <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                    @enderror
                                </div>
                            </div>
                            <div id="pilih2" style="display:none" class="col-6">
                                <label for="KOD_KEMENTERIAN">Kementerian/Agensi :</label>
                                <div class="form-group">
                                    <select class="form-control mb-0 hide" name="KOD_KEMENTERIAN">
                                        <option hidden value=""> Sila Pilih </option>
                                        <option hidden value="Tiada"> Tidak Berkaitan </option>
                                        @foreach ($kementerians as $kementerian)
                                            <option value="{{ $kementerian->REFERENCECODE }}">
                                                {{ $kementerian->DESCRIPTION1 }}</option>
                                        @endforeach
                                        <option value="Universiti Tun Hussein Onn Malaysia"> Universiti Tun Hussein
                                            Onn Malaysia </option>
                                        <option value="Majlis Perbandaran Muar"> Majlis Perbandaran Muar
                                        </option>
                                        <option value="Majlis Bandaraya Alor Setar"> Majlis Bandaraya Alor Setar
                                        </option>
                                    </select>
                                    @error('KOD_KEMENTERIAN')
                                        <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                    @enderror
                                </div>
                                <label>Penyelaras: </label>
                                <div class="form-group">
                                    <select class="form-control mb-0 hide" name="user_id">
                                        <option hidden value=""> Sila Pilih </option>
                                        <optgroup label="Pentadbir Sistem">
                                            @foreach ($pentadbir_sistem as $pentadbir_sistem)
                                                <option value="{{ $pentadbir_sistem->id }}">
                                                    {{ $pentadbir_sistem->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Penyelaras">
                                            @foreach ($penyelaras as $penyelaras)
                                                <option value="{{ $penyelaras->id }}">{{ $penyelaras->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('user_id')
                                        <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="platform">Platform :</label>
                                <div class="form-group">
                                    <select class="form-control mb-0" name="platform" id="pilih3">
                                        <option hidden value=""> Sila Pilih </option>
                                        <option value="Atas talian">Atas Talian</option>
                                        <option value="Fizikal">Fizikal</option>
                                    </select>
                                    @error('platform')
                                        <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                    @enderror
                                </div>
                            </div>
                            <div id="pilih4" style="display:none" class="col-6">
                                <label for="LOKASI">Lokasi :</label>
                                <div class="form-group">
                                    <select class="form-control mb-0" name="LOKASI">
                                        <option hidden value=""> Sila Pilih </option>
                                        <option value="Kampus Utama (INTAN Bukit Kiara)">Kampus Utama (INTAN Bukit
                                            Kiara)
                                        </option>
                                        <option value="Kampus Tengah (INTENGAH)">Kampus Tengah (INTENGAH)</option>
                                        <option value="Kampus Wilayah Selatan (IKWAS)">Kampus Wilayah Selatan
                                            (IKWAS)</option>
                                        <option value="Kampus Wilayah Utara (INTURA)">Kampus Wilayah Utara (INTURA)
                                        </option>
                                        <option value="Kampus Wilayah Timur (INTIM)">Kampus Wilayah Timur (INTIM)
                                        </option>
                                        <option value="Kampus Intan Sabah ">Kampus Intan Sabah </option>
                                        <option value="Kampus Intan Sarawak">Kampus Intan Sarawak</option>
                                        <option value="Jabatan Perkhidmatan Awam">Jabatan Perkhidmatan Awam</option>
                                    </select>
                                    @error('LOKASI')
                                        <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-gradient-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        function auto_time() {
            var masa = document.getElementById('masa_mula').value;
            let masa_pengetahuan = <?php echo $masa_pengetahuan; ?>;
            masa_pengetahuan = parseInt(masa_pengetahuan);

            if (masa_pengetahuan > 60) {
                minit_tambah = masa_pengetahuan - 60;
                jam_tambah = 1;
            } else {
                minit_tambah = masa_pengetahuan;
                jam_tambah = 0;
            }
            jam = masa.slice(0, 2);
            minit = masa.slice(3, 6);

            jam = parseInt(jam);
            jam = jam + jam_tambah;

            minit = parseInt(minit);
            minit = minit + minit_tambah;
            if (minit >= 60) {
                minit = minit - 60;
                jam = jam + 1;
            }

            jam_d = jam.toLocaleString('en-US', {
                minimumIntegerDigits: 2,
                useGrouping: false
            })
            minit_d = minit.toLocaleString('en-US', {
                minimumIntegerDigits: 2,
                useGrouping: false
            })
            masav = jam_d + ':' + minit_d;

            if (jam > 12) {
                jam = jam - 12;
                jam = jam.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                })
                minit = minit.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                })
                masaf = jam + ':' + minit + ' PM';
                console.log(masaf);
            } else if (jam == 12) {
                minit = minit.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                })
                masaf = jam + ':' + minit + ' PM';
            } else {
                jam = jam.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                })
                minit = minit.toLocaleString('en-US', {
                    minimumIntegerDigits: 2,
                    useGrouping: false
                })
                masaf = jam + ':' + minit + ' AM';
                console.log(masaf);
            }
            console.log(masav, masaf);

            document.getElementById('masa_tamat2').value = masav;

            // document.getElementById('masa_tamat').innerHTML = masaf;
            // var m = $("#masa_tamat").val(); 
            $("#masa_tamat").val(masaf);
        }
    </script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#pilih1").change(function() {
                if ($(this).val() == "02") {
                    $("#pilih2").show();
                } else {

                    $("#pilih2").hide();
                }
            });
        });
    </script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#pilih3").change(function() {
                if ($(this).val() == "Fizikal") {
                    $("#pilih4").show();
                } else {
                    $("#pilih4").hide();
                }
            });
        });
    </script>

    <script type="text/javascript">
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("TARIKH_SESI")[0].setAttribute('min', today);
    </script>

@stop
