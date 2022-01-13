<!DOCTYPE html>
<html>

<head>
    <title>Slip Keputusan Penilaian ICT | INTAN - ISAC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
    @page {
        size: A4;
        margin: 0;
    }

    .watermark {
        position: fixed;
        opacity: 0.1;
        z-index: 99;
        color: black;
        transform: rotate(45deg);
        width: 2000px;
        height: 200px;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
        margin-top: 10;
    }

    [class*="col-"] {
        float: left;
    }

    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    * {
        box-sizing: border-box;
    }

    body {
        background-image: url('assets/img/INTAN-BG-2.png');
        padding: 0;
        margin: 0;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-blend-mode: lighten;
    }

</style>

{{-- <h5 class="watermark">
    @for ($i = 1; $i != 10000; $i++)
        INTAN
    @endfor
</h5> --}}

<body>

    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class="row">
                    <div class="col">
                        <p style="text-align: right; margin-bottom:80px; margin-right:15px">No. Sijil:
                            <strong>ISAC/{{ date('m/Y', strtotime($tarikh)) }}/{{ $id_penilaian }}/<?php echo sprintf("%'.03d\n", $no_sijil); ?></strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <img src="{{ public_path('img/jatanegara.png') }}" alt="PGN" height="100"
                            style="margin-bottom:0px;">
                        <p>Institut Tadbiran Awam Negara (INTAN)<br>Jabatan Perkhidmatan Awam Malaysia</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h1>Sijil ISAC</h1>
                        <p>Dengan ini disahkan keputusan penilaian</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h3>ICT Skills Assessment and Certification (ISAC)<br>
                            Tahap Asas Pengetahuan dan Kemahiran IT</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h2 style="margin-bottom:0%; padding-bottom:0%">{{ Str::upper($nama) }}</h2>
                        <h3 style="margin-top:0% padding-top:0%">{{ $ic }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <p style="margin-bottom:0%; padding-bottom:0%">diadakan pada</p>
                        <h3 style="margin-top:0% padding-top:0%">{{ date('d-m-Y', strtotime($tarikh)) }}</h3>
                    </div>
                </div><br><br><br>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <p style="margin-bottom: 0%; padding-bottom:0%;">Pengarah</p>
                        <p style="margin: 0%; padding:0%;">Institut Tadbiran Awam Negara</p>
                        <p style="margin-top: 0%; padding-top:0%;">Jabatan Perkhidmatan Awam</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6" style="text-align: center">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $qr }}&amp;size=130x130"
                            alt="" title="" />
                    </div>
                    <div class="col-6" style="text-align: center">
                        <img src="{{ public_path('img/cop_intan.png') }}" alt="cop" height="130" style="border-radius: 50px">
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h6 style="margin-bottom: 0%; padding-bottom:0%;">Ini adalah cetakan komputer. Tandatangan tidak
                            diperlukan.</h6>
                        <h6 style="margin-top: 0%; padding-top:0%;">Sebarang pertanyaan, sila hubungi 03-20847777 atau
                            isachelp@intanbk.intan.my</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
