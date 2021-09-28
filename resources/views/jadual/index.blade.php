@extends('base')
@section('content')

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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai Jadual</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <h5 class="font-weight-bolder">Pengurusan Jadual</h5>
    </div>
    <div class="col-lg-6">
        <div class="column-12">
            <a href="/jaduals/create" class="btn bg-gradient-warning mx-4" type="submit" style="float: right;">Tambah
                Jadual</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card m-3">
            <div class="card-header" style="background-color:#FFA500;">
                <b class="text-white">Senarai Jadual</b>
            </div>
        
            <div class="table-responsive">
                <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
        
                    <thead>
                        <tr>
                            <th>Kod Sesi</th>
                            <th>Tahap</th>
                            <th>Masa Mula</th>
                            <th>Masa Tamat</th>
                            <th>Tarikh</th>
                            <th>Kategori Peserta</th>
                            <th>Jumlah Peserta</th>
                            <th>Kementerian/Agensi</th>
                            <th>Platform</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
        
                        @foreach ($jaduals as $jadual)
                        <tr>
                            <td class="text-center">{{ $jadual['KOD_SESI_PENILAIAN'] }}</td>
                            <td class="text-center">
                                @if($jadual->KOD_TAHAP=='01')
                                Asas
                                @else
                                Lanjutan
                                @endif
                            </td>
                            <td class="text-center">{{ $jadual['KOD_MASA_MULA'] }}</td>
                            <td class="text-center">{{ $jadual['KOD_MASA_TAMAT'] }}</td>
                            <td>{{ $jadual['TARIKH_SESI'] }}</td>
                            <td class="text-center">
                                @if($jadual->KOD_KATEGORI_PESERTA=='01')
                                Individu
                                @else
                                Kumpulan
                                @endif
                            </td>
                            <!-- <td class="text-center">{{ $jadual['KOD_KATEGORI_PESERTA'] }}</td> -->
                            <td class="text-center">{{ $jadual['JUMLAH_KESELURUHAN'] }}</td>
                            <td class="text-center">{{ $jadual['KOD_KEMENTERIAN'] }}</td>
                            <td>{{ $jadual['platform'] }}</td>
                            <td>{{ $jadual['LOKASI'] }}</td>
                            <td>{{ $jadual['status'] }}</td>
                            <td>{{ $jadual['keterangan'] }}</td>
                            <td>
                                <!-- <a href="/jaduals/{{$jadual['ID_SESI']}}/edit" class="btn bg-light btn-sm"> Kemaskini</a> -->
                                <div class="dropdown">
                                    <button class="btn bg-gradient-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kemaskini
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="/jaduals/{{$jadual['ID_SESI']}}/edit">Perubahan</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#penangguhan">Penangguhan</a>
                                        </li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#pembatalan">Pembatalan</a></li>
                                    </ul>
                                </div>
                                <div class="modal fade" id="penangguhan" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Penangguhan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/jadual/kemaskini_status/{{$jadual['ID_SESI']}}" method="POST">
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                                        <input class="form-control" type="text" name="keterangan">
                                                        <input type="hidden" name="status" value="Penangguhan">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn bg-gradient-primary">Kemaskini</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="pembatalan" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pembatalan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/jadual/kemaskini_status/{{$jadual['ID_SESI']}}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="keterangan" class="form-control-label">Keterangan</label>
                                                        <input class="form-control" type="text" name="keterangan">
                                                        <input type="hidden" name="status" value="Pembatalan">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn bg-gradient-primary">Kemaskini</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
    type="text/javascript"></script>
<script type="text/javascript">
    const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
        searchable: true,
        fixedHeight: true
    });
</script>

@stop