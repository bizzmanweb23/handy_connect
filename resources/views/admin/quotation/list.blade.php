x@extends('admin.layouts.main')
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
                                    Quotation</h5>
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
                                    <h3 class="box-title titlefix">Quotation</h3>
                                    {{-- @can('customer.add')
                                        <div class="box-tools float-right">
                                            <a href="{{ URL::signedRoute('admin.customer.create') }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                                @lang('role.add') @lang('customer.customer')
                                            </a>
                                        </div>
                                    @endcan --}}
                                </div>
                                <div class="box-body">
                                    <div class="download_label">Quotation</div>
                                    <table class="" id="quotation_list" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Unique Id</th>
                                                <th>Total Price</th>
                                                <th>Quantity</th>
                                                <th>Tax</th>
                                                {{-- <th>Expected Price</th> --}}
                                                <th>Tax Price</th>
                                                <th>Expected Price With Tax</th>
                                                <th>Approve</th>
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


    {{-- add platform fee --}}
    <div class="modal fade text-left" id="add_platform_fee_modal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.add') Platform Fee</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_platform_fee_form">
                        @csrf
                        <label>Expected Price With Tax : </label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="final_price_with_tax" disabled>
                            <input type="hidden" name="id" id="quotation_id">
                        </div>

                        <div class="row d-flex">
                            <div class="col-md-6">
                                <label>Tax Type: </label>
                                <div class="form-group">
                                    <select name="tax_type" class="form-control" id="select_tax_type">
                                        <option value="">--Select--</option>
                                        <option value="0">Flat</option>
                                        <option value="1">Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Tax: </label>
                                <div class="form-group">
                                    <input type="number" placeholder="Tax" class="form-control" name="tax" id="tax">
                                </div>
                            </div>
                        </div>
                        <label>Platform Fee : </label>
                        <div class="form-group">
                            <input type="number" placeholder="Platform Fee" class="form-control" name="platform_fee"
                                id="platform_fee">
                        </div>
                        <div class="col-md-12 d-flex  flex-column">
                            <div class="col-md-4">
                                <label for="">Tax Type:</label><strong id="tax_type"></strong>
                            </div>
                            <div class="col-md-4">
                                <label for="">Tax :</label><strong id="total_tax"></strong>
                            </div>
                            <div class="col-md-4">
                                <label for="">Final Price :</label><strong id="final_price"></strong>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_platform_fee_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end add platform fee --}}

    {{-- approve modal --}}
    <div id="approve_modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6 text-capitalize">Approve Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-1">Are You Sure To Apptove This?</p>
                    <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('role.cancel')</button>
                    <a href="" id="approve_link" class="btn btn-primary mt-2" data-leadid="">Approve</a>
                </div>
            </div>
        </div>
    </div>
    {{-- end approve modal --}}



@section('javascript')
    <script>
        $('#add_platform_fee_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_platform_fee_form')[0]
            var data = new FormData(form);
            data.append('id', $('#quotation_id').val())
            $.ajax({
                url: "{{ URL::signedRoute('admin.add_platform_fee') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_platform_fee_form_btn', 'add_platform_fee_form');
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_platform_fee_form_btn', 'add_platform_fee_form')
                        successMsg(data.message);
                        close_modal('add_platform_fee_modal');
                        quotation_list.ajax.reload();
                    }
                },
                error: function(error) {
                    show_errors_when_ajax_call('#add_platform_fee_form_btn', 'add_platform_fee_form',
                        error);
                    console.log(error);
                }
            })
        })


        $('#platform_fee').change(function() {

            var total = $('#final_price_with_tax').val();
            var platform_fee = $(this).val();
            var tax_type = $('#select_tax_type').val();
            var tax = $('#tax').val();

            if (tax_type == 1) {
                var cal_tax = parseFloat(platform_fee) * (parseFloat(tax) / 100)
                var final = parseFloat(total) + parseFloat(platform_fee) + parseFloat(cal_tax);
                $('#final_price').html(final);
            } else {
                var cal_tax = parseFloat(platform_fee) + parseFloat(tax);
                var final = parseFloat(total) + parseFloat(platform_fee) + parseFloat(cal_tax);
                $('#final_price').html(final);
            }



        });

        $('#select_tax_type').change(function() {
            var value = $(this).val();
            if (value == 1) {
                $('#tax_type').html('Percent')
            } else {
                $('#tax_type').html('Flat')
            }

            $('#platform_fee').trigger('change');
        });

        $('#tax').change(function() {
            $('#total_tax').html($(this).val())
            if ($(this).val() != '') {
                $('#platform_fee').trigger('change');
            }
        });



        function open_platform_modal(final_price_with_tax, id) {
            $('#add_platform_fee_modal').modal('show');
            $('#final_price_with_tax').val(final_price_with_tax);
            $('#quotation_id').val(id);

        }


        function open_approve_modal(id, lead_id) {
            $('#approve_modal').modal('show');
            $("#approve_link").attr("href", id);
            $('#approve_link').attr('leadid', lead_id);
        }

        $('#approve_link').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ URL::signedRoute('admin.approve_quotation') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).attr('href'),
                    lead_id: $(this).attr('leadid')
                },
                dataType: 'json',
                beforeSend: function() {
                    show_when_ajax_call('#approve_link', null);
                    // $('#main_loader').show();
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        remove_after_ajax_call('#approve_link', null, 'Approve')
                        successMsg(data.message);
                        close_modal('approve_modal');
                        quotation_list.ajax.reload();

                    }
                    // $('#main_loader').hide();
                },
                error: function(error) {
                    show_errors_when_ajax_call('#approve_link', null, 'Approve', error);
                    console.log(error);
                }
            })
        });


        $(document).ready(function() {
            quotation_list = $('#quotation_list').DataTable({
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
                    url: "{{ route('admin.quotation.get_all_list') }}",
                    type: 'get',
                    data: {
                        id: "{{ $id }}"
                    }

                },
                columns: [{
                        data: 'unique_id',
                        name: 'unique_id'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'tax',
                        name: 'tax'
                    },
                    // {
                    //     data: 'final_price',
                    //     name: 'final_price'
                    // },
                    {
                        data: 'tax_price',
                        name: 'tax_price'
                    },
                    {
                        data: 'final_price_with_tax',
                        name: 'final_price_with_tax'
                    },
                    {
                        data: 'approve',
                        name: 'approve'
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
