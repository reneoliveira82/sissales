<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>@yield('titulo')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

    <!--<link href="{{asset('metronic/sweet-modal/docs/css/examples.css')}}" rel="stylesheet" type="text/css" />-->
    <!--<link href="{{asset('metronic/sweet-modal/docs/css/jquery.sweet-modal.min.css')}}" rel="stylesheet" type="text/css" />-->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('metronic/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/jquery-multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/jquery-minicolors/jquery.minicolors.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('metronic/assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('metronic/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('metronic/assets/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/layouts/layout4/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('metronic/assets/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
    <!--Meu estilo CSS-->
    <link href="{{asset('metronic/modelo/estilo.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('imagens/favicon-16x16.png')}}" />

    <script src="{{asset('metronic/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>

    <style>
        @media (max-width: 767px) {
            .dt-responsive .dropdown-menu,
            .dt-responsive .dropdown-toggle {
                position: static !important;
            }
        }

        @media (min-width: 768px) {
            .dt-responsive {
                overflow: visible;
            }
        }

        /*SELECT MULTI - ATRIBUIR USUÁRIO AO SERVIÇO*/
        .select2-selection__choice {
            background-color: #3598dc !important;
            color: #fff !important;
            font-size: 16px !important;
            font-family: "Arial" !important;
        }
        .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
        }
        /*END SELECT MULTI*/


        /* SELECT - PERMISSÃO - PERFIL/PERIMISSÃO */
        .ms-container .ms-list{
            height: 350px;
        }

        @media only screen and (min-width: 1310px) {
            .ms-container {
                width: 450px;
            }
        }

        @media only screen and (max-width: 1160px) {
            .ms-container {
                width: 290px;
            }
        }

        @media only screen and (max-width: 991px) {
            .ms-container {
                width: 550px;
            }

        @media only screen and (max-width: 625px) {
            .ms-container {
                width: 450px;
            }
        }

        @media only screen and (max-width: 525px){
            .ms-container {
                width: 350px;
            }
        }

        @media only screen and (max-width: 375px) {
            .ms-container {
                width: 310px;
            }
        }

        @media only screen and (max-width: 320px) {
            .ms-container {
                width: 260px;
            }
        }

        .ms-container .ms-list{
            height: 300px;
        }

        /* .ms-container {
            width: 450px;
        } */
        /* END SELECT - PERMISSÃO - PERFIL/PERIMISSÃO */

        
    </style>
</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">

    @include('layout.includes.menu_horizontal')

    <div class="clearfix"> </div>

    <div class="page-container">

        @include('layout.includes.menu_vertical')
