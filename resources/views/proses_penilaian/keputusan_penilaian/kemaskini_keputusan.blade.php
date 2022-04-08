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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Keputusan
                                Penilaian</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Kemaskini
                                Markah Calon</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row ">
                    <div class="col-6">
                        <h5 class="font-weight-bolder">Kemaskini Markah Calon</h5>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/semak_jawapan/{{ $ic }}/{{ $id }}"
                            class="btn bg-gradient-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Kemaskini Keputusan Kemahiran</b>
                    </div>
                    <div class="card-body">
                        <form action="/{{ $ic }}/{{ $id }}/save" method="POST">
                            @method('POST')
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Soalan Pengetahuan</label>
                                        <select class="form-control" name="keputusan_pengetahuan">
                                            <option hidden selected value="{{ $keputusan->keputusan_pengetahuan }}">
                                                {{ $keputusan->keputusan_pengetahuan }}</option>
                                            <option value="Melepasi">Melepasi</option>
                                            <option value="Tidak Melepasi">Tidak Melepasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah Soalan Pengetahuan</label>
                                        <input class="form-control" type="number" name="markah_pengetahuan"
                                            value="{{ $keputusan->markah_pengetahuan }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Soalan Kemahiran Internet</label>
                                        <select class="form-control" name="keputusan_internet">
                                            <option hidden selected value="{{ $keputusan->keputusan_internet }}">
                                                {{ $keputusan->keputusan_internet }}</option>
                                            <option value="Melepasi">Melepasi</option>
                                            <option value="Tidak Melepasi">Tidak Melepasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah Soalan Kemahiran Internet</label>
                                        <input class="form-control" type="number" name="markah_internet"
                                            value="{{ $keputusan->markah_internet }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Soalan Kemahiran Pemprosesan
                                            Perkataan</label>
                                        <select class="form-control" name="keputusan_word">
                                            <option hidden selected value="{{ $keputusan->keputusan_word }}">
                                                {{ $keputusan->keputusan_word }}</option>
                                            <option value="Melepasi">Melepasi</option>
                                            <option value="Tidak Melepasi">Tidak Melepasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah Soalan Kemahiran Pemprosesan
                                            Perkataan</label>
                                        <input class="form-control" type="number" name="markah_word"
                                            value="{{ $keputusan->markah_word }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Soalan Kemahiran E-mel</label>
                                        <select class="form-control" name="keputusan_email">
                                            <option hidden selected value="{{ $keputusan->keputusan_email }}">
                                                {{ $keputusan->keputusan_email }}</option>
                                            <option value="Melepasi">Melepasi</option>
                                            <option value="Tidak Melepasi">Tidak Melepasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah Soalan Kemahiran E-mel</label>
                                        <input class="form-control" type="number" name="markah_email"
                                            value="{{ $keputusan->markah_email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn bg-gradient-success" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
