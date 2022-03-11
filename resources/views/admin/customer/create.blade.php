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



                <div class="content-body">
                    <section class="users-edit">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab"
                                            data-toggle="tab" href="#account" aria-controls="account" role="tab"
                                            aria-selected="true">
                                            <i class="bx bx-user mr-25"></i>
                                            <span class="d-none d-sm-block">@lang('customer.individual')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                                            href="#information" aria-controls="information" role="tab"
                                            aria-selected="false">
                                            <i class='bx bxs-factory'></i>
                                            <span class="d-none d-sm-block">@lang('customer.company')</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab"
                                        role="tabpanel">
                                        <!-- users edit media object start -->
                                        <form id="individual_form">
                                            <input type="hidden" name="individual_form_submit" value="1">
                                            <div class="media mb-2">
                                                <a class="mr-2" href="javascript:void(0);">
                                                    <input type="file" name="image" class="image_dropify" data-height="64"
                                                        data-default-file="{{ asset('asset/admin/image/your-logo-here.jpg') }}">
                                                </a>
                                            </div>
                                            <!-- users edit media object ends -->
                                            <!-- users edit account form start -->

                                            @csrf
                                            <input type="hidden" name="for_individual" value="1">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Unique Id</label>
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
                                                            <label>Name</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Name">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>E-mail</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" class="form-control" name="email"
                                                                    placeholder="Email">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-mail-send"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Mobile</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="number" class="form-control" name="mobile"
                                                                    placeholder="Mobile">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-mobile"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Password</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="password" class="form-control"
                                                                    name="password" placeholder="Password">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Confirm Password</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="password" class="form-control"
                                                                    name="password_confirmation"
                                                                    placeholder="Confirm Password">
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
                                                            <label>Address</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="address"
                                                                    placeholder="Address">
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
                                                                    <label>State</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="state" placeholder="State">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bxs-city'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>Zip Code</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="zip_code" placeholder="zip code">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bx-map'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>Country</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="country" placeholder="Country">
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
                                                            <label>Website</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="web_site"
                                                                    placeholder="Website">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-desktop'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Tags</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="tags"
                                                                    placeholder="Tags">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-tag'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select class="form-control" aria-invalid="false">
                                                            <option>User</option>
                                                            <option>Staff</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1">Active</option>
                                                            <option value="0">Banned</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                        id="individual_form_btn">Save
                                                    </button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    <div class="tab-pane fade show" id="information" aria-labelledby="information-tab"
                                        role="tabpanel">
                                        <form id="company_form">
                                            @csrf
                                            <div class="media mb-2">
                                                <a class="mr-2" href="javascript:void(0);">
                                                    <input type="file" name="image" class="image_dropify" data-height="64"
                                                        data-default-file="{{ asset('asset/admin/image/your-logo-here.jpg') }}">
                                                </a>
                                            </div>
                                            <!-- users edit Info form start -->
                                            <input type="hidden" name="for_company_form_submit" value="2">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Unique Id</label>
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
                                                            <label>Name</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Name">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>E-mail</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" class="form-control" name="email"
                                                                    placeholder="Email">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-mail-send"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Mobile</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="number" class="form-control" name="mobile"
                                                                    placeholder="Mobile">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-mobile"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>GST Treatment</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control"
                                                                    name="gst_treatment" placeholder="GST Treatment">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-money'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Password</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="password" class="form-control"
                                                                    name="password" placeholder="Password">
                                                                <div class="form-control-position">
                                                                    <i class="bx bx-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Confirm Password</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="password" class="form-control"
                                                                    name="password_confirmation"
                                                                    placeholder="Confirm Password">
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
                                                            <label>Address</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="address"
                                                                    placeholder="Address">
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
                                                                    <label>State</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="state" placeholder="State">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bxs-city'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>Zip Code</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="zip_code" placeholder="zip code">
                                                                        <div class="form-control-position">
                                                                            <i class='bx bx-map'></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="controls">
                                                                    <label>Country</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control"
                                                                            name="country" placeholder="Country">
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
                                                            <label>Website</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="web_site"
                                                                    placeholder="Website">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-desktop'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Tags</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="tags"
                                                                    placeholder="Tags">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-tag'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>GST No</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" name="gst_no"
                                                                    placeholder="GST NO">
                                                                <div class="form-control-position">
                                                                    <i class='bx bx-money'></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select class="form-control" aria-invalid="false">
                                                            <option>User</option>
                                                            <option>Staff</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1">Active</option>
                                                            <option value="0">Banned</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"
                                                        id="company_form_btn">Save
                                                    </button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
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
        $('#individual_form_btn').click(function(e) {
            e.preventDefault();
            var form = $('#individual_form')[0];
            var data = new FormData(form);

            $.ajax({
                url: "{{ URL::signedRoute('admin.customer.store') }}",
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
                url: "{{ URL::signedRoute('admin.customer.store') }}",
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
