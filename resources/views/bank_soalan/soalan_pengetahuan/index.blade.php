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
            <div class="col-lg-6">
                <div class="column-12">
                    <a href="/bank-soalan-pengetahuan/create" class="btn bg-gradient-warning mb-0" type="submit"
                        style="float: right;">Tambah</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-frame mt-3">
                    <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                        <div class="row d-flex flex-nowrap">
                            <div class="col align-items-center">
                                <b class="text-white">Senarai Soalan Pengetahuan</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="datatable_soalan_pengetahuan">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap Soalan
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Kategori
                                            Pengetahuan
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Jenis Soalan</th>
                                        {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                            Knowledge Area</th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Topik Soalan
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Penyataan Soalan
                                        </th> --}}
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Soalan
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Status Soalan
                                        </th>
                                        <th class="text-uppercase text-center font-weight-bolder opacity-7">Perincian</th>
                                        </th>
                                        {{-- <th class="text-uppercase text-center font-weight-bolder opacity-7">Tindakan
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banksoalanpengetahuans as $banksoalanpengetahuan)
                                        <tr>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($banksoalanpengetahuan->id_tahap_soalan == '1')
                                                    Asas
                                                @else
                                                    Lanjutan
                                                @endif
                                                {{-- {{ $banksoalanpengetahuan->id_tahap_soalan }}</td> --}}
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($banksoalanpengetahuan->id_kategori_pengetahuan == '1')
                                                    EG
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '2')
                                                    Electronic Mail
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '3')
                                                    General
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '4')
                                                    Government Mobility
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '5')
                                                    Hardware
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '6')
                                                    ICT Security
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '7')
                                                    Inisiatif ICT Sektor Awam
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '8')
                                                    Internet
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '9')
                                                    Media Sosial
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '10')
                                                    MSC
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '11')
                                                    Office Productivity
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '12')
                                                    Rangkaian dan Wifi
                                                @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '13')
                                                    Software
                                                @endif
                                                {{-- {{ $banksoalanpengetahuan->id_kategori_pengetahuan }}</td> --}}
                                            <td class="text-sm text-center font-weight-normal">
                                                @if ($banksoalanpengetahuan->jenis_soalan == 'fill_in_the_blank')
                                                    Fill in the Blank
                                                @elseif ($banksoalanpengetahuan->jenis_soalan == 'multiple_choice')
                                                    Multiple Choice
                                                @elseif ($banksoalanpengetahuan->jenis_soalan == 'ranking')
                                                    Ranking
                                                @elseif ($banksoalanpengetahuan->jenis_soalan == 'single_choice')
                                                    Single Choice
                                                @elseif ($banksoalanpengetahuan->jenis_soalan == 'true_or_false')
                                                    True or False
                                                @else
                                                    Subjective
                                                @endif
                                                {{-- {{ $banksoalanpengetahuan->jenis_soalan }} --}}
                                            </td>
                                            {{-- <td class="text-sm text-center font-weight-normal">
                                                {{ $banksoalanpengetahuan->knowledge_area }}</td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $banksoalanpengetahuan->topik_soalan }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $banksoalanpengetahuan->penyataan_soalan }}
                                            </td> --}}
                                            <td class="text-sm text-center font-weight-normal">
                                                {{ $banksoalanpengetahuan->soalan }}
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                {{-- {{ $banksoalanpengetahuan->id_status_soalan }} --}}
                                                @if ($banksoalanpengetahuan->id_status_soalan == '1')
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        <span class="badge badge-success">Aktif</span>
                                                    </span>
                                                @elseif ($banksoalanpengetahuan->id_status_soalan == '2')
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        <span class="badge badge-danger">Tidak Aktif</span>
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-sm text-center font-weight-normal">
                                                <button type="button" class="btn btn-sm bg-gradient-primary mt-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#details_{{ $loop->index + 1 }}">
                                                    Perincian
                                                </button>
                                            </td>
                                            <div class="modal fade" id="details_{{ $loop->index + 1 }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content p-4">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Perincian
                                                                Soalan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <p class=" mb-0"><strong>Penyataan
                                                                            Soalan</strong></p>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <p class=" mb-0">
                                                                        {{ $banksoalanpengetahuan->penyataan_soalan }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <p class=" mb-0"><strong>Soalan</strong></p>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <p class=" mb-0">{!! $banksoalanpengetahuan->soalan !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <p class=" mb-0"><strong>Pilihan
                                                                            Jawapan</strong></p>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <ul>
                                                                        <li>
                                                                            <p class=" mb-0">
                                                                                @if ($banksoalanpengetahuan->pilihan_jawapan != null)
                                                                                    {{ $banksoalanpengetahuan->pilihan_jawapan }}
                                                                                @else
                                                                                    Tiada
                                                                                @endif
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class=" mb-0">
                                                                                @if ($banksoalanpengetahuan->pilihan_jawapan1 != null)
                                                                                    {{ $banksoalanpengetahuan->pilihan_jawapan1 }}
                                                                                @else
                                                                                    Tiada
                                                                                @endif
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class=" mb-0">
                                                                                @if ($banksoalanpengetahuan->pilihan_jawapan2 != null)
                                                                                    {{ $banksoalanpengetahuan->pilihan_jawapan2 }}
                                                                                @else
                                                                                    Tiada
                                                                                @endif
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <p class=" mb-0">
                                                                                @if ($banksoalanpengetahuan->pilihan_jawapan3 != null)
                                                                                    {{ $banksoalanpengetahuan->pilihan_jawapan3 }}
                                                                                @else
                                                                                    Tiada
                                                                                @endif
                                                                            </p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <p class=" mb-0"><strong>Jawapan</strong></p>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <ul>
                                                                        <li>
                                                                            <p class=" mb-0">
                                                                                @if ($banksoalanpengetahuan->jawapan != null)
                                                                                    {{ $banksoalanpengetahuan->jawapan }}
                                                                                @else
                                                                                    Tiada
                                                                                @endif
                                                                            </p>
                                                                        </li>
                                                                        @if ($banksoalanpengetahuan->jawapan1 != null)
                                                                            <li>
                                                                                <p class=" mb-0">
                                                                                    {{ $banksoalanpengetahuan->jawapan1 }}
                                                                                </p>
                                                                            </li>
                                                                        @endif
                                                                        @if ($banksoalanpengetahuan->jawapan2 != null)
                                                                            <li>
                                                                                <p class=" mb-0">
                                                                                    @if ($banksoalanpengetahuan->jawapan2 != null)
                                                                                        {{ $banksoalanpengetahuan->jawapan2 }}

                                                                                    @endif
                                                                                </p>
                                                                            </li>
                                                                        @endif
                                                                        @if ($banksoalanpengetahuan->jawapan3 != null)
                                                                            <li>
                                                                                <p class=" mb-0">
                                                                                    @if ($banksoalanpengetahuan->jawapan3 != null)
                                                                                        {{ $banksoalanpengetahuan->jawapan3 }}

                                                                                    @endif
                                                                                </p>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                @if ($banksoalanpengetahuan->muat_naik_fail != null)
                                                                    <div class="col-12">
                                                                        <p class="mb-0"><strong>Fail</strong></p>
                                                                        <img src="/storage/{{ $banksoalanpengetahuan->muat_naik_fail }}"
                                                                            alt="soalan" class="w-100">
                                                                    </div>
                                                                @else
                                                                    <div class="col-lg-3">
                                                                        <p class=" mb-0"><strong>Fail</strong>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <p class=" mb-0">Tiada
                                                                        </p>
                                                                    </div>
                                                                @endif

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer p-0">
                                                            <a href="/bank-soalan-pengetahuan/{{ $banksoalanpengetahuan->id }}/edit"
                                                                class="btn bg-gradient-info">
                                                                Kemaskini
                                                            </a>
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#modaldeletesoalanpengetahuan-{{ $banksoalanpengetahuan->id }}"
                                                                class="btn bg-gradient-danger">
                                                                Hapus
                                                            </a>
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <td class="text-sm font-weight-normal">
                                                <a href="/bank-soalan-pengetahuan/{{ $banksoalanpengetahuan->id }}/edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#modaldeletesoalanpengetahuan-{{ $banksoalanpengetahuan->id }}">
                                                    <i class="far fa-trash-alt" style="cursor: pointer"></i>
                                                </a>
                                            </td> --}}

                                            <div class="modal fade"
                                                id="modaldeletesoalanpengetahuan-{{ $banksoalanpengetahuan->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <i class="far fa-times-circle fa-7x"
                                                                style="color: #ea0606"></i>
                                                            <br>
                                                            Anda pasti mahu hapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <form method="POST"
                                                                action="/bank-soalan-pengetahuan/{{ $banksoalanpengetahuan->id }}">
                                                                @method('DELETE')
                                                                @csrf

                                                                <button class="btn bg-gradient-danger" type="submit"
                                                                    style="cursor: pointer"> Hapus</button>
                                                            </form>
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
        const dataTableSoalanPengetahuan = new simpleDatatables.DataTable("#datatable_soalan_pengetahuan", {
            searchable: true,
            fixedHeight: true,
            sortable: false
        });
    </script>
@stop
