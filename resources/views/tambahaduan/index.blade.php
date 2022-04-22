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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Aduan dan
                                Rayuan</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Aduan</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Aduan</h5>
            </div>
            @role('calon')
                <div class="col-lg-6">
                    <div class="column-12">
                        <a href="/tambahaduans/create" class="btn bg-gradient-warning mb-0" type="submit"
                            style="float: right;">Tambah Aduan</a>
                    </div>
                </div>
                <script src="https://isacsupport.intan.my/chat_widget.js"></script>
            @endrole
        </div>

        <div class="card mt-3">
            <div class="card-header" style="background-color:#FFA500;">
                <b class="text-white">Senarai Aduan</b>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Nama</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    No Kad Pengenalan</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Tarikh</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Status</th>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                    Perincian</th>
                                @hasanyrole('pentadbir sistem|pentadbir penilaian')
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">
                                        Tindakan</th>
                                @endhasanyrole
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tambahaduans as $tambahaduan)
                                <tr>
                                    <td class="text-sm text-center font-weight-normal" style="text-transform: uppercase">
                                        {{ $tambahaduan->name }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $tambahaduan->nric }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ date('d-m-Y', strtotime($tambahaduan->created_at)) }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        @if ($tambahaduan->status === 'baru')
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-danger">Baru</span>
                                            </span>
                                        @else
                                            <span class="text-secondary text-sm font-weight-bold">
                                                <span class="badge badge-success">Dibalas</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        <a data-bs-toggle="modal" data-bs-target="#modal-form4-{{ $tambahaduan->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                    @hasanyrole('pentadbir sistem|pentadbir penilaian')
                                        <td class="text-sm text-center font-weight-normal"><a class="btn btn-info text-white"
                                                href="/tambahaduans/{{ $tambahaduan->id }}/edit" style="color:black;">
                                                Balas
                                            </a>&emsp;
                                            <button class="btn btn-danger" data-bs-toggle="modal" style="cursor: pointer"
                                                data-bs-target="#modaldelete-{{ $tambahaduan->id }}">
                                                Hapus
                                            </button>
                                        </td>
                                    @endhasanyrole

                                </tr>

                                <div class="modal fade" id="modal-form4-{{ $tambahaduan->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card card-plain">
                                                    <div class="card-header pb-0 text-left">
                                                        <h3 class="font-weight-bolder text-info text-gradient">Terperinci
                                                        </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form role="form text-left">
                                                            <input type="hidden" name="id" value="{{ $tambahaduan->id }}">
                                                            <div class="form-group">
                                                                <label for="title">Tajuk</label>
                                                                <input type="text" class="form-control" name="tajuk"
                                                                    value="{{ $tambahaduan->tajuk }}" disabled="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title">Keterangan Aduan</label>
                                                                <textarea class="form-control" rows="3"
                                                                    name="keterangan_aduan_send"
                                                                    disabled>{{ $tambahaduan->keterangan_aduan_send }}</textarea>
                                                            </div>

                                                            @if ($tambahaduan['file_aduan_send'] != null)
                                                                <div class="form-group">
                                                                    <label for="title">Fail Aduan</label>
                                                                    <a href="storage/{{ $tambahaduan['file_aduan_send'] }}"
                                                                        target="_blank">{{ $tambahaduan['file_aduan_send'] }}</a>
                                                                </div>
                                                            @else
                                                                <div class="form-group">
                                                                    <label for="title">Fail Aduan</label>
                                                                    <br>
                                                                    <a>Tiada fail</a>
                                                                </div>
                                                            @endif

                                                            @if ($tambahaduan->status == 'dibalas')
                                                                <div class="form-group">
                                                                    <label for="aduan_reply">Keterangan Balas :</label>
                                                                    <textarea class="form-control"
                                                                        name="keterangan_aduan_reply" id="aduan_reply"
                                                                        rows="3" required
                                                                        readonly>{{ $tambahaduan->keterangan_aduan_reply }}</textarea>
                                                                </div>
                                                                @if ($tambahaduan['file_aduan_reply'] != null)
                                                                    <div class="form-group">
                                                                        <label for="file_aduan_reply">Fail Balas :</label>
                                                                        <a href="/storage/{{ $tambahaduan['file_aduan_reply'] }}"
                                                                            target="_blank">{{ $tambahaduan['file_aduan_reply'] }}</a>
                                                                    </div>
                                                                @else
                                                                    <div class="form-group">
                                                                        <label for="title">Fail Balas</label>
                                                                        <br>
                                                                        <a>Tiada fail</a>
                                                                    </div>
                                                                @endif
                                                                {{-- <div class="form-group">
                                                                    <label for="file_aduan_reply">Fail Balas :</label>
                                                                    <a href="storage/{{ $tambahaduan['file_aduan_reply'] }}"
                                                                        target="_blank">{{ $tambahaduan['file_aduan_reply'] }}</a>
                                                                </div> --}}
                                                            @else
                                                                <div class="my-3">
                                                                    <label><b>Belum dibalas</b></label>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modaldelete-{{ $tambahaduan->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                <br>
                                                Anda pasti untuk menghapus aduan ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form method="POST" action="/tambahaduans/{{ $tambahaduan->id }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Hapus&emsp;<i
                                                            class="fas fa-trash-alt"></i></button>
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

    <script src="/assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true,
            sortable: false
        });
    </script>

@stop
