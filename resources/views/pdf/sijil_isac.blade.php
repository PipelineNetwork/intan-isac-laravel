<!DOCTYPE html>
<html>

<head>
    <title>Slip Keputusan Penilaian ICT | INTAN - ISAC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class=" container-fluid">
                <div class="row">
                    <div class="col">
                        <p style="text-align: right; margin-bottom:80px;">No. Sijil: <strong>ISAC/{{ date('m/Y', strtotime($tarikh)) }}/<?php echo sprintf("%'.05d\n", $no_sijil)?></strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <img src="{{ public_path('img/jatanegara.png') }}" alt="PGN" height="100" style="margin-bottom:0px;" >
                        <p>Institut Tadbiran Awam Negara (INTAN)<br>Jabatan Perkhidmatan Awam Malaysia</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h1 >Sijil ISAC</h1>
                        <p>Dengan ini disahkan keputusan penilaian</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h3>Information Technology Skills Assessment and Certification (ISAC):<br>
                            Tahap Asas Pengetahuan dan Kemahiran IT</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h2 style="margin-bottom:0%; padding-bottom:0%">{{$nama}}</h2>
                        <h3 style="margin-top:0% padding-top:0%">{{$ic}}</h3>
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
                    <div class="col" style="text-align: right">
                        <img src="{{ public_path('img/cop_intan.jpeg') }}" alt="cop" height="130" style="padding-right: 100px">
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center">
                        <h6 style="margin-bottom: 0%; padding-bottom:0%;">Ini adalah cetakan komputer. Tandatangan tidak diperlukan.</h6>
                        <h6 style="margin-top: 0%; padding-top:0%;">Sebarang pertanyaan, sila hubungi 03-20847777 atau isachelp@intanbk.intan.my</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>