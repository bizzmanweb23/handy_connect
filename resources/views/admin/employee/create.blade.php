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
                                    @lang('employee.employee')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('employee.employee')
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
                                    <h3 class="box-title titlefix">@lang('employee.employee')</h3>
                                    <div class="box-tools float-right">
                                        {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                            @lang('role.add') @lang('services.service')
                                        </a> --}}
                                    </div>
                                </div>
                                <div class="box-body">
                                    <form id="add_employee_form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('role.name')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $name }}"
                                                                        placeholder=" @lang('role.name')">
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
                                                                <label>@lang('vendor.email')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="email" class="form-control" name="email"
                                                                        placeholder="@lang('vendor.email')"
                                                                        value="{{ $email }}">
                                                                    <div class="form-control-position">
                                                                        <i class="bx bx-mail-send"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('vendor.mobile')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="number" class="form-control"
                                                                        name="mobile" placeholder="@lang('vendor.mobile')"
                                                                        value="{{ $mobile }}">
                                                                    <div class="form-control-position">
                                                                        <i class="bx bx-mobile"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('vendor.password')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="password" class="form-control"
                                                                        name="password"
                                                                        placeholder="@lang('vendor.password')">
                                                                    <div class="form-control-position">
                                                                        <i class="bx bx-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('vendor.confirm')
                                                                    @lang('vendor.password')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="password" class="form-control"
                                                                        name="password_confirmation"
                                                                        placeholder="@lang('vendor.confirm') @lang('vendor.password')">
                                                                    <div class="form-control-position">
                                                                        <i class="bx bx-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>
                                                                    @lang('services.image')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="file" name="image" class="image_dropify"
                                                                        value=""
                                                                        data-default-file="{{ !empty($image) ? asset($image) : '' }}">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group ">
                                                            <div class="controls ">
                                                                <label>Designation</label>
                                                                <div class="position-relative has-icon-left"
                                                                    style="display: flex;align-items: center">
                                                                    <select name="designation" id="designation_list"
                                                                        class="form-control ">

                                                                    </select>
                                                                    <a onclick="open_modal('add_designation_modal','add_designation_form')"
                                                                        href="#!" data-toggle="tooltip"
                                                                        title="@lang('role.add') @lang('services.new') Position">
                                                                        <i class="fa fa-plus" style="margin: 4px">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>@lang('role.role')</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <select name="role" id="role_list"
                                                                        class="form-control ">

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                @if ($edit == 0)
                                                    <div class="float-right">
                                                        <button type="button" class="btn btn-primary ml-1"
                                                            id="add_employee_form_btn">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Save</span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="float-right">
                                                        <button type="button" class="btn btn-primary ml-1"
                                                            id="edit_employee_form_btn">
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


    {{-- add Designation --}}
    <div class="modal fade text-left" id="add_designation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">@lang('role.add') Designation</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_designation_form">
                        @csrf
                        <label>Designation @lang('role.name'): </label>
                        <div class="form-group">
                            <input type="text" placeholder="Designation @lang('role.name')" class="form-control"
                                name="designation">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" id="add_designation_form_btn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end Designation --}}

@section('javascript')
    <script>
        $(document).ready(function() {
            get_position_list()
            get_all_role();
        })

        function get_all_role() {
            $.ajax({
                url: "{{ URL::signedRoute('admin.role.get_all_role') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show()
                },
                success: function(data) {
                    // console.log(data)
                    $("#role_list").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });
                    if ("{{ $edit == 1 }}") {
                        $('#role_list').select2('val', "{{ !empty($role) ? $role->id : '' }}")
                    }

                    $('#main_loader').hide()
                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide()
                }
            })
        }

        function get_position_list() {
            $.ajax({
                url: "{{ URL::signedRoute('admin.employee.designation_list') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show()
                },
                success: function(data) {
                    $('#designation_list').empty();
                    $('#designation_list').append('<option value="">--Select--</option>')
                    $("#designation_list").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });

                    if ("{{ $edit == 1 }}") {
                        $('#designation_list').select2('val', "{{ !empty($data->designation_id) }}");
                    }

                    $('#main_loader').hide()
                }
            })
        }

        $('#add_designation_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_designation_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.employee.store_designation') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_designation_form_btn', 'add_designation_form')
                },
                success: function(data) {
                    // console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_designation_form_btn', 'add_designation_form')
                        successMsg(data.message);
                        get_position_list();
                        close_modal('add_designation_modal');
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_designation_form_btn', 'add_designation_form',
                        error)
                }
            })
        })




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
                        remove_after_ajax_call('#edit_employee_form_btn', 'add_employee_form', 'Update')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#edit_employee_form_btn', 'add_employee_form', error,
                        'Update')
                }
            })
        })



        $('#add_employee_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#add_employee_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.employee.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#add_employee_form_btn', 'add_employee_form')
                },
                success: function(data) {
                    // console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#add_employee_form_btn', 'add_employee_form')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error)
                    show_errors_when_ajax_call('#add_employee_form_btn', 'add_employee_form', error)
                }
            })
        })
    </script>
@endsection

@endsection
