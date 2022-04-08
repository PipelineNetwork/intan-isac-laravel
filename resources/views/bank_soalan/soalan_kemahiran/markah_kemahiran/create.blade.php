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
        <h5 class="font-weight-bolder">Pemarkahan Soalan Kemahiran</h5>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <div class="row">
                            <h5 class="text-white">Tambah Baru</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/markah_soalan_kemahiran"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah Lulus Kemahiran Internet</label>
                                        <input class="form-control" type="text" name="markah_internet"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah Lulus Kemahiran Pemprosesan
                                            Perkataan</label>
                                        <input class="form-control" type="text" name="markah_word"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah Lulus Kemahiran E-mel</label>
                                        <input class="form-control" type="text" name="markah_email"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right">
                                <button class="btn bg-gradient-primary" type="submit">Simpan</button>
                            </div>
                        </form>
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
