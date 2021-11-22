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
                <form method="POST" action="/bank-soalan-kemahiran/{{ $banksoalankemahirans->id }}/internet/save"
                    enctype="multipart/form-data">
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
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="form-control-label">Bahagian Soalan</label>
                                <input class="form-control" type="text" value="Bahagian A" disabled="">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="form-control-label">Bentuk Soalan</label>
                                <input class="form-control" type="text" value="Internet" disabled="">
                            </div>
                        </div>
                        <div class="col-xl-4">
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
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
