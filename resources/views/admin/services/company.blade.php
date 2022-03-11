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
                                    @lang('customer.customers')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('services.company')
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
                                    <h3 class="box-title titlefix">@lang('services.company')</h3>
                                    <div class="box-tools float-right">
                                        @can('company.add')
                                            <a href="#!" class="btn btn-primary btn-sm"
                                                onclick="open_modal('add_company','add_company_form')"><i
                                                    class="fa fa-plus"></i>
                                                @lang('role.add') @lang('services.company')
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="download_label">@lang('customer.customers') @lang('role.list')</div>
                                    <table class="" id="company_list" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('role.name')</th>
                                                <th>Logo</th>
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

    {{-- modal --}}
    <div class="modal fade text-left" id="add_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.add') @lang('services.company')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_company_form">
                        @csrf
                        <label>@lang('services.company') @lang('role.name'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="@lang('services.company') @lang('role.name')"
                                class="form-control" name="name">
                        </div>
                        <label>@lang('services.logo'): </label>
                        <div class="form-group">
                            <input type="file" class="form-control image_dropify" name="logo"
                                data-allowed-file-extensions="png jpg jpeg">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_company_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- edit company --}}
    <div class="modal fade text-left" id="edit_company_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.edit') @lang('services.company')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_company_form">
                        @csrf
                        <label>@lang('services.company') @lang('role.name'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="@lang('services.company') @lang('role.name')"
                                class="form-control" name="name" id="edit_company_name">
                        </div>
                        <label>@lang('services.logo'): </label>
                        <div class="form-group">
                            <div class="text-center">
                                <img src="" alt="" id="edit_company_logo" width="100">
                            </div>
                            <input type="file" class="form-control image_dropify" name="logo"
                                data-allowed-file-extensions="png jpg jpeg">
                            <input type="hidden" name="id" id="edit_company_id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="edit_company_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit company --}}



@section('javascript')
    <script>
        $('#main_delete_link').click(function(e) {
            e.preventDefault();
            delete_modal_selected_data("{{ URL::signedRoute('admin.company.delete') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            company_list.ajax.reload();
        });

        function open_edit_company_model(id) {
            $('#edit_company_modal').modal('show');
            $.ajax({
                url: "{{ route('admin.company.get_edit_data') }}",
                type: 'get',
                data: {
                    id: id
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                    // console.log(data)
                    if (data.logo == null) {
                        logo = 'asset/admin/image/your-logo-here.jpg'
                    } else {
                        logo = data.logo;
                    }
                    var url = "{{ asset('') }}";
                    $('#edit_company_id').val(data.id);
                    $('#edit_company_name').val(data.name);
                    $('#edit_company_logo').attr('src', url + logo);

                    $('#main_loader').hide();

                },
                error: function(error) {
                    console.log(error);
                    $('#main_loader').hide();
                }
            })
        }

        $('#edit_company_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#edit_company_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.company.edit_company') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#edit_company_form_btn', 'edit_company_form');
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        close_modal('add_company');
                        remove_after_ajax_call('#edit_company_form_btn', 'edit_company_form')
                        successMsg(data.message);
                        company_list.ajax.reload();
                        close_modal('edit_company_modal')
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#edit_company_form_btn', 'edit_company_form', error);
                }
            })
        })


        $('#add_company_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_company_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.company.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#add_company_form_btn', 'add_company_form');
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 'success') {
                        close_modal('add_company');
                        remove_after_ajax_call('#add_company_form_btn', 'add_company_form')
                        successMsg(data.message);
                        company_list.ajax.reload();
                        close_modal('add_company')
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#add_company_form_btn', 'add_company_form', error);
                }
            })
        })

        $(document).ready(function() {
            company_list = $('#company_list').DataTable({
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
                    url: "{{ route('admin.company.company_create') }}",
                    type: 'get',

                },
                columns: [{
                        data: 'name',
                        name: 'name'
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
