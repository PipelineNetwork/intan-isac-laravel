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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Bank Soalan</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Soalan
                                Kemahiran</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Soalan Kemahiran</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/bank-soalan-kemahiran/create" class="btn bg-gradient-warning mb-0" type="submit"
                        style="float: right;">Tambah</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-frame mt-3">
                    <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <b class="text-white">Senarai Set Soalan Kemahiran</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable_soalan_kemahiran">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Set Soalan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh
                                            Disediakan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banksoalankemahirans as $banksoalankemahiran)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                            <td class="text-sm text-center font-weight-normal">Set
                                                {{ $banksoalankemahiran->no_set_soalan }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($banksoalankemahiran->created_at)) }}</td>
                                            <td class="text-sm text-center font-weight-normal"><a
                                                    href="/bank-soalan-kemahiran/{{ $banksoalankemahiran->id }}">
                                                    <i class="fas fa-pencil-alt"></i> Kemaskini
                                                </a></td>
                                            <td class="text-sm text-center font-weight-normal" style="cursor: pointer"><a
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modaldeleteSoalanKemahiran-{{ $banksoalankemahiran->id }}">
                                                    <i class="far fa-trash-alt"></i> Hapus
                                                </a></td>
                                        </tr>

                                        <div class="modal fade"
                                            id="modaldeleteSoalanKemahiran-{{ $banksoalankemahiran->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                        <br>
                                                        Anda pasti mahu hapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <form method="POST"
                                                            action="/bank-soalan-kemahiran/{{ $banksoalankemahiran->id }}">
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
    </div>

    {{-- <script src="../../assets/js/plugins/datatables.js"
        type="text/javascript"></script> --}}
    <script src="/assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableSoalanKemahiran = new simpleDatatables.DataTable("#datatable_soalan_kemahiran", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
