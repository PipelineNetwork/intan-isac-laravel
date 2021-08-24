@extends('base')
@section('content')

<div class="container py-3">
    <div class="row">
        <h5> Senarai Jadual </h5>
    </div>
</div>
<div class="container py-3">
    <div class="row">
        <div class="column-6">
            <a href="/jaduals/create" class="btn btn-primary" type="submit">Tambah Jadual</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0 table-flush" id="datatable-basic">

            <thead>
                <tr>
                    <th>Kod Sesi</th>
                    <th>Tahap</th>
                    <th>Masa Mula</th>
                    <th>Masa Tamat</th>
                    <th>Tarikh</th>
                    <th>Kategori Peserta</th>
                    <th>Kementerian/Agensi</th>
                    <th>Platform</th>
                    <th>Lokasi</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($jaduals as $jadual)
                <tr>
                    <td>{{ $jadual['KOD_SESI_PENILAIAN'] }}</td>
                    <td>{{ $jadual['KOD_TAHAP'] }}</td>
                    <td>{{ $jadual['KOD_MASA_MULA'] }}</td>
                    <td>{{ $jadual['KOD_MASA_TAMAT'] }}</td>
                    <td>{{ $jadual['TARIKH_SESI'] }}</td>
                    <td>{{ $jadual['KOD_KATEGORI_PESERTA'] }}</td>
                    <td>{{ $jadual['JUMLAH_KESELURUHAN'] }}</td>
                    <td>{{ $jadual['KOD_KEMENTERIAN'] }}</td>
                    <td>{{ $jadual['platform'] }}</td>
                    <td>{{ $jadual['LOKASI'] }}</td>
                    <td>{{ $jadual['status'] }}</td>
                    <td><a href="/jaduals/{{$jadual['ID_SESI']}}/edit" class="btn-sm" style="color:black;"> Kemaskini </a>

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