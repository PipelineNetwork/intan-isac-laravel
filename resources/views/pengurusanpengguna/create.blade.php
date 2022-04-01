@extends('base')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="/dashboard">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengurusan Pengguna</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar Pengguna</li>
        </ol>
        <h6 class="font-weight-bolder">Daftar Pengguna</h6>
    </nav>


    <div class="col-12 ">
        <div class="col-12">
            <form method="POST" action="/pengurusanpengguna">
                @csrf
                <div class="card mt-4" id="basic-info">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white">Daftar Pengguna</h5>
                    </div>
                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Nama :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="name" :value="old('name')"
                                        style="text-transform: uppercase" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">E-mel :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="email" name="email" :value="old('email')"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="user_group_id">Peranan :</label>
                                <div class="form-group">
                                    @role('penyelaras')
                                        <select class="form-control mb-3" name="user_group_id" id="pilih1" required readonly>
                                            <option value="pengawas" selected>Pengawas</option>
                                        </select>
                                    @else
                                        <select class="form-control mb-3" name="user_group_id" id="pilih1" required>
                                            <option value="" selected hidden>Sila pilih</option>
                                            @foreach ($role as $role)
                                                <option value="{{ $role->id }}">{{ ucfirst(trans($role->name)) }}</option>
                                            @endforeach
                                        </select>
                                    @endrole
                                </div>
                            </div>
                            <div id="pilih2" style="display:none" class="col-6">
                                <label for="">Kementerian/Jabatan :</label>
                                <div class="input-group">
                                    <select class="form-control ml-3" name="ministry_code" id="input_kementerian" required>
                                        <option hidden selected>
                                            Sila pilih
                                        </option>
                                        @foreach ($kementerians as $kementerian)
                                            <option value="{{ $kementerian->DESCRIPTION1 }}">
                                                {{ $kementerian->DESCRIPTION1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">No Kad Pengenalan :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="nric" required maxlength="12"
                                        size="12" :value="old('nric')"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">Kata Laluan :</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="password" name="password" required minlength="8">
                                </div>
                            </div>
                        </div>
                        <button class="btn bg-gradient-warning " type="submit">Simpan</button>
                    </div>

                </div>
            </form>

        </div>
    </div>



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#pilih1").change(function() {
                if ($(this).val() == "3") {
                    $("#pilih2").show();
                } else {
                    $("#pilih2").hide();
                }
            });
        });
    </script>
@stop
