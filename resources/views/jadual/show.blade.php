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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Jadual</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai
                                Calon</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Senarai Calon</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/jaduals/{{ $jadual->ID_SESI }}/tambah_calon" class="btn bg-gradient-warning" type="submit" style="float: right;">Tambah
                        Calon</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Jadual</b>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">ID
                                            Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Nama
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Tarikh Penilaian</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Surat Tawaran</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permohonans as $index => $permohonan)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $index + $permohonans->firstItem() }}</td>
                                            <td class="text-sm text-center font-weight-normal">{{ $permohonan->id_sesi }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal"
                                                style="text-transform: uppercase;">
                                                {{ $permohonan->nama }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($permohonan->tarikh_sesi)) }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a href="/cetak_surat/{{ $permohonan->id }}"
                                                    class="btn mb-0">Cetak&emsp;<i
                                                        class="far fa-file-pdf fa-lg text-danger"></i></a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" style="cursor: pointer"
                                                    data-bs-target="#modaldelete-{{ $permohonan->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="modaldelete-{{ $permohonan->id }}" tabindex="-1"
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
                                                                action="/mohonpenilaian/{{ $permohonan->id }}">
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
                                {{ $permohonans->links() }}
                            </div>
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
            sortable: false,
            perPage: 15,
            perPageSelect: false,
        });
    </script>
@stop
