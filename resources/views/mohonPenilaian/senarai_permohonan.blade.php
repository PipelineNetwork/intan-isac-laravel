@extends('base')
<?php
$role = Auth::user()->user_group_id;
use App\Models\Jadual;
?>
@section('content')
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Permohonan
                                Penilaian</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai
                                Permohonan</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Permohonan Penilaian</h5>
            </div>
            @if (auth()->user()->hasrole('penyelaras') ||
    auth()->user()->hasrole('pentadbir sistem'))
                <div class="col-lg-6">
                    <div class="column-12">
                        <a href="/mohonpenilaian/create" class="btn bg-gradient-warning" type="submit"
                            style="float: right;">PILIH JADUAL</a>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Permohonan</b>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-peserta">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">ID
                                            Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Nama
                                        </th>
                                        @role('calon')
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Sesi Penilaian</th>
                                        @endrole
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Tarikh Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Surat Tawaran</th>
                                        @role('calon')
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Status</th>
                                        @endrole
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Tindakan</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @role('calon')
                                        @foreach ($calon_3 as $key => $calon_3)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                                <td class="text-sm text-center font-weight-normal">{{ $calon_3['id_sesi'] }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal"
                                                    style="text-transform: uppercase;">
                                                    {{ $calon_3['nama'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <?php
                                                    $sesi = Jadual::where('ID_PENILAIAN', $calon_3['id_sesi'])->first();
                                                    $sesi = $sesi->KOD_SESI_PENILAIAN;
                                                    ?>
                                                    Sesi {{ $sesi }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($calon_3['tarikh_sesi'])) }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $calon_3['status_penilaian'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="/cetak_surat/{{ $calon_3['id'] }}"
                                                        class="btn mb-0">Cetak&emsp;<i
                                                            class="far fa-file-pdf fa-lg text-danger"></i></a>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a data-bs-toggle="modal" style="cursor: pointer"
                                                        data-bs-target="#modaldelete-{{ $calon_3->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade" id="modaldelete-{{ $calon_3->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                                <br>
                                                                Anda pasti untuk menghapus permohonan?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/mohonpenilaian/{{ $calon_3->id }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                        @elserole ('penyelaras')
                                        @foreach ($penyelaras as $key => $penyelaras)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $penyelaras['id_sesi'] }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal"
                                                    style="text-transform: uppercase;">
                                                    {{ $penyelaras['nama'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($penyelaras['tarikh_sesi'])) }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="/cetak_surat/{{ $penyelaras['id'] }}"
                                                        class="btn mb-0">Cetak&emsp;<i
                                                            class="far fa-file-pdf fa-lg text-danger"></i></a>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a data-bs-toggle="modal" style="cursor: pointer"
                                                        data-bs-target="#modaldelete-{{ $penyelaras['id'] }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade" id="modaldelete-{{ $penyelaras['id'] }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                                <br>
                                                                Anda pasti untuk menghapus permohonan?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/mohonpenilaian/{{ $penyelaras['id'] }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach ($peserta as $key => $peserta)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                                <td class="text-sm text-center font-weight-normal">{{ $peserta['id_sesi'] }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal"
                                                    style="text-transform: uppercase;">
                                                    {{ $peserta['nama'] }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($peserta['tarikh_sesi'])) }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a href="/cetak_surat/{{ $peserta['id'] }}"
                                                        class="btn mb-0">Cetak&emsp;<i
                                                            class="far fa-file-pdf fa-lg text-danger"></i></a>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a data-bs-toggle="modal" style="cursor: pointer"
                                                        data-bs-target="#modaldelete-{{ $peserta['id'] }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <div class="modal fade" id="modaldelete-{{ $peserta['id'] }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                                <br>
                                                                Anda pasti untuk menghapus permohonan?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form method="POST"
                                                                    action="/mohonpenilaian/{{ $peserta['id'] }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @endrole
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
