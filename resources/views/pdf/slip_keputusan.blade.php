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
                        <h1 style="text-align: center">Slip Keputusan Penilaian ISAC</h1>
                    </div>
                </div>
                <div class=" row">
                    <div class=" col">
                        <div class="card">

                            <div class="card-body">
                                <br>
                                <p align="justify" class="mx-6">
                                <table>
                                    <tr>
                                        <td class="h5" style="width: 150px;">NAMA</td>
                                        <td>: {{ $rekod->nama_peserta }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5" style="width: 150px;">NO. ID</td>
                                        <td>: {{ $rekod->ic_peserta }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5" style="width: 150px;">TARIKH</td>
                                        <td>: {{ date('d-m-Y', strtotime($rekod->tarikh_penilaian)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="h5" style="width: 150px;">TAHAP PENILAIAN</td>
                                        @if ($tahap->KOD_TAHAP == 01)
                                            <td>: Asas</td>
                                        @else
                                            <td>: Lanjutan</td>
                                        @endif
                                    </tr>
                                </table>

                                <br><br>

                                <table
                                    style="margin-left: auto; margin-right: auto; width: 100%; border-collapse: collapse;">
                                    <tr>
                                        <td style="color: red; text-align: center; border: 1px solid black;">PENGETAHUAN
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; border: 1px solid black;">
                                            {{ $rekod->keputusan_pengetahuan }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red; text-align: center; border: 1px solid black;">KEMAHIRAN
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; border: 1px solid black;"><strong>Internet:
                                            </strong>{{ $rekod->keputusan_internet }}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; border: 1px solid black;"><strong>Pemprosesan
                                                Perkataan: </strong>{{ $rekod->keputusan_word }}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; border: 1px solid black;"><strong>Aplikasi E-mel:
                                            </strong>{{ $rekod->keputusan_email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red; text-align: center; border: 1px solid black;">KEPUTUSAN
                                            KESELURUHAN</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; border: 1px solid black;">{{ $rekod->keputusan }}</td>
                                    </tr>
                                </table>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
