@extends('base_exam')
@section('content')


    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        const dataTableSoalanKemahiranEmail = new simpleDatatables.DataTable("#datatable_soalan_kemahiran_email", {
            searchable: true,
            fixedHeight: true
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop