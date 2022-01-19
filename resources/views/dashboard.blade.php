@extends('base')
<style>
    #chart1 {
        width: 100%;
        height: 500px;
    }

    #chartdiv {
        width: 100%;
        height: 500px;
    }

</style>

@section('content')
    <?php
    use App\Models\Refgeneral;
    use App\Models\MohonPenilaian;
    ?>
    <div class="container-fluid py-4">
        <div class="row mb-0">
            <div class="col-lg-6">
                <h3 class="font-weight-bolder">Selamat Datang ke Penilaian ISAC</h3>
                <input type="hidden" value="{{ $bil_mohon_jumlahs }}" name="check">
            </div>
        </div>

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="globe" class="position-absolute end-0 top-10 mt-sm-3 mt-7 me-lg-7">
                    <canvas width="700" height="600" class="w-lg-100 h-lg-100 w-75 h-75 me-lg-0 me-n10 mt-lg-5"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h5 class="font-weight-bolder">Dashboard</h5>
            </div>
        </div>
        @unlessrole('calon')
            <div class="row justify-content-center my-3">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">JUMLAH PERMOHONAN</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $bil_mohon_jumlahs }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-3">
                <div class="col-lg-6 mt-sm-0 mt-4">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">JUMLAH CALON LULUS</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $bil_lulus_jumlahs }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-sm-0 mt-4">
                    <div class="card ">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">JUMLAH CALON GAGAL</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $bil_gagal_jumlahs }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Statistik Pencapaian ISAC</b>
                        </div>
                        <div class="card-body">
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mt-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <b class="text-white">Statistik Permohonan Penilaian ISAC</b>
                            <br>
                            <span class="text-white">Bagi tahun semasa</span>
                        </div>
                        <div class="card-body">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
            <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

            <script>
                am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    am4core.addLicense('ch-custom-attribution');
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("chartdiv", am4charts.PieChart);

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "jumlah";
                    pieSeries.dataFields.category = "keputusan";

                    // Let's cut a hole in our Pie chart the size of 30% the radius
                    chart.innerRadius = am4core.percent(30);

                    // Put a thick white border around each Slice
                    pieSeries.slices.template.stroke = am4core.color("#fff");
                    pieSeries.slices.template.strokeWidth = 2;
                    pieSeries.slices.template.strokeOpacity = 1;
                    pieSeries.slices.template
                        // change the cursor on hover to make it apparent the object can be interacted with
                        .cursorOverStyle = [{
                            "property": "cursor",
                            "value": "pointer"
                        }];

                    pieSeries.alignLabels = false;
                    pieSeries.labels.template.bent = true;
                    pieSeries.labels.template.radius = 3;
                    pieSeries.labels.template.padding(0, 0, 0, 0);

                    pieSeries.ticks.template.disabled = true;

                    // Create a base filter effect (as if it's not there) for the hover to return to
                    var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
                    shadow.opacity = 0;

                    // Create hover state
                    var hoverState = pieSeries.slices.template.states.getKey(
                        "hover"); // normally we have to create the hover state, in this case it already exists

                    // Slightly shift the shadow and make it more prominent on hover
                    var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
                    hoverShadow.opacity = 0.7;
                    hoverShadow.blur = 5;

                    // Add a legend
                    chart.legend = new am4charts.Legend();

                    var data = {!! json_encode($graf_lulus_gagals) !!};
                    chart.data = data;

                    // chart.data = [{
                    //     "country": "Lithuania",
                    //     "litres": 501.9
                    // }, {
                    //     "country": "Germany",
                    //     "litres": 165.8
                    // },];

                }); // end am4core.ready()

                am4core.ready(function() {

                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end

                    // Create chart instance
                    var chart = am4core.create("chart1", am4charts.XYChart);
                    chart.scrollbarX = new am4core.Scrollbar();

                    var data = {!! json_encode($graf_permohonan_bulanans) !!};
                    chart.data = data;

                    // Add data
                    // chart.data = [{
                    //     "country": "USA",
                    //     "visits": 3025
                    // }, {
                    //     "country": "China",
                    //     "visits": 1882
                    // },];

                    // Create axes
                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.dataFields.category = "monthname";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;
                    categoryAxis.renderer.labels.template.horizontalCenter = "right";
                    categoryAxis.renderer.labels.template.verticalCenter = "middle";
                    categoryAxis.renderer.labels.template.rotation = 270;
                    categoryAxis.tooltip.disabled = true;
                    categoryAxis.renderer.minHeight = 110;

                    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.renderer.minWidth = 50;

                    // Create series
                    var series = chart.series.push(new am4charts.ColumnSeries());
                    series.sequencedInterpolation = true;
                    series.dataFields.valueY = "jumlah";
                    series.dataFields.categoryX = "monthname";
                    series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
                    series.columns.template.strokeWidth = 0;

                    series.tooltip.pointerOrientation = "vertical";

                    series.columns.template.column.cornerRadiusTopLeft = 10;
                    series.columns.template.column.cornerRadiusTopRight = 10;
                    series.columns.template.column.fillOpacity = 0.8;

                    // on hover, make corner radiuses bigger
                    var hoverState = series.columns.template.column.states.create("hover");
                    hoverState.properties.cornerRadiusTopLeft = 0;
                    hoverState.properties.cornerRadiusTopRight = 0;
                    hoverState.properties.fillOpacity = 1;

                    series.columns.template.adapter.add("fill", function(fill, target) {
                        return chart.colors.getIndex(target.dataItem.index);
                    });

                    // Cursor
                    chart.cursor = new am4charts.XYCursor();

                }); // end am4core.ready()
            </script>
        @else
            <div class="row">
                <div class="col">
                    <div class="card m-3">
                        <div class="card-header" style="background-color:#FFA500;">
                            <h5 class="text-white mb-0">Pilih Jadual</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">No.</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Sesi</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Masa</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Tarikh Penilaian
                                            </th>
                                            {{-- bawah --}}
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Bilangan Tempat
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Bilangan Calon
                                            </th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Kekosongan</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Platform</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Lokasi</th>
                                            <th class="text-uppercase text-center font-weight-bolder opacity-7">Pendaftaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jaduals as $key => $jadual)
                                            @if ($jadual->KOD_KATEGORI_PESERTA == '01')
                                                <tr>
                                                    <td class="text-sm text-center font-weight-normal">{{ $key + 1 }}.</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        @if ($jadual->KOD_SESI_PENILAIAN == '01')
                                                            Sesi 01
                                                        @elseif($jadual->KOD_SESI_PENILAIAN == "02")
                                                            Sesi 02
                                                        @elseif($jadual->KOD_SESI_PENILAIAN == "03")
                                                            Sesi 03
                                                        @endif
                                                        {{-- {{ $jadual['KOD_SESI_PENILAIAN'] }} --}}
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $jadual->KOD_MASA_MULA }} - {{ $jadual->KOD_MASA_TAMAT }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ date('d-m-Y', strtotime($jadual->TARIKH_SESI)) }}</td>
                                                    {{-- bwh --}}
                                                    <td class="text-sm text-center font-weight-normal">
                                                        @if ($jadual->JUMLAH_KESELURUHAN == null)
                                                            0
                                                        @else
                                                            {{ $jadual->JUMLAH_KESELURUHAN }}
                                                        @endif
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        @if ($jadual->BILANGAN_CALON == null)
                                                            0
                                                        @else
                                                            {{ $jadual->BILANGAN_CALON }}
                                                        @endif
                                                    </td>
                                                    <?php
                                                    $jadual->KEKOSONGAN = $jadual->JUMLAH_KESELURUHAN - $jadual->BILANGAN_CALON;
                                                    ?>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        @if ($jadual->KEKOSONGAN == null)
                                                            0
                                                        @else
                                                            {{ $jadual->KEKOSONGAN }}
                                                        @endif
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        {{ $jadual->platform }}</td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        @if ($jadual['KOD_KEMENTERIAN'] == null)
                                                            -
                                                        @else
                                                            {{ $jadual['LOKASI'] }}
                                                        @endif
                                                    </td>
                                                    <td class="text-sm text-center font-weight-normal">
                                                        <?php
                                                        $no_ic = Auth::user()->nric;
                                                        $done_daftar = MohonPenilaian::where('no_ic', $no_ic)
                                                            ->where('id_sesi', $jadual->ID_PENILAIAN)
                                                            ->first();
                                                        ?>
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                @if ($done_daftar == null)
                                                                    @if ($jadual->KEKOSONGAN != 0)
                                                                        <form action="/mohonpenilaian/permohonan_penilaian"
                                                                            method="POST" class="m-0">
                                                                            @csrf
                                                                            <input type="hidden" name="sesi"
                                                                                value="{{ $jadual->ID_PENILAIAN }}">
                                                                            <button class="btn btn-sm bg-gradient-info m-0"
                                                                                type="submit">Daftar</button>
                                                                        </form>
                                                                    @else
                                                                        @if (Auth::user()->nric == '000000000006')
                                                                            <form action="/mohonpenilaian/permohonan_penilaian"
                                                                                method="POST" class="m-0">
                                                                                @csrf
                                                                                <input type="hidden" name="sesi"
                                                                                    value="{{ $jadual->ID_PENILAIAN }}">
                                                                                <button class="btn btn-sm bg-gradient-info m-0"
                                                                                    type="submit">Daftar</button>
                                                                            </form>
                                                                        @else
                                                                            <button class="btn btn-sm bg-gradient-danger m-0"
                                                                                disabled>Penuh</button>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    <button class="btn btn-sm bg-gradient-success m-0"
                                                                        disabled>Telah
                                                                        daftar</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://isacsupport.intan.my/chat_widget.js"></script>
            <script src="../../assets/js/plugins/datatables.js" type="text/javascript"></script>
            <script type="text/javascript">
                const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
                    searchable: true,
                    fixedHeight: true,
                    sortable: false
                });
            </script>
        @endunlessrole
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

    {{-- <script src="https://isacsupport.intan.my/chat_widget.js"></script> --}}
    {{-- <footer>
        <iframe id="customer-chatbox"></iframe>
    </footer> --}}
@stop
