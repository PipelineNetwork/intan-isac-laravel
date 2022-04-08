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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kebenaran
                                Pengguna</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Kebenaran Pengguna</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Kemaskini Kebenaran</b>
                    </div>
                    <div class="card-body">
                        <form action="/kebenaran_pengguna/kemaskini/{{ $peranan }}/{{ $kebenaran->id }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Nama Kebenaran</label>
                                        <input class="form-control" type="text" value="{{ $kebenaran->name }}"
                                            name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                    {{-- <a href="/kebenaran_pengguna/{{$id_kumpulan}}/edit" class="btn btn-success">Simpan</a> --}}
                                    <a href="/kebenaran_pengguna/{{ $peranan }}/edit"
                                        class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script>
        function active(key) {
            var a = document.getElementById('checkbox' + key);
            var b = document.getElementById('label' + key);

            if (a.checked) {
                b.innerHTML = "Dibenarkan";
            } else {
                b.innerHTML = "Tidak dibenarkan";
            }
        }
    </script>
    {{-- <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script> --}}

@stop
