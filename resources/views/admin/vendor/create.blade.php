@extends('admin.layouts.main')
@section('content')
    <style>
        .checkbox {
            position: relative;
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
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
                                    @lang('role.users')</h5>
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

                @php
                    if ($edit == 1) {
                        $id = $data->id;
                        if ($data->type == 'Individual') {
                            $unique_id = $data->vendor_unique_id;
                            $name = $data->name;
                            $email = $data->email;
                            $mobile = $data->mobile;
                            $address = $data->address;
                            $state = $data->state;
                            $zip_code = $data->zip_code;
                            $country = $data->country;
                            $service_id = $data->service_id;
                            $website = $data->website;
                            $gst_no = $data->gst_no;
                            $status = $data->status;
                            $logo = $data->logo == null ? 'asset/admin/image/your-logo-here.jpg' : '';
                            $type = $data->type;
                    
                            $name_company = '';
                            $email_company = '';
                            $mobile_company = '';
                            $address_company = '';
                            $state_company = '';
                            $zip_code_company = '';
                            $country_company = '';
                            $service_id_company = '';
                            $website_company = '';
                            $gst_no_company = '';
                            $status_company = '';
                            $logo_company = 'asset/admin/image/your-logo-here.jpg';
                        }
                        if ($data->type == 'Company') {
                            $unique_id = $data->vendor_unique_id;
                            $name_company = $data->name;
                            $email_company = $data->email;
                            $mobile_company = $data->mobile;
                            $address_company = $data->address;
                            $state_company = $data->state;
                            $zip_code_company = $data->zip_code;
                            $country_company = $data->country;
                            $service_id_company = $data->service_id;
                            $website_company = $data->website;
                            $gst_no_company = $data->gst_no;
                            $status_company = $data->status;
                            $logo_company = $data->logo == null ? 'asset/admin/image/your-logo-here.jpg' : '';
                            $type = $data->type;
                    
                            $name = '';
                            $email = '';
                            $mobile = '';
                            $address = '';
                            $state = '';
                            $zip_code = '';
                            $country = '';
                            $service_id = '';
                            $website = '';
                            $gst_no = '';
                            $status = '';
                            $logo = 'asset/admin/image/your-logo-here.jpg';
                        }
                    }
                    if ($edit == 0) {
                        $id = '';
                        $name = '';
                        $email = '';
                        $mobile = '';
                        $address = '';
                        $state = '';
                        $zip_code = '';
                        $country = '';
                        $service_id = '';
                        $website = '';
                        $gst_no = '';
                        $status = '';
                        $logo = 'asset/admin/image/your-logo-here.jpg';
                        $type = '';
                    
                        $name_company = '';
                        $email_company = '';
                        $mobile_company = '';
                        $address_company = '';
                        $state_company = '';
                        $zip_code_company = '';
                        $country_company = '';
                        $service_id_company = '';
                        $website_company = '';
                        $gst_no_company = '';
                        $status_company = '';
                        $logo_company = 'asset/admin/image/your-logo-here.jpg';
                    }
                @endphp


                <div class="content-body">
                    <section class="users-edit">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center {{ $type == 'Individual' ? 'active' : '' }} active "
                                            id="account-tab" data-toggle="tab" href="#account" aria-controls="account"
                                            role="tab" aria-selected="true">
                                            <i class="bx bx-user mr-25"></i>
                                            <span class="d-none d-sm-block">@lang('customer.individual')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center {{ $type == 'Company' ? 'active' : '' }}"
                                            id="information-tab" data-toggle="tab" href="#information"
                                            aria-controls="information" role="tab" aria-selected="false">
                                            <i class='bx bxs-factory'></i>
                                            <span class="d-none d-sm-block">@lang('customer.company')</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane  fade show {{ $type == 'Individual' ? 'active' : '' }} active"
                                        id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <form id="individual_form">
                                            <input type="hidden" name="individual_form_submit" value="1">
                                            <div class="media mb-2">
                                                <a class="mr-2" href="javascript:void(0);">
                                                    <input type="file" name="image" class="image_dropify" data-height="64"
                                                        data-default-file="{{ asset($logo) }}">
                                                </a>
                                            </div>
                                            <!-- users edit media object ends -->
                                            <!-- users edit account form start -->

                                            @csrf
                                            <input type="hidden" name="for_individual" value="1">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('services.unique_id')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="unique_id"
                                                                    value="{{ $unique_id }}" readonly>
                                                                <div class="form-control-position">
                                                                    <i class='bx bxs-id-card'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('role.name')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="@lang('role.name')"
                                                                    value="{{ $name }}">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                                <input type="number" class="form-control" name="mobile"
                                                                    placeholder="@lang('vendor.mobile')"
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
                                                                    name="password" placeholder="@lang('vendor.password')">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.confirm') @lang('vendor.password')</label>
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
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.address')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="address"
                                                                    placeholder="@lang('vendor.address')"
                                                                    value="{{ $address }}">
                                                                <div class="form-control-position">
                                                                    <i class='bx bxs-landmark'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>@lang('vendor.state')</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="state" placeholder="@lang('vendor.state')"
                                                                            value="{{ $state }}">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bxs-city'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>@lang('vendor.zip_code')</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="zip_code"
                                                                            placeholder="@lang('vendor.zip_code')"
                                                                            value="{{ $zip_code }}">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bx-map'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>@lang('vendor.country')</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="country"
                                                                            placeholder="@lang('vendor.country')"
                                                                            value="{{ $country }}">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bxs-flag-alt'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.website')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="web_site"
                                                                    placeholder="Website" value="{{ $website }}">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-desktop'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('services.service')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <select name="service[]" class="form-control service_list"
                                                                    multiple id="individual_service">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>@lang('role.role')</label>
                                                        <select class="form-control role_list" aria-invalid="false"
                                                            name="role" id="individual_role">

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>@lang('vendor.status')</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1" {{ $status == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                            <option value="0" {{ $status == 0 ? 'selected' : '' }}>Banned
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    @if ($edit == 1)
                                                        <button type="submit"
                                                            class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                            id="edit_individual_form_btn">@lang('role.update')
                                                        </button>
                                                    @else
                                                        <button type="submit"
                                                            class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                            id="individual_form_btn">@lang('role.save')
                                                        </button>
                                                    @endif

                                                    <button type="reset"
                                                        class="btn btn-light">@lang('role.cancel')</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    <div class="tab-pane fade show {{ $type == 'Company' ? 'active' : '' }}"
                                        id="information" aria-labelledby="information-tab" role="tabpanel">
                                        <form id="company_form">
                                            @csrf
                                            <div class="media mb-2">
                                                <a class="mr-2" href="javascript:void(0);">
                                                    <input type="file" name="image" class="image_dropify" data-height="64"
                                                        data-default-file="{{ asset($logo_company) }}">
                                                </a>
                                            </div>
                                            <!-- users edit Info form start -->
                                            <input type="hidden" name="for_company_form_submit" value="2">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('services.unique_id')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="unique_id"
                                                                    value="{{ $unique_id }}">
                                                                <div class="form-control-position">
                                                                    <i class='bx bxs-id-card'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('role.name')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="@lang('role.name')"
                                                                    value="{{ $name_company }}">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.email')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" class="form-control" name="email"
                                                                    placeholder="@lang('vendor.email')"
                                                                    value="{{ $email_company }}">
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
                                                                <input type="number" class="form-control" name="mobile"
                                                                    placeholder="@lang('vendor.mobile')"
                                                                    value="{{ $mobile_company }}">
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
                                                                    name="password" placeholder="@lang('vendor.password')">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.confirm') @lang('vendor.password')</label>
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
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.address')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="address"
                                                                    placeholder="@lang('vendor.address')"
                                                                    value="{{ $address_company }}">
                                                                <div class="form-control-position">
                                                                    <i class='bx bxs-landmark'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>@lang('vendor.state')</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="state" placeholder="@lang('vendor.state')"
                                                                            value="{{ $state_company }}">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bxs-city'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>@lang('vendor.zip_code')</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="zip_code"
                                                                            placeholder="@lang('vendor.zip_code')"
                                                                            value="{{ $zip_code_company }}">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bx-map'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>@lang('vendor.country')</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="country"
                                                                            placeholder="@lang('vendor.country')"
                                                                            value="{{ $country_company }}">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bxs-flag-alt'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('services.service')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <select name="service[]" class="form-control service_list"
                                                                    multiple id="company_service">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.website')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="web_site"
                                                                    placeholder="@lang('vendor.website')"
                                                                    value="{{ $website_company }}">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-desktop'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>@lang('vendor.GST_no')</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="gst_no"
                                                                    placeholder="GST NO" value="{{ $gst_no_company }}">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-money'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>@lang('role.role')</label>
                                                        <select class="form-control role_list" aria-invalid="false"
                                                            name="role" id="company_role">

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>@lang('vendor.status')</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1" {{ $status == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                            <option value="0" {{ $status == 0 ? 'selected' : '' }}>Banned
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                        id="company_form_btn">@lang('role.save')
                                                    </button>
                                                    <button type="reset"
                                                        class="btn btn-light">@lang('role.cancel')</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit Info form ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>


@section('javascript')
    <script>
        $('#edit_individual_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#individual_form')[0];
            var data = new FormData(form);

            $.ajax({
                url: "{{ URL::signedRoute('admin.vendor.update_vendor') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#edit_individual_form_btn', 'individual_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#edit_individual_form_btn', 'individual_form', 'Update')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error);
                    show_errors_when_ajax_call('#edit_individual_form_btn', 'individual_form', error,
                        'Update')
                }
            })
        });


        $(document).ready(function() {
            get_all_service()
            get_all_role()
        });

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
                    $(".role_list").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });

                    if ("{{ $edit == 1 }}") {
                        if ("{{ $type == 'Company' }}") {
                            $('#company_role').select2('val', "{{ !empty($role) ? $role->id : '' }}")
                        }
                        if ("{{ $type == 'Individual' }}") {
                            $('#individual_role').select2('val', "{{ !empty($role) ? $role->id : '' }}")
                        }
                    }

                    $('#main_loader').hide()
                },
                error: function(error) {
                    console.log(error)
                    $('#main_loader').hide()
                }
            })
        }

        function get_all_service() {
            $.ajax({
                url: "{{ route('admin.vendor.get_all_service') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show()
                },
                success: function(data) {
                    $(".service_list").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data,
                        placeholder: "Search",
                    });

                    if ("{{ $edit == 1 }}") {
                        if ("{{ $type == 'Company' }}") {
                            var service = "{{ $service_id_company }}";
                            service = service.split(',')
                            $('#company_service').select2().val(service).trigger('change')
                        }
                        if ("{{ $type == 'Individual' }}") {
                            var service = "{{ $service_id }}";
                            service = service.split(',')
                            $('#individual_service').select2().val(service).trigger('change')
                        }
                    }

                    $('#main_loader').hide()
                },
                error: function(error) {
                    $('#main_loader').hide()
                    console.log(error)
                }
            })
        }


        $('#individual_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#individual_form')[0];
            var data = new FormData(form);

            $.ajax({
                url: "{{ URL::signedRoute('admin.vendor.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#individual_form_btn', 'individual_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#individual_form_btn', 'individual_form')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error);
                    show_errors_when_ajax_call('#individual_form_btn', 'individual_form', error)
                }
            })
        });

        $('#company_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#company_form')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{ URL::signedRoute('admin.vendor.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    show_when_ajax_call('#company_form_btn', 'company_form')
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 'success') {
                        remove_after_ajax_call('#company_form_btn', 'company_form')
                        successMsg(data.message);

                        setTimeout(() => {
                            window.location.href = data.url
                        }, 1000);
                    }
                },
                error: function(error) {
                    console.log(error);
                    show_errors_when_ajax_call('#company_form_btn', 'company_form', error)
                }
            })
        })
    </script>
@endsection

@endsection
