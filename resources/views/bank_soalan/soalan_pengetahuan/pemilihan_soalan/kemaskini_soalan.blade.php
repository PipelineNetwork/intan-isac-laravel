@extends('base')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path
                                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                    </path>
                                                    <path
                                                        d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
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
                                                    value="{{ $p->ID_PEMILIHAN_SOALAN_KUMPULAN }}"
                                                    style="display:none;">
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
                                                        <option hidden value="{{ $p->KOD_KATEGORI_SOALAN }}"
                                                            selected>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop
