@extends('base_before')
@section('content')

    <div class="px-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tamat Penilaian</li>
            </ol>
            <h6 class="font-weight-bolder">Tamat Penilaian</h6>
        </nav>

        <div class="container-fluid pb-3">

            <div class="card vh-100 mt-5">
                <div class="card-body mt-10" style="text-align: center">
                    <h3 class="mb-5">Masa telah tamat untuk menjawab semua bahagian soalan. <br>Sila klik butang
                        <span class="text-info">Semakan Keputusan</span> untuk menutup halaman.
                    </h3>
                    {{-- <button class="btn btn-info" onclick="windowClose();">Tutup</button> --}}
                    {{-- <a class="btn btn-info" href="/semakan_keputusan_calon">Semak Keputusan</a> --}}
                    {{-- <a class="btn btn-info" href="/semakan_keputusan_calon">Semakan Keputusan</a> --}}
                    <form action="/masa_tamat/{{ $ic }}/{{ $id_penilaian }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $ic }}">
                        <input type="hidden" value="{{ $id_penilaian }}">
                        <button class="btn btn-info" type="submit">Semakan Keputusan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
@stop
