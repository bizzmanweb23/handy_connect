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
                @php
                    if ($edit == 1) {
                        $id = $data->id;
                        $name = $data->service_name;
                        $category = $data->category_id;
                        $price = $data->price;
                        $unit_of_measure = $data->unit_of_measure_id;
                        $tax = $data->tax;
                        $image = $data->service_image;
                    }
                    if ($edit == 0) {
                        $id = '';
                        $name = '';
                        $category = '';
                        $price = '';
                        $unit_of_measure = '';
                        $tax = '';
                        $image = '';
                    }
                    
                @endphp


                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title titlefix">@lang('services.service')</h3>
                                    <div class="box-tools float-right">
                                        {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                            @lang('role.add') @lang('services.service')
                                        </a> --}}
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form id="add_service_form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('services.service') @lang('role.name')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $name }}"
                                                                        placeholder="@lang('services.service') @lang('role.name')">
                                                                    <div class="form-control-position">
                                                                        <i class='bx bxs-id-card'></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($edit == 1)
                                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                                        @endif
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('services.category')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <select name="category" id="category_list"
                                                                        class="form-control">

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('services.price')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="number" class="form-control" name="price"
                                                                        value="{{ $price }}"
                                                                        placeholder="@lang('services.price')">
                                                                    <div class="form-control-position">
                                                                        <i class='bx bx-money'></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="controls ">
                                                                <label>@lang('services.unit_of_measure')</label>
                                                                <div class="position-relative has-icon-left"
                                                                    style="display: flex;align-items: center">
                                                                    <select name="unit_of_measure" id="unit_of_measure"
                                                                        class="form-control ">

                                                                    </select>
                                                                    <a onclick="open_modal('add_unit_modal','add_unit_form')"
                                                                        href="#!" data-toggle="tooltip"
                                                                        title="@lang('role.add') @lang('services.new') @lang('services.unit')">
                                                                        <i class="fa fa-plus" style="margin: 4px">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="controls ">
                                                                <label>@lang('services.tax')</label>
                                                                <div class="position-relative has-icon-left"
                                                                    style="display: flex;align-items: center">
                                                                    <select name="tax[]" id="tax" class="form-control "
                                                                        multiple="multiple">

                                                                    </select>
                                                                    <a onclick="open_modal('add_tax_modal','add_tax_form')"
                                                                        href="#!" data-toggle="tooltip"
                                                                        title="@lang('role.add') @lang('services.new') @lang('services.tax')">
                                                                        <i class="fa fa-plus" style="margin: 4px">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('services.service')
                                                                    @lang('services.image')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="file" name="image" class="image_dropify"
                                                                        value="{{ asset($image) }}"
                                                                        data-default-file="{{ !empty($image) ? asset($image) : '' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($edit == 0)
                                                    <div class="float-right">
                                                        <button type="button" class="btn btn-primary ml-1"
                                                            id="add_service_form_btn">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Save</span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="float-right">
                                                        <button type="button" class="btn btn-primary ml-1"
                                                            id="edit_service_form_btn">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Update</span>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
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

    {{-- add unit --}}
    <div class="modal fade text-left" id="add_unit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.add') @lang('services.unit_of_measure')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_unit_form">
                        @csrf
                        <label>@lang('services.unit') @lang('role.name'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="@lang('services.unit') @lang('role.name')"
                                class="form-control" name="unit">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_unit_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end unit --}}

    {{-- add tax --}}
    <div class="modal fade text-left" id="add_tax_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.add') @lang('services.tax')</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_tax_form">
                        @csrf
                        <label>@lang('services.tax') @lang('role.name'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="@lang('services.tax') @lang('role.name')" class="form-control"
                                name="tax">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_tax_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end tax --}}
@section('javascript')
    <script>
        $('#edit_service_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_service_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.service.update_service') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#edit_service_form_btn', 'add_service_form')
                },
                success: function(data) {
                    // console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#edit_service_form_btn', 'add_service_form', 'Update')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#edit_service_form_btn', 'add_service_form', error,
                        'Update')
                }
            })
        })



        $('#add_service_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_service_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.service.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_service_form_btn', 'add_service_form')
                },
                success: function(data) {
                    // console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_service_form_btn', 'add_service_form')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_service_form_btn', 'add_service_form', error)
                }
            })
        })



        $('#add_tax_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_tax_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.tax.add_new_tax') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_tax_form_btn', 'add_tax_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_tax_form_btn', 'add_tax_form')
                        successMsg(data.message);
                        close_modal('add_tax_modal');
                        get_all_tax();
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_tax_form_btn', 'add_tax_form', error)
                }
            })
        })

        $('#add_unit_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_unit_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.unit.add_new_unit_of_measures') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_unit_form_btn', 'add_unit_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_unit_form_btn', 'add_unit_form')
                        successMsg(data.message);
                        close_modal('add_unit_modal');
                        get_all_unit_of_measures();
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_unit_form_btn', 'add_unit_form', error)
                }
            })
        })


        $(document).ready(function() {
            get_all_category();
            get_all_unit_of_measures()
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

                    $("#tax").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });


                    if ("{{ $edit == 1 }}") {
                        var tax = "{{ $tax }}";
                        tax = tax.split(',')
                        $('#tax').select2().val(tax).trigger('change')
                    }
                    $('#main_loader').hide()
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
                    $("#unit_of_measure").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });

                    if ("{{ $edit == 1 }}")
                        $('#unit_of_measure').select2("val", "{{ $unit_of_measure }}");

                    $('#main_loader').hide();
                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        }

        function get_all_category() {
            $.ajax({
                url: "{{ route('admin.category.get_all_category') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show();
                },
                success: function(data) {
                    // console.log(data)
                    $('#main_loader').hide();
                    var len = data.length;
                    $('#category_list').empty();

                    $('#category_list').append('<option value="">--Select--</option>');
                    for (var i = 0; i < len; i++) {
                        $('#category_list').append('<option value="' + data[i]['id'] + '">' + data[i]['name'] +
                            '</option>')
                    }

                    if ("{{ $edit == 1 }}") {
                        $('#category_list').val("{{ $category }}")
                    }

                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide();
                }
            })
        }
    </script>
@endsection

@endsection
