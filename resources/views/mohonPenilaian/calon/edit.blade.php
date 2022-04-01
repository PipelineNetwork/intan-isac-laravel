@extends('base')
@section('content')
    <?php
    use App\Models\MohonPenilaian;
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Permohonan
                        Penilaian</a></li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penjadualan Semula</a>
                </li>
            </ol>
            <h5 class="font-weight-bolder">Penjadualan Semula</h5>
        </nav>

        <div class="row">
            <div class="col">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h6 class="text-white mb-0">Butiran Penjadualan Semula</h6>
                    </div>
                    <div class="card-body">
                        <h3>Penjadualan Semasa</h3>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="mb-0 text-dark">ID Penilaian</h6>
                            </div>
                            <div class="col-lg-9">
                                <p class="mb-0">: {{ $penjadualan->id_sesi }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="mb-0 text-dark">Tarikh Penilaian</h6>
                            </div>
                            <div class="col-lg-9">
                                <p class="mb-0">: {{ date('d-m-Y', strtotime($penjadualan->tarikh_sesi)) }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h6 class="mb-0 text-dark">Masa Penilaian</h6>
                            </div>
                            <div class="col-lg-9">
                                <p class="mb-0">: {{ $penilaian->KOD_MASA_MULA }} -
                                    {{ $penilaian->KOD_MASA_TAMAT }}</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kekosongan</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Platform</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Lokasi</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pendaftaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadual as $key => $jadual)
                                        @if ($jadual->KOD_KATEGORI_PESERTA == '01')
                                            <tr>

                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jadual->KOD_TAHAP }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jadual->KOD_MASA_MULA }} - {{ $jadual->KOD_MASA_TAMAT }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jadual->KEKOSONGAN == null)
                                                        0
                                                    @else
                                                        {{ $jadual->KEKOSONGAN }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jadual->platform }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jadual['KOD_KEMENTERIAN'] == null)
                                                        -
                                                    @else
                                                        {{ $jadual['LOKASI'] }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal" class="text-center">
                                                    <?php
                                                    $no_ic = Auth::user()->nric;
                                                    $done_daftar = MohonPenilaian::where('no_ic', $no_ic)
                                                        ->where('id_sesi', $jadual->ID_PENILAIAN)
                                                        ->first();
                                                    ?>
                                                    @if ($done_daftar == null)
                                                        @if ($jadual->KEKOSONGAN != 0)
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#modalupdatepermohonan-{{ $jadual->ID_PENILAIAN }}"
                                                                class="btn btn-sm bg-gradient-info">
                                                                Pilih
                                                            </a>
                                                        @else
                                                            <button class="btn btn-sm bg-gradient-danger"
                                                                disabled>Penuh</button>
                                                        @endif
                                                    @else
                                                        <button class="btn btn-sm bg-gradient-success" disabled>Telah
                                                            daftar</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade"
                                                id="modalupdatepermohonan-{{ $jadual->ID_PENILAIAN }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <i class="far fa-question-circle fa-7x text-secondary"></i>
                                                            <br>
                                                            Anda pasti mahu lakukan Penjadualan Semula?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form action="/mohonpenilaian/penjadualan_semula" method="POST">
                                                                {{-- @method('PUT') --}}
                                                                @csrf
                                                                <input type="hidden" name="no_ic"
                                                                    value="{{ $no_ic }}">
                                                                <input type="hidden" name="tarikh_baru"
                                                                    value="{{ $jadual->TARIKH_SESI }}">
                                                                <input type="hidden" name="sesi_semasa"
                                                                    value="{{ $penjadualan->id_sesi }}">
                                                                <input type="hidden" name="sesi_baru"
                                                                    value="{{ $jadual->ID_PENILAIAN }}">
                                                                <button class="btn btn-sm bg-gradient-info"
                                                                    type="submit">Daftar</button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://isacsupport.intan.my/chat_widget.js"></script>
        <script src="../../assets/js/plugins/datatables.js"></script>
        <script type="text/javascript">
            const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
                searchable: true,
                fixedHeight: true
            });
        </script>
    @stop
