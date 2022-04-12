@extends('base')
<?php
$role = Auth::user()->user_group_id;
use App\Models\Jadual;
?>
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Permohonan
                                Penilaian</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai
                                Permohonan</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
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
            @role('calon')
                <div class="col-12">
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
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Sesi Penilaian</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Tarikh Penilaian</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Surat Tawaran</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Status</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Tindakan</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($calon_3s as $index => $calon_3)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $index + $calon_3s->firstItem() }}</td>
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
                                    </tbody>
                                </table>
                                <div class="justify-content-end d-flex">
                                    {{ $calon_3s->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Carian Permohonan</b>
                        </div>

                        <div class="card-body pt-0">
                            <form action="/carian-penilaian" method="get">
                                @method("GET")
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label>Nama Pengguna</label>
                                        <input class="form-control" type="text" name="nama" autocomplete="off" />
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label>No Kad Pengenalan Pengguna</label>
                                        <input class="form-control" type="text" name="ic" autocomplete="off" maxlength="12"
                                            size="12"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label>ID Penilaian</label>
                                        <input class="form-control" type="text" name="id_penilaian" autocomplete="off"
                                            maxlength="12" size="12"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    <div class="col d-flex justify-content-end align-items-end mt-3">

                                        <button class="btn bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                                class="fas fa-search"></i> cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endrole
        </div>

        <script src="https://isacsupport.intan.my/chat_widget.js"></script>
        <script src="../../assets/js/plugins/datatables.js"></script>
        <script type="text/javascript">
            const dataTableBasickategori = new simpleDatatables.DataTable("#datatable-peserta", {
                searchable: true,
                fixedHeight: true,
                sortable: false,
                perPage: 20,
                perPageSelect: false,
            });
        </script>
    @stop
