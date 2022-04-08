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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Laporan</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Senarai Keputusan
                            Penilaian</li>
                    </ol>
                    <h5 class="font-weight-bolder">Laporan Senarai Keputusan Penilaian</h5>
                </nav>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white"> Carian</h5>
            </div>

            <div class="card-body p-3">
                <div class="row p-3 pl-0 mb-0">
                    <form style="width: 100%;" (ngSubmit)="filterCharts()">

                        <div class="row">

                            <div class="col-6">
                                <label for="startdate">Tahun</label>
                                <input class="form-control form-control-sm" type="text" name="tahun"
                                    placeholder="Sila Pilih" id="tahun" autocomplete="off" />
                            </div>
                            <div class="col-6">
                                <label for="input_keputusan">Keputusan</label>
                                <select class="form-control form-control-sm" name="input_keputusan" id="input_keputusan">
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="input_kementerian">Kementerian/Agensi</label>
                                <select class="form-control form-control-sm" name="input_kementerian"
                                    id="input_kementerian">
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    @foreach ($kementerians as $kementerian)
                                        <option value="{{ $kementerian->DESCRIPTION1 }}">
                                            {{ $kementerian->DESCRIPTION1 }}</option>
                                    @endforeach
                                    <option value="Universiti Tun Hussein Onn Malaysia"> Universiti Tun Hussein
                                        Onn Malaysia </option>
                                    <option value="Majlis Perbandaran Muar"> Majlis Perbandaran Muar
                                    </option>
                                    <option value="Majlis Bandaraya Alor Setar"> Majlis Bandaraya Alor Setar
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="input_jabatan">Jabatan</label>
                                <select class="form-control form-control-sm" name="input_jabatan" id="input_jabatan">
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->DESCRIPTION1 }}">
                                            {{ $jabatan->DESCRIPTION1 }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col d-flex justify-content-end align-items-end mt-3">

                                <button class="btn  bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                        class="fas fa-search"></i> cari</button>
                                <a href="/laporan/senarai-keputusan-penilaian"
                                    class="btn  bg-gradient-danger text-uppercases" (click)="reset()">set
                                    semula</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header" style="background-color: #FFA500;">

                <div class="row  mb-0">
                    <div class="col text-center">
                        <h5 class="text-white"> SENARAI PENCAPAIAN PENILAIAN ISAC </h5>
                        @if ($tahuns != null)
                            <h6 class="text-white">BAGI TAHUN {{ $tahuns }}</h6>
                        @else
                            <h6 class="text-white">SEHINGGA TAHUN {{ $tahun_semasas }}</h6>
                        @endif
                        @if ($keputusans == 'Lulus')
                            <h6 class="text-white">KEPUTUSAN : LULUS</h6>
                        @elseif ($keputusans == 'Gagal')
                            <h6 class="text-white">KEPUTUSAN : GAGAL</h6>
                        @else
                            <h6 class="text-white">KEPUTUSAN : LULUS & GAGAL</h6>
                        @endif
                        @if ($check_kementerians != null)
                            <h6 class="text-white" style="text-transform: uppercase">{{ $check_kementerians }}</h6>
                        @endif
                        @if ($check_jabatans != null)
                            <h6 class="text-white" style="text-transform: uppercase">{{ $check_jabatans }}</h6>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="tablesenaraikeputusanpenilaian">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Bil.</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    No. Kad Pengenalan</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Nama</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Kementerian</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Jabatan</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Tarikh Penilaian</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Keputusan</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    No. Sijil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senarai_keputusans as $senarai_keputusan)
                                <tr>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $loop->index + 1 }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $senarai_keputusan->ic_peserta }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $senarai_keputusan->nama_peserta }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $senarai_keputusan->KOD_KEMENTERIAN }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $senarai_keputusan->KOD_JABATAN }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $senarai_keputusan->tarikh_penilaian }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $senarai_keputusan->keputusan }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $senarai_keputusan->no_sijil }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tablesenaraikeputusanpenilaian').DataTable({
                dom: 'Blfrtip',
                // pageLength: 10,
                // lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "ordering": true,
                "searching": true,
                "info": true,
                "paging": true,
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'SENARAI PENCAPAIAN PENILAIAN ISAC'
                    },
                ],
                "oLanguage": {
                    "sSearch": "Carian:",
                    "sZeroRecords": "Tiada rekod ditemui",
                    "oPaginate": {
                        "sNext": ">",
                        "sPrevious": "<",
                    },
                    "sInfo": "Menunjukkan _START_ ke _END_ daripada _TOTAL_ data",
                    "sInfoEmpty": "Menunjukkan 0 ke 0 daripada 0 data",
                    "sLengthMenu": "Menunjukkan _MENU_ data",
                }
            });
        });
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        })
    </script>

@stop
