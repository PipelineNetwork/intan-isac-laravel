@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h5> Senarai Aduan </h5>
    </div>
</div>
<div class="container py-3">
    <div class="row">
        <div class="column-6">
            <a href="/tambahaduans/create" class="btn btn-primary" type="submit">Tambah Aduan</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

            <thead>
                <tr>
                    <th>Tajuk</th>
                    <th>Keterangan Aduan</th>
                    <th>File Aduan</th>
                    <th>Keterangan Balas</th>
                    <th>File Balas</th>
                    <th>Status</th>
                    <th>Balas</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tambahaduans as $tambahaduan)
                <tr>
                    <td>{{ $tambahaduan['tajuk'] }}</td>
                    <td>{{ $tambahaduan['keterangan_aduan_send'] }}</td>
                    <td><a href="storage/{{ $tambahaduan['file_aduan_send'] }}">{{ $tambahaduan['file_aduan_send'] }}</a> </td>
                    <td>{{ $tambahaduan['keterangan_aduan_reply'] }}</td>
                    <td><a href="storage/{{ $tambahaduan['file_aduan_reply'] }}">{{ $tambahaduan['file_aduan_reply'] }}</td>
                    <td>{{ $tambahaduan['status'] }}</td>
                    <td><a href="/tambahaduans/{{$tambahaduan['id']}}/edit" class="btn-sm" style="color:black;"> Balas</a>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

<script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
    type="text/javascript"></script>
<script type="text/javascript">
const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
    searchable: true,
    fixedHeight: true
});
</script>

@stop