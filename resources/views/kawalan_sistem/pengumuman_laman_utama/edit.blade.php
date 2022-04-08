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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">
                                Pengumuman Laman Utama</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <h5 class="font-weight-bolder">Kemaskini Pengumuman Laman Utama</h5>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <div class="row">
                            <h5 class="text-white">Kemaskini</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/pengumuman_laman_utama/{{ $pengumuman_laman_utamas->id }}"
                            enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Tajuk</label>
                                        <textarea id="tajuk_header" class="form-control"
                                            name="tajuk_header">{{ $pengumuman_laman_utamas->tajuk_header }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Tajuk Pengumuman</label>
                                        <textarea id="tajuk_pengumuman" class="form-control"
                                            name="tajuk_pengumuman">{{ $pengumuman_laman_utamas->tajuk_pengumuman }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sub Tajuk Pengumuman</label>
                                        <textarea id="subtajuk_pengumuman" class="form-control"
                                            name="subtajuk_pengumuman">{{ $pengumuman_laman_utamas->subtajuk_pengumuman }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pengumuman 1</label>
                                        <textarea id="pengumuman_1" class="form-control"
                                            name="pengumuman_1">{{ $pengumuman_laman_utamas->pengumuman_1 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sub Pengumuman 1</label>
                                        <textarea id="subpengumuman_1" class="form-control"
                                            name="subpengumuman_1">{{ $pengumuman_laman_utamas->subpengumuman_1 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pengumuman 2</label>
                                        <textarea id="pengumuman_2" class="form-control"
                                            name="pengumuman_2">{{ $pengumuman_laman_utamas->pengumuman_2 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sub Pengumuman 2</label>
                                        <textarea id="subpengumuman_2" class="form-control"
                                            name="subpengumuman_2">{{ $pengumuman_laman_utamas->subpengumuman_2 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pengumuman 3</label>
                                        <textarea id="pengumuman_3" class="form-control"
                                            name="pengumuman_3">{{ $pengumuman_laman_utamas->pengumuman_3 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sub Pengumuman 3</label>
                                        <textarea id="subpengumuman_3" class="form-control"
                                            name="subpengumuman_3">{{ $pengumuman_laman_utamas->subpengumuman_3 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pengumuman 4</label>
                                        <textarea id="pengumuman_4" class="form-control"
                                            name="pengumuman_4">{{ $pengumuman_laman_utamas->pengumuman_4 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sub Pengumuman 4</label>
                                        <textarea id="subpengumuman_4" class="form-control"
                                            name="subpengumuman_4">{{ $pengumuman_laman_utamas->subpengumuman_4 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pengumuman 5</label>
                                        <textarea id="pengumuman_5" class="form-control"
                                            name="pengumuman_5">{{ $pengumuman_laman_utamas->pengumuman_5 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sub Pengumuman 5</label>
                                        <textarea id="subpengumuman_5" class="form-control"
                                            name="subpengumuman_5">{{ $pengumuman_laman_utamas->subpengumuman_5 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pengumuman 6</label>
                                        <textarea id="pengumuman_6" class="form-control"
                                            name="pengumuman_6">{{ $pengumuman_laman_utamas->pengumuman_6 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Sub Pengumuman 6</label>
                                        <textarea id="subpengumuman_6" class="form-control"
                                            name="subpengumuman_6">{{ $pengumuman_laman_utamas->subpengumuman_6 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Pengumuman Butang Manual</label>
                                        <textarea id="pengumuman_button_manual" class="form-control"
                                            name="pengumuman_button_manual">{{ $pengumuman_laman_utamas->pengumuman_button_manual }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Status Pengumuman Butang Manual</label>
                                        <select class="form-control" name="status_button_manual" required>
                                            <option selected hidden value="{{ $pengumuman_laman_utamas->status_button_manual }}">
                                                {{ $pengumuman_laman_utamas->status_button_manual }}
                                            </option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Status Pengumuman</label>
                                        <select class="form-control" name="status_pengumuman" required>
                                            <option selected hidden value="{{ $pengumuman_laman_utamas->status_pengumuman }}">
                                                {{ $pengumuman_laman_utamas->status_pengumuman }}
                                            </option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right">
                                <button class="btn bg-gradient-primary" type="submit">Simpan</button>
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
            .create(document.querySelector('#tajuk_header'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#tajuk_pengumuman'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#subtajuk_pengumuman'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#pengumuman_1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#subpengumuman_1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#pengumuman_2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#subpengumuman_2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#pengumuman_3'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#subpengumuman_3'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#pengumuman_4'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#subpengumuman_4'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#pengumuman_5'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#subpengumuman_5'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#pengumuman_6'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#subpengumuman_6'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#pengumuman_button_manual'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
