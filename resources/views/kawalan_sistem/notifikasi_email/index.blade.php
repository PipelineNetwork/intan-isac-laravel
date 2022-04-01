@extends('base')
@section('content')
    @php
    use App\Models\NotifikasiEmail;
    @endphp
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Notifikasi
                                Email</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Notifikasi Email</h5>
            </div>
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/notifikasi_email/{{ $noti->id }}/edit" class="btn bg-gradient-warning mb-0" type="submit"
                        style="float: right;">Kemaskini</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Notifikasi</b>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Tawaran Penilaian (Individu)
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <strong>{{ $noti->tawaran_penilaian_individu }}</strong>&emsp;Hari (kepada Peserta,
                                Penyelia
                                dan Penyelia ISAC)
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Tawaran Penilaian (Kumpulan)
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <strong>{{ $noti->tawaran_penilaian_kumpulan }}</strong>&emsp;Hari (kepada Penyelaras dan
                                Penyelia ISAC)
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Peringatan (Reminder)
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <strong>{{ $noti->peringatan_penilaian }}</strong>&emsp;Hari sebelum tarikh penilaian
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Peringatan Peserta Tidak Hadir Penilaian
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <strong>{{ $noti->peringatan_tidak_hadir }}</strong>&emsp;Hari selepas tarikh penilaian
                                (Individu: Peserta dan Penyelia, Kumpulan: Penyelaras)
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Jadual Penilaian ke IAC
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <strong>{{ $noti->jadual_penilaian }}</strong>&emsp;Hari sebelum tarikh penilaian
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <label class="form-control-label mr-4">
                                    Peringatan Tukar Katalaluan
                                </label><label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                <strong>
                                    @if ($noti->peringatan_tukar_katalaluan != null)
                                        {{ $noti->peringatan_tukar_katalaluan }}
                                    @else
                                        0
                                    @endif
                                </strong>&emsp;bulan selepas tarikh pendaftaran akaun
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Maklumat yang diterima oleh Penyelia</b>
                    </div>
                    <div class="card-body">
                        <form action="/notifikasi_email/penyelia" method="post">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-2">
                                    <label class="form-control-label mr-4">
                                        Surat Tawaran
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-check form-switch">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="penyelia_terima_surat_tawaran" 
                                                @php
                                                    $try = NotifikasiEmail::where('id', '1')->first();
                                                    echo $try->penyelia_terima_surat_tawaran == true ? ' checked' : '';
                                                @endphp>
                                            <label class="form-check-label">Dibenarkan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2">
                                    <label class="form-control-label mr-4">
                                        Sijil Kelulusan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-check form-switch">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="penyelia_terima_sijil_kelulusan"
                                                @php
                                                    $try = NotifikasiEmail::where('id', '1')->first();
                                                    echo $try->penyelia_terima_sijil_kelulusan == true ? ' checked' : '';
                                                @endphp
                                                >
                                            <label class="form-check-label">Dibenarkan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2">
                                    <label class="form-control-label mr-4">
                                        Slip Keputusan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-check form-switch">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                name="penyelia_terima_slip_keputusan"
                                                @php
                                                    $try = NotifikasiEmail::where('id', '1')->first();
                                                    echo $try->penyelia_terima_slip_keputusan == true ? ' checked' : '';
                                                @endphp
                                                >
                                            <label class="form-check-label">Dibenarkan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
