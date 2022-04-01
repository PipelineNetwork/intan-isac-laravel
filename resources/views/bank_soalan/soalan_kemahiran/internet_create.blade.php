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
        <h6 class="font-weight-bolder">Tambah</h6>
    </nav>

    <div class="container-fluid py-4">
        <div class="card card-frame mt-4">

            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row d-flex flex-nowrap">
                    <div class="col align-items-center">
                        <h5 class="text-white">Tambah Soalan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/{{ $banksoalankemahirans->id }}/internet/save" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_soalankemahiran" value="{{ $banksoalankemahirans->id }}">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Tahap Soalan</label>
                                <select class="form-control" name="tahap_soalan" required>
                                    <option hidden selected value="">Sila Pilih</option>
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
                                <textarea id="editor-arahan-umum" class="form-control" name="arahan_umum"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label class="form-control-label">Arahan Soalan</label>
                                <textarea class="form-control" rows="3"
                                    name="arahan_soalan">Soalan ini menguji langkah-langkah melayari Internet menggunakan Internet Explorer.  Enjin Carian Google <em>(Google Search Engine, GSE)</em> digunakan bagi mencari sesuatu maklumat. Ikut arahan seperti di bawah :-</textarea>
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
                                <input class="form-control" type="text" name="url_wikipedia">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-control-label">Status Soalan</label>
                                <select class="form-control" name="status_soalan" required>
                                    <option hidden selected value="">Sila Pilih</option>
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
                                    {{-- <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><textarea id="editor-soalan-try" class="form-control" name="soalan_1"
                                                    rows="3"></textarea>
                                            </td>
                                            <td><textarea class="form-control" name="jawapan_1" rows="3" style="width: 100%; height: 100%;"></textarea></td>
                                            <td><input class="form-control" type="text" name="markah_1"></td>
                                        </tr>
                                    </tbody> --}}
                                </table>
                                <button class="btn btn-success mt-2" type="button" id="addRow">Tambah Baru</button>
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

        ClassicEditor
            .create(document.querySelector('#editor-soalan-try'), {
                maxHeigth: '150px'
            })
            .then(editor => {
                // window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
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
            var counter = 1;

            $('#addRow').on('click', function() {
                t.row.add([
                    counter,
                    '<textarea id="editor-soalan-' + counter +
                    '" class="form-control" name="soalan_' + counter + '" rows="3"></textarea>',
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
            $('#addRow').click();
        });
    </script>

@stop
