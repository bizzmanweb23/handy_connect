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
                                <h5 class="content-header-title float-left pr-1 mb-0">@lang('role.roles')</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active">@lang('role.list')
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header with-border">
                                    <h3 class="card-title">@lang('role.role')</h3>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @php
                                            $value = '';
                                            if ($edit == 1) {
                                                $value = $data;
                                            }
                                        @endphp
                                        <form id="save_role_form">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('role.name')</label><small
                                                    class="req">
                                                    *</small>
                                                <input autofocus="" id="name" name="name" placeholder="" type="text"
                                                    class="form-control"
                                                    value="{{ $value != '' ? $value->name : '' }}" />
                                                <span class="text-danger"></span>
                                                <input type="hidden" name="edit" value="{{ $edit }}">
                                                <input type="hidden" name="id"
                                                    value="{{ $value != '' ? $value->id : '' }}">
                                            </div>
                                            <div class="box-footer p-2">
                                                <button type="submit" class="btn btn-info float-right"
                                                    id="save_role_btn">@lang('role.save')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card ">
                                <div class="card-header with-border">
                                    <h3 class="card-title">@lang('role.role')</h3>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="download_label">@lang('role.role') @lang('role.list')</div>
                                        <table class="example" id="role_table">
                                            <thead>
                                                <tr>
                                                    <th>@lang('role.role')</th>

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
        </div>
    </body>

    {{-- delete modal --}}
    <!-- delete Modal -->
    <div id="role_delete-modal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6 text-capitalize">@lang('role.delete_confirmation')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mt-1">@lang('role.are_you_sure_to_delete_this?')</p>
                    <button type="button" class="btn btn-link mt-2" data-dismiss="modal">@lang('role.cancel')</button>
                    <a href="" id="role_delete-link" class="btn btn-primary mt-2">@lang('role.delete')</a>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    {{-- end delete modal --}}


@section('javascript')
    <script>
        function role_delete_modal(id) {
            $('#role_delete-modal').modal('show');
            $("#role_delete-link").attr("href", id);
        }

        // delete logic
        $('#role_delete-link').click(function(e) {

            e.preventDefault();
            $.ajax({
                url: "{{ URL::signedRoute('admin.role.delete') }}",
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: $(this).attr('href')
                },
                success: function(data) {
                    $('#role_delete-modal').modal('hide');
                    if (data.status) {
                        successMsg(data.message)
                    }
                    role.ajax.reload();
                },
                error: function(error) {
                    console.log(error)
                    if (error.status == 403) {
                        var err = error.responseJSON.message;
                        errorMsg(err);
                    }
                }
            })
        });

        $('#save_role_btn').click(function(e) {
            e.preventDefault();
            var form = $('#save_role_form')[0];
            var data = new FormData(form);
            $(this).text("Processing...");
            $(this).prop("disabled", true);
            $.ajax({
                url: "{{ URL::signedRoute('admin.role.store') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == 'success') {
                        successMsg(data.message);
                        role.ajax.reload();
                        $('#save_role_form')[0].reset();

                        if (data.url) {
                            window.location.href = data.url;
                        }

                    }
                    $('#save_role_btn').text("Save");
                    $('#save_role_btn').prop("disabled", false);
                },
                error: function(error) {
                    console.log(error)

                    $('#save_role_btn').text("Save");
                    $('#save_role_btn').prop("disabled", false);

                    if (error.status == 422) {
                        var err = error.responseJSON.errors;
                        var message = "";
                        $.each(err, function(index, value) {
                            message += value + '<br>';
                        });
                        errorMsg(message);
                    }
                }
            })

        });


        $(document).ready(function() {
            role = $('#role_table').DataTable({
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
                    url: "{{ route('admin.role.list') }}",
                    type: 'get',

                },
                columns: [{
                        data: 'name',
                        name: 'name'
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
