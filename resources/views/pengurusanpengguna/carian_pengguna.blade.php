@extends('base')
@section('content')
    <?php
    use Spatie\Permission\Models\Role;
    ?>

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengurusan
                                Pengguna</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengguna
                                Berdaftar</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Pengguna Berdaftar</h5>
            </div>
            <div class="col-lg-6">
                <div class="col-12">
                    <a href="/pengurusanpengguna/create" class="btn btn-outline-primary" type="submit"
                        style="float: right;">Daftar Pengguna</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color:#FFA500;">
                        <b class="text-white">Carian Pengguna</b>
                    </div>
                    <div class="card-body">
                        <form action="/carian-pengguna" method="get">
                            @method("GET")
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label>Nama Pengguna</label>
                                    <input class="form-control" type="text" name="nama" autocomplete="off" />
                                </div>
                                <div class="col-12 mt-4">
                                    <label>No Kad Pengenalan Pengguna</label>
                                    <input class="form-control" type="text" name="ic" autocomplete="off" maxlength="12"
                                        size="12"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                </div>
                                <div class="col-12 mt-4">
                                    <label>Peranan Pengguna</label>
                                    <select class="form-control mb-3" name="user_group_id">
                                        <option value="" selected hidden>Sila Pilih</option>
                                        @foreach ($role as $role)
                                            <option value="{{ $role->id }}">{{ ucfirst(trans($role->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col d-flex justify-content-end align-items-end mt-3">

                                    <button class="btn bg-gradient-info text-uppercases mx-2" type="submit" name="search"><i
                                            class="fas fa-search"></i> cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
