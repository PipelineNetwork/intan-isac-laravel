@extends('base')
@section('content')
    <?php
    use App\Models\PerananDanKebenaran;
    ?>

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kawalan
                                Sistem</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kebenaran
                                Pengguna</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Kebenaran Pengguna</h5>
            </div>
            {{-- <div class="col-lg-6">
                <div class="column-12">
                    <a href="/notifikasi_email/{{$noti->id}}/edit" class="btn bg-gradient-primary mx-4" type="submit"
                        style="float: right;">Kemaskini</a>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Kebenaran</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5>{{ ucfirst(trans($peranan->name)) }}</h5>
                            </div>
                        </div>
                        <form action="/kebenaran_pengguna/{{ $peranan->id }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="px-2">Menu Utama</th>
                                                    <th class="px-2">Kebenaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kebenaran as $key => $kebenaran)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}.</td>
                                                        <td>{{ ucfirst(trans($kebenaran->name)) }}</td>
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <input id='switch{{ $kebenaran->id }}'
                                                                    class="form-check-input" type='checkbox' value='1'
                                                                    name='{{ $kebenaran->name }}'
                                                                    onclick="active({{ $kebenaran->id }})"
                                                                    <?php
                                                                    $try = PerananDanKebenaran::where('role_id', $peranan->id)
                                                                        ->where('permission_id', $kebenaran->id)
                                                                        ->first();
                                                                    echo $try == true ? ' checked' : '';
                                                                    ?>>
                                                                <label class="form-check-label"
                                                                    for="switch{{ $kebenaran->id }}"
                                                                    id="label{{ $kebenaran->id }}">
                                                                    @if ($try == true)
                                                                        Dibenarkan
                                                                    @else
                                                                        Tiada Kebenaran
                                                                    @endif
                                                                </label>
                                                            </div>
                                                            {{-- <a href="/kebenaran_pengguna/{{$peranan->id}}/{{$kebenaran->id}}" class="btn bg-gradient-info">Kemaskini Peranan</a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="/kebenaran_pengguna" class="btn btn-danger">Kembali</a>
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
            var a = document.getElementById('switch' + key);
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
