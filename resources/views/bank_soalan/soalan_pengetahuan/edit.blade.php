@extends('base')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="javascript:;">
                    <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>shop </title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(0.000000, 148.000000)">
                                        <path
                                            d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                        </path>
                                        <path
                                            d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Bank Soalan</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Soalan Pengetahuan</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kemas Kini</li>
        </ol>
        {{-- <h6 class="font-weight-bolder">Tambah Soalan Pengetahuan</h6> --}}
    </nav>

    <div class="container-fluid py-4">
        <div class="card card-frame mt-4">

            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row d-flex flex-nowrap">
                    <div class="col align-items-center">
                        <h5 class="text-white">Kemas Kini Soalan Pengetahuan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/bank-soalan-pengetahuan/{{ $banksoalanpengetahuan->id }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $banksoalanpengetahuan->id }}">
                                <label class="form-control-label">Tahap Soalan</label>
                                <select class="form-control" name="id_tahap_soalan">
                                    @if ($banksoalanpengetahuan->id_tahap_soalan == '1')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->id_tahap_soalan }}">
                                            Rendah</option>
                                    @elseif ($banksoalanpengetahuan->id_tahap_soalan == '2')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->id_tahap_soalan }}">
                                            Sederhana</option>
                                    @else
                                        <option hidden selected value="{{ $banksoalanpengetahuan->id_tahap_soalan }}">
                                            Tinggi</option>
                                    @endif
                                    <option value="1">Rendah</option>
                                    <option value="2">Sederhana</option>
                                    <option value="3">Tinggi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Kategori Pengetahuan</label>
                                <select class="form-control" name="id_kategori_pengetahuan">
                                    @if ($banksoalanpengetahuan->id_kategori_pengetahuan == '1')
                                        <option hidden selected
                                            value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                            Rendah</option>
                                    @elseif ($banksoalanpengetahuan->id_kategori_pengetahuan == '2')
                                        <option hidden selected
                                            value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                            Sederhana</option>
                                    @else
                                        <option hidden selected
                                            value="{{ $banksoalanpengetahuan->id_kategori_pengetahuan }}">
                                            Tinggi</option>
                                    @endif
                                    <option value="1">Rendah</option>
                                    <option value="2">Sederhana</option>
                                    <option value="3">Tinggi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Jenis Soalan</label>
                                <select class="form-control" name="jenis_soalan">
                                    @if ($banksoalanpengetahuan->jenis_soalan == 'fill_in_the_blank')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                            Fill in the Blank</option>
                                    @elseif ($banksoalanpengetahuan->jenis_soalan == 'multiple_choice')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                            Multiple Choice</option>
                                    @elseif ($banksoalanpengetahuan->jenis_soalan == 'ranking')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                            Ranking</option>
                                    @elseif ($banksoalanpengetahuan->jenis_soalan == 'single_choice')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                            Single Choice</option>
                                    @elseif ($banksoalanpengetahuan->jenis_soalan == 'true_or_false')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->jenis_soalan }}">
                                            True or False</option>
                                    @else
                                        <option hidden selected value="{{ $banksoalanpengetahuan->jenis_soalan }}">
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
                                <textarea class="form-control" name="penyataan_soalan"
                                    rows="3">{{ $banksoalanpengetahuan->penyataan_soalan }}</textarea>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Status Soalan</label>
                                <select class="form-control" name="id_status_soalan">
                                    @if ($banksoalanpengetahuan->id_tahap_soalan == '1')
                                        <option hidden selected value="{{ $banksoalanpengetahuan->id_status_soalan }}">
                                            Aktif</option>
                                    @else
                                        <option hidden selected value="{{ $banksoalanpengetahuan->id_status_soalan }}">
                                            Tidak Aktif</option>
                                    @endif
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Pilihan</label>
                                <input class="form-control" type="text" name="pilihan_jawapan"
                                    value="{{ $banksoalanpengetahuan->pilihan_jawapan }}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Jawapan</label>
                                <input class="form-control" type="text" name="jawapan"
                                    value="{{ $banksoalanpengetahuan->jawapan }}">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Muat Naik Fail</label>
                                <input class="form-control" id="banner-btn1" type="file" name="muat_naik_fail">
                                <a href="/soalan/{{ $banksoalanpengetahuan->muat_naik_fail }}" target="_blank" id="banner-chosen1"
                                    class="mt-1">{{ $banksoalanpengetahuan->muat_naik_fail }}</a>
                            </div>
                        </div> --}}

                        @if ($banksoalanpengetahuan->jenis_soalan == 'fill_in_the_blank')
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Soalan</label>
                                    <textarea id="editor-soalan" class="form-control" name="soalan"
                                        rows="3">{{ $banksoalanpengetahuan->soalan }}</textarea>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Muat Naik Fail</label>
                                    <input class="form-control" type="file" name="muat_naik_fail" id="banner-chosen1">
                                    <span id="banner-btn1" class="mt-1">Tiada Dokumen Dipilih</span>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Jawapan</label>
                                    <div class="container1">
                                        <textarea id="editor-jawapan" class="form-control mb-2" name="jawapan"
                                            rows="3"></textarea>
                                        <div style="text-align: center">
                                            <button class="btn bg-gradient-info add_form_field">Tambah Baru&nbsp;
                                                <span style="font-size:16px; font-weight:bold;">+ </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else

                        @endif

                        <div style="text-align: right">
                            <button class="btn bg-gradient-warning" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const bannerBtn1 = document.getElementById('banner-btn1');

        const bannerChosen1 = document.getElementById('banner-chosen1');

        bannerBtn1.addEventListener('change', function() {
            bannerChosen1.textContent = this.files[0].name
        })
    </script>
@stop
