@extends('base')
@section('content')

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Bank
                                Soalan</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Soalan
                                Pengetahuan</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Tambah</a>
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
            <div class="col">
                <div class="card card-frame mt-3">
                    <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                        <div class="row d-flex flex-nowrap">
                            <div class="col align-items-center">
                                <b class="text-white mb-0">Tambah Soalan Pengetahuan</b>
                                <h6 class="text-white mb-0">Multiple Choice</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/bank-soalan-pengetahuan/multiple-choice" enctype="multipart/form-data">
                            @csrf
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $banksoalanpengetahuan->id }}">
                                    <label class="form-control-label">Knowledge Area</label>
                                    <input class="form-control" type="text" name="knowledge_area">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Topik Soalan</label>
                                    <input class="form-control" type="text" name="topik_soalan">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Penyataan Soalan</label>
                                    <input class="form-control" type="text" name="penyataan_soalan">
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Status Soalan</label>
                                    <select class="form-control" name="id_status_soalan">
                                        <option hidden selected>Sila Pilih</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Soalan</label>
                                    <textarea id="editor-soalan" class="form-control" name="soalan" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Muat Naik Fail</label>
                                    <input class="form-control" type="file" name="muat_naik_fail">
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label">Pilihan Jawapan</label>
                                    <div class="container1">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="1" type="checkbox" name="jawapan">
                                            <input class="form-control d-flex" type="text" name="pilihan_jawapan">
                                        </div>
                                        <div style="text-align: center">
                                            <button class="btn bg-gradient-info add_form_field">Tambah Baru&nbsp;
                                                <span style="font-size:16px; font-weight:bold;">+ </span>
                                            </button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var max_fields = 4;
            var wrapper = $(".container1");
            var add_button = $(".add_form_field");

            var x = 0;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                        '<div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="jawapan' +
                        x + '"><input class="form-control d-flex" type="text" name="pilihan_jawapan' +
                        x + '"><a href="#" class="delete btn bg-gradient-danger mt-2">Hapus</a></div>'
                    ); //add input box
                } else {
                    alert('Anda telah mencapai tahap yang telah ditetapkan')
                }
            });

            $(wrapper).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
    <script src="/assets/ckeditor5/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor-soalan'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
