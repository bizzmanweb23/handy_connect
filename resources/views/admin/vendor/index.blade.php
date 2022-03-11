@extends('admin.layouts.main')
@section('content')

    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
        data-menu="vertical-menu-modern" data-col="2-columns">

        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-12 mb-2 mt-1">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h5 class="content-header-title float-left pr-1 mb-0 text-capitalize">
                                    @lang('vendor.vendor')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('role.list')
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title titlefix">@lang('vendor.vendor')</h3>

                                    <div class="box-tools float-right">
                                        <a href="{{ URL::signedRoute('admin.vendor.create') }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                            @lang('role.add') @lang('vendor.vendor')
                                        </a>
                                    </div>

                                </div>
                                <div class="box-body">
                                    <div class="download_label">@lang('vendor.vendor') @lang('role.list')</div>
                                    <table class="" id="vendor_list" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('services.unique_id')</th>
                                                <th>@lang('vendor.vendor') @lang('vendor.type')</th>
                                                <th>@lang('role.name')</th>
                                                <th>@lang('vendor.email')</th>
                                                <th>@lang('vendor.mobile')</th>
                                                <th>@lang('services.services')</th>
                                                <th>@lang('services.logo')</th>
                                                <th>@lang('role.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>




@section('javascript')
    <script>
        $('#main_delete_link').click(function(e) {
            e.preventDefault();
            delete_modal_selected_data("{{ URL::signedRoute('admin.vendor.delete') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            vendor_list.ajax.reload();
        });

        $(document).ready(function() {
            vendor_list = $('#vendor_list').DataTable({
                "aaSorting": [],

                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                //responsive: 'false',
                dom: "Bfrtip",
                buttons: [

                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-file"></i>',
                        titleAttr: 'Copy',
                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i>',
                        titleAttr: 'Excel',

                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text"></i>',
                        titleAttr: 'CSV',
                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'

                        }
                    },

                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: 'Print',
                        title: $('.download_label').html(),
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'colvis',
                        text: '<i class="fa fa-columns"></i>',
                        titleAttr: 'Columns',
                        title: $('.download_label').html(),
                        postfixButtons: ['colvisRestore']
                    },
                ],
                ajax: {
                    url: "{{ route('admin.vendor.get_all_vendor') }}",
                    type: 'get',

                },
                columns: [{
                        data: 'vendor_unique_id',
                        name: 'vendor_unique_id'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'service',
                        name: 'service'
                    },
                    {
                        data: 'logo',
                    },
                    {
                        data: 'action'
                    }
                ]
            })
        });
    </script>
@endsection

@endsection
