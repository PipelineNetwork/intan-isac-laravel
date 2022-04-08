@extends('base')
@section('content')
    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a></li>
            </ol>
            <h5 class="font-weight-bolder">Pengurusan Penilaian</h5>
        </nav>
        <div class="row">
            <div class="col-12">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Borang permohonan penilaian</h5>
                    </div>
                    <div class="card-body">
                        <form action="/mohonpenilaian/penyelaras/pilih_calon" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Nombor kad pengenalan calon:</label>
                                <x-input id="nric" class="form-control" type="nric" name="ic_calon"
                                    :value="old('ic_calon')" autofocus maxlength="12" size="12"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                {{-- <input class="form-control" type="text" name="ic_calon"> --}}
                                <input type="hidden" name="sesi" value="{{ $sesi }}">
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn bg-gradient-info">Seterusnya</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
