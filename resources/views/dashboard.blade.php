@extends('base')

@section('content')

    <div class="row mb-3">
        <div class="col-lg-6">
            <h5 class="font-weight-bolder">Dashboard</h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card m-3">
                <div class="card-header" style="background-color:#FFA500;">
                    <b class="text-white">Video dan Nota</b>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($videodannotas as $video)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col text-center">
                                    <video width="500" controls >
                                        <source src="/storage/{{$video->video}}" type="video/mp4">
                                        Your browser does not support HTML video.
                                    </video>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h3>{{$video->tajuk}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>{{$video->nota}}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true
        });
    </script>
@stop
