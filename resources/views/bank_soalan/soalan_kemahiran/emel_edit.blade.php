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
            <li class="breadcrumb-item text-sm text-dark opacity-5">Soalan Kemahiran</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Soalan Kemahiran E-mel</li>
        </ol>
        <h6 class="font-weight-bolder">Kemaskini</h6>
    </nav>

    <div class="container-fluid py-4">
        <div class="card card-frame mt-4">

            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row d-flex flex-nowrap">
                    <div class="col align-items-center">
                        <h5 class="text-white">Kemaskini Soalan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST"
                    action="/{{ $soalankemahiranemails->id_soalankemahiran }}/emel/{{ $soalankemahiranemails->id }}/save"
                    enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_soalankemahiran"
                            value="{{ $soalankemahiranemails->id_soalankemahiran }}">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Tahap Soalan</label>
                                <select class="form-control" name="tahap_soalan" required>
                                    <option hidden selected value="{{ $soalankemahiranemails->tahap_soalan }}">
                                        {{ $soalankemahiranemails->tahap_soalan }}</option>
                                    <option value="Asas">Asas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Set Soalan</label>
                                <input class="form-control" type="text"
                                    value="{{ $banksoalankemahirans->no_set_soalan }}" disabled="">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Arahan Umum</label>
                                <textarea id="editor-arahan-umum" class="form-control"
                                    name="arahan_umum">{{ $soalankemahiranemails->arahan_umum }}</textarea>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Arahan Soalan</label>
                                <textarea class="form-control" rows="3"
                                    name="arahan_soalan">{{ $soalankemahiranemails->arahan_soalan }}</textarea>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Bahagian Soalan</label>
                                <input class="form-control" type="text" value="Bahagian A" disabled="">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Bentuk Soalan</label>
                                <input class="form-control" type="text" value="Internet" disabled="">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">URL Wikipedia</label>
                                <input class="form-control" type="text" name="url_wikipedia"
                                    value="{{ $soalankemahiranemails->url_wikipedia }}">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Status Soalan</label>
                                <select class="form-control" name="status_soalan" required>
                                    @if ($soalankemahiranemails->status_soalan == 1)
                                        <option hidden selected value="{{ $soalankemahiranemails->status_soalan }}">
                                            Aktif</option>
                                    @else
                                        <option hidden selected value="{{ $soalankemahiranemails->status_soalan }}">
                                            Tidak Aktif</option>
                                    @endif
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <hr class="my-3" style="width:100%; margin:0; height: 5px; color: #F7B42C">
                        <div class="col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable_soalan_jawapan_internet">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">No
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Soalan</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Jawapan</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">
                                                Markah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if ($soalankemahiranemails->soalan_1 != null) --}}
                                        <tr>
                                            <td>1</td>
                                            <td><textarea id="editor-soalan-1" class="form-control" name="soalan_1"
                                                    rows="3">{{ $soalankemahiranemails->soalan_1 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_1" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_1 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_1"
                                                    value="{{ $soalankemahiranemails->markah_1 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_2 != null) --}}
                                        <tr>
                                            <td>2</td>
                                            <td><textarea id="editor-soalan-2" class="form-control" name="soalan_2"
                                                    rows="3">{{ $soalankemahiranemails->soalan_2 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_2" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_2 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_2"
                                                    value="{{ $soalankemahiranemails->markah_2 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_3 != null) --}}
                                        <tr>
                                            <td>3</td>
                                            <td><textarea id="editor-soalan-3" class="form-control" name="soalan_3"
                                                    rows="3">{{ $soalankemahiranemails->soalan_3 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_3" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_3 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_3"
                                                    value="{{ $soalankemahiranemails->markah_3 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_4 != null) --}}
                                        <tr>
                                            <td>4</td>
                                            <td><textarea id="editor-soalan-4" class="form-control" name="soalan_4"
                                                    rows="3">{{ $soalankemahiranemails->soalan_4 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_4" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_4 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_4"
                                                    value="{{ $soalankemahiranemails->markah_4 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_5 != null) --}}
                                        <tr>
                                            <td>5</td>
                                            <td><textarea id="editor-soalan-5" class="form-control" name="soalan_5"
                                                    rows="3">{{ $soalankemahiranemails->soalan_5 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_5" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_5 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_5"
                                                    value="{{ $soalankemahiranemails->markah_5 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_6 != null) --}}
                                        <tr>
                                            <td>6</td>
                                            <td><textarea id="editor-soalan-6" class="form-control" name="soalan_6"
                                                    rows="3">{{ $soalankemahiranemails->soalan_6 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_6" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_6 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_6"
                                                    value="{{ $soalankemahiranemails->markah_6 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_7 != null) --}}
                                        <tr>
                                            <td>7</td>
                                            <td><textarea id="editor-soalan-7" class="form-control" name="soalan_7"
                                                    rows="3">{{ $soalankemahiranemails->soalan_7 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_7" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_7 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_7"
                                                    value="{{ $soalankemahiranemails->markah_7 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_8 != null) --}}
                                        <tr>
                                            <td>8</td>
                                            <td><textarea id="editor-soalan-8" class="form-control" name="soalan_8"
                                                    rows="3">{{ $soalankemahiranemails->soalan_8 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_8" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_8 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_8"
                                                    value="{{ $soalankemahiranemails->markah_8 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_9 != null) --}}
                                        <tr>
                                            <td>9</td>
                                            <td><textarea id="editor-soalan-9" class="form-control" name="soalan_9"
                                                    rows="3">{{ $soalankemahiranemails->soalan_9 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_9" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_9 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_9"
                                                    value="{{ $soalankemahiranemails->markah_9 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_10 != null) --}}
                                        <tr>
                                            <td>10</td>
                                            <td><textarea id="editor-soalan-10" class="form-control" name="soalan_10"
                                                    rows="3">{{ $soalankemahiranemails->soalan_10 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_10" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_10 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_10"
                                                    value="{{ $soalankemahiranemails->markah_10 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_11 != null) --}}
                                        <tr>
                                            <td>11</td>
                                            <td><textarea id="editor-soalan-11" class="form-control" name="soalan_11"
                                                    rows="3">{{ $soalankemahiranemails->soalan_11 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_11" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_11 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_11"
                                                    value="{{ $soalankemahiranemails->markah_11 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_12 != null) --}}
                                        <tr>
                                            <td>12</td>
                                            <td><textarea id="editor-soalan-12" class="form-control" name="soalan_12"
                                                    rows="3">{{ $soalankemahiranemails->soalan_12 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_12" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_12 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_12"
                                                    value="{{ $soalankemahiranemails->markah_12 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_13 != null) --}}
                                        <tr>
                                            <td>13</td>
                                            <td><textarea id="editor-soalan-13" class="form-control" name="soalan_13"
                                                    rows="3">{{ $soalankemahiranemails->soalan_13 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_13" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_13 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_13"
                                                    value="{{ $soalankemahiranemails->markah_13 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_14 != null) --}}
                                        <tr>
                                            <td>14</td>
                                            <td><textarea id="editor-soalan-14" class="form-control" name="soalan_14"
                                                    rows="3">{{ $soalankemahiranemails->soalan_14 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_14" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_14 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_14"
                                                    value="{{ $soalankemahiranemails->markah_14 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiranemails->soalan_15 != null) --}}
                                        <tr>
                                            <td>15</td>
                                            <td><textarea id="editor-soalan-15" class="form-control" name="soalan_15"
                                                    rows="3">{{ $soalankemahiranemails->soalan_15 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_15" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiranemails->jawapan_15 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_15"
                                                    value="{{ $soalankemahiranemails->markah_15 }}"></td>
                                        </tr>
                                        {{-- @endif --}}
                                    </tbody>
                                </table>
                                {{-- <button class="btn btn-success mt-2" type="button" id="addRow">Tambah Baru</button> --}}
                                {{-- <button class="btn btn-info" id="deleteRow">delete row</button> --}}
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right">
                        <button class="btn bg-gradient-warning" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/ckeditor5/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor-arahan-umum'))
            .catch(error => {
                console.error(error);
            });

        // ClassicEditor
        //     .create(document.querySelector('#editor-soalan-try'), {
        //         maxHeigth: '150px'
        //     })
        //     .then(editor => {
        //         // window.editor = editor;
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });

        ClassicEditor
            .create(document.querySelector('#editor-soalan-1'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-2'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-3'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-4'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-5'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-6'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-7'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-8'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-9'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-10'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-11'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-12'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-13'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-14'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor-soalan-15'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@stop
