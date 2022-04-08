@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <a class="opacity-3 text-dark" href="/dashboard">
                                    <i class="fas fa-home"></i>
                                </a>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengurusan
                                Pengguna</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kebenaran
                                Kumpulan Pengguna</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Kebenaran Kumpulan Pengguna</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/kebenaran_pengguna/create" class="btn bg-gradient-warning" type="submit"
                        style="float: right;">TAMBAH</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Pengguna</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Peranan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}.</td>
                                            <td class="text-sm text-center font-weight-normal">{{ ucwords($role->name) }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a href="/kebenaran_pengguna/{{ $role->id }}/edit"
                                                    class="btn bg-gradient-info">Kemaskini Kebenaran</a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a class="btn bg-gradient-danger" data-bs-toggle="modal" style="cursor: pointer"
                                                    data-bs-target="#modaldelete-{{ $role->id }}">
                                                    Hapus Peranan
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modaldelete-{{ $role->id }}" tabindex="-1"
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
                                                        <form method="POST" action="kebenaran_pengguna/{{ $role->id }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn bg-gradient-danger" type="submit">Hapus
                                                            </button>
                                                        </form>
                                                    </div>
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
            fixedHeight: true
        });
    </script>

@stop
