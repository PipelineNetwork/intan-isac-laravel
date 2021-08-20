@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h5> Senarai Rayuan </h5>
    </div>
</div>

<div class="container py-3">
    <div class="row">
        <div class="column-6">
            <a href="/tambahrayuans/create" class="btn btn-primary" type="submit">Tambah Rayuan</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

            <thead>
                <tr>
                    <th>Tajuk</th>
                    <th>Keterangan Rayuan</th>
                    <th>File Rayuan</th>
                    <th>Keterangan Balas</th>
                    <th>File Balas</th>
                    <th>Status</th> 
                    <th>Balas</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($tambahrayuans as $tambahrayuan)
                <tr>
                    <td>{{ $tambahrayuan['tajuk'] }}</td>
                    <td>{{ $tambahrayuan['keterangan_rayuan_send'] }}</td>
                    <td><a href="storage/{{ $tambahrayuan['file_rayuan_send'] }}">{{ $tambahrayuan['file_rayuan_send'] }}</td>
                    <td>{{ $tambahrayuan['keterangan_rayuan_reply'] }}</td>
                    <td><a href="storage/{{ $tambahrayuan['file_rayuan_reply'] }}">{{ $tambahrayuan['file_rayuan_reply'] }}</td>
                    <td>{{ $tambahrayuan['status'] }}</td>
                    <td><a href="/tambahrayuans/{{$tambahrayuan['id']}}/edit" class="btn-sm" style="color:black;"> Balas</a>

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