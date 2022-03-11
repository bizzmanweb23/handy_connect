<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Handy Connect</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/admin/image/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/pickers/pickadate/pickadate.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/themes/semi-dark-layout.css') }}">

    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" href="{{ asset('asset/admin/css/menu/vertical-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/pages/authentication.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/pages/dashboard-ecommerce.css') }}">


    <link rel="stylesheet" href="{{ asset('asset/datatables/mycss.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/table/bootstrap-table.min.css') }}">
    <!-- END: Page CSS-->

    {{-- datatale --}}


    <link href="{{ asset('asset/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/datatables/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <!--print table mobile support-->
    <link href="{{ asset('asset/datatables/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/datatables/css/rowReorder.dataTables.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/dropify/css/dropify.min.css') }}">
   
    <style>
        table.dataTable tbody td {
            padding: 5px 5px;
        }

        .download_label {
            display: none;
        }

        .form-group.required .control-label:after {
            content: "*";
            color: red;
        }

        div.dataTables_wrapper div.dataTables_filter,
        div.dataTables_wrapper div.dataTables_length {
            margin: 0;
            display: inline-block;
        }

        .table-action {
            padding: 8px;
        }

        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border: solid 1px #c5d6de;
            margin-bottom: 20px;
            width: 100%;
            /* box-shadow: 0 1px 1px rgb(0 0 0 / 10%); */
        }

        .with-border {
            border-bottom: 1px solid #d8e2e7;
        }

        .box-header {
            color: #444;
            display: block;
            padding: 7px 10px 8px;
            position: relative;
        }

        header .box-title {
            display: inline-block;
            font-size: 18px;
            margin: 0;
            line-height: normal;
        }

        .box-header>.box-tools {
            position: absolute;
            right: 10px;
            top: 8px;
        }

        .box-body {
            padding: 8px;
        }

    </style>

    {{-- end datatable --}}


</head>

<body>
    <div id="main_loader" style="display: none">
        @include('loder.index')
    </div>


    @include('admin.layouts.header_menu')
    @include('admin.layouts.sidebare')

    @yield('content')

    {{-- delete modal --}}
    <div id="main_delete_modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6 text-capitalize">@lang('role.delete_confirmation')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-1">@lang('role.are_you_sure_to_delete_this?')</p>
                    <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('role.cancel')</button>
                    <a href="" id="main_delete_link" class="btn btn-primary mt-2">@lang('role.delete')</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end delete modal --}}
    
    <link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/extensions/toastr.css') }}">
     
          
    <script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>

    <script src="{{ asset('asset/admin/vendors/js/extensions/toastr.min.js') }}"></script>

    <script src="{{ asset('asset/admin/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('asset/admin/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('asset/admin/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('asset/admin/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- END: Vendor JS-->

    <script src="{{ asset('asset/admin/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendors/js/extensions/swiper.min.js') }}"></script>

    <script src="{{ asset('asset/admin/vendors/js/forms/select/select2.full.min.js') }}"></script>

    <script src="{{ asset('asset/admin/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('asset/admin/vendors/js/pickers/pickadate/picker.date.js') }}"></script>

    <script src="{{ asset('asset/admin/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>

    <script src="{{ asset('asset/admin/js/vertical-menu-light.js') }}"></script>
    <script src="{{ asset('asset/admin/js/app-menu.js') }}"></script>
    <script src="{{ asset('asset/admin/js/app.js') }}"></script>
    <script src="{{ asset('asset/admin/js/components.js') }}"></script>
    <script src="{{ asset('asset/admin/js/footer.js') }}"></script>

    <!-- BEGIN: Page JS-->

    <script src="{{ asset('asset/admin/js/dashboard-ecommerce.js') }}"></script>

    <script src="{{ asset('asset/admin/select/form-select2.js') }}"></script>

    <script src="{{ asset('asset/admin/table/tableExport.min.js') }}"></script>
    <script script src="{{ asset('asset/admin/table/bootstrap-table.min.js') }}"></script>
    <script script src="{{ asset('asset/admin/table/bootstrap-table-export.min.js') }}"></script>
    <script src="{{ asset('asset/admin/table/bootstrap-table-mobile.min.js') }}"></script>


    {{-- datatable --}}
    <script type="text/javascript" src="{{ asset('asset/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/datatables/js/dataTables.responsive.min.js') }}">
    </script>
    {{-- end datatable --}}
    <script src="{{ asset('asset/tooltip/tooltip.js') }}"></script>
    <script src="{{ asset('asset/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/main.js') }}"></script>

    <script>
        @if (!empty(session('status')))
            successMsg("{{ session('status') }}")
        @endif
        @if (!empty(session('unauthorized_error')))
            errorMsg("{{ session('unauthorized_error') }}")
        @endif
    </script>

    @yield('javascript')


</body>

</html>
