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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Bank
                                Soalan</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Soalan
                                Pengetahuan</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kemaskini</a>
                        </li>
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
            <div class="col-12">
                <div class="card card-frame mt-3">
                    <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                        <div class="row d-flex flex-nowrap">
                            <div class="col align-items-center">
                                <b class="text-white mb-0">Kemaskini Soalan Pengetahuan</b>
                                <h6 class="text-white mb-0">Multiple Choice</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/bank-soalan-pengetahuan/multiple-choice" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $banksoalanpengetahuan->id }}">
                                        <label class="form-control-label">Tahap Soalan</label>
                                        <select class="form-control" name="id_tahap_soalan" required>
                                            @if ($banksoalanpengetahuan->id_tahap_soalan == '1')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_tahap_soalan }}">
                                                    Asas</option>
                                            @else
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_tahap_soalan }}">
                                                    Lanjutan</option>
                                            @endif
                                            <option value="1">Asas</option>
                                            <option value="2">Lanjutan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Kategori Pengetahuan</label>
                                        <select class="form-control" name="id_kategori_pengetahuan" required>
                                            @if ($banksoalanpengetahuan->id_kategori_pengetahuan == '1')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    EG</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '2')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Electronic Mail</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '3')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    General</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '4')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Government Mobility</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '5')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Hardware</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '6')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    ICT Security</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '7')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Inisiatif ICT Sektor Awam</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '8')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Internet</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '9')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Media Sosial</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '10')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    MSC</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '11')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Office Productivity</option>
                                            @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '12')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Rangkaian dan Wifi</option>
                                            @else
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                                    Software</option>
                                            @endif
                                            <option value="1">EG</option>
                                            <option value="2">Electronic Mail</option>
                                            <option value="3">General</option>
                                            <option value="4">Government Mobility</option>
                                            <option value="5">Hardware</option>
                                            <option value="6">ICT Security</option>
                                            <option value="7">Inisiatif ICT Sektor Awam</option>
                                            <option value="8">Internet</option>
                                            <option value="9">Media Sosial</option>
                                            <option value="10">MSC</option>
                                            <option value="11">Office Productivity</option>
                                            <option value="12">Rangkaian dan Wifi</option>
                                            <option value="13">Software</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Jenis Soalan</label>
                                        <select class="form-control" name="jenis_soalan">
                                            @if ($banksoalanpengetahuan->jenis_soalan == 'fill_in_the_blank')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                                    Fill in the Blank</option>
                                            @elseif ($banksoalanpengetahuan->jenis_soalan == 'multiple_choice')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                                    Multiple Choice</option>
                                            @elseif ($banksoalanpengetahuan->jenis_soalan == 'ranking')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                                    Ranking</option>
                                            @elseif ($banksoalanpengetahuan->jenis_soalan == 'single_choice')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                                    Single Choice</option>
                                            @elseif ($banksoalanpengetahuan->jenis_soalan == 'true_or_false')
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                                    True or False</option>
                                            @else
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                                    Subjective</option>
                                            @endif
                                            <option value="fill_in_the_blank">Fill in the Blank</option>
                                            <option value="multiple_choice">Multiple Choice</option>
                                            <option value="ranking">Ranking</option>
                                            <option value="single_choice">Single Choice</option>
                                            <option value="true_or_false">True or False</option>
                                            <option value="subjective">Subjective</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Knowledge Area</label>
                                        <input class="form-control" type="text" name="knowledge_area"
                                            value="{{ $banksoalanpengetahuan->knowledge_area }}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Topik Soalan</label>
                                        <input class="form-control" type="text" name="topik_soalan"
                                            value="{{ $banksoalanpengetahuan->topik_soalan }}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Penyataan Soalan</label>
                                        <input class="form-control" type="text" name="penyataan_soalan"
                                            value="{{ $banksoalanpengetahuan->penyataan_soalan }}">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Status Soalan</label>
                                        <select class="form-control" name="id_status_soalan">
                                            @if ($banksoalanpengetahuan->id_status_soalan == 1)
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_status_soalan }}">Aktif</option>
                                            @else
                                                <option hidden selected
                                                    value="{{ $banksoalanpengetahuan->id_status_soalan }}">Tidak Aktif
                                                </option>
                                            @endif
                                            <option value="1">Aktif</option>
                                            <option value="2">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Muat Naik Fail</label>
                                        <input class="form-control" type="file" name="muat_naik_fail">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Soalan</label>
                                        <textarea id="editor-soalan" class="form-control" name="soalan"
                                            rows="3">{{ $banksoalanpengetahuan->soalan }}</textarea>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pilihan Jawapan 1</label>
                                        <div class="form-check mb-3">
                                            @isset($banksoalanpengetahuan->jawapan)
                                                @if ($banksoalanpengetahuan->jawapan == $banksoalanpengetahuan->pilihan_jawapan)
                                                    <input class="form-check-input" type="checkbox" name="jawapan" checked>
                                                @endif
                                            @endisset
                                            @empty($record)
                                                <input class="form-check-input" type="checkbox" name="jawapan">
                                            @endempty
                                            <input class="form-control d-flex" type="text" name="pilihan_jawapan"
                                                value="{{ $banksoalanpengetahuan->pilihan_jawapan }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pilihan Jawapan 2</label>
                                        <div class="form-check mb-3">
                                            @isset($banksoalanpengetahuan->jawapan1)
                                                @if ($banksoalanpengetahuan->jawapan1 == $banksoalanpengetahuan->pilihan_jawapan1)
                                                    <input class="form-check-input" type="checkbox" name="jawapan1" checked>
                                                @endif
                                            @endisset
                                            @empty($record)
                                                <input class="form-check-input" type="checkbox" name="jawapan1">
                                            @endempty
                                            <input class="form-control d-flex" type="text" name="pilihan_jawapan1"
                                                value="{{ $banksoalanpengetahuan->pilihan_jawapan1 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pilihan Jawapan 3</label>
                                        <div class="form-check mb-3">
                                            @isset($banksoalanpengetahuan->jawapan2)
                                                @if ($banksoalanpengetahuan->jawapan2 == $banksoalanpengetahuan->pilihan_jawapan2)
                                                    <input class="form-check-input" type="checkbox" name="jawapan2" checked>
                                                @endif
                                            @endisset
                                            @empty($record)
                                                <input class="form-check-input" type="checkbox" name="jawapan2">
                                            @endempty
                                            <input class="form-control d-flex" type="text" name="pilihan_jawapan2"
                                                value="{{ $banksoalanpengetahuan->pilihan_jawapan2 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pilihan Jawapan 4</label>
                                        <div class="form-check mb-3">
                                            @isset($banksoalanpengetahuan->jawapan3)
                                                @if ($banksoalanpengetahuan->jawapan3 == $banksoalanpengetahuan->pilihan_jawapan3)
                                                    <input class="form-check-input" type="checkbox" name="jawapan3" checked>
                                                @endif
                                            @endisset
                                            @empty($record)
                                                <input class="form-check-input" type="checkbox" name="jawapan3">
                                            @endempty
                                            <input class="form-control d-flex" type="text" name="pilihan_jawapan3"
                                                value="{{ $banksoalanpengetahuan->pilihan_jawapan3 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pilihan Jawapan 5</label>
                                        <div class="form-check mb-3">
                                            @isset($banksoalanpengetahuan->jawapan4)
                                                @if ($banksoalanpengetahuan->jawapan4 == $banksoalanpengetahuan->pilihan_jawapan4)
                                                    <input class="form-check-input" type="checkbox" name="jawapan4" checked>
                                                @endif
                                            @endisset
                                            @empty($record)
                                                <input class="form-check-input" type="checkbox" name="jawapan4">
                                            @endempty
                                            <input class="form-control d-flex" type="text" name="pilihan_jawapan4"
                                                value="{{ $banksoalanpengetahuan->pilihan_jawapan4 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: right">
                                <button class="btn bg-gradient-success" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/ckeditor5/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor-soalan'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
