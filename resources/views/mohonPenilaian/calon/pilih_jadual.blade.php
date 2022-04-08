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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
            </ol>
            <h5 class="font-weight-bolder">Pengurusan Penilaian</h5>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Borang permohonan penilaian</h5>
                    </div>
                    <div class="card-body">
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
                                                    {{ $jadual->KOD_MASA_MULA }} - {{ $jadual->KOD_MASA_TAMAT }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jadual->KEKOSONGAN == null)
                                                        0
                                                    @else
                                                        {{ $jadual->KEKOSONGAN }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">{{ $jadual->platform }}
                                                </td>
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
                                                            <form action="/mohonpenilaian/calon/pilih_jadual" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="no_ic"
                                                                    value="{{ $no_ic }}">
                                                                <input type="hidden" name="nama"
                                                                    value="{{ $nama }}">
                                                                <input type="hidden" name="id_peserta"
                                                                    value="{{ $id_peserta }}">
                                                                <input type="hidden" name="tarikh_lahir"
                                                                    value="{{ $tarikh_lahir }}">
                                                                <input type="hidden" name="jantina"
                                                                    value="{{ $jantina }}">
                                                                <input type="hidden" name="jawatan_ketua_jabatan"
                                                                    value="{{ $jawatan_ketua_jabatan }}">
                                                                <input type="hidden" name="taraf_jawatan"
                                                                    value="{{ $taraf_jawatan }}">
                                                                <input type="hidden" name="tarikh_lantikan"
                                                                    value="{{ $tarikh_lantikan }}">
                                                                <input type="hidden" name="klasifikasi_perkhidmatan"
                                                                    value="{{ $klasifikasi_perkhidmatan }}">
                                                                <input type="hidden" name="no_telefon_pejabat"
                                                                    value="{{ $no_telefon_pejabat }}">
                                                                <input type="hidden" name="alamat1_pejabat"
                                                                    value="{{ $alamat1_pejabat }}">
                                                                <input type="hidden" name="alamat2_pejabat"
                                                                    value="{{ $alamat2_pejabat }}">
                                                                <input type="hidden" name="poskod_pejabat"
                                                                    value="{{ $poskod_pejabat }}">
                                                                <input type="hidden" name="nama_penyelia"
                                                                    value="{{ $nama_penyelia }}">
                                                                <input type="hidden" name="emel_penyelia"
                                                                    value="{{ $emel_penyelia }}">
                                                                <input type="hidden" name="no_telefon_penyelia"
                                                                    value="{{ $no_telefon_penyelia }}">
                                                                <input type="hidden" name="sesi"
                                                                    value="{{ $jadual->ID_PENILAIAN }}">
                                                                <button class="btn btn-sm bg-gradient-info"
                                                                    type="submit">Daftar</button>

                                                            </form>
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
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="form-group">
                                <label>Sila pilih jadual</label>
                                <select class="form-control" name="sesi">
                                    <option hidden selected value="">Sila Pilih</option>
                                    @foreach ($jadual as $jadual)
                                        @if ($jadual->KOD_KATEGORI_PESERTA == '01')
                                            @if ($jadual->KEKOSONGAN != 0) 
                                                <option value="{{ $jadual->ID_PENILAIAN }}">
                                                    {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div> --}}

                        {{-- <div class="row">
                                <div class="col text-end">
                                    <button class="btn bg-gradient-info" type="submit">Seterusnya</button>
                                </div>
                            </div> --}}
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
