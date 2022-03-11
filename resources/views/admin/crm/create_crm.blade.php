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
                                    Add Lead</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">Add Lead
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    if ($edit == 1) {
                        $id = $data->id;
                        $name = $data->name;
                        $email = $data->email;
                        $mobile = $data->mobile;
                        $image = $data->service_image;
                    }
                    if ($edit == 0) {
                        $id = '';
                        $name = '';
                        $email = '';
                        $mobile = '';
                        $image = '';
                    }
                    
                @endphp


                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title titlefix">Add Lead</h3>
                                    <div class="box-tools float-right">
                                        {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                            @lang('role.add') @lang('services.service')
                                        </a> --}}
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form id="add_lead_form">
                                        @csrf
                                        <h4>Bill To</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>@lang('customer.customer') @lang('role.name')</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="customer_name"
                                                                id="customer_name"
                                                                placeholder="@lang('customer.customer') @lang('role.name')">
                                                            <div class="form-control-position">
                                                                <i class='bx bxs-id-card'></i>
                                                            </div>
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
                                                            <input type="date" class="form-control pickadate"
                                                                name="delivery_date">
                                                            <div class="form-control-position">
                                                                <i class='bx bxs-calendar'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Select company</label>
                                                        <div class="position-relative has-icon-left">
                                                            <select name="company_id" id="company_list"
                                                                class="form-control">

                                                            </select>
                                                        </div>
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
                                                                placeholder="Address" id="address" disabled>
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
                                                                placeholder="@lang('vendor.country')" id="country" disabled>
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
                                                            <input type="text" class="form-control" name="country"
                                                                placeholder="@lang('vendor.country')" id="state" disabled>
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
                                                                placeholder="@lang('vendor.country')" id="zip_code"
                                                                disabled>
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
                                                                placeholder="@lang('vendor.email')" value="" id="email"
                                                                disabled>
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
                                                                placeholder="@lang('vendor.mobile')" value="" id="mobile"
                                                                disabled>
                                                            <div class="form-control-position">
                                                                <i class="bx bx-mobile"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4>@lang('role.add') @lang('services.services')</h4>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form add_service_repeater">
                                                    <div data-repeater-list="all_service_details">
                                                        <div data-repeater-item class="add_service_count">
                                                            <div class="row justify-content-between">
                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="name">@lang('services.service')
                                                                        @lang('role.name')</label>
                                                                    <input type="text" name="service_name" id=""
                                                                        class="form-control service_list">
                                                                    <input type="hidden" name="service_id"
                                                                        class="service_id">
                                                                </div>
                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="quantity">@lang('crm.quantity')</label>
                                                                    <input type="number" class="form-control qq"
                                                                        placeholder="@lang('crm.quantity')" value="1"
                                                                        name="quantity">
                                                                </div>
                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="uom">@lang('crm.uom')</label>

                                                                    <select name="uom" class="form-control uom">

                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="gender">@lang('services.tax')</label>
                                                                    <select name="tax" class="form-control service_tax"
                                                                        multiple="multiple">

                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                    <label for="price">@lang('services.price')</label>
                                                                    <input type="number" class="form-control service_price"
                                                                        placeholder="@lang('services.price')" name="price">
                                                                </div>
                                                                <div
                                                                    class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                    <button class="btn btn-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button"> <i
                                                                            class="bx bx-x"></i>
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col p-0">
                                                            <button class="btn btn-primary" data-repeater-create
                                                                type="button"><i class="bx bx-plus"></i>
                                                                Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            @if ($edit == 1)
                                                <button type="submit"
                                                    class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                    id="edit_add_lead_form_btn">@lang('role.update')
                                                </button>
                                            @else
                                                <button type="submit"
                                                    class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                    id="add_lead_form_btn">@lang('role.save')
                                                </button>
                                            @endif

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

    <link rel="stylesheet" href="{{ asset('asset/admin/css/jquery-ui.css') }}">
@section('javascript')
    <script src="{{ asset('asset/admin/js/jquery-ui.js') }}"></script>

    <script>
        $(document).ready(function() {
            // form repeater jquery
            $('.add_service_repeater').repeater({
                show: function() {
                    $(this).slideDown();
                    get_all_tax();
                    get_all_unit_of_measures();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });

        });

        $(document).on("focus keyup", ".service_list", function(event) {
            $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        type: 'get',
                        url: "{{ route('admin.crm.search_service') }}",
                        dataType: "json",
                        data: {
                            term: request.term,
                        },
                        success: function(data) {
                            response(data);
                        },
                    });
                },
                select: function(event, ui) {
                    if (ui.item.id != 0) {
                        $(this).closest('.add_service_count').find(
                            ".service_id").val(ui.item.id);
                        $(this).closest('.add_service_count').find(
                            ".uom").select2('val', ui.item.unit);
                        $(this).closest('.add_service_count').find(
                            ".service_price").val(ui.item.price);
                        console.log(ui.item.price)

                        get_all_tax(this, ui.item.tax);

                    }
                },
                minLength: 1,
            });

        });




        $(document).ready(function() {
            get_all_tax();
            get_all_unit_of_measures();
            get_company_list()
        });

        function get_company_list() {
            $.ajax({
                url: "{{ route('admin.admin_crm.search_company') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                    $("#company_list").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });



                    $('#main_loader').hide();
                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        }

        function get_all_unit_of_measures() {
            $.ajax({
                url: "{{ route('admin.units.get_all_unit_of_measures') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                    $(".uom").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });



                    $('#main_loader').hide();
                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        }

        function get_all_tax(id = null, atax = null) {
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

                    if (id != null) {
                        var tax = atax;
                        tax = tax.split(',')
                        $(id).closest('.add_service_count').find(".service_tax").select2().val(tax).trigger(
                            'change')
                    }


                    $('#main_loader').hide()
                }
            })
        }

        $('#customer_name').autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: 'get',
                    url: "{{ route('admin.crm.search_customer') }}",
                    dataType: "json",
                    data: {
                        term: $('#customer_name').val(),
                    },
                    success: function(data) {
                        response(data);
                    },
                });
            },
            select: function(event, ui) {
                if (ui.item.id != 0) {
                    $('#customer_id').val(ui.item.id);
                    $('#address').val(ui.item.address);
                    $('#country').val(ui.item.country);
                    $('#state').val(ui.item.state);
                    $('#zip_code').val(ui.item.zip_code);
                    $('#email').val(ui.item.email);
                    $('#mobile').val(ui.item.mobile);
                }
            },
            minLength: 1,
        });


        $('#edit_employee_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_employee_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.employee.update_employee') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#edit_employee_form_btn', 'add_employee_form')
                },
                success: function(data) {
                    // console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#edit_employee_form_btn', 'add_employee_form',
                            'Update')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#edit_employee_form_btn', 'add_employee_form',
                        error,
                        'Update')
                }
            })
        })



        $('#add_lead_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_lead_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.crm.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_lead_form_btn', 'add_lead_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_lead_form_btn', 'add_lead_form')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_lead_form_btn', 'add_lead_form', error)
                }
            })
        })
    </script>
@endsection

@endsection
