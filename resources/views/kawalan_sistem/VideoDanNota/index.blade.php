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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kawalan
                                Sistem</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Video dan
                                Nota</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Video dan Nota</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/videodannota/create" class="btn bg-gradient-warning mb-0" type="submit"
                        style="float: right;">MUAT NAIK</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Video dan Nota</b>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 table-flush" id="datatable-basic-videonota">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">Tajuk</th>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">Jenis Dokumen</th>
                                    <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini/Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videodannotas as $key => $videodannota)
                                    <tr>
                                        <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}.</td>
                                        <td class="text-sm text-center font-weight-normal"><a
                                                href="/storage/{{ $videodannota['video'] }}">{{ $videodannota['tajuk'] }}</a>
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">{{ $videodannota['nota'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">{{ $videodannota['jenis'] }}
                                        </td>
                                        <td class="text-sm text-center font-weight-normal">
                                            <a href="/videodannota/{{ $videodannota['id'] }}/edit"
                                                class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger" data-bs-toggle="modal" style="cursor: pointer"
                                                data-bs-target="#modaldelete-{{ $videodannota->id }}">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modaldelete-{{ $videodannota->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                    <br>
                                                    Anda pasti untuk menghapus maklumat ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="videodannota/{{ $videodannota->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">Hapus</button>
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

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic-videonota", {
            searchable: true,
            fixedHeight: true,
            sortable: false
        });
    </script>

@stop
