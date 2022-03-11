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
                                    Add Quotation</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">Add Quotation
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
                                    <h3 class="box-title titlefix">Add Quotation</h3>
                                    <div class="box-tools float-right">
                                        {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                            @lang('role.add') @lang('services.service')
                                        </a> --}}
                                    </div>
                                </div>
                                <div class="box-body">

                                    <h4>Bill To</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('customer.customer') @lang('role.name')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" value="{{ $data->customer_name }}">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label> Delivery Date</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" value="{{ $data->delivery_date }}"/>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>company</label>
                                                    <select class="form-control ">
                                                        <option value="value">Goodman Interior Pte Ltd</option>
                                                        <option value="value">Goodman Interior (S) Pte Ltd</option>
                                                        <option value="value">Goodman Creatives Pte Ltd</option>
                                                        <option value="value">Goodman Enterprise Pte Ltd</option>
                                                    </select>
<!--                                                    <div class="position-relative has-icon-left">
                                                        {{ $data->companies_name }}
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <h4>@lang('vendor.address')</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Address</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="address"
                                                            placeholder="Address" id="address" disabled
                                                            value="{{ $data->address }}">
                                                        <div class="form-control-position">
                                                            <i class='bx bxs-landmark'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.country')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="country"
                                                            placeholder="@lang('vendor.country')" id="country" disabled
                                                            value="{{ $data->country }}">
                                                        <div class="form-control-position">
                                                            <i class='bx bxs-flag-alt'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.state')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="state"
                                                            placeholder="@lang('vendor.country')" id="state" disabled
                                                            value="{{ $data->state }}">
                                                        <div class="form-control-position">
                                                            <i class='bx bxs-city'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.zip_code')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="country"
                                                            placeholder="@lang('vendor.country')" id="zip_code" disabled
                                                            value="{{ $data->zip_code }}">
                                                        <div class="form-control-position">
                                                            <i class='bx bx-map'></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.email')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="@lang('vendor.email')" value="{{ $data->email }}"
                                                            id="email" disabled>
                                                        <div class="form-control-position">
                                                            <i class="bx bx-mail-send"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>@lang('vendor.mobile')</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input type="number" class="form-control" name="mobile"
                                                            placeholder="@lang('vendor.mobile')"
                                                            value="{{ $data->mobile }}" id="mobile" disabled>
                                                        <div class="form-control-position">
                                                            <i class="bx bx-mobile"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <h4>@lang('services.services')</h4>
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
                                    <form id="add_quotation_form">
                                        @csrf
                                        <h4>@lang('role.add') Expected Price</h4>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form add_service_repeater">
                                                    <div data-repeater-list="all_service_details">
                                                        <div data-repeater-item class="add_service_count">
                                                            <div class="row justify-content-between">
                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="name">Total
                                                                        Price</label>
                                                                    <input type="text" name="total_price"
                                                                        class="form-control " value="{{ $total }}"
                                                                        disabled>

                                                                </div>
                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="quantity">Total
                                                                        @lang('crm.quantity')</label>
                                                                    <input type="number" class="form-control qq"
                                                                        placeholder="@lang('crm.quantity')"
                                                                        value="{{ $total_quantity }}"
                                                                        name="total_quantity" disabled>
                                                                </div>

                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="gender">@lang('services.tax')</label>
                                                                    <select name="tax[]" class="form-control service_tax"
                                                                        multiple="multiple">

                                                                    </select>
                                                                </div>
                                                                {{-- <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="price">Expected
                                                                        @lang('services.price')</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="@lang('services.price')" name="price"
                                                                        id="ex_price">
                                                                </div> --}}

                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex align-items-end flex-column">
                                            <div class="col-md-2 col-sm-12 ">
                                                <label for="">Total Price :</label><strong>${{ $total }}</strong>
                                            </div>
                                            <div class="col-md-2 col-sm-12 ">
                                                <label for="">Tax :</label><strong id="total_tax"></strong>
                                            </div>
                                            <div class="col-md-2 col-sm-12 ">
                                                <label for="">Final Price :</label><strong id="final_price"></strong>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">

                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                id="add_quotation_form_btn">@lang('role.save')
                                            </button>


                                            <button type="reset" class="btn btn-light">@lang('role.cancel')</button>
                                        </div>
                                    </form>
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
        // add_quotation_form
        $('#add_quotation_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_quotation_form')[0];
            var data = new FormData(form);
            data.append('id', "{{ request()->admin_quotation }}");
            if ("{{ !empty(request()->vendor_crm_id) }}") {
                data.append('vendor_crm_id', "{{ request()->vendor_crm_id }}");
            }
            $.ajax({
                url: "{{ URL::signedRoute('admin.admin_quotation.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_quotation_form_btn', 'add_quotation_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_quotation_form_btn', 'add_quotation_form')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url;
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_quotation_form_btn', 'add_quotation_form',
                        error)
                }
            })
        });


        $('.service_tax').change(function() {
            var tax = $(this).val();
            let sum = 0;

            for (let i = 0; i < tax.length; i++) {
                sum += parseFloat(tax[i]);
            }

            var total = "{{ $total }}";
            var cal_tax = total * (sum / 100);

            $('#total_tax').html('$' + cal_tax)
            var final_price = parseFloat(cal_tax) + parseFloat("{{ $total }}");
            $('#final_price').html('$' + final_price)
        });

        // $('#ex_price').change(function() {
        //     // console.log($(this).val())
        //     var tax = $('.service_tax').val();
        //     let sum = 0;

        //     for (let i = 0; i < tax.length; i++) {
        //         sum += parseInt(tax[i]);
        //     }

        //     var total = $(this).val() == '' ? "{{ $total }}" : $(this).val();
        //     var cal_tax = total * (sum / 100);

        //     $('#total_tax').html('$' + cal_tax)

        //     var final_price = parseFloat(cal_tax) + parseFloat(total)
        //     $('#final_price').html('$' + final_price)

        // });

        $(document).ready(function() {
            get_all_tax();
        });

        function get_all_tax() {
            $.ajax({
                url: "{{ URL::signedRoute('admin.tax.get_all_tax') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show()
                },
                success: function(data) {

                    $(".service_tax").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });

                    $('#main_loader').hide()
                }
            })
        }


        $(document).ready(function() {
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
                        id: "{{ $data->id }}"
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
