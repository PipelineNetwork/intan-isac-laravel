@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h3> Pengurusan Pengguna </h3>
    </div>
</div>

<div class="container py-3">
    <div class="row">
        <h5> Senarai Pengguna </h5>
    </div>
</div>
<div class="container py-3">
    <div class="row">
        <div class="column-6">
            <a href="/pengurusanpengguna/create" class="btn btn-primary" type="submit">Daftar Pengguna</a>
        </div>
    </div>
</div>


<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kemaskini</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td><a href="/pengurusanpengguna/{{$user->id}}/edit" class="btn-sm" style="color:black;"> Kemaskini
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('pengurusanpengguna.destroy', $user['id'] ) }}">
                            @method('DELETE')
                            @csrf

                            <button type="submit"> Hapus</button>
                        </form>
                    </td>
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