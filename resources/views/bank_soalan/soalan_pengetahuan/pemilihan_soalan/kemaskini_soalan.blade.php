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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Bank Soalan</a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Soalan
                                Pengetahuan</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Kemaskini Soalan Pengetahuan</h5>
            </div>
        </div>

        <form action="/kemaskini_pemilihan_soalan/{{ $kemaskini->ID_PEMILIHAN_SOALAN }}" method="POST" id="jumlahsemua">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                            <div class="row d-flex flex-nowrap">
                                <div class="col align-items-center">
                                    <b class="text-white">Pemilihan Soalan</b>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4">
                                        Nama Pemilihan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control  " type="text"
                                        value="{{ $kemaskini->NAMA_PEMILIHAN_SOALAN }}" name="NAMA_PEMILIHAN_SOALAN">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4">
                                        Tahap Pemilihan Set Soalan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control ml-3" name="KOD_TAHAP_SOALAN" id="input_kod_gelaran">
                                        <option hidden selected value="{{ $kemaskini->KOD_TAHAP_SOALAN }}">
                                            Asas</option>
                                        <option value="01">
                                            Asas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4">
                                        Jumlah Keseluruhan Soalan
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control  " type="text" name="JUMLAH_KESELURUHAN_SOALAN" id="sum">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4">
                                        Nilai Jumlah Markah
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control  " type="text" id="sum2" name="NILAI_JUMLAH_MARKAH">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <label class="form-control-label mr-4">
                                        Nilai Markah Lulus
                                    </label><label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control  " type="text" value="{{ $kemaskini->NILAI_MARKAH_LULUS }}"
                                        name="NILAI_MARKAH_LULUS">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <div class="card mt-3">

                        <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                            <div class="row d-flex flex-nowrap">
                                <div class="col align-items-center">
                                    <b class="text-white">Maklumat Soalan</b>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable_soalan_pengetahuan">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Tahap Soalan
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Kategori
                                                Soalan
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Jumlah
                                                Soalan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pilihan as $p)
                                            <tr>
                                                <input type="text" name="field[]"
                                                    value="{{ $p->ID_PEMILIHAN_SOALAN_KUMPULAN }}" style="display:none;">
                                                <td class="text-sm text-center font-weight-normal">{{ $loop->index + 1 }}
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <select class="form-control" name="id_tahap_soalan[]" required>
                                                        <option hidden selected value="{{ $p->KOD_TAHAP_SOALAN }}">
                                                            @if ($p->KOD_TAHAP_SOALAN == '01')
                                                                Asas
                                                            @elseif($p->KOD_TAHAP_SOALAN == '02')
                                                                Lanjutan
                                                            @endif
                                                        </option>
                                                        <option value="01">Asas</option>
                                                        <option value="02">Lanjutan</option>
                                                    </select>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    <select class="form-control" name="id_kategori_pengetahuan[]"
                                                        required>
                                                        <option hidden value="{{ $p->KOD_KATEGORI_SOALAN }}" selected>
                                                            @if ($p->KOD_KATEGORI_SOALAN == '01')
                                                                EG
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '02')
                                                                Electronic Mail
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '03')
                                                                General
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '04')
                                                                Government Mobility
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '05')
                                                                Hardware
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '06')
                                                                ICT Security
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '07')
                                                                Inisiatif ICT Sektor Awam
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '08')
                                                                Internet
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '09')
                                                                Media Sosial
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '10')
                                                                MSC
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '11')
                                                                Office Productivity
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '12')
                                                                Rangkaian dan Wifi
                                                            @elseif($p->KOD_KATEGORI_SOALAN == '13')
                                                                Software
                                                            @endif
                                                        </option>
                                                        <option value="01">EG</option>
                                                        <option value="02">Electronic Mail</option>
                                                        <option value="03">General</option>
                                                        <option value="04">Government Mobility</option>
                                                        <option value="05">Hardware</option>
                                                        <option value="06">ICT Security</option>
                                                        <option value="07">Inisiatif ICT Sektor Awam</option>
                                                        <option value="08">Internet</option>
                                                        <option value="09">Media Sosial</option>
                                                        <option value="10">MSC</option>
                                                        <option value="11">Office Productivity</option>
                                                        <option value="12">Rangkaian dan Wifi</option>
                                                        <option value="13">Software</option>
                                                    </select>
                                                </td>
                                                <td class="text-sm text-center font-weight-normal">
                                                    @if ($p->NILAI_JUMLAH_SOALAN == null)
                                                        <input type="text" class="form-control text-center" value="0"
                                                            name="NILAI_JUMLAH_SOALAN[]" id="jumlah{{ $loop->index + 1 }}"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                    @else
                                                        <input type="text" class="form-control text-center"
                                                            value="{{ $p->NILAI_JUMLAH_SOALAN }}"
                                                            name="NILAI_JUMLAH_SOALAN[]"
                                                            id="jumlah{{ $loop->index + 1 }}"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col text-end">
                                    <a class="btn bg-gradient-warning" data-bs-toggle="modal"
                                        data-bs-target="#tambah_kat">Tambah Kategori</a>
                                    <button class="btn bg-gradient-success" type="submit">Kemaskini</button>
                                    <a href="/pengurusan_penilaian/pemilihan_soalan_pengetahuan"
                                        class="btn bg-gradient-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="tambah_kat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/pengurusan_penilaian/pemilihan_soalan_pengetahuan/tambah_kategori_pemilihan"
                        method="POST">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="ID_PEMILIHAN_SOALAN" value="70">
                            <div class="form-group">
                                <label for="keterangan" class="form-control-label">Tahap Soalan</label>
                                <select class="form-control" name="KOD_TAHAP_SOALAN" required>
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    <option value="01">Asas</option>
                                    <option value="02">Lanjutan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="form-control-label">Kategori Soalan</label>
                                <select class="form-control" name="KOD_KATEGORI_SOALAN" required>
                                    <option hidden selected value="">
                                        Sila Pilih
                                    </option>
                                    <option value="01">EG</option>
                                    <option value="02">Electronic Mail</option>
                                    <option value="03">General</option>
                                    <option value="04">Government Mobility</option>
                                    <option value="05">Hardware</option>
                                    <option value="06">ICT Security</option>
                                    <option value="07">Inisiatif ICT Sektor Awam</option>
                                    <option value="08">Internet</option>
                                    <option value="09">Media Sosial</option>
                                    <option value="10">MSC</option>
                                    <option value="11">Office Productivity</option>
                                    <option value="12">Rangkaian dan Wifi</option>
                                    <option value="13">Software</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn bg-gradient-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/plugins/datatables.js"></script>
    <script type="text/javascript">
        const dataTableSoalanPengetahuan = new simpleDatatables.DataTable("#datatable_soalan_pengetahuan", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script>
        $(document).ready(function() {
            var sum = 0;
            kirajumlah();
            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            // $('#jumlahsemua').each(function() {

            //     $(this).keyup(function() {
            //         //iterate through each textboxes and add the values
            //         $('#jumlah').each(function() {

            //             //add only if the value is number
            //             if (!isNaN(this.value) && this.value.length != 0) {
            //                 sum += parseFloat(this.value);
            //             }

            //         });
            //         //.toFixed() method will roundoff the final sum to 2 decimal places
            //         $("#sum").html(sum.toFixed(0));
            //     });
            // });



        });


        $("#jumlahsemua").keyup(function() {
            kirajumlah();
        })

        function kirajumlah() {
            let form_data = ($("#jumlahsemua").serializeArray());

            //fix jumlah soalan
            let total = 0;
            var bilangan = @json($pilihan->toArray());
            for (let i = 1; i <= bilangan.length; i++) {
                let filter = "NILAI_JUMLAH_SOALAN" + i;
                total = total + +($("#jumlah" + i).val());
            }
            console.log(total)
            $("#sum").val(total);
            $("#sum2").val(total);
        }
    </script>
@stop
