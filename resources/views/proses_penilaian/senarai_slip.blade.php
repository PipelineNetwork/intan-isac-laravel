@extends('base')
@section('content')
    @php
    use App\Models\Jadual;
    @endphp

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Keputusan
                                Penilaian</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Keputusan Penilaian</h5>
            </div>
            <div class="col-lg-6">
                <a href="/keputusan_penilaian" class="btn bg-gradient-warning" style="float: right;">Kembali
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Slip Keputusan</b>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-peserta">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Nama Calon</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No. Kad
                                            Pengenalan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">ID Penilaian
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sesi Penilaian
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Penilaian
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Lokasi</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Keputusan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Dokumen</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keputusans as $key => $keputusan)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $keputusan->nama_peserta }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $keputusan->ic_peserta }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $keputusan->id_penilaian }}</td>
                                            <?php
                                            $sesi = Jadual::where('ID_PENILAIAN', $keputusan->id_penilaian)->first();
                                            if ($sesi != null) {
                                                $sesi = $sesi['KOD_SESI_PENILAIAN'];
                                            } else {
                                                $sesi = '04';
                                            }
                                            ?>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($sesi == '01')
                                                    Sesi 1
                                                @elseif($sesi == '02')
                                                    Sesi 2
                                                @elseif($sesi == '03')
                                                    Sesi 3
                                                @else
                                                    Null
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($keputusan->tarikh_penilaian)) }}</td>
                                            <td class="text-sm text-center font-weight-normal">{{ $keputusan->lokasi }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">{{ $keputusan->keputusan }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a href="/slip_keputusan/{{ $keputusan->ic_peserta }}/{{ $keputusan->id_penilaian }}"
                                                    class="btn mb-0">Slip&emsp;<i
                                                        class="far fa-file-pdf fa-lg text-danger"></i></a>
                                                {{-- <a href="/sijil_isac" class="btn mb-0">Sijil&emsp;<i class="far fa-file-pdf fa-lg text-danger"></i></a> --}}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" style="cursor: pointer"
                                                    data-bs-target="#deleteslip-{{ $keputusan->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                <div class="modal fade" id="deleteslip-{{ $keputusan->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <i class="far fa-times-circle fa-7x"
                                                                    style="color: #ea0606"></i>
                                                                <br>
                                                                Anda pasti untuk menghapus slip?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/keputusan_penilaian/{{ $keputusan->id }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger"
                                                                        type="submit">Hapus</button>
                                                                </form>
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
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasickategori = new simpleDatatables.DataTable("#datatable-peserta", {
            searchable: true,
            fixedHeight: true,
            sortable: false
        });
    </script>
@stop
