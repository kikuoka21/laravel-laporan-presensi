<style type="text/css">
    .jarak {
        margin-right: 10px;
        margin-left: 10px;
    }

</style>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Penerimaan Mahasiswa Baru - Universitas Budi Luhur</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="img/logobl.png')}}">


    <style type="text/css">
        @media print {

            #ALL-Table-Container {
                overflow: visible !important;
            }

            table.dataTable thead th.sorting:after {
                content: "";
                color: #ddd;
                font-size: 0.8em;
                padding-top: 0.12em;
            }

            table.dataTable thead th.sorting_asc:after {
                content: "";
            }

            table.dataTable thead th.sorting_desc:after {
                content: "";
            }

            @page {
                size: auto;
                margin: 25px;
                margin-bottom: 80px;
            }

            .modal {
                position: absolute;
                left: 0;
                top: 0;
                margin: 0;
                padding: 0;
                overflow: visible !important;
                border: 0px;
            }

            .dataTables_filter {
                display: none;
            }

            .noborder {
                border: 0;
            }

            table {
                page-break-inside: auto
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto
            }

            hr {
                display: block;
                height: 1px;
                border: 0;
                border-top: 1px solid #ccc;
                margin: 1em 0;
                padding: 0;
            }

            .open-sans {
                font-family: "Open Sans", Arial;
            }

            .modal {
                text-align: center;
                padding: 0 !important;
            }

            .modal:before {
                content: '';
                display: inline-block;
                height: 100%;
                vertical-align: middle;
                margin-right: -4px;
            }

            .modal-dialog {
                display: inline-block;
                text-align: left;
                vertical-align: middle;
            }
        }
    </style>

    <!-- MetisMenu CSS -->
    <link href="{{asset('assets/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('assets/dist/css/timeline.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <link href="{{asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Libre+Franklin');
    </style>

    <!-- costum css auto num -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

    <!-- Morris Charts CSS -->
    <link href="{{asset('assets/bower_components/morrisjs/morris.css')}}" rel="stylesheet">

    <link href="{{asset('assets/js/jquery-ui-1.12.1/jquery-ui.css')}}" rel="sylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert/sweetalert.css')}}">
    <!--File css yang dibutuhkan untuk design datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">

    <!-- CSS Datepicker-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/costume.css')}}">
    <!-- css for toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert/sweetalert.min.js')}}"></script>

    <!---Java Script-->
    <script src="{{asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('assets/bower_components/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/morrisjs/morris.js')}}"></script>
    <script src="{{asset('assets/dist/js/sb-admin-2.js')}}"></script>
    <script src="{{asset('assets/js/jquery.maskMoney.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.mask.js')}}"></script>
    <script src="{{asset('assets/js/moment.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/css/pace/pace.js')}}"></script>
    <link href="{{asset('assets/css/pace/themes/loading_bar.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha38<style>
@import url('https://fonts.googleapis.com/css?family=Libre+Franklin');
</style>4-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

    <!-- js bootstrap toogle -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!--Datepicker Bootstrap-->
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>


</head>
