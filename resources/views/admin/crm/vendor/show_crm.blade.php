@extends('admin.layouts.main')
@section('content')
    <style>
        .btn i {
            position: relative;
            top: 0;
        }

        .select2 {
            width: 100% !important;
        }

    </style>

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
                                    {{ $data->crm_unique_id }}</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        {{-- <li class="breadcrumb-item active text-capitalize">@lang('role.list')
                                        </li> --}}
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
                                <div class="box-header with-border d-flex">
                                    <h3 class="box-title titlefix">{{ $data->crm_unique_id }}</h3>
                                    <div class="ml-2">
                                        <a href="{{ URL::signedRoute('admin.admin_quotation.show', ['admin_quotation' => $data->admin_crm_id,'vendor_crm_id' => $data->id]) }} "
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>
                                            Quotations
                                        </a>
                                    </div>
                                    {{-- <div class="ml-2">
                                        <a href="#!"
                                            onclick="open_quotatio_modal('request_for_quotation_modal','request_for_quotation_form')"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>
                                            Request For Quotation
                                        </a>
                                    </div> --}}
                                    {{-- <div class="">
                                        <a href="{{ URL::signedRoute('admin.employee.create') }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>
                                            Field verification
                                        </a>
                                    </div>
                                    <div class="box-tools float-right">
                                        <a href="{{ URL::signedRoute('admin.employee.create') }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>
                                            Assign To @lang('vendor.vendor')
                                        </a>
                                    </div> --}}

                                </div>
                                <div class="box-body">

                                    <h4>Bill To</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('customer.customer') @lang('role.name')</label>
                                                    <div class="position-relative has-icon-left">

                                                        <strong>{{ $data->name }}</strong>
                                                    </div>
                                                    <input type="hidden" name="id" id="customer_id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Expected Delivery Date</label>
                                                    <div class="position-relative has-icon-left">
                                                        <strong>{{ $data->delivery_date }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if (!empty($data->field_visit_employee_id))
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Field Visite Employee</label>
                                                        <div class="position-relative has-icon-left">
                                                            @php
                                                                
                                                                foreach (explode(',', $data->field_visit_employee_id) as $key => $value) {
                                                                    $visit_employee = App\Models\Employee::find($value);
                                                                    echo '<strong>' . $visit_employee->name . '</strong>,';
                                                                }
                                                                
                                                            @endphp

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <h4>@lang('vendor.address')</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.address')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <strong>{{ $data->address }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.country')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <strong>{{ $data->country }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.state')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <strong>{{ $data->state }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.zip_code')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <strong>{{ $data->zip_code }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.email')</label>
                                                    <div class="position-relative has-icon-left">
                                                        {{ $data->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.mobile')</label>
                                                    <div class="position-relative has-icon-left">
                                                        {{ $data->mobile }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>@lang('role.add') @lang('services.services')</h4>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="download_label">{{ $data->name }} @lang('services.service')
                                                @lang('role.list')</div>
                                            <table class="" id="service_list" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('services.service')</th>
                                                        <th>@lang('crm.quantity')</th>
                                                        <th>@lang('crm.uom')</th>
                                                        <th>@lang('services.tax')</th>
                                                        <th>@lang('services.price')</th>
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
            </div>
        </div>
    </body>




    {{-- modal --}}
    <div class="modal fade text-left" id="assign_field_employee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">Assign Employee </h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_field_employee_form">
                        @csrf
                        <label>@lang('employee.employee') @lang('role.name'): </label>
                        <div class="form-group">
                            <select name="employee_id[]" class="form_control" multiple="multiple" id="employee_list">

                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_field_employee_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}


    {{-- Request For Quotation --}}
    <div class="modal fade text-left" id="request_for_quotation_modal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">Assign @lang('vendor.vendor') </h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="request_for_quotation_form">
                        @csrf

                        {{-- <div class="form-group">
                            <select name="vendor_id[]" class="form_control" multiple="multiple" id="vendor_list">

                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>@lang('vendor.vendor') @lang('role.name'): </label>
                            <select name="vendor_id[]" class="form-control " multiple="multiple" id="vendor_list">

                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="request_for_quotation_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end Request For Quotation --}}


@section('javascript')
    <script>
        function open_field_modal(modal_id, form_id) {
            $(`#${modal_id}`).modal('show');
        }

        function open_quotatio_modal(modal_id, form_id) {
            $(`#${modal_id}`).modal('show');
        }

        $('#main_delete_link').click(function(e) {
            e.preventDefault();
            delete_modal_selected_data("{{ URL::signedRoute('admin.employee.delete') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            service_list.ajax.reload();
        });

        // function open_field_visit_modal(modal_id, form_id) {
        //     get_employee();
        //     $(`#${modal_id}`).modal('show');
        // }

        $('#request_for_quotation_form_btn').click(function() {
            var form = $('#request_for_quotation_form')[0];
            var data = new FormData(form);
            data.append('crm_id', "{{ request()->id }}")
            $.ajax({
                url: "{{ URL::signedRoute('admin.crm.assign_to_vendors') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    show_when_ajax_call('#request_for_quotation_form_btn', 'request_for_quotation_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#request_for_quotation_form_btn',
                            'request_for_quotation_form',
                        )
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);

                    }

                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#request_for_quotation_form_btn',
                        'request_for_quotation_form',
                        error,
                    )
                }
            })
        });

        $('#add_field_employee_form_btn').click(function() {
            var form = $('#add_field_employee_form')[0];
            var data = new FormData(form);
            data.append('crm_id', "{{ request()->id }}")
            $.ajax({
                url: "{{ URL::signedRoute('admin.crm.add_field_visit') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    // show_when_ajax_call('#add_field_employee_form_btn', 'add_field_employee_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        // remove_after_ajax_call('#add_field_employee_form_btn',
                        //     'add_field_employee_form',
                        // )
                        successMsg(data.message);

                        // setTimeout(() => {
                        //     window.location.href = data.url
                        // }, 1000);

                    }

                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_field_employee_form_btn',
                        'add_field_employee_form',
                        error,
                    )
                }
            })
        });

        function get_employee() {
            $.ajax({
                url: "{{ route('admin.employee.get_employee') }}",
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#employee_list').select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });

                    if ("{{ !empty($data->field_visit_employee_id) }}") {
                        var vist_employee = "{{ $data->field_visit_employee_id }}";
                        vist_employee = vist_employee.split(',')
                        console.log(vist_employee)
                        $('#employee_list').select2().val(vist_employee).trigger('change')
                    }



                },
                error: function(error) {
                    console.log(error)
                }
            })
        }

        function get_vendor_list() {
            $.ajax({
                url: "{{ URL::signedRoute('admin.crm.vendor_list') }}",
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#vendor_list').select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });

                    if ("{{ !empty($data->assign_to_vendor_id) }}") {
                        var vendor = "{{ $data->assign_to_vendor_id }}";
                        vendor = vendor.split(',')
                        $('#vendor_list').select2().val(vendor).trigger('change')
                    }



                },
                error: function(error) {
                    console.log(error)
                }
            })
        }

        $(document).ready(function() {
            get_employee()
            get_vendor_list()
            service_list = $('#service_list').DataTable({
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
                    url: "{{ route('admin.crm.show_service_data_for_crm') }}",
                    type: 'get',
                    data: {
                        id: "{{ $data->admin_crm_id }}"
                    },

                },
                columns: [{
                        data: 'service_name',
                        name: 'service_name'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'uom',
                        name: 'uom'
                    },
                    {
                        data: 'tax',
                        name: 'tax'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    // {
                    //     data: 'action'
                    // }
                ]
            })
        });
    </script>
@endsection

@endsection
