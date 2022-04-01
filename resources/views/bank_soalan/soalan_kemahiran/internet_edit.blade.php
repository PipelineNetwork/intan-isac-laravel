@extends('base')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="/dashboard">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Bank Soalan</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark opacity-5">Soalan Kemahiran</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Soalan Kemahiran Internet</li>
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
                    action="/{{ $soalankemahiraninternets->id_soalankemahiran }}/internet/{{ $soalankemahiraninternets->id }}/save"
                    enctype="multipart/form-data">
                    {{-- @method('PUT') --}}
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_soalankemahiran"
                            value="{{ $soalankemahiraninternets->id_soalankemahiran }}">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Tahap Soalan</label>
                                <select class="form-control" name="tahap_soalan" required>
                                    <option hidden selected value="{{ $soalankemahiraninternets->tahap_soalan }}">
                                        {{ $soalankemahiraninternets->tahap_soalan }}</option>
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
                                    name="arahan_umum">{{ $soalankemahiraninternets->arahan_umum }}</textarea>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Arahan Soalan</label>
                                <textarea class="form-control" rows="3"
                                    name="arahan_soalan">{{ $soalankemahiraninternets->arahan_soalan }}</textarea>
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
                                    value="{{ $soalankemahiraninternets->url_wikipedia }}">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Status Soalan</label>
                                <select class="form-control" name="status_soalan" required>
                                    @if ($soalankemahiraninternets->status_soalan == 1)
                                        <option hidden selected value="{{ $soalankemahiraninternets->status_soalan }}">
                                            Aktif</option>
                                    @else
                                        <option hidden selected value="{{ $soalankemahiraninternets->status_soalan }}">
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
                                        {{-- @if ($soalankemahiraninternets->soalan_1 != null) --}}
                                            <tr>
                                                <td>1</td>
                                                <td><textarea id="editor-soalan-1" class="form-control" name="soalan_1"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_1 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_1" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_1 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_1"
                                                        value="{{ $soalankemahiraninternets->markah_1 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_2 != null) --}}
                                            <tr>
                                                <td>2</td>
                                                <td><textarea id="editor-soalan-2" class="form-control" name="soalan_2"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_2 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_2" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_2 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_2"
                                                        value="{{ $soalankemahiraninternets->markah_2 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_3 != null) --}}
                                            <tr>
                                                <td>3</td>
                                                <td><textarea id="editor-soalan-3" class="form-control" name="soalan_3"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_3 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_3" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_3 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_3"
                                                        value="{{ $soalankemahiraninternets->markah_3 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_4 != null) --}}
                                            <tr>
                                                <td>4</td>
                                                <td><textarea id="editor-soalan-4" class="form-control" name="soalan_4"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_4 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_4" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_4 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_4"
                                                        value="{{ $soalankemahiraninternets->markah_4 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_5 != null) --}}
                                            <tr>
                                                <td>5</td>
                                                <td><textarea id="editor-soalan-5" class="form-control" name="soalan_5"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_5 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_5" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_5 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_5"
                                                        value="{{ $soalankemahiraninternets->markah_5 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_6 != null) --}}
                                            <tr>
                                                <td>6</td>
                                                <td><textarea id="editor-soalan-6" class="form-control" name="soalan_6"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_6 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_6" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_6 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_6"
                                                        value="{{ $soalankemahiraninternets->markah_6 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_7 != null) --}}
                                            <tr>
                                                <td>7</td>
                                                <td><textarea id="editor-soalan-7" class="form-control" name="soalan_7"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_7 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_7" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_7 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_7"
                                                        value="{{ $soalankemahiraninternets->markah_7 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_8 != null) --}}
                                            <tr>
                                                <td>8</td>
                                                <td><textarea id="editor-soalan-8" class="form-control" name="soalan_8"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_8 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_8" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_8 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_8"
                                                        value="{{ $soalankemahiraninternets->markah_8 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_9 != null) --}}
                                            <tr>
                                                <td>9</td>
                                                <td><textarea id="editor-soalan-9" class="form-control" name="soalan_9"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_9 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_9" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_9 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_9"
                                                        value="{{ $soalankemahiraninternets->markah_9 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_10 != null) --}}
                                            <tr>
                                                <td>10</td>
                                                <td><textarea id="editor-soalan-10" class="form-control" name="soalan_10"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_10 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_10" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_10 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_10"
                                                        value="{{ $soalankemahiraninternets->markah_10 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_11 != null) --}}
                                        <tr>
                                            <td>11</td>
                                            <td><textarea id="editor-soalan-11" class="form-control" name="soalan_11"
                                                    rows="3">{{ $soalankemahiraninternets->soalan_11 }}</textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_11" rows="3"
                                                    style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_11 }}</textarea>
                                            </td>
                                            <td><input class="form-control" type="text" name="markah_11"
                                                    value="{{ $soalankemahiraninternets->markah_11 }}"></td>
                                        </tr>
                                    {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_12 != null) --}}
                                            <tr>
                                                <td>12</td>
                                                <td><textarea id="editor-soalan-12" class="form-control" name="soalan_12"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_12 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_12" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_12 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_12"
                                                        value="{{ $soalankemahiraninternets->markah_12 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_13 != null) --}}
                                            <tr>
                                                <td>13</td>
                                                <td><textarea id="editor-soalan-13" class="form-control" name="soalan_13"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_13 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_13" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_13 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_13"
                                                        value="{{ $soalankemahiraninternets->markah_13 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_14 != null) --}}
                                            <tr>
                                                <td>14</td>
                                                <td><textarea id="editor-soalan-14" class="form-control" name="soalan_14"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_14 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_14" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_14 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_14"
                                                        value="{{ $soalankemahiraninternets->markah_14 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                        {{-- @if ($soalankemahiraninternets->soalan_15 != null) --}}
                                            <tr>
                                                <td>15</td>
                                                <td><textarea id="editor-soalan-15" class="form-control" name="soalan_15"
                                                        rows="3">{{ $soalankemahiraninternets->soalan_15 }}</textarea>
                                                </td>
                                                <td><textarea class="form-control" name="jawapan_15" rows="3"
                                                        style="width: 100%; height: 100%;">{{ $soalankemahiraninternets->jawapan_15 }}</textarea>
                                                </td>
                                                <td><input class="form-control" type="text" name="markah_15"
                                                        value="{{ $soalankemahiraninternets->markah_15 }}"></td>
                                            </tr>
                                        {{-- @endif --}}
                                    </tbody>
                                </table>
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
    {{-- <script>
        $(document).ready(function() {
            var t = $('#datatable_soalan_jawapan_internet').DataTable({
                dom: 'Bfrtip',
                pageLength: 15,
                "ordering": false,
                "searching": false,
                "info": false,
                "paging": false,
                // scrollResize: true,
                // scrollX: true,
                // scrollCollapse: true,
                // lengthChange: false
            });
            var counter = 1
            ;
            $('#addRow').on('click', function() {
                t.row.add([
                    counter,
                    '<textarea id="editor-soalan-' + counter +
                    '" class="form-control" name="soalan_' + counter +
                    '" rows="3"></textarea>',
                    '<textarea class="form-control" name="jawapan_' + counter +
                    '" rows="3"></textarea> ',
                    '<input class="form-control" type="text" name="markah_' + counter + '">'
                ]).draw(false);

                document.getElementById('editor-soalan-' + counter).style.display = 'none';

                ClassicEditor
                    .create(document.querySelector('#editor-soalan-' + counter))
                    .then(editor => {
                        // window.editor = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });

                if (counter > 15) {
                    $('#addRow').on('click', function() {
                        $(this).prop("disabled", true);
                    })
                    alert('Anda telah mencapai tahap yang telah ditetapkan');
                }

                counter++;
            });

            // Automatically add a first row of data
            $('#addRow').click( function() {
                
            });
        });
    </script> --}}

@stop
