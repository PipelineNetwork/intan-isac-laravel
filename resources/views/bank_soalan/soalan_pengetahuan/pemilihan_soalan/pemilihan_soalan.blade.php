@extends('base')
@section('content')
    <?php use App\Models\User; ?>
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
                                Pengetahuan</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Soalan Pengetahuan</h5>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header mt-3" style="background-color:#FFA500;">
                        <div class="row d-flex flex-nowrap">
                            <div class="col align-items-center">
                                <b class="text-white">Pemilihan Soalan Pengetahuan</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body  pt-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable_soalan_pengetahuan">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Nama Pemilihan
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Jumlah
                                            Keseluruhan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap Soalan
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh
                                            Disediakan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Kemaskini
                                        </th>
                                        {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">Disediakan Oleh
                                        </th> --}}
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemilihan as $pemilihan)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $pemilihan->NAMA_PEMILIHAN_SOALAN }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $pemilihan->JUMLAH_KESELURUHAN_SOALAN }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($pemilihan->KOD_TAHAP_SOALAN == 01)
                                                    Asas
                                                @else
                                                    Lanjutan
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($pemilihan->TARIKH_CIPTA)) }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ date('d-m-Y', strtotime($pemilihan->TARIKH_KEMASKINI)) }}</td>
                                            {{-- <td class="text-sm text-center font-weight-normal">
                                                {{ $pemilihan->ID_PENGGUNA }}
                                            </td> --}}
                                            <td class="text-sm text-center font-weight-normal">
                                                <a href="/pengurusan_penilaian/pemilihan_soalan_pengetahuan/{{ $pemilihan->ID_PEMILIHAN_SOALAN }}"
                                                    class="btn bg-gradient-info btn-sm mb-0">Kemaskini</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableSoalanPengetahuan = new simpleDatatables.DataTable("#datatable_soalan_pengetahuan", {
            // searchable: true,
            // fixedHeight: true,
            sortable: false,
        });
    </script>
@stop
