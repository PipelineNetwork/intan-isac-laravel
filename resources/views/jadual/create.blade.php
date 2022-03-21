@extends('base')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual
                                Baru</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
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
