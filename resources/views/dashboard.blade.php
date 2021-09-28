@extends('base')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-6">
            <h5 class="font-weight-bolder">Dashboard</h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card m-3">
                <div class="card-header" style="background-color:#FFA500;">
                    <b class="text-white">Senarai Jadual</b>
                </div>

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
                                <th>Jumlah Peserta</th>
                                <th>Kementerian/Agensi</th>
                                <th>Platform</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($jaduals as $jadual)
                                <tr>
                                    <td class="text-center">{{ $jadual['KOD_SESI_PENILAIAN'] }}</td>
                                    <td class="text-center">
                                        @if ($jadual->KOD_TAHAP == '01')
                                            Asas
                                        @else
                                            Lanjutan
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $jadual['KOD_MASA_MULA'] }}</td>
                                    <td class="text-center">{{ $jadual['KOD_MASA_TAMAT'] }}</td>
                                    <td>{{ $jadual['TARIKH_SESI'] }}</td>
                                    <td class="text-center">
                                        @if ($jadual->KOD_KATEGORI_PESERTA == '01')
                                            Individu
                                        @else
                                            Kumpulan
                                        @endif
                                    </td>
                                    <!-- <td class="text-center">{{ $jadual['KOD_KATEGORI_PESERTA'] }}</td> -->
                                    <td class="text-center">{{ $jadual['JUMLAH_KESELURUHAN'] }}</td>
                                    <td class="text-center">{{ $jadual['KOD_KEMENTERIAN'] }}</td>
                                    <td>{{ $jadual['platform'] }}</td>
                                    <td>{{ $jadual['LOKASI'] }}</td>
                                    <td>{{ $jadual['status'] }}</td>
                                    <td>{{ $jadual['keterangan'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
