<!DOCTYPE html>
<html>

<head>
    <title>Surat Tawaran ISAC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    body {
        font-size: 11;
    }

    .text-custom {
        /* text-align:center !important; */
        font-size: 11;
        font-weight: bold;
    }

    .mx-6 {
        margin-left: 20px;
        margin-right: 20px;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 50%;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    .column-center {
        float: left;
        width: 60%;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    .column-side {
        float: left;
        width: 20%;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    .column-side2 {
        margin-top: 30px;
        float: right;
        width: 20%;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
        padding-top: 0px;
    }

    hr {
        border-top: 1px solid black;
        padding-top: 0;
    }

    .alamat{
        width: 200px; 
        overflow: visible;
    }

</style>

<body>
    <div class="row" style="text-align: center">
        <div class="column-side">
            <img src="{{ public_path('img/jatanegara.png') }}" alt="PGN" height="80" style="">
        </div>
        <div class="column-center">
            <span style="font-weight: bold">
                INSTITUT TADBIRAN AWAM NEGARA (INTAN) <br></span>
            Jabatan Perkhidmatan Awam Malaysia <br>
            Bukit Kiara, Jalan Bukit Kiara, 50480 Kuala Lumpur <br>
            Tel:03-20847777, https://www.intanbk.intan.my/
        </div>
        <div class="column-side">
            <img src="{{ public_path('img/intan.png') }}" alt="PGN" height="80" style="">
            {{-- <p  style="font-size: 10px;">
                Tel	: +603-8000 8000 (1MOCC) <br>
                Faks	: +603-8889 4851 <br>
                Portal Rasmi : www.ketsa.gov.my
            </p> --}}
        </div>
    </div>
    <br>
    <p align="justify" class="mx-6">

        <div class="alamat">
            {{ Str::upper($jkj) }}<br>
            {{ Str::upper($kementerian) }}<br>
            {{ Str::upper($jabatan) }}<br>
            {{ Str::upper($bahagian) }}<br>
            {{ $al1 }}
        </div>
        {{ $poskod }}, {{ $bandar }}<br>
        {{ $negeri }}<br>
        (up : <span style="font-size: 10;"></span>{{ $nama_penyelaras }})<br><br>
        Tarikh : {{ $hari }}<br>
        Ruj Kami : INTAN.500-5/1/1<br><br>
        Tuan/Puan,
        <br><br>
        <span class="text-custom">SURAT TAWARAN PENILAIAN ICT SKILLS ASSESSMENT AND
            CERTIFICATION (ISAC)</span><br>
        <span class="form-inline">Dengan segala hormatnya merujuk kepada perkara
            di atas.
            <br><br>


            2. Adalah dimaklumkan bahawa pegawai berikut terpilih untuk menduduki ujian
            Penilaian ICT
            Skills Assessment and Certification (ISAC). Maklumat lengkap ujian adalah
            seperti berikut :-
            <br><br>
            <table>
                <tr>
                    <td style="width: 150px;">Nama</td>
                    <td>: {{ $nama }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">No.Mykad</td>
                    <td>: {{ $ic }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tahap Penilaian</td>
                    <td>: {{ $tahap }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tarikh Penilaian</td>
                    <td>: {{ date('d-m-Y', strtotime($tarikh)) }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Masa Penilaian</td>
                    <td>: {{ $masa_mula }} - {{ $masa_tamat }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">ID Penilaian</td>
                    <td>: <span><strong>{{ $id_sesi }}</strong></span>
                        <span><em>(Digunakan sewaktu mula sesi penilaian.)</em></span>
                    </td>
                </tr>
            </table>
            <br>
            3. Sekiranya tuan/puan tidak dapat hadir pada tarikh penilaian, sila beri
            penjelasan melalui emel berikut : isachelp@intanbk.intan.my sebelum tarikh
            penilaian. Kegagalan untuk berbuat demikian akan mengakibatkan nama tuan/puan
            <span style="font-weight: bold">disenaraihitamkan</span> daripada menduduki ujian penilaian pada masa akan
            datang.
            Sebarang kemusykilan/masalah, sila hubungi kami melalui emel:
            isachelp@intanbk.intan.my.
            <br><br>
            Sekian, terima kasih. <br><br>

            <div class="row">
                <div class="column-center">
                    <span style="font-weight: bold">"BERKHIDMAT UNTUK NEGARA"</span><br><br><br>
                    <span style="font-weight: bold">Fatimah binti Ghazali</span><br>
                    Ketua Kluster <br>
                    Kluster Inovasi Teknologi Pengurusan (i-IMATEC) <br>
                    Institut Tadbiran Awam Negara (INTAN) <br>
                    Bukit Kiara 50480 Kuala Lumpur <br><br>
                </div>
                <div class="column-side2">
                    <img src="{{ public_path('img/cop_intan.jpeg') }}" alt="cop intan" height="130">
                </div>
            </div>
            <i> *Ini adalah surat cetakan komputer, tidak perlu tandatangan*</i>
        </span>
    </p>
</body>

</html>
