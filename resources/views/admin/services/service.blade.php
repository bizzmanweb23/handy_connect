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
                                    @lang('services.service')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('services.service')
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
                                    <h3 class="box-title titlefix">@lang('services.service')</h3>
                                    <div class="box-tools float-right">
                                        @can('service.add')
                                            <a href="{{ URL::signedRoute('admin.service.create') }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                                @lang('role.add') @lang('services.service')
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="download_label">@lang('services.service') @lang('role.list')</div>
                                    <table class="" id="services_list" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('services.unique_id')</th>
                                                <th>@lang('services.image')</th>
                                                <th>@lang('services.service') @lang('role.name')</th>
                                                <th>@lang('services.category')</th>
                                                <th>@lang('services.unit_of_measure')</th>
                                                <th>@lang('services.tax')</th>
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
            delete_modal_selected_data("{{ URL::signedRoute('admin.service.delete') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            services_list.ajax.reload();
        });


        $(document).ready(function() {
            services_list = $('#services_list').DataTable({
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
                    url: "{{ route('admin.service.get_all_services') }}",
                    type: 'get',

                },
                columns: [{
                        data: 'service_unique_id',
                        name: 'service_unique_id'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    }, {
                        data: 'service_name',
                        name: 'service_name'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'unit_of_measure',
                        name: 'unit_of_measure'
                    },
                    {
                        data: 'tax',
                        name: 'tax'
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
