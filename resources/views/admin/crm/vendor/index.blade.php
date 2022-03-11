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
                                    @lang('crm.crm')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('crm.crm')
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
                                    <h3 class="box-title titlefix"> @lang('crm.crm')</h3>

                                    <div class="box-tools float-right">
                                        {{-- @can('employee.add') --}}
                                        <a href="{{ URL::signedRoute('admin.crm.create') }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                            @lang('crm.create')
                                        </a>
                                        {{-- @endcan --}}
                                    </div>

                                </div>
                                <div class="box-body">

                                    <div class="row flex-row">
                                        <div class="col-sm-6 col-md-4 col-xl-3 box" style="margin: 20px"
                                            id="get_all_stage_one_data">
                                            <h4>New</h4>
                                            {{-- <a href="">
                                                <div class="box box-primary">
                                                    <div class="box-body">
                                                        <strong>Debasis</strong><br>
                                                        <strong>Debasis@gmail.com</strong>

                                                    </div>
                                                </div>
                                            </a> --}}

                                        </div>

                                        <div class="col-sm-6 col-md-4 col-xl-3 box" style="margin: 20px"
                                            id="get_field_verification">
                                            <h4>Field verification </h4>
                                            {{-- <div class=" box box-primary">
                                                <div class="box-body">
                                                    <a href="">
                                                        <strong>$111.00</strong><br>
                                                        <strong>Debasis</strong><br>
                                                        <strong>Debasis@gmail.com</strong>
                                                    </a>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="col-sm-6 col-md-4 col-xl-3 box" style="margin: 20px"
                                            id="get_all_assign_vendor">
                                            <h4>Assign Vendor </h4>
                                            {{-- <div class=" box box-primary">
                                                <div class="box-body">
                                                    <a href="">
                                                        <strong>$111.00</strong><br>
                                                        <strong>Debasis</strong><br>
                                                        <strong>Debasis@gmail.com</strong>
                                                    </a>
                                                </div>
                                            </div> --}}
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




@section('javascript')
    <script>
        $(document).ready(function() {
            get_crm_data()
        });

        function get_crm_data() {
            $.ajax({
                url: "{{ URL::signedRoute('admin.vendor_crm.get_vendor_crm') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#main_loader').show()
                },
                success: function(data) {
                    console.log(data)
                    var len = data.length;
                    for (var i = 0; i < len; i++) {
                        var url = "{{ route('admin.vendor_crm.show_vendor_crm', ':id') }}";
                        url = url.replace(':id', data[i]['id'])
                        if (data[i]['stage'] == 1) {
                            $('#get_all_stage_one_data').append('<a href="' + url + '">' +
                                '<div class="box box-primary">' +
                                '<div class="box-body">' +
                                '<strong>' + data[i]['crm_unique_id'] + '</strong><br>' +
                                '<strong>' + data[i]['name'] + '</strong><br>' +
                                '<strong>' + data[i]['email'] + '</strong>' +

                                '</div>' +
                                '</div>' +
                                '</a>')
                        }
                        if (data[i]['stage'] == 2) {
                            $('#get_field_verification').append('<a href="' + url + '">' +
                                '<div class="box box-primary">' +
                                '<div class="box-body">' +
                                '<strong>' + data[i]['crm_unique_id'] + '</strong><br>' +
                                '<strong>' + data[i]['name'] + '</strong><br>' +
                                '<strong>' + data[i]['email'] + '</strong>' +

                                '</div>' +
                                '</div>' +
                                '</a>')
                        }
                        if (data[i]['stage'] == 3) {
                            $('#get_all_assign_vendor').append('<a href="' + url + '">' +
                                '<div class="box box-primary">' +
                                '<div class="box-body">' +
                                '<strong>' + data[i]['crm_unique_id'] + '</strong><br>' +
                                '<strong>' + data[i]['name'] + '</strong><br>' +
                                '<strong>' + data[i]['email'] + '</strong>' +

                                '</div>' +
                                '</div>' +
                                '</a>')
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


        $('#main_delete_link').click(function(e) {
            e.preventDefault();
            delete_modal_selected_data("{{ URL::signedRoute('admin.employee.delete') }}", $(this).attr('href'),
                "{{ csrf_token() }}");
            employee_list.ajax.reload();
        });
    </script>
@endsection

@endsection
