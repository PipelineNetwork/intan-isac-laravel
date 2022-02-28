@extends('base_exam')
@section('content')

    <div class="px-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/profil">
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
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Soalan Kemahiran</li>
            </ol>
            <h6 class="font-weight-bolder">E-mel</h6>
        </nav>

        <div class="container-fluid pb-3">
            <div class="card mt-5">
                <div class="card-body bg-secondary" style="border-radius: 15px">
                    <form action="/soalan-kemahiran-email/{{ $id_penilaian }}/{{ $soalankemahiranemails->id }}/save"
                        method="POST" enctype="multipart/form-data" id="penilaian">
                        @csrf
                        <input type="hidden" name="timer" value="" id="timer">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-10 m-0 p-0">
                                        <img src="/assets/img/outlook2.png" alt="outlook" style="width: 100%">
                                    </div>
                                    <div class="col-2 m-0 p-0 d-flex">
                                        <label class="btn form-control text-dark p-0 m-0" style="background-color: #BFBFBF"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas fa-paperclip fa-3x mt-4 mb-2"></i><br> Attach File<input
                                                style="display: none; border-radius: none !important;"
                                                class="form-control" hidden id="pilih_gambar">
                                        </label>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Pilih Gambar</h5>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img class="btn" id="pilih_gambar"
                                                            data-bs-dismiss="modal" onclick="myFunction()"
                                                            src="/img/intan.png"><br>
                                                        intan.png
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                                  <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="button" class="btn bg-gradient-primary">Save changes</button>
                                                </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn text-dark" style="background-color: #BFBFBF" type="submit"><i
                                        class="fa fa-send fa-3x mb-2"></i>Send</button>
                            </div>
                            <div class="col-1">
                                <label for="input-to" class="form-control-label">To..</label><br>
                                <label for="input-cc" class="form-control-label">Cc..</label><br>
                                <label for="input-subject" class="form-control-label">Subject</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control form-control-sm" id="input-to" type="text" name="input_to"
                                    autocomplete="off">
                                <input class="form-control form-control-sm" id="input-cc" type="text" autocomplete="off">
                                <input class="form-control form-control-sm" id="input-subject" type="text"
                                    name="input_subject" autocomplete="off">
                                <input type="hidden" name="id_soalankemahiranemail"
                                    value="{{ $soalankemahiranemails->id }}">

                                <div id="chosen1">

                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <textarea class="form-control" name="input_mesej" rows="15"></textarea>
                            </div>
                            <input type="hidden" name="markah_internet" value="{{ $markah_internets->total }}">
                            <input type="hidden" name="markah_word" value="{{ $markah_words->jumlah_markah_word }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://isacsupport.intan.my/chat_widget.js"></script>

    <script>
        function myFunction() {
            $("#chosen1").append(`<span class="mt-3 text-white"><b>File Name:
                                            intan.png</b></span><input type="hidden" name="fail_upload">`);
            var x = document.getElementById("chosen1");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
        }
    </script>
@stop
