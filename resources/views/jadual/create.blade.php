@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h3> Jadual </h3>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <h5>Jadual Baru</h5>
        <div class="col-6 bg-light">
            <div class="col-6">
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
                <form method="POST" action="/jaduals" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                    <div class="form-group">
                            <label name="KOD_SESI_PENILAIAN"> SESI :</label>
                            <select class="form-control" name="KOD_SESI_PENILAIAN">
                                <option hidden selected> Sila Pilih </option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label name="KOD_TAHAP"> Tahap :</label>
                            <select class="form-control" name="KOD_TAHAP">
                                <option hidden selected> Sila Pilih </option>
                                <option value="1">Asas</option>
                                <option value="2">Lanjutan</option>
                            </select>
                        </div>

                        <label for="KOD_MASA_MULA">Masa Mula :</label>
                        <input class="form-control mb-3" type="time" name="KOD_MASA_MULA">

                        <label for="KOD_MASA_TAMAT">Masa Tamat :</label>
                        <input class="form-control mb-3" type="time" name="KOD_MASA_TAMAT">

                        <label for="TARIKH_SESI">Tarikh :</label>
                        <input class="form-control mb-3" type="date" placeholder="2021-01-01" name="TARIKH_SESI">

                        <label for="JUMLAH_KESELURUHAN">Jumlah Calon:</label>
                        <input class="form-control mb-3" type="text" name="JUMLAH_KESELURUHAN">

                        <div class="form-group">
                            <label name="KOD_KATEGORI_PESERTA"> Kategori Peserta :</label>
                            <select class="form-control" name="KOD_KATEGORI_PESERTA" id="pilih1">
                                <option hidden selected> Sila Pilih </option>
                                <option value="01">Individu</option>
                                <option value="02">Kumpulan</option>
                            </select>
                        </div>

                        <div id="pilih2" style = "display:none" class="form-group">
                            <label name="KOD_KEMENTERIAN">Kementerian/Agensi :</label>
                            <select class="form-control hide" name="KOD_KEMENTERIAN" >
                                <option hidden selected> Sila Pilih </option>
                                <option value="123">Jabatan Ketua Menteri Sabah</option>

                                <option value="Jabatan Ketua Menteri Sarawak">Jabatan Ketua Menteri Sarawak</option>

                                <option value="Jabatan Perdana Menteri">Jabatan Perdana Menteri</option>

                                <option value="Jabatan Sabah Yang Tiada Berkementerian">Jabatan Sabah Yang Tiada
                                    Berkementerian</option>

                                <option value="Jabatan Sarawak Yang Tiada Berkementerian">Jabatan Sarawak Yang Tiada
                                    Berkementerian</option>

                                <option value="Jabatan Yang Tiada Berkementerian">Jabatan Yang Tiada Berkementerian
                                </option>

                                <option value="Kementerian Air Tanah dan Sumber Asli">Kementerian Air Tanah dan Sumber
                                    Asli</option>

                                <option value="Kementerian Alam Sekitar dan Air">Kementerian Alam Sekitar dan Air
                                </option>

                                <option value="Kementerian Alam Sekitar dan Kesihatan Awam Sarawak">Kementerian Alam
                                    Sekitar dan Kesihatan Awam Sarawak</option>

                                <option value="Kementerian Belia Dan Sukan">Kementerian Belia Dan Sukan</option>

                                <option value="Kementerian Dalam Negeri">Kementerian Dalam Negeri</option>

                                <option value="Kementerian Kebudayaan, Belia dan Sukan Sabah">Kementerian Kebudayaan,
                                    Belia dan Sukan Sabah</option>

                                <option value="Kementerian Kemajuan Luar Bandar dan Wilayah">Kementerian Kemajuan Luar
                                    Bandar dan Wilayah</option>

                                <option value="Kementerian Kerajaan Tempatan dan Perumahan Sabah">Kementerian Kerajaan
                                    Tempatan dan Perumahan Sabah</option>

                                <option value="Kementerian Kerja Raya">Kementerian Kerja Raya</option>

                                <option value="Kementerian Kesenian, Kebudayaan Dan Warisan">Kementerian Kesenian,
                                    Kebudayaan Dan Warisan</option>

                                <option value="Kementerian Kesihatan">Kementerian Kesihatan</option>

                                <option value="Kementerian Kewangan">Kementerian Kewangan</option>

                                <option value="Kementerian Kewangan dan Kemudahan Awam Sarawak">Kementerian Kewangan dan
                                    Kemudahan Awam Sarawak</option>

                                <option value="Kementerian Kewangan Sabah">Kementerian Kewangan Sabah</option>

                                <option value="Kementerian Komunikasi dan Multimedia Malaysia">Kementerian Komunikasi
                                    dan Multimedia Malaysia</option>

                                <option value="Kementerian Luar Negeri">Kementerian Luar Negeri</option>

                                <option value="Kementerian Pelajaran">Kementerian Pelajaran</option>

                                <option value="Kementerian Pelancongan Sarawak">Kementerian Pelancongan Sarawak</option>

                                <option value="Kementerian Pelancongan, Kebudayaan dan Alam Sekitar Sabah">Kementerian
                                    Pelancongan, Kebudayaan dan Alam Sekitar Sabah</option>

                                <option value="Kementerian Pelancongan, Seni Dan Budaya Malaysia">Kementerian
                                    Pelancongan, Seni Dan Budaya Malaysia</option>

                                <option value="Kementerian Pembangunan dalam Negeri, Koperasi dan Kepenggunaan">
                                    Kementerian Pembangunan dalam Negeri, Koperasi dan Kepenggunaan</option>

                                <option value="Kementerian Pembangunan Infrastruktur & Perhubungan Sarawak">Kementerian
                                    Pembangunan Infrastruktur & Perhubungan Sarawak</option>

                                <option value="Kementerian Pembangunan Insfrastruktur Sabah">Kementerian Pembangunan
                                    Insfrastruktur Sabah</option>

                                <option value="Kementerian Pembangunan Luar Bandar dan Kemajuan Tanah Sarawak">
                                    Kementerian Pembangunan Luar Bandar dan Kemajuan Tanah Sarawak</option>

                                <option value="Kementerian Pembangunan Luar Bandar Sabah">Kementerian Pembangunan Luar
                                    Bandar Sabah </option>

                                <option value="Kementerian Pembangunan Masyarakat & Hal-Ehwal Pengguna Sabah">
                                    Kementerian Pembangunan Masyarakat & Hal-Ehwal Pengguna Sabah</option>

                                <option value="Kementerian Pembangunan Perindustrian Sabah">Kementerian Pembangunan
                                    Perindustrian Sabah</option>

                                <option value="Kementerian Pembangunan Perindustrian Sarawak">Kementerian Pembangunan
                                    Perindustrian Sarawak</option>

                                <option value="Kementerian Pembangunan Pertanian dan Industri Pemakanan Sabah">
                                    Kementerian Pembangunan Pertanian dan Industri Pemakanan Sabah</option>

                                <option value="Kementerian Pembangunan Sosial dan Urbanisasi Sarawak">Kementerian
                                    Pembangunan Sosial dan Urbanisasi Sarawak </option>

                                <option value="Kementerian Pembangunan Sumber dan Kemajuan Teknologi Maklumat Sabah">
                                    Kementerian Pembangunan Sumber dan Kemajuan Teknologi Maklumat Sabah</option>

                                <option value="Kementerian Pembangunan Usahawan">Kementerian Pembangunan Usahawan
                                </option>

                                <option value="Kementerian Pembangunan Wanita, Keluarga dan Masyarakat">Kementerian
                                    Pembangunan Wanita, Keluarga dan Masyarakat</option>

                                <option value="Kementerian Pendidikan Malaysia">Kementerian Pendidikan Malaysia</option>

                                <option value="Kementerian Pengajian Tinggi">Kementerian Pengajian Tinggi</option>

                                <option value="Kementerian Pengangkutan">Kementerian Pengangkutan</option>

                                <option value="Kementerian Perancangan dan Pengurusan Sumber Sarawak">Kementerian
                                    Perancangan dan Pengurusan Sumber Sarawak</option>

                                <option value="Kementerian Perdagangan Antarabangsa Dan Indus ">Kementerian Perdagangan
                                    Antarabangsa Dan Indus</option>

                                <option value="Kementerian Perdagangan Dalam Negeri Dan Hal Ehwal Pengguna">Kementerian
                                    Perdagangan Dalam Negeri Dan Hal Ehwal Pengguna</option>

                                <option value="Kementerian Pertahanan">Kementerian Pertahanan</option>

                                <option value="Kementerian Pertanian & Industri Makanan Sarawak">Kementerian Pertanian &
                                    Industri Makanan Sarawak</option>

                                <option value="Kementerian Pertanian dan Industri Asas Tani">Kementerian Pertanian dan
                                    Industri Asas Tani</option>

                                <option value="Kementerian Perumahan Dan Kerajaan Tempatan">Kementerian Perumahan Dan
                                    Kerajaan Tempatan</option>

                                <option value="Kementerian Perumahan Sarawak">Kementerian Perumahan Sarawak</option>

                                <option value="Kementerian Perusahaan Awam">Kementerian Perusahaan Awam</option>

                                <option value="Kementerian Perusahaan, Perladangan dan Komuditi">Kementerian Perusahaan,
                                    Perladangan dan Komuditi</option>

                                <option value="Kementerian Sumber Manusia">Kementerian Sumber Manusia</option>

                                <option
                                    value="Kementerian Tenaga, Sains, Teknologi, Alam Sekitar & Perubahan Iklim (MESTECC)">
                                    Kementerian Tenaga, Sains, Teknologi, Alam Sekitar & Perubahan Iklim (MESTECC)
                                </option>

                                <option value="Kementerian Undang-Undang/Kehakiman">Kementerian Undang-Undang/Kehakiman
                                </option>

                                <option value="Kementerian Wilayah Persekutuan">Kementerian Wilayah Persekutuan</option>

                                <option value="Pentadbiran Kerajaan Negeri Johor">Pentadbiran Kerajaan Negeri Johor
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Kedah">Pentadbiran Kerajaan Negeri Kedah
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Kelantan">Pentadbiran Kerajaan Negeri
                                    Kelantan</option>

                                <option value="Pentadbiran Kerajaan Negeri Melaka">Pentadbiran Kerajaan Negeri Melaka
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Pahang">Pentadbiran Kerajaan Negeri Pahang
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Perak">Pentadbiran Kerajaan Negeri Perak
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Perlis">Pentadbiran Kerajaan Negeri Perlis
                                </option>

                                <option value="Pentadbiran Kerajaan Negeri Selangor">Pentadbiran Kerajaan Negeri
                                    Selangor</option>

                                <option value="Pentadbiran Kerajaan Negeri Sembilan">Pentadbiran Kerajaan Negeri
                                    Sembilan</option>

                                <option value="Pentadbiran Kerajaan Negeri Terengganu">Pentadbiran Kerajaan Negeri
                                    Terengganu</option>

                                <option value="Pentadbiran Kerajaan Pulau Pinang"> Pentadbiran Kerajaan Pulau Pinang
                                </option>


                            </select>
                        </div>

                        <div class="form-group">
                            <label name="platform">Platform :</label>
                            <select class="form-control" name="platform" id="pilih3" >
                                <option hidden selected> Sila Pilih </option>
                                <option value="atas talian">Atas Talian</option>
                                <option value="fizikal">fizikal</option>
                            </select>
                        </div>

                        <div id="pilih4" style = "display:none" class="form-group">
                            <label name="LOKASI">Lokasi :</label>
                            <select class="form-control hide" name="LOKASI">
                                <option hidden selected> Sila Pilih </option>
                                <option value="Kampus Utama (INTAN Bukit Kiara)">Kampus Utama (INTAN Bukit Kiara)
                                </option>
                                <option value="Kampus Tengah (INTENGAH)">Kampus Tengah (INTENGAH)</option>
                                <option value="Kampus Wilayah Selatan (IKWAS)">Kampus Wilayah Selatan (IKWAS)</option>
                                <option value="Kampus Wilayah Utara (INTURA)">Kampus Wilayah Utara (INTURA)</option>
                                <option value="Kampus Wilayah Timur (INTIM)">Kampus Wilayah Timur (INTIM)</option>
                                <option value="Kampus Intan Sabah ">Kampus Intan Sabah </option>
                                <option value="Kampus Intan Sarawak">Kampus Intan Sarawak</option>
                                <option value="Jabatan Perkhidmatan Awam">Jabatan Perkhidmatan Awam</option>
                                <option value="Kampus UTAMA (Bukit Kiara - 09)">Kampus UTAMA (Bukit Kiara - 09)</option>
                                <option value="INTAN LOCAL">INTAN LOCAL</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">Hantar</button>
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

