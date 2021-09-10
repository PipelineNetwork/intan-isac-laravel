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
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kemaskini Jadual</a></li>
    </ol>
    <h6 class="font-weight-bolder">Kemaskini Jadual</h6>
</nav>
<div class="col-10">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif




    <form method="POST" action="/jaduals/{{$jadual->ID_SESI}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card mt-4 " id="basic-info">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white"> Kemaskini Jadual</h5>
            </div>
            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="KOD_SESI_PENILAIAN">Sesi :</label>
                        <div class="form-group">
                            <select class="form-control mb-3" type="text" name="KOD_SESI_PENILAIAN"
                                value="{{ $jadual['KOD_SESI_PENILAIAN'] }}">
                                <option hidden selected> Sila Pilih </option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="KOD_TAHAP">Tahap :</label>
                        <div class="form-group">
                            <select class="form-control mb-3" type="text" name="KOD_TAHAP"
                                value="{{ $jadual['KOD_TAHAP'] }}">
                                <option hidden selected> Sila Pilih </option>
                                <option value="1">Asas</option>
                                <option value="2">Lanjutan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="KOD_MASA_MULA">Masa Mula :</label>
                        <div class="input-group">
                            <input class="form-control mb-3 hide" type="time" name="KOD_MASA_MULA"
                                value="{ $jadual['KOD_MASA_MULA'] }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="KOD_MASA_TAMAT">Masa Tamat :</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="time" name="KOD_MASA_TAMAT"
                                value="{ $jadual['KOD_MASA_TAMAT'] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="TARIKH_SESI">Tarikh :</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="date" placeholder="2021-01-01" name="TARIKH_SESI"
                                value="{{ $jadual['TARIKH_SESI'] }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="JUMLAH_KESELURUHAN">Jumlah Calon</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="text" name="JUMLAH_KESELURUHAN"
                                value="{{ $jadual['JUMLAH_KESELURUHAN'] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="KOD_KATEGORI_PESERTA">Kategori Peserta :</label>
                        <div class="form-group">
                            <select class="form-control mb-3" name="KOD_KATEGORI_PESERTA" id="pilih1"
                                value="{{ $jadual['KOD_KATEGORI_PESERTA'] }}">
                                <option hidden selected> Sila Pilih </option>
                                <option value="01">Individu</option>
                                <option value="02">Kumpulan</option>
                            </select>
                        </div>
                    </div>
                    <div id="pilih2" style="display:none" class="col-6">
                        <label for="KOD_KEMENTERIAN">Kementerian/Agensi :</label>
                        <div class="form-group">
                            <select class="form-control mb-3 hide" name="KOD_KEMENTERIAN"
                                value="{{ $jadual['KOD_KEMENTERIAN'] }}">
                                <option hidden selected> Sila Pilih </option>
                                <option value="361">Jabatan Ketua Menteri Sabah</option>

                                <option value="Jabatan Ketua Menteri Sarawak">Jabatan Ketua Menteri Sarawak
                                </option>

                                <option value="Jabatan Perdana Menteri">Jabatan Perdana Menteri</option>

                                <option value="Jabatan Sabah Yang Tiada Berkementerian">Jabatan Sabah Yang
                                    Tiada
                                    Berkementerian</option>

                                <option value="Jabatan Sarawak Yang Tiada Berkementerian">Jabatan Sarawak
                                    Yang Tiada
                                    Berkementerian</option>

                                <option value="Jabatan Yang Tiada Berkementerian">Jabatan Yang Tiada
                                    Berkementerian
                                </option>

                                <option value="Kementerian Air Tanah dan Sumber Asli">Kementerian Air Tanah
                                    dan Sumber
                                    Asli</option>

                                <option value="Kementerian Alam Sekitar dan Air">Kementerian Alam Sekitar
                                    dan Air
                                </option>

                                <option value="Kementerian Alam Sekitar dan Kesihatan Awam Sarawak">
                                    Kementerian Alam
                                    Sekitar dan Kesihatan Awam Sarawak</option>

                                <option value="Kementerian Belia Dan Sukan">Kementerian Belia Dan Sukan
                                </option>

                                <option value="Kementerian Dalam Negeri">Kementerian Dalam Negeri</option>

                                <option value="Kementerian Kebudayaan, Belia dan Sukan Sabah">Kementerian
                                    Kebudayaan,
                                    Belia dan Sukan Sabah</option>

                                <option value="Kementerian Kemajuan Luar Bandar dan Wilayah">Kementerian
                                    Kemajuan Luar
                                    Bandar dan Wilayah</option>

                                <option value="Kementerian Kerajaan Tempatan dan Perumahan Sabah">
                                    Kementerian Kerajaan
                                    Tempatan dan Perumahan Sabah</option>

                                <option value="Kementerian Kerja Raya">Kementerian Kerja Raya</option>

                                <option value="Kementerian Kesenian, Kebudayaan Dan Warisan">Kementerian
                                    Kesenian,
                                    Kebudayaan Dan Warisan</option>

                                <option value="Kementerian Kesihatan">Kementerian Kesihatan</option>

                                <option value="Kementerian Kewangan">Kementerian Kewangan</option>

                                <option value="Kementerian Kewangan dan Kemudahan Awam Sarawak">Kementerian
                                    Kewangan dan
                                    Kemudahan Awam Sarawak</option>

                                <option value="Kementerian Kewangan Sabah">Kementerian Kewangan Sabah
                                </option>

                                <option value="Kementerian Komunikasi dan Multimedia Malaysia">Kementerian
                                    Komunikasi
                                    dan Multimedia Malaysia</option>

                                <option value="Kementerian Luar Negeri">Kementerian Luar Negeri</option>

                                <option value="Kementerian Pelajaran">Kementerian Pelajaran</option>

                                <option value="Kementerian Pelancongan Sarawak">Kementerian Pelancongan
                                    Sarawak</option>

                                <option value="Kementerian Pelancongan, Kebudayaan dan Alam Sekitar Sabah">
                                    Kementerian
                                    Pelancongan, Kebudayaan dan Alam Sekitar Sabah</option>

                                <option value="Kementerian Pelancongan, Seni Dan Budaya Malaysia">
                                    Kementerian
                                    Pelancongan, Seni Dan Budaya Malaysia</option>

                                <option value="Kementerian Pembangunan dalam Negeri, Koperasi dan Kepenggunaan">
                                    Kementerian Pembangunan dalam Negeri, Koperasi dan Kepenggunaan</option>

                                <option value="Kementerian Pembangunan Infrastruktur & Perhubungan Sarawak">
                                    Kementerian
                                    Pembangunan Infrastruktur & Perhubungan Sarawak</option>

                                <option value="Kementerian Pembangunan Insfrastruktur Sabah">Kementerian
                                    Pembangunan
                                    Insfrastruktur Sabah</option>

                                <option value="Kementerian Pembangunan Luar Bandar dan Kemajuan Tanah Sarawak">
                                    Kementerian Pembangunan Luar Bandar dan Kemajuan Tanah Sarawak</option>

                                <option value="Kementerian Pembangunan Luar Bandar Sabah">Kementerian
                                    Pembangunan Luar
                                    Bandar Sabah </option>

                                <option value="Kementerian Pembangunan Masyarakat & Hal-Ehwal Pengguna Sabah">
                                    Kementerian Pembangunan Masyarakat & Hal-Ehwal Pengguna Sabah</option>

                                <option value="Kementerian Pembangunan Perindustrian Sabah">Kementerian
                                    Pembangunan
                                    Perindustrian Sabah</option>

                                <option value="Kementerian Pembangunan Perindustrian Sarawak">Kementerian
                                    Pembangunan
                                    Perindustrian Sarawak</option>

                                <option value="Kementerian Pembangunan Pertanian dan Industri Pemakanan Sabah">
                                    Kementerian Pembangunan Pertanian dan Industri Pemakanan Sabah</option>

                                <option value="Kementerian Pembangunan Sosial dan Urbanisasi Sarawak">
                                    Kementerian
                                    Pembangunan Sosial dan Urbanisasi Sarawak </option>

                                <option value="Kementerian Pembangunan Sumber dan Kemajuan Teknologi Maklumat Sabah">
                                    Kementerian Pembangunan Sumber dan Kemajuan Teknologi Maklumat Sabah
                                </option>

                                <option value="Kementerian Pembangunan Usahawan">Kementerian Pembangunan
                                    Usahawan
                                </option>

                                <option value="Kementerian Pembangunan Wanita, Keluarga dan Masyarakat">
                                    Kementerian
                                    Pembangunan Wanita, Keluarga dan Masyarakat</option>

                                <option value="Kementerian Pendidikan Malaysia">Kementerian Pendidikan
                                    Malaysia</option>

                                <option value="Kementerian Pengajian Tinggi">Kementerian Pengajian Tinggi
                                </option>

                                <option value="Kementerian Pengangkutan">Kementerian Pengangkutan</option>

                                <option value="Kementerian Perancangan dan Pengurusan Sumber Sarawak">
                                    Kementerian
                                    Perancangan dan Pengurusan Sumber Sarawak</option>

                                <option value="Kementerian Perdagangan Antarabangsa Dan Indus ">Kementerian
                                    Perdagangan
                                    Antarabangsa Dan Indus</option>

                                <option value="Kementerian Perdagangan Dalam Negeri Dan Hal Ehwal Pengguna">
                                    Kementerian
                                    Perdagangan Dalam Negeri Dan Hal Ehwal Pengguna</option>

                                <option value="Kementerian Pertahanan">Kementerian Pertahanan</option>

                                <option value="Kementerian Pertanian & Industri Makanan Sarawak">Kementerian
                                    Pertanian &
                                    Industri Makanan Sarawak</option>

                                <option value="Kementerian Pertanian dan Industri Asas Tani">Kementerian
                                    Pertanian dan
                                    Industri Asas Tani</option>

                                <option value="Kementerian Perumahan Dan Kerajaan Tempatan">Kementerian
                                    Perumahan Dan
                                    Kerajaan Tempatan</option>

                                <option value="Kementerian Perumahan Sarawak">Kementerian Perumahan Sarawak
                                </option>

                                <option value="Kementerian Perusahaan Awam">Kementerian Perusahaan Awam
                                </option>

                                <option value="Kementerian Perusahaan, Perladangan dan Komuditi">Kementerian
                                    Perusahaan,
                                    Perladangan dan Komuditi</option>

                                <option value="Kementerian Sumber Manusia">Kementerian Sumber Manusia
                                </option>

                                <option
                                    value="Kementerian Tenaga, Sains, Teknologi, Alam Sekitar & Perubahan Iklim (MESTECC)">
                                    Kementerian Tenaga, Sains, Teknologi, Alam Sekitar & Perubahan Iklim
                                    (MESTECC)
                                </option>

                                <option value="Kementerian Undang-Undang/Kehakiman">Kementerian
                                    Undang-Undang/Kehakiman
                                </option>

                                <option value="Kementerian Wilayah Persekutuan">Kementerian Wilayah
                                    Persekutuan</option>

                                <option value="Pentadbiran Kerajaan Negeri Johor">Pentadbiran Kerajaan
                                    Negeri Johor
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Kedah">Pentadbiran Kerajaan
                                    Negeri Kedah
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Kelantan">Pentadbiran Kerajaan
                                    Negeri
                                    Kelantan</option>

                                <option value="Pentadbiran Kerajaan Negeri Melaka">Pentadbiran Kerajaan
                                    Negeri Melaka
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Pahang">Pentadbiran Kerajaan
                                    Negeri Pahang
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Perak">Pentadbiran Kerajaan
                                    Negeri Perak
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Perlis">Pentadbiran Kerajaan
                                    Negeri Perlis
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Selangor">Pentadbiran Kerajaan
                                    Negeri
                                    Selangor</option>

                                <option value="Pentadbiran Kerajaan Negeri Sembilan">Pentadbiran Kerajaan
                                    Negeri
                                    Sembilan</option>

                                <option value="Pentadbiran Kerajaan Negeri Terengganu">Pentadbiran Kerajaan
                                    Negeri
                                    Terengganu</option>

                                <option value="Pentadbiran Kerajaan Pulau Pinang"> Pentadbiran Kerajaan
                                    Pulau Pinang
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="platform">Platform :</label>
                        <div class="form-group">
                            <select class="form-control mb-3" name="platform" id="pilih3"
                                value="{{ $jadual['platform'] }}">
                                <option hidden selected> Sila Pilih </option>
                                <option value="atas talian">Atas Talian</option>
                                <option value="fizikal">fizikal</option>
                            </select>
                        </div>
                    </div>
                    <div id="pilih4" style="display:none" class="col-6">
                        <label for="LOKASI">Lokasi :</label>
                        <div class="form-group">
                            <select class="form-control mb-3" name="LOKASI" value="{{ $jadual['LOKASI'] }}">
                                <option hidden selected> Sila Pilih </option>
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
                                <option value="Kampus UTAMA (Bukit Kiara - 09)">Kampus UTAMA (Bukit Kiara -
                                    09)</option>
                                <option value="INTAN LOCAL">INTAN LOCAL</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class=" col-6 form-group">
                    <label name="status"> Status :</label>
                    <select class="form-control mb-3" name="status" value="{{ $jadual['status'] }}">
                        <option hidden selected> Sila Pilih </option>
                        <option value="Batal">Batal</option>
                        <option value="Tangguh">Tangguh</option>
                        <option value="Tukar Tarikh">Tukar Tarikh</option>
                    </select>
                </div>
                <button class="btn bg-gradient-warning" type="submit">Simpan</button>
            </div>
        </div>
    </form>

</div>
</div>

</div>
</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#pilih1").change(function() {
        if ($(this).val() == "Kumpulan") {
            $("#pilih2").show();
        } else {
            $("#pilih2").hide();
        }
    });
});
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#pilih3").change(function() {
        if ($(this).val() == "fizikal") {
            $("#pilih4").show();
        } else {
            $("#pilih4").hide();
        }
    });
});
</script>

@stop