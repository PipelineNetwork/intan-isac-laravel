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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Soalan
                                Kemahiran
                            </a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Permarkahan
                            </a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Pemarkahan Soalan Kemahiran</h5>
            </div>
            @if (count($markah_soalan_kemahirans) == 0)
                <div class="col-lg-6">
                    <a href="/markah_soalan_kemahiran/create" class="btn bg-gradient-warning mb-0" type="submit"
                        style="float: right;">Tambah</a>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="text-white">Pemarkahan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-markah">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Soalan Kemahiran Internet</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Soalan Kemahiran Pemprosesan Perkataan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Soalan Kemahiran E-mel</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($markah_soalan_kemahirans as $key => $markah_soalan_kemahiran)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $markah_soalan_kemahiran->markah_internet }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $markah_soalan_kemahiran->markah_word }}</td>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $markah_soalan_kemahiran->markah_email }}</td>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a href="/markah_soalan_kemahiran/{{ $markah_soalan_kemahiran->id }}/edit"
                                                    class="btn btn-primary mb-0"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" class="btn btn-outline-danger mb-0"
                                                    style="cursor: pointer"
                                                    data-bs-target="#modaldelete-{{ $markah_soalan_kemahiran->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="modaldelete-{{ $markah_soalan_kemahiran->id }}"
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
                                                                action="/markah_soalan_kemahiran/{{ $markah_soalan_kemahiran->id }}">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasickategori = new simpleDatatables.DataTable("#datatable-markah", {
            searchable: true,
            fixedHeight: true,
            sortable: false,
            perPage: 15,
            perPageSelect: false,
        });
    </script>
@stop
