@extends('base')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="javascript:;">
                    <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>shop </title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengurusan Pengguna</a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"></a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kemaskini Pengguna</li>
        </ol>
        <h6 class="font-weight-bolder">Kemaskini Pengguna</h6>
    </nav>


    <form method="POST" action="/pengurusanpengguna/{{ $user->id }}">
        @csrf
        @method('PUT')
        <div class="card mt-4" id="basic-info">
            <div class="card-header" style="background-color:#FFA500;">
                <h5 class="text-white">Kemaskini Pengguna</h5>
            </div>
            <br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-6">
                        <label for="">Nama :</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="text" name="name" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">Email :</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="email" name="email" value="{{ $user->email }}"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row" data-bs-toggle="collapse">
                    <div class="col-6">
                        <label for="user_group_id">Peranan :</label>
                        <div class="form-group">
                            <select class="form-control mb-3" type="text" name="user_group_id" id="pilih1" required>
                                <<option hidden selected>
                                    @if ($user['user_group_id'] == 1)
                                        Pentadbir Sistem
                                    @elseif ($user['user_group_id'] == 2)
                                        Pentadbir Penilaian
                                    @elseif ($user['user_group_id'] == 3)
                                        Penyelaras
                                    @elseif ($user['user_group_id'] == 4)
                                        Pengawas
                                    @elseif ($user['user_group_id'] == 5)
                                        Calon
                                    @else
                                        Pegawai Korporat
                                    @endif
                                    {{-- {{ $user->user_group_id }} --}}
                                    </option>
                                    <?php
                                if(Auth::user()->user_group_id == '1'){
                                    ?>
                                    <option value="1">Pentadbir Sistem</option>
                                    <?php
                                }
                                ?>
                                    <?php
                                if(Auth::user()->user_group_id != '3'){
                                    ?>
                                    <option value="2">Pentadbir Penilaian</option>
                                    <option value="3">Penyelaras</option>
                                    <?php
                                }
                                ?>
                                    <option value="4">Pengawas</option>
                                    <?php
                                if(Auth::user()->user_group_id != '3'){
                                    ?>
                                    <option value="5">Calon</option>
                                    <option value="6">Pegawai Korporat</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div id="pilih2" style="display:none" class="col-6">
                        <label for="">Kod Kementerian :</label>
                        <div class="input-group">
                            <select class="form-control mb-3 hide" name="ministry_code" required>
                                <option hidden selected> Sila Pilih </option>
                                <option value="361">Jabatan Ketua Menteri Sabah</option>

                                <option value="481">Jabatan Ketua Menteri Sarawak
                                </option>

                                <option value="101">Jabatan Perdana Menteri</option>

                                <option value="372">Jabatan Sabah Yang
                                    Tiada
                                    Berkementerian</option>

                                <option value="492">Jabatan Sarawak
                                    Yang Tiada
                                    Berkementerian</option>

                                <option value="129">Jabatan Yang Tiada
                                    Berkementerian
                                </option>

                                <option value="141">Kementerian Air Tanah
                                    dan Sumber
                                    Asli</option>

                                <option value="144">Kementerian Alam Sekitar
                                    dan Air
                                </option>

                                <option value="487">
                                    Kementerian Alam
                                    Sekitar dan Kesihatan Awam Sarawak</option>

                                <option value="121">Kementerian Belia Dan Sukan
                                </option>

                                <option value="131">Kementerian Dalam Negeri</option>

                                <option value="370">Kementerian
                                    Kebudayaan,
                                    Belia dan Sukan Sabah</option>

                                <option value="140">Kementerian
                                    Kemajuan Luar
                                    Bandar dan Wilayah</option>

                                <option value="366">
                                    Kementerian Kerajaan
                                    Tempatan dan Perumahan Sabah</option>

                                <option value="105">Kementerian Kerja Raya</option>

                                <option value="137">Kementerian
                                    Kesenian,
                                    Kebudayaan Dan Warisan</option>

                                <option value="123">Kementerian Kesihatan</option>

                                <option value="103">Kementerian Kewangan</option>

                                <option value="482">Kementerian
                                    Kewangan dan
                                    Kemudahan Awam Sarawak</option>

                                <option value="363">Kementerian Kewangan Sabah
                                </option>

                                <option value="112">Kementerian
                                    Komunikasi
                                    dan Multimedia Malaysia</option>

                                <option value="119">Kementerian Luar Negeri</option>

                                <option value="135">Kementerian Pelajaran</option>

                                <option value="491">Kementerian Pelancongan
                                    Sarawak</option>

                                <option value="373">
                                    Kementerian
                                    Pelancongan, Kebudayaan dan Alam Sekitar Sabah</option>

                                <option value="138">
                                    Kementerian
                                    Pelancongan, Seni Dan Budaya Malaysia</option>

                                <option value="142">
                                    Kementerian Pembangunan dalam Negeri, Koperasi dan Kepenggunaan</option>

                                <option value="483">
                                    Kementerian
                                    Pembangunan Infrastruktur & Perhubungan Sarawak</option>

                                <option value="365">Kementerian
                                    Pembangunan
                                    Insfrastruktur Sabah</option>

                                <option value="489">
                                    Kementerian Pembangunan Luar Bandar dan Kemajuan Tanah Sarawak</option>

                                <option value="362">Kementerian
                                    Pembangunan Luar
                                    Bandar Sabah </option>

                                <option value="367">
                                    Kementerian Pembangunan Masyarakat & Hal-Ehwal Pengguna Sabah</option>

                                <option value="369">Kementerian
                                    Pembangunan
                                    Perindustrian Sabah</option>

                                <option value="490">Kementerian
                                    Pembangunan
                                    Perindustrian Sarawak</option>

                                <option value="364">
                                    Kementerian Pembangunan Pertanian dan Industri Pemakanan Sabah</option>

                                <option value="493">
                                    Kementerian
                                    Pembangunan Sosial dan Urbanisasi Sarawak </option>

                                <option value="374">
                                    Kementerian Pembangunan Sumber dan Kemajuan Teknologi Maklumat Sabah
                                </option>

                                <option value="133">Kementerian Pembangunan
                                    Usahawan
                                </option>

                                <option value="143">
                                    Kementerian
                                    Pembangunan Wanita, Keluarga dan Masyarakat</option>

                                <option value="136">Kementerian Pendidikan
                                    Malaysia</option>

                                <option value="145">Kementerian Pengajian Tinggi
                                </option>

                                <option value="104">Kementerian Pengangkutan</option>

                                <option value="484">
                                    Kementerian
                                    Perancangan dan Pengurusan Sumber Sarawak</option>

                                <option value="108 ">Kementerian
                                    Perdagangan
                                    Antarabangsa Dan Indus</option>

                                <option value="110">
                                    Kementerian
                                    Perdagangan Dalam Negeri Dan Hal Ehwal Pengguna</option>

                                <option value="117">Kementerian Pertahanan</option>

                                <option value="485">Kementerian
                                    Pertanian &
                                    Industri Makanan Sarawak</option>

                                <option value="134">Kementerian
                                    Pertanian dan
                                    Industri Asas Tani</option>

                                <option value="116">Kementerian
                                    Perumahan Dan
                                    Kerajaan Tempatan</option>

                                <option value="488">Kementerian Perumahan Sarawak
                                </option>

                                <option value="126">Kementerian Perusahaan Awam
                                </option>

                                <option value="Kementerian Perusahaan, Perladangan dan Komuditi">Kementerian
                                    Perusahaan,
                                    Perladangan dan Komuditi</option>

                                <option value="114">Kementerian Sumber Manusia
                                </option>

                                <option value="139">
                                    Kementerian Tenaga, Sains, Teknologi, Alam Sekitar & Perubahan Iklim
                                    (MESTECC)
                                </option>

                                <option value="128">Kementerian
                                    Undang-Undang/Kehakiman
                                </option>

                                <option value="127">Kementerian Wilayah
                                    Persekutuan</option>

                                <option value="201">Pentadbiran Kerajaan
                                    Negeri Johor
                                </option>

                                <option value="202">Pentadbiran Kerajaan
                                    Negeri Kedah
                                </option>

                                <option value="203">Pentadbiran Kerajaan
                                    Negeri
                                    Kelantan</option>

                                <option value="204">Pentadbiran Kerajaan
                                    Negeri Melaka
                                </option>

                                <option value="206">Pentadbiran Kerajaan
                                    Negeri Pahang
                                </option>

                                <option value="208">Pentadbiran Kerajaan
                                    Negeri Perak
                                </option>

                                <option value="209">Pentadbiran Kerajaan
                                    Negeri Perlis
                                </option>

                                <option value="210">Pentadbiran Kerajaan
                                    Negeri
                                    Selangor</option>

                                <option value="205">Pentadbiran Kerajaan
                                    Negeri
                                    Sembilan</option>

                                <option value="211">Pentadbiran Kerajaan
                                    Negeri
                                    Terengganu</option>

                                <option value="207"> Pentadbiran Kerajaan
                                    Pulau Pinang
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">NRIC : </label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="text" name="nric" value="{{ $user->nric }}" required
                                maxlength="12" size="12">
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="">Password :</label>
                        <div class="input-group">
                            <input class="form-control mb-3" type="password" name="password" required minlength="8">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-6">
                            <label for="">No office :</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="office_number"
                                    value="{{ $user->office_number }}">
                            </div> -->
                    <!-- <div class="col-6">
                            <label for="">No fax :</label>
                            <div class="input-group">
                                <input class="form-control mb-3" type="text" name="fax_number" value="{{ $user->fax_number }}">
                            </div>
                        </div> -->
                </div>

                <button class="btn bg-gradient-warning" type="submit">Simpan</button>
            </div>
        </div>
        </div>
    </form>


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
