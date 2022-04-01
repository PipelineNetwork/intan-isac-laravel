@extends('base_before')
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
            <h5 class="font-weight-bolder">Kemasukan Penilaian</h5>
        </nav>

        <div class="row">
            <div class="col">
                <div class="card m-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        <h5 class="text-white mb-0">Kemasukkan Penilaian</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center py-3 my-3">
                            <div class="col-lg-10 py-4" style="border-style: solid;">
                                <div class="row justify-content-center mb-3">
                                    <div class="col-8 text-center">
                                        <h5>Sesi Penilaian ICT INTAN-ISAC</h5>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <p class="mb-0">Tarikh</p>
                                        <p class="mb-0">Masa</p>
                                        <p class="mb-0">Nama Calon</p>
                                        <p class="mb-0">No. Kad Pengenalan Calon</p>
                                    </div>
                                    <div class="col-auto">
                                        <p class="mb-0">: {{ $tarikh_penilaian }}</p>
                                        <p class="mb-0">: {{ $masa_mula }} - {{ $masa_tamat }}</p>
                                        <p class="mb-0">: {{ $calon->nama }}</p>
                                        <p class="mb-0">: {{ $calon->no_ic }}</p>
                                    </div>
                                </div>
                                @if ($tarikh == $tarikh_penilaian)
                                    @if ($masa_tamat >= $masa && $masa >= $masa_mula)
                                        <div class="row justify-content-center">
                                            <div class="col-auto mb-0">
                                                <form action="/penilaian/{{ $id_penilaian }}" method="POST">
                                                    @csrf
                                                    @foreach ($soalan_penilaian as $key => $soalan)
                                                        <input type="hidden" name="soalan_{{ $key + 1 }}"
                                                            value="{{ $soalan->id }}">
                                                    @endforeach
                                                    <input type="hidden" name="ic" value="{{ Auth::user()->nric }}">
                                                    <input type="hidden" name="status_penilaian" value="Selesai">
                                                    <button class="btn bg-gradient-info mt-4 mb-0 text-center"
                                                        type="submit">Mula Penilaian</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row justify-content-center">
                                            <div class="col-auto mb-0">
                                                <button class="btn bg-gradient-info mt-4 mb-0 text-center" disabled>Mula
                                                    Penilaian</button>
                                                {{-- <a href="/kemasukan_penilaian/{{$id_penilaian}}/1" class="btn bg-gradient-info mt-4 mb-0 text-center" disabled>Mula Penilaian</a> --}}
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="row justify-content-center">
                                        <div class="col-auto mb-0">
                                            <button class="btn bg-gradient-info mt-4 mb-0 text-center" disabled>Mula
                                                Penilaian</button>
                                            {{-- <a href="/kemasukan_penilaian/{{$id_penilaian}}/1" class="btn bg-gradient-info mt-4 mb-0 text-center" disabled>Mula Penilaian</a> --}}
                                        </div>
                                    </div>
                                @endif
                                <label class="text-danger text-center"><em>Sila refresh halaman web ini apabila waktu
                                        penilaian bermula.</em></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://isacsupport.intan.my/chat_widget.js"></script>
@stop
