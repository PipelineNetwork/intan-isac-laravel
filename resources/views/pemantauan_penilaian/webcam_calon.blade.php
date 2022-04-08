@extends('base')
@section('content')

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pemantauan
                                Kamera</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Pemantauan Kamera</h5>
            </div>
            <div class="col-6 text-end">
                <button class="btn bg-gradient-primary" onClick="window.location.reload();">Refresh</button>
            </div>
        </div>

        <div class="card card-frame mt-3">
            <div class="card-header position-relative z-index-1" style="background-color:#FFA500;">
                <div class="row align-items-center">
                    <div class="col-8">
                        <b class="text-white mb-0">Senarai Calon</b>
                    </div>
                    <div class="col-4 text-end">
                        <form action="/set_semula_senarai" method="POST">
                            @csrf
                            <button class="btn bg-gradient-danger mb-0" type="submit">Set Semula</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    @if ($data_sedia_ada != null)
                        @foreach ($data_sedia_ada as $key => $val)
                            <div class="col-3 text-center">
                                <img src="{{ $val[0] }}" />
                                <p class="mt-2">{{ $val[1] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.setTimeout(function() {
            window.location.reload();
        }, 30000);
    </script>
@stop
