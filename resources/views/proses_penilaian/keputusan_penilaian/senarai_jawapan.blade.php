@extends('base')
@section('content')
    @php
    use App\Models\Soalankemahiranword;
    @endphp
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
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row ">
                    <div class="col-6">
                        <h5 class="font-weight-bolder">Semak Jawapan</h5>
                    </div>
                    <div class="col-6 text-end">
                        <a href="/senarai_penilaian/{{ $ic }}" class="btn bg-gradient-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color:#FFA500;">
                        @if ($keputusan_calons != null)
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <b class="text-white">Jawapan Calon (Pengetahuan)</b><br>
                                    @if ($keputusan_calons != null)
                                        <b class="text-white">Keputusan:
                                            {{ $keputusan_calons->keputusan_pengetahuan }}</b>
                                    @endif
                                </div>
                                <div class="col-6 text-end">
                                    <a href="/{{ $ic }}/{{ $id }}/edit"
                                        class="btn btn-danger">Kemaskini</a>
                                </div>
                            </div>
                        @else
                            <b class="text-white">Jawapan Calon (Pengetahuan)</b><br>
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($keputusan_calons != null)
                            <b class="text-black mt-3">Markah Penuh:
                                {{ $markah_keseluruhan_pengetahuans->NILAI_JUMLAH_MARKAH }}</b><br>
                            <b class="text-black">Markah Melepasi:
                                {{ $markah_keseluruhan_pengetahuans->NILAI_MARKAH_LULUS }}</b><br>
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-peserta">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Jawapan
                                                Calon
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Jawapan
                                                Sebenar
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Markah
                                                Diberi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jawapan as $key => $jawapan)
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan->pilihan_jawapan }}</td>
                                                <td class="text-sm text-center font-weight-normal">{{ $jawapan->jawapan }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">{{ $jawapan->markah }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <b>Belum Menduduki Penilaian</b>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card mt-3">
                    @if ($keputusan_calons != null)
                        <div class="card-header" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <b class="text-white">Jawapan Calon (Kemahiran Internet)</b><br>
                                    <b class="text-white">Keputusan: {{ $keputusan_calons->keputusan_internet }}</b>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="/{{ $ic }}/{{ $id }}/edit"
                                        class="btn btn-danger">Kemaskini</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <b class="text-black mt-3">Markah Penuh: 2</b><br>
                            <b class="text-black">Markah Melepasi: 2</b><br>
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-jawapan-kemahiran-internet">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Jawapan
                                                Calon
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Jawapan
                                                Sebenar
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Markah
                                                Diberi
                                            </th>
                                        </tr>
                                    </thead>

                                    @if ($jawapan_kemahiran != null)
                                        <tbody>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">1.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->url_teks }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->jawapansebenar_urlteks }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->markah_urlteks }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">2.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->carian_teks }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->jawapansebenar_carianteks }}</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->markah_carianteks }}</td>
                                            </tr>
                                        </tbody>
                                    @else
                                        <tbody>
                                        </tbody>
                                    @endif

                                </table>
                            </div>
                        </div>
                    @else
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Jawapan Calon (Kemahiran Internet)</b><br>
                        </div>
                        <div class="card-body">
                            <b>Belum Menduduki Penilaian</b>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="card mt-3">
                    @if ($keputusan_calons != null)
                        <div class="card-header" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <b class="text-white">Jawapan Calon (Kemahiran Pemprosesan Perkataan)</b><br>
                                    <b class="text-white">Keputusan: {{ $keputusan_calons->keputusan_word }}</b>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="/{{ $ic }}/{{ $id }}/edit"
                                        class="btn btn-danger">Kemaskini</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- @if ($jawapan_kemahiran != null)
                                
                            @endif --}}
                            <b class="text-black mt-3">Markah Penuh: 9</b><br>
                            <b class="text-black">Markah Melepasi: 4</b><br>
                            @php
                                $soalan_word = Soalankemahiranword::where('id', $jawapan_kemahiran->id_soalankemahiranword)->first();
                                // dd($soalan_word);
                                if ($soalan_word != null) {
                                    if ($jawapan_kemahiran->id_soalankemahiranword != null) {
                                        // if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_1) && !empty($soalan_word->jawapan_1)) {
                                        //     $markah_1 = $soalan_word->markah_1;
                                        //     $display_betul_salah_1 = $soalan_word->jawapan_1;
                                        // } elseif ($soalan_word->jawapan_1 == null) {
                                        //     $markah_1 = 'Tiada';
                                        //     $display_betul_salah_1 = 'Tiada Jawapan';
                                        // } else {
                                        //     $markah_1 = 0;
                                        //     $display_betul_salah_1 = $soalan_word->jawapan_1;
                                        // }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_2) && !empty($soalan_word->jawapan_2)) {
                                            $markah_2 = $soalan_word->markah_2;
                                            $display_betul_salah_2 = $soalan_word->jawapan_2;
                                        } elseif ($soalan_word->jawapan_2 == null) {
                                            $markah_2 = 'Tiada';
                                            $display_betul_salah_2 = 'Tiada Jawapan';
                                        } else {
                                            $markah_2 = 0;
                                            $display_betul_salah_2 = $soalan_word->jawapan_2;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_3) && !empty($soalan_word->jawapan_3)) {
                                            $markah_3 = $soalan_word->markah_3;
                                            $display_betul_salah_3 = $soalan_word->jawapan_3;
                                        } elseif ($soalan_word->jawapan_3 == null) {
                                            $markah_3 = 'Tiada';
                                            $display_betul_salah_3 = 'Tiada Jawapan';
                                        } else {
                                            $markah_3 = 0;
                                            $display_betul_salah_3 = $soalan_word->jawapan_3;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_4) && !empty($soalan_word->jawapan_4)) {
                                            $markah_4 = $soalan_word->markah_4;
                                            $display_betul_salah_4 = $soalan_word->jawapan_4;
                                        } elseif ($soalan_word->jawapan_4 == null) {
                                            $markah_4 = 'Tiada';
                                            $display_betul_salah_4 = 'Tiada Jawapan';
                                        } else {
                                            $markah_4 = 0;
                                            $display_betul_salah_4 = $soalan_word->jawapan_4;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_5) && !empty($soalan_word->jawapan_5)) {
                                            $markah_5 = $soalan_word->markah_5;
                                            $display_betul_salah_5 = $soalan_word->jawapan_5;
                                        } elseif ($soalan_word->jawapan_5 == null) {
                                            $markah_5 = 'Tiada';
                                            $display_betul_salah_5 = 'Tiada Jawapan';
                                        } else {
                                            $markah_5 = 0;
                                            $display_betul_salah_5 = $soalan_word->jawapan_5;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_6) && !empty($soalan_word->jawapan_6)) {
                                            $markah_6 = $soalan_word->markah_6;
                                            $display_betul_salah_6 = $soalan_word->jawapan_6;
                                        } elseif ($soalan_word->jawapan_6 == null) {
                                            $markah_6 = 'Tiada';
                                            $display_betul_salah_6 = 'Tiada Jawapan';
                                        } else {
                                            $markah_6 = 0;
                                            $display_betul_salah_6 = $soalan_word->jawapan_6;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_7) && !empty($soalan_word->jawapan_7)) {
                                            $markah_7 = $soalan_word->markah_7;
                                            $display_betul_salah_7 = $soalan_word->jawapan_7;
                                        } elseif ($soalan_word->jawapan_7 == null) {
                                            $markah_7 = 'Tiada';
                                            $display_betul_salah_7 = 'Tiada Jawapan';
                                        } else {
                                            $markah_7 = 0;
                                            $display_betul_salah_7 = $soalan_word->jawapan_7;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_8) && !empty($soalan_word->jawapan_8)) {
                                            $markah_8 = $soalan_word->markah_8;
                                            $display_betul_salah_8 = $soalan_word->jawapan_8;
                                        } elseif ($soalan_word->jawapan_8 == null) {
                                            $markah_8 = 'Tiada';
                                            $display_betul_salah_8 = 'Tiada Jawapan';
                                        } else {
                                            $markah_8 = 0;
                                            $display_betul_salah_8 = $soalan_word->jawapan_8;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_9) && !empty($soalan_word->jawapan_9)) {
                                            $markah_9 = $soalan_word->markah_9;
                                            $display_betul_salah_9 = $soalan_word->jawapan_9;
                                        } elseif ($soalan_word->jawapan_9 == null) {
                                            $markah_9 = 'Tiada';
                                            $display_betul_salah_9 = 'Tiada Jawapan';
                                        } else {
                                            $markah_9 = 0;
                                            $display_betul_salah_9 = $soalan_word->jawapan_9;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_10) && !empty($soalan_word->jawapan_10)) {
                                            $markah_10 = $soalan_word->markah_10;
                                            $display_betul_salah_10 = $soalan_word->jawapan_10;
                                        } elseif ($soalan_word->jawapan_10 == null) {
                                            $markah_10 = 'Tiada';
                                            $display_betul_salah_10 = 'Tiada Jawapan';
                                        } else {
                                            $markah_10 = 0;
                                            $display_betul_salah_10 = $soalan_word->jawapan_10;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_11) && !empty($soalan_word->jawapan_11)) {
                                            $markah_11 = $soalan_word->markah_11;
                                            $display_betul_salah_11 = $soalan_word->jawapan_11;
                                        } elseif ($soalan_word->jawapan_11 == null) {
                                            $markah_11 = 'Tiada';
                                            $display_betul_salah_11 = 'Tiada Jawapan';
                                        } else {
                                            $markah_11 = 0;
                                            $display_betul_salah_11 = $soalan_word->jawapan_11;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_12) && !empty($soalan_word->jawapan_12)) {
                                            $markah_12 = $soalan_word->markah_12;
                                            $display_betul_salah_12 = $soalan_word->jawapan_12;
                                        } elseif ($soalan_word->jawapan_12 == null) {
                                            $markah_12 = 'Tiada';
                                            $display_betul_salah_12 = 'Tiada Jawapan';
                                        } else {
                                            $markah_12 = 0;
                                            $display_betul_salah_12 = $soalan_word->jawapan_12;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_13) && !empty($soalan_word->jawapan_13)) {
                                            $markah_13 = $soalan_word->markah_13;
                                            $display_betul_salah_13 = $soalan_word->jawapan_13;
                                        } elseif ($soalan_word->jawapan_13 == null) {
                                            $markah_13 = 'Tiada';
                                            $display_betul_salah_13 = 'Tiada Jawapan';
                                        } else {
                                            $markah_13 = 0;
                                            $display_betul_salah_13 = $soalan_word->jawapan_13;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_14) && !empty($soalan_word->jawapan_14)) {
                                            $markah_14 = $soalan_word->markah_14;
                                            $display_betul_salah_14 = $soalan_word->jawapan_14;
                                        } elseif ($soalan_word->jawapan_14 == null) {
                                            $markah_14 = 'Tiada';
                                            $display_betul_salah_14 = 'Tiada Jawapan';
                                        } else {
                                            $markah_14 = 0;
                                            $display_betul_salah_14 = $soalan_word->jawapan_14;
                                        }
                                
                                        if (str_contains($jawapan_kemahiran->jawapan_word, $soalan_word->jawapan_15) && !empty($soalan_word->jawapan_15)) {
                                            $markah_15 = $soalan_word->markah_15;
                                            $display_betul_salah_15 = $soalan_word->jawapan_15;
                                        } elseif ($soalan_word->jawapan_15 == null) {
                                            $markah_15 = 'Tiada';
                                            $display_betul_salah_15 = 'Tiada Jawapan';
                                        } else {
                                            $markah_15 = 0;
                                            $display_betul_salah_15 = $soalan_word->jawapan_15;
                                        }
                                    } else {
                                        // $display_betul_salah_1 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_2 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_3 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_4 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_5 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_6 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_7 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_8 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_9 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_10 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_11 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_12 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_13 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_14 = 'Tidak menjawab/Tidak simpan jawapan.';
                                        $display_betul_salah_15 = 'Tidak menjawab/Tidak simpan jawapan.';
                                    }
                                } else {
                                    // $markah_1 = 'Tiada';
                                    $markah_2 = 'Tiada';
                                    $markah_3 = 'Tiada';
                                    $markah_4 = 'Tiada';
                                    $markah_5 = 'Tiada';
                                    $markah_6 = 'Tiada';
                                    $markah_7 = 'Tiada';
                                    $markah_8 = 'Tiada';
                                    $markah_9 = 'Tiada';
                                    $markah_10 = 'Tiada';
                                    $markah_11 = 'Tiada';
                                    $markah_12 = 'Tiada';
                                    $markah_13 = 'Tiada';
                                    $markah_14 = 'Tiada';
                                    $markah_15 = 'Tiada';
                                }
                                
                            @endphp

                            @if ($jawapan_kemahiran->id_soalankemahiranword != null)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Jawapan Calon</label>
                                        <textarea class="form-control" rows="33" disabled="">{{ $jawapan_kemahiran->jawapan_word }}</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Jawapan Calon</label>
                                        <textarea class="form-control" rows="10" disabled="">Tidak menjawab/Tidak simpan jawapan.</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 1 --}}
                            {{-- @if ($markah_1 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_1 }}</label>
                                        <textarea class="form-control" rows="5"
                                            disabled="">{{ $display_betul_salah_1 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_1 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_1 }}</label>
                                        <textarea class="form-control" rows="5"
                                            disabled="">{{ $display_betul_salah_1 }}</textarea>
                                    </div>
                                </div>
                            @endif --}}

                            {{-- check jawapan 2 --}}
                            @if ($markah_2 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_2 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_2 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_2 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_2 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_2 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 3 --}}
                            @if ($markah_3 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_3 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_3 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_3 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_3 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_3 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 4 --}}
                            @if ($markah_4 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_4 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_4 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_4 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_4 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_4 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 5 --}}
                            @if ($markah_5 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_5 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_5 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_5 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_5 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_5 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 6 --}}
                            @if ($markah_6 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_6 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_6 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_6 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_6 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_6 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 7 --}}
                            @if ($markah_7 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_7 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_7 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_7 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_7 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_7 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 8 --}}
                            @if ($markah_8 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_8 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_8 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_8 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_8 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_8 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 9 --}}
                            @if ($markah_9 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_9 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_9 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_9 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_9 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_9 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 10 --}}
                            @if ($markah_10 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_10 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_10 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_10 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_10 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_10 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 11 --}}
                            @if ($markah_11 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_11 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_11 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_11 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_11 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_11 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 12 --}}
                            @if ($markah_12 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_12 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_12 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_12 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_12 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_12 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 13 --}}
                            @if ($markah_13 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_13 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_13 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_13 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_13 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_13 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 14 --}}
                            @if ($markah_14 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_14 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_14 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_14 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_14 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_14 }}</textarea>
                                    </div>
                                </div>
                            @endif

                            {{-- check jawapan 15 --}}
                            @if ($markah_15 == 1)
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_15 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_15 }}</textarea>
                                    </div>
                                </div>
                            @elseif ($markah_15 == 'Tiada')
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: -</label>
                                        <textarea class="form-control" rows="5" disabled="">Tiada Jawapan</textarea>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Markah: {{ $markah_15 }}</label>
                                        <textarea class="form-control" rows="5" disabled="">{{ $display_betul_salah_15 }}</textarea>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Jawapan Calon (Kemahiran Pemprosesan Perkataan)</b><br>
                        </div>
                        <div class="card-body">
                            <b>Belum Menduduki Penilaian</b>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <div class="card mt-3">
                    @if ($keputusan_calons != null)
                        <div class="card-header" style="background-color:#FFA500;">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <b class="text-white">Jawapan Calon (Kemahiran E-mel)</b><br>
                                    <b class="text-white">Keputusan: {{ $keputusan_calons->keputusan_email }}</b>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="/{{ $ic }}/{{ $id }}/edit"
                                        class="btn btn-danger">Kemaskini</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <b class="text-black mt-3">Markah Penuh: 4</b><br>
                            <b class="text-black">Markah Melepasi: 2</b><br>
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-jawapan-kemahiran-email">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Jawapan
                                                Calon
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Jawapan
                                                Sebenar
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Markah
                                                Diberi
                                            </th>
                                        </tr>
                                    </thead>

                                    @if ($jawapan_kemahiran != null)
                                        <tbody>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">1.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jawapan_kemahiran->input_to == null)
                                                        Tidak menjawab/Tidak simpan jawapan.
                                                    @else
                                                        {{ $jawapan_kemahiran->input_to }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    isac@intanbk.intan.my</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->markah_inputto }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">2.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jawapan_kemahiran->input_subject == null)
                                                        Tidak menjawab/Tidak simpan jawapan.
                                                    @else
                                                        {{ $jawapan_kemahiran->input_subject }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Penilaian ISAC</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->markah_inputsubject }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">3.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jawapan_kemahiran->input_mesej == null)
                                                        Tidak menjawab/Tidak simpan jawapan.
                                                    @else
                                                        {{ $jawapan_kemahiran->input_mesej }}
                                                    @endif
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Tuan,

                                                    Disertakan dokumen seperti diarahkan.

                                                    Sekian, terima kasih.
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->markah_inputmesej }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-center font-weight-normal">4.</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($jawapan_kemahiran->fail_upload == null)
                                                        Tidak menjawab/Tidak simpan jawapan.
                                                    @else
                                                        {{ $jawapan_kemahiran->fail_upload }}
                                                    @endif
                                                    {{-- <img src="/storage/{{ $jawapan_kemahiran->fail_upload }}"
                                                style="max-width: 30px;"> --}}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    Tiada</td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    {{ $jawapan_kemahiran->markah_failupload }}</td>
                                            </tr>
                                        </tbody>
                                    @endif
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Jawapan Calon (Kemahiran E-mel)</b><br>
                        </div>
                        <div class="card-body">
                            <b>Belum Menduduki Penilaian</b>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableBasickategori = new simpleDatatables.DataTable("#datatable-peserta", {
            searchable: true,
            fixedHeight: true,
            sortable: false,
        });

        const dataTableBasicSoalanKemahiranInternet = new simpleDatatables.DataTable(
            "#datatable-jawapan-kemahiran-internet", {
                searchable: true,
                fixedHeight: true,
                paging: false,
                searchable: false,
                sortable: false,
            });

        const dataTableBasicSoalanKemahiranEmail = new simpleDatatables.DataTable("#datatable-jawapan-kemahiran-email", {
            searchable: true,
            fixedHeight: true,
            paging: false,
            searchable: false,
            sortable: false,
        });
    </script>
@stop
