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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Rayuan Calon
                                Blacklist</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Permohonan</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Permohonan Rayuan Calon Blacklist</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Permohonan Rayuan Calon Blacklist</b>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="/rayuan_calon_blacklist" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" value="{{ $calon->name }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">No.My Kad/Polis/Tentera/Pasport</label>
                                        <input class="form-control" type="text" name="nric" value="{{ $calon->nric }}"
                                            maxlength="12" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Tahap</label>
                                        <select class="form-control" name="tahap">
                                            <option value="" hidden>Sila Pilih</option>
                                            <option value="Asas">Asas</option>
                                            <option value="Lanjutan">Lanjutan</option>
                                        </select>
                                        @error('tahap')
                                            <label class="text-danger mb-0 mt-0 p-0 ml-3"><em>{{ $message }}</em></label>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col text-end">
                                            <a href="/calon_rayuan_blacklist" class="btn btn-danger">Kembali</a>
                                            <button class="btn btn-success" type="submit">Mohon</button>
                                        </div>
                                    </div>
                                </form>
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
            fixedHeight: true
        });
    </script>

@stop
