@extends('base')
@section('content')
    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
            </ol>
            <h5 class="font-weight-bolder">Pengurusan Penilaian</h5>
        </nav>
        <div class="row">
            <div class="col-12">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Pilih jadual</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            No.</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Sesi</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Masa</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tarikh</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kekosongan</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Platform</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lokasi</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Daftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadual_penyelia as $key => $jadual)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}.</td>
                                            <td class="text-center">
                                                @if ($jadual->KOD_SESI_PENILAIAN == '01')
                                                    Sesi 01
                                                @elseif($jadual->KOD_SESI_PENILAIAN == '02')
                                                    Sesi 02
                                                @elseif($jadual->KOD_SESI_PENILAIAN == '03')
                                                    Sesi 03
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $jadual->KOD_MASA_MULA }} -
                                                {{ $jadual->KOD_MASA_TAMAT }}</td>
                                            <td class="text-center">
                                                {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}
                                            </td>
                                            <td class="text-center">{{ $jadual->KEKOSONGAN }}</td>
                                            <td class="text-center">{{ $jadual->platform }}</td>
                                            <td class="text-center">
                                                @if ($jadual['KOD_KEMENTERIAN'] == null)
                                                    -
                                                @else
                                                    {{ $jadual['LOKASI'] }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <form action="/mohonpenilaian/penyelaras/pilih_jadual" method="POST">
                                                    @csrf
                                                    @if ($jadual->KEKOSONGAN != 0)
                                                        <input type="hidden" name="sesi"
                                                            value="{{ $jadual->ID_PENILAIAN }}">
                                                        <button class="btn btn-sm bg-gradient-info">PILIH</button>
                                                    @else
                                                        <button class="btn btn-sm bg-gradient-secondary"
                                                            disabled>Penuh</button>
                                                    @endif

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="form-group">
                                <label>Sila pilih jadual</label>
                                <select class="form-control" name="sesi">
                                    <option hidden selected value="">Sila Pilih</option>
                                    @foreach ($jadual_penyelia as $jadual)
                                        <option value="{{ $jadual->ID_SESI }}">
                                            {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn bg-gradient-info">Seterusnya</button>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
