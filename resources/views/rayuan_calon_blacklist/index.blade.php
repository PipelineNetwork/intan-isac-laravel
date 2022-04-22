@extends('base')
@section('content')
    <?php
    use App\Models\Refgeneral;
    ?>

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Calon
                                Blacklist</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Senarai Calon Blacklist</h5>
            </div>
            @role('calon')
                <div class="col-lg-6">
                    <div class="column-12">
                        <a href="/rayuan_calon_blacklist/create" class="btn bg-gradient-warning" type="submit"
                            style="float: right;">Tambah
                            Rayuan</a>
                    </div>
                </div>
            @endrole
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Senarai Rayuan Calon Blacklist</b>
                    </div>

                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No. Kad
                                            Pengenalan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh
                                            Status Blacklist</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Status</th>
                                        @hasanyrole('pentadbir sistem|pentadbir penilaian')
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Tindakan</th>
                                        @endhasanyrole
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @foreach ($rayuan as $key => $rayuan)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal" class="text-center">
                                                {{ $key + 1 }}.</td>
                                            <td class="text-sm text-center font-weight-normal">{{ $rayuan->nama }}</td>
                                            <td class="text-sm text-center font-weight-normal">{{ $rayuan->ic_calon }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">{{ $rayuan->tahap }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($rayuan->created_at)) }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($rayuan->status == 'Baru')
                                                    <span class="badge badge-info">Baru</span>
                                                @elseif($rayuan->status == "Diterima")
                                                    <span class="badge badge-success">Diterima</span>
                                                @elseif($rayuan->status == "Ditolak")
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            @hasanyrole('pentadbir sistem|pentadbir penilaian')
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a class="btn bg-gradient-info" data-bs-toggle="modal"
                                                        data-bs-target="#status{{ $rayuan->id }}">Kemaskini</a>
                                                </td>
                                            @endhasanyrole
                                            <div class="modal fade" id="status{{ $rayuan->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Kemaskini
                                                                Status
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/rayuan_calon_blacklist/{{ $rayuan->id }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Status</label>
                                                                    <select class="form-control" name="status">
                                                                        <option value="" hidden>Sila Pilih</option>
                                                                        <option value="Diterima">Diterima</option>
                                                                        <option value="Ditolak">Ditolak</option>
                                                                    </select>
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
                                        </tr>
                                    @endforeach --}}

                                    @foreach ($calon_blacklists as $key => $calon_blacklists)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal" class="text-center">
                                                {{ $key + 1 }}.</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $calon_blacklists->name }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $calon_blacklists->nric }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($calon_blacklists->tarikh_penilaian)) }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($calon_blacklists->status_blacklist == 'Gagal')
                                                    <span class="badge badge-danger">Gagal Penilaian</span>
                                                @elseif($calon_blacklists->status_blacklist == 'Tidak Hadir')
                                                    <span class="badge badge-warning">Tidak Hadir Penilaian</span>
                                                @endif
                                            </td>
                                            @hasanyrole('pentadbir sistem|pentadbir penilaian')
                                                <td class="text-sm text-center font-weight-normal">
                                                    <a class="btn bg-gradient-info" data-bs-toggle="modal"
                                                        data-bs-target="#status{{ $calon_blacklists->id }}">Kemaskini</a>
                                                </td>
                                            @endhasanyrole
                                            <div class="modal fade" id="status{{ $calon_blacklists->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Kemaskini
                                                                Status
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/rayuan_calon_blacklist/{{ $calon_blacklists->id }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Status
                                                                        Blacklist</label>
                                                                    <select class="form-control" name="status_blacklist">
                                                                        @if ($calon_blacklists->status_blacklist == 'Gagal')
                                                                            <option value="Gagal" hidden selected>Gagal
                                                                                Penilaian</option>
                                                                        @elseif ($calon_blacklists->status_blacklist == 'Tidak Hadir')
                                                                            <option value="Tidak Hadir" hidden selected>
                                                                                Tidak Hadir Penilaian
                                                                            </option>
                                                                        @else
                                                                            <option value="Tidak" hidden selected>Tidak
                                                                                Blacklist</option>
                                                                        @endif
                                                                        <option value="Gagal">Gagal Penilaian</option>
                                                                        <option value="Tidak Hadir">Tidak Hadir Penilaian
                                                                        </option>
                                                                        <option value="Tidak">Tidak Blacklist</option>
                                                                    </select>
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
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>

@stop
