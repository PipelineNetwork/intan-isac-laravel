@extends('base')
@section('content')
    <?php
    use App\Models\Refgeneral;
    ?>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="/dashboard">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai
                                Jadual</a></li>
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
                    <a href="/jaduals/create" class="btn bg-gradient-warning" type="submit" style="float: right;">Tambah
                        Jadual</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Jadual</b>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">ID Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sesi</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa Mula</th>
                                        {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa Tamat</th> --}}
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Penilaian
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kategori Peserta
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Jumlah Peserta
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kekosongan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kementerian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Platform</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Lokasi</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Keterangan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($jaduals as $key => $jadual)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}.</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $jadual['ID_PENILAIAN'] }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($jadual['KOD_SESI_PENILAIAN'] == '01')
                                                    Sesi 01
                                                @elseif($jadual['KOD_SESI_PENILAIAN'] == '02')
                                                    Sesi 02
                                                @elseif($jadual['KOD_SESI_PENILAIAN'] == '03')
                                                    Sesi 03
                                                @endif
                                                {{-- {{ $jadual['KOD_SESI_PENILAIAN'] }} --}}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($jadual->KOD_TAHAP == '01')
                                                    Asas
                                                @else
                                                    Lanjutan
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $jadual['KOD_MASA_MULA'] }}</td>
                                            {{-- <td class="text-sm text-center font-weight-normal">{{ $jadual['KOD_MASA_TAMAT'] }}</td> --}}
                                            <td>{{ date('d-m-Y', strtotime($jadual['TARIKH_SESI'])) }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($jadual->KOD_KATEGORI_PESERTA == '01')
                                                    Individu
                                                @else
                                                    Kumpulan
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $jadual['JUMLAH_KESELURUHAN'] }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($jadual['KEKOSONGAN'] == null)
                                                    0
                                                @else
                                                    {{ $jadual['KEKOSONGAN'] }}
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($jadual['KOD_KEMENTERIAN'] == null)
                                                    -
                                                @else
                                                    <?php
                                                    $kementerian = Refgeneral::where('MASTERCODE', '10028')
                                                        ->where('REFERENCECODE', $jadual->KOD_KEMENTERIAN)
                                                        ->first();
                                                    // $kementerian = $kementerian->DESCRIPTION1;
                                                    ?>
                                                    @if ($kementerian != null)
                                                        {{ $kementerian['DESCRIPTION1'] }}
                                                        {{-- {{ $jadual['KOD_KEMENTERIAN'] }} --}}
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $jadual['platform'] }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($jadual['LOKASI'] == null)
                                                    -
                                                @else
                                                    {{ $jadual['LOKASI'] }}
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">{{ $jadual['status'] }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">{{ $jadual['keterangan'] }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    style="cursor: pointer"
                                                    data-bs-target="#modaldelete-{{ $jadual['ID_SESI'] }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                                <div class="dropdown">
                                                    <button class="btn btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="fas fa-edit"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item"
                                                                href="/jaduals/{{ $jadual['ID_SESI'] }}/edit">Perubahan</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#penangguhan{{ $jadual['ID_SESI'] }}">Penangguhan</a>
                                                        </li>
                                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#pembatalan{{ $jadual['ID_SESI'] }}">Pembatalan</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modaldelete-{{ $jadual['ID_SESI'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                        <br>
                                                        Anda pasti untuk menghapus jadual?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form method="POST" action="jaduals/{{ $jadual->ID_SESI }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit">Hapus&emsp;<i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="penangguhan{{ $jadual['ID_SESI'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Penangguhan
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/jadual/kemaskini_status/{{ $jadual['ID_SESI'] }}"
                                                        method="POST">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="keterangan"
                                                                    class="form-control-label">Keterangan</label>
                                                                <input class="form-control" type="text" name="keterangan">
                                                                <input type="hidden" name="status" value="Penangguhan">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit"
                                                                class="btn bg-gradient-primary">Kemaskini</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="pembatalan{{ $jadual['ID_SESI'] }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Pembatalan
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/jadual/kemaskini_status/{{ $jadual['ID_SESI'] }}"
                                                        method="POST">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="keterangan"
                                                                    class="form-control-label">Keterangan</label>
                                                                <input class="form-control" type="text" name="keterangan">
                                                                <input type="hidden" name="status" value="Pembatalan">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit"
                                                                class="btn bg-gradient-primary">Kemaskini</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: false,
            sortable: false
        });
    </script>

@stop
