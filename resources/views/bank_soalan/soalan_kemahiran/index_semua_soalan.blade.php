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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="/bank-soalan-kemahiran">Soalan
                                Kemahiran</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Senarai
                                Soalan Kemahiran</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Soalan Kemahiran</h5>
            </div>
        </div>

        <div class="card card-frame mt-3">

            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row align-items-center">
                    <div class="col-8">
                        <b class="text-white mb-0">Senarai Soalan Kemahiran Internet</b>
                    </div>
                    @if (count($soalankemahiraninternets) == 0)
                        <div class="col-4" style="text-align: end">
                            <a href="/{{ $banksoalankemahirans->id }}/internet"
                                class="btn bg-gradient-info mb-0">Tambah</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable_soalan_kemahiran_internet">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Id Soalan Kemahiran</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Bahagian Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Bentuk Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Disediakan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soalankemahiraninternets as $soalankemahiraninternet)
                                <tr>
                                    <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $soalankemahiraninternet->id_soalankemahiran }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $soalankemahiraninternet->tahap_soalan }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        Bahagian A
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        Internet</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        @if ($soalankemahiraninternet->status_soalan == 1)
                                            Aktif
                                        @else
                                            Tidak Aktif
                                        @endif
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ date('d-m-Y', strtotime($soalankemahiraninternet->created_at)) }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        <a
                                            href="/{{ $soalankemahiraninternet->id_soalankemahiran }}/internet/{{ $soalankemahiraninternet->id }}">
                                            <i class="fas fa-pencil-alt"></i>&nbsp;Kemaskini
                                        </a>
                                    </td>
                                    <td class="text-sm text-center font-weight-normal" style="cursor: pointer">
                                        <a data-bs-toggle="modal"
                                            data-bs-target="#modaldeleteSoalanKemahiraninternet-{{ $soalankemahiraninternet->id }}">
                                            <i class="far fa-trash-alt" style="cursor: pointer"></i>&nbsp;Hapus
                                        </a>
                                    </td>
                                </tr>

                                <div class="modal fade"
                                    id="modaldeleteSoalanKemahiraninternet-{{ $soalankemahiraninternet->id }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                <br>
                                                Anda pasti mahu hapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form method="POST"
                                                    action="/{{ $soalankemahiraninternet->id_soalankemahiran }}/internet/{{ $soalankemahiraninternet->id }}/delete">
                                                    @method('POST')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card card-frame mt-4">

            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row align-items-center">
                    <div class="col-8">
                        <b class="text-white mb-0">Senarai Soalan Kemahiran Pemprosesan Perkataan</b>
                    </div>
                    @if (count($soalankemahiranwords) == 0)
                        <div class="col-4" style="text-align: end">
                            <a href="/{{ $banksoalankemahirans->id }}/pemprosesan-perkataan"
                                class="btn bg-gradient-info mb-0">Tambah</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable_soalan_kemahiran_word">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Id Soalan Kemahiran</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Bahagian Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Bentuk Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Disediakan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soalankemahiranwords as $soalankemahiranword)
                                <tr>
                                    <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $soalankemahiranword->id_soalankemahiran }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $soalankemahiranword->tahap_soalan }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        Bahagian B
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        Pemprosesan Perkataan</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        @if ($soalankemahiranword->status_soalan == 1)
                                            Aktif
                                        @else
                                            Tidak Aktif
                                        @endif
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ date('d-m-Y', strtotime($soalankemahiranword->created_at)) }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        <a
                                            href="/{{ $soalankemahiranword->id_soalankemahiran }}/pemprosesan-perkataan/{{ $soalankemahiranword->id }}">
                                            <i class="fas fa-pencil-alt"></i>&nbsp;Kemaskini
                                        </a>
                                    </td>
                                    <td class="text-sm text-center font-weight-normal" style="cursor: pointer">
                                        <a data-bs-toggle="modal"
                                            data-bs-target="#modaldeleteSoalanKemahiranword-{{ $soalankemahiranword->id }}">
                                            <i class="far fa-trash-alt" style="cursor: pointer"></i>&nbsp;Hapus
                                        </a>
                                    </td>
                                </tr>

                                <div class="modal fade"
                                    id="modaldeleteSoalanKemahiranword-{{ $soalankemahiranword->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                <br>
                                                Anda pasti mahu hapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form method="POST"
                                                    action="/{{ $soalankemahiranword->id_soalankemahiran }}/pemprosesan-perkataan/{{ $soalankemahiranword->id }}/delete">
                                                    @method('POST')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card card-frame mt-4">

            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row align-items-center">
                    <div class="col-8">
                        <b class="text-white mb-0">Senarai Soalan Kemahiran E-mel</b>
                    </div>
                    @if (count($soalankemahiranemails) == 0)
                        <div class="col-4" style="text-align: end">
                            <a href="/{{ $banksoalankemahirans->id }}/emel" class="btn bg-gradient-info mb-0">Tambah</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable_soalan_kemahiran_email">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Id Soalan Kemahiran
                                </th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Bahagian Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Bentuk Soalan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Disediakan</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Kemaskini</th>
                                <th class="text-uppercase text-center font-weight-bolder opacity-7">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soalankemahiranemails as $soalankemahiranemail)
                                <tr>
                                    <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $soalankemahiranemail->id_soalankemahiran }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ $soalankemahiranemail->tahap_soalan }}
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        Bahagian C
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        E-mel</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        @if ($soalankemahiranemail->status_soalan == 1)
                                            Aktif
                                        @else
                                            Tidak Aktif
                                        @endif
                                    </td>
                                    <td class="text-sm text-center font-weight-normal">
                                        {{ date('d-m-Y', strtotime($soalankemahiranemail->created_at)) }}</td>
                                    <td class="text-sm text-center font-weight-normal">
                                        <a
                                            href="/{{ $soalankemahiranemail->id_soalankemahiran }}/emel/{{ $soalankemahiranemail->id }}">
                                            <i class="fas fa-pencil-alt"></i>&nbsp;Kemaskini
                                        </a>
                                    </td>
                                    <td class="text-sm text-center font-weight-normal" style="cursor: pointer">
                                        <a data-bs-toggle="modal"
                                            data-bs-target="#modaldeleteSoalanKemahiranemail-{{ $soalankemahiranemail->id }}">
                                            <i class="far fa-trash-alt" style="cursor: pointer"></i>&nbsp;Hapus
                                        </a>
                                    </td>
                                </tr>

                                <div class="modal fade"
                                    id="modaldeleteSoalanKemahiranemail-{{ $soalankemahiranemail->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <i class="far fa-times-circle fa-7x" style="color: #ea0606"></i>
                                                <br>
                                                Anda pasti mahu hapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form method="POST"
                                                    action="/{{ $soalankemahiranemail->id_soalankemahiran }}/emel/{{ $soalankemahiranemail->id }}/delete">
                                                    @method('POST')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="../../assets/js/plugins/datatables.js"
        type="text/javascript"></script> --}}
    <script src="/assets/js/plugins/datatables.js" type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableSoalanKemahiran_internet = new simpleDatatables.DataTable("#datatable_soalan_kemahiran_internet", {
            searchable: true,
            fixedHeight: true,
            sortable: false,
            paging: false,
            searchable: false,
        });

        const dataTableSoalanKemahiran_word = new simpleDatatables.DataTable("#datatable_soalan_kemahiran_word", {
            searchable: true,
            fixedHeight: true,
            sortable: false,
            paging: false,
            searchable: false,
        });

        const dataTableSoalanKemahiran_email = new simpleDatatables.DataTable("#datatable_soalan_kemahiran_email", {
            searchable: true,
            fixedHeight: true,
            sortable: false,
            paging: false,
            searchable: false,
        });
    </script>
@stop
