@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Tambah</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Soalan Kemahiran</h5>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-frame mt-3">
                    <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                        <div class="row d-flex flex-nowrap">
                            <div class="col align-items-center">
                                <h5 class="text-white">Tambah Set Soalan Pengetahuan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/bank-soalan-kemahiran" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Set Soalan</label>
                                        <select class="form-control" name="no_set_soalan" id="quantiti" required>
                                            <option hidden selected>Sila Pilih</option>
                                            {{-- <option value="1">1</option>
                                            <option value="2">2</option> --}}
                                        </select>
                                    </div>
                                </div>

                                <div style="text-align: right">
                                    <button class="btn bg-gradient-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function quantity(amount) {
            var select = document.getElementById('quantiti');
            for (var i = 1; i <= amount; i++) {
                select.options[select.options.length] = new Option(i, i);
            }
        }

        quantity(100);
    </script>
@stop
