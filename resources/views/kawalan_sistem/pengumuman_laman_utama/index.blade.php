@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="/dashboard">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kawalan
                                Sistem</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengumuman
                                Laman
                                Utama</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Pengumuman Laman Utama</h5>
            </div>
            @if (count($pengumuman_laman_utamas) == 0)
                <div class="col-lg-6">
                    <a href="/pengumuman_laman_utama/create" class="btn bg-gradient-warning mb-0" type="submit"
                        style="float: right;">Tambah</a>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="text-white">Pengumuman</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable-pengumuman-laman-utama">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tajuk</th>
                                        {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">Tajuk Pengumuman
                                        </th> --}}
                                        {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">Subtajuk
                                            Pengumuman</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pengumuman 1
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sub Pengumuman 1
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pengumuman 2
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sub Pengumuman 2
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pengumuman 3
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sub Pengumuman 3
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pengumuman 4
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sub Pengumuman 4
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pengumuman 5
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sub Pengumuman 5
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Pengumuman 6
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Sub Pengumuman 6
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Butang Manual
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Status Butang Manual
                                        </th> --}}
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Status
                                            Pengumuman</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Preview</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengumuman_laman_utamas as $pengumuman_laman_utama)
                                        <tr>
                                            {{-- <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td> --}}
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $pengumuman_laman_utama->tajuk_header }}</td>
                                            {{-- <td class="text-sm text-center font-weight-normal">
                                                {{ $pengumuman_laman_utama->tajuk_pengumuman }}</td> --}}
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($pengumuman_laman_utama->status_pengumuman == 'Aktif')
                                                    <span class="badge badge-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" class="btn bg-gradient-info mb-0"
                                                    style="cursor: pointer;float: right;"
                                                    data-bs-target="#modalpreview-{{ $pengumuman_laman_utama->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a href="/pengumuman_laman_utama/{{ $pengumuman_laman_utama->id }}/edit"
                                                    class="btn btn-primary mb-0"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <a data-bs-toggle="modal" class="btn btn-outline-danger mb-0"
                                                    style="cursor: pointer"
                                                    data-bs-target="#modaldelete-{{ $pengumuman_laman_utama->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="modaldelete-{{ $pengumuman_laman_utama->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti untuk menghapus permohonan?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form method="POST"
                                                                action="/pengumuman_laman_utama/{{ $pengumuman_laman_utama->id }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-danger" type="submit">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade"
                                                id="modalpreview-{{ $pengumuman_laman_utama->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color:#FFA500;">
                                                            <h3 class="modal-title text-white">
                                                                {!! $pengumuman_laman_utama->tajuk_header !!}</h3>
                                                            @if ($pengumuman_laman_utama->status_pengumuman == 'Aktif')
                                                                <span class="badge badge-success">Aktif</span>
                                                            @else
                                                                <span class="badge badge-danger">Tidak Aktif</span>
                                                            @endif
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($pengumuman_laman_utama->tajuk_pengumuman != null)
                                                                <p>{!! $pengumuman_laman_utama->tajuk_pengumuman !!}</p>
                                                                @if ($pengumuman_laman_utama->subtajuk_pengumuman != null)
                                                                    <p>{!! $pengumuman_laman_utama->subtajuk_pengumuman !!}</p>
                                                                @endif
                                                            @endif

                                                            @if ($pengumuman_laman_utama->pengumuman_1 != null)
                                                                <p>{!! $pengumuman_laman_utama->pengumuman_1 !!}</p>
                                                                @if ($pengumuman_laman_utama->subpengumuman_1 != null)
                                                                    <p>{!! $pengumuman_laman_utama->subpengumuman_1 !!}</p>
                                                                @endif
                                                            @endif

                                                            @if ($pengumuman_laman_utama->pengumuman_2 != null)
                                                                <p>{!! $pengumuman_laman_utama->pengumuman_2 !!}</p>
                                                                @if ($pengumuman_laman_utama->subpengumuman_2 != null)
                                                                    <p>{!! $pengumuman_laman_utama->subpengumuman_2 !!}</p>
                                                                @endif
                                                            @endif

                                                            @if ($pengumuman_laman_utama->pengumuman_3 != null)
                                                                <p>{!! $pengumuman_laman_utama->pengumuman_3 !!}</p>
                                                                @if ($pengumuman_laman_utama->subpengumuman_3 != null)
                                                                    <p>{!! $pengumuman_laman_utama->subpengumuman_3 !!}</p>
                                                                @endif
                                                            @endif

                                                            @if ($pengumuman_laman_utama->pengumuman_4 != null)
                                                                <p>{!! $pengumuman_laman_utama->pengumuman_4 !!}</p>
                                                                @if ($pengumuman_laman_utama->subpengumuman_4 != null)
                                                                    <p>{!! $pengumuman_laman_utama->subpengumuman_4 !!}</p>
                                                                @endif
                                                            @endif

                                                            @if ($pengumuman_laman_utama->status_button_manual == 'Aktif')
                                                                @if ($pengumuman_laman_utama->pengumuman_button_manual != null)
                                                                    <p>{!! $pengumuman_laman_utama->pengumuman_button_manual !!}</p>
                                                                    <p><a class="btn btn-success"
                                                                            href="documents/MANUAL_PENDAFTARAN_ISAC_1.pdf"
                                                                            download="MANUAL PENDAFTARAN ISAC.pdf"
                                                                            target="_blank">Manual Pendaftaran ISAC</a></p>
                                                                @endif
                                                            @endif

                                                            @if ($pengumuman_laman_utama->pengumuman_5 != null)
                                                                <p>{!! $pengumuman_laman_utama->pengumuman_5 !!}</p>
                                                                @if ($pengumuman_laman_utama->subpengumuman_5 != null)
                                                                    <p>{!! $pengumuman_laman_utama->subpengumuman_5 !!}</p>
                                                                @endif
                                                            @endif

                                                            @if ($pengumuman_laman_utama->pengumuman_6 != null)
                                                                <p>{!! $pengumuman_laman_utama->pengumuman_6 !!}</p>
                                                                @if ($pengumuman_laman_utama->subpengumuman_6 != null)
                                                                    <p>{!! $pengumuman_laman_utama->subpengumuman_6 !!}</p>
                                                                @endif
                                                            @endif

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-pengumuman-laman-utama", {
            searchable: false,
            fixedHeight: true,
            sortable: false,
            labels: {
                info: false
            }
        });
    </script>

@stop
