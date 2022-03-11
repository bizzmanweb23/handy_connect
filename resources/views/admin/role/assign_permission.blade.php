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
                                    @lang('role.permission')</h5>
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
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title text-capitalize">
                                        @lang('role.assign_permission')({{ $role->name }}):</h3>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ URL::signedRoute('admin.add.permission.update', $id) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">@lang('role.user')</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'user.view', in_array('user.view', $role_permissions), ['id' => 'colorCheckbox1']) !!}
                                                            {{-- <input type="checkbox" id="colorCheckbox1" name="permissions[]"
                                                                value="user.view"> --}}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox1">@lang('role.view')
                                                                @lang('role.user')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">
                                                            {{-- <input type="checkbox" id="colorCheckbox2" name="permissions[]"
                                                                value="user.add"> --}}
                                                            {!! Form::checkbox('permissions[]', 'user.add', in_array('user.add', $role_permissions), ['id' => 'colorCheckbox2']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox2">@lang('role.add')
                                                                @lang('role.user')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox3" name="permissions[]"
                                                                value="user.edit"> --}}
                                                            {!! Form::checkbox('permissions[]', 'user.edit', in_array('user.edit', $role_permissions), ['id' => 'colorCheckbox3']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox3">@lang('role.edit')
                                                                @lang('role.user')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox4" name="permissions[]"
                                                                value="user.delete"> --}}
                                                            {!! Form::checkbox('permissions[]', 'user.delete', in_array('user.delete', $role_permissions), ['id' => 'colorCheckbox4']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox4">@lang('role.delete')
                                                                @lang('role.user')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">@lang('role.role')</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'role.view', in_array('role.view', $role_permissions), ['id' => 'colorCheckbox5']) !!}
                                                            {{-- <input type="checkbox" id="colorCheckbox1" name="permissions[]"
                                                                value="user.view"> --}}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox5">@lang('role.view')
                                                                @lang('role.role')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">
                                                            {{-- <input type="checkbox" id="colorCheckbox2" name="permissions[]"
                                                                value="user.add"> --}}
                                                            {!! Form::checkbox('permissions[]', 'role.add', in_array('role.add', $role_permissions), ['id' => 'colorCheckbox6']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox6">@lang('role.add')
                                                                @lang('role.role')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox3" name="permissions[]"
                                                                value="user.edit"> --}}
                                                            {!! Form::checkbox('permissions[]', 'role.edit', in_array('role.edit', $role_permissions), ['id' => 'colorCheckbox7']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox7">@lang('role.edit')
                                                                @lang('role.role')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox4" name="permissions[]"
                                                                value="user.delete"> --}}
                                                            {!! Form::checkbox('permissions[]', 'role.delete', in_array('role.delete', $role_permissions), ['id' => 'colorCheckbox8']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox8">@lang('role.delete')
                                                                @lang('role.role')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">@lang('customer.customer')</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'customer.view', in_array('customer.view', $role_permissions), ['id' => 'colorCheckbox9']) !!}
                                                            {{-- <input type="checkbox" id="colorCheckbox1" name="permissions[]"
                                                                value="user.view"> --}}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox9">@lang('role.view')
                                                                @lang('customer.customer')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">
                                                            {{-- <input type="checkbox" id="colorCheckbox2" name="permissions[]"
                                                                value="user.add"> --}}
                                                            {!! Form::checkbox('permissions[]', 'customer.add', in_array('customer.add', $role_permissions), ['id' => 'colorCheckbox10']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox10">@lang('role.add')
                                                                @lang('customer.customer')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox3" name="permissions[]"
                                                                value="user.edit"> --}}
                                                            {!! Form::checkbox('permissions[]', 'customer.edit', in_array('customer.edit', $role_permissions), ['id' => 'colorCheckbox11']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox11">@lang('role.edit')
                                                                @lang('customer.customer')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox4" name="permissions[]"
                                                                value="user.delete"> --}}
                                                            {!! Form::checkbox('permissions[]', 'customer.delete', in_array('customer.delete', $role_permissions), ['id' => 'colorCheckbox12']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox12">@lang('role.delete')
                                                                @lang('customer.customer')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">@lang('services.company')</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'company.view', in_array('company.view', $role_permissions), ['id' => 'colorCheckbox13']) !!}
                                                            {{-- <input type="checkbox" id="colorCheckbox1" name="permissions[]"
                                                                value="user.view"> --}}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox13">@lang('role.view')
                                                                @lang('services.company')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">
                                                            {{-- <input type="checkbox" id="colorCheckbox2" name="permissions[]"
                                                                value="user.add"> --}}
                                                            {!! Form::checkbox('permissions[]', 'company.add', in_array('company.add', $role_permissions), ['id' => 'colorCheckbox14']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox14">@lang('role.add')
                                                                @lang('services.company')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox3" name="permissions[]"
                                                                value="user.edit"> --}}
                                                            {!! Form::checkbox('permissions[]', 'company.edit', in_array('company.edit', $role_permissions), ['id' => 'colorCheckbox15']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox15">@lang('role.edit')
                                                                @lang('services.company')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox4" name="permissions[]"
                                                                value="user.delete"> --}}
                                                            {!! Form::checkbox('permissions[]', 'company.delete', in_array('company.delete', $role_permissions), ['id' => 'colorCheckbox16']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox16">@lang('role.delete')
                                                                @lang('services.company')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">@lang('services.category')</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'category.view', in_array('category.view', $role_permissions), ['id' => 'colorCheckbox17']) !!}
                                                            {{-- <input type="checkbox" id="colorCheckbox1" name="permissions[]"
                                                                value="user.view"> --}}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox17">@lang('role.view')
                                                                @lang('services.category')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">
                                                            {{-- <input type="checkbox" id="colorCheckbox2" name="permissions[]"
                                                                value="user.add"> --}}
                                                            {!! Form::checkbox('permissions[]', 'category.add', in_array('category.add', $role_permissions), ['id' => 'colorCheckbox18']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox18">@lang('role.add')
                                                                @lang('services.category')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox3" name="permissions[]"
                                                                value="user.edit"> --}}
                                                            {!! Form::checkbox('permissions[]', 'category.edit', in_array('category.edit', $role_permissions), ['id' => 'colorCheckbox19']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox19">@lang('role.edit')
                                                                @lang('services.category')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox4" name="permissions[]"
                                                                value="user.delete"> --}}
                                                            {!! Form::checkbox('permissions[]', 'category.delete', in_array('category.delete', $role_permissions), ['id' => 'colorCheckbox20']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox20">@lang('role.delete')
                                                                @lang('services.category')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">@lang('services.service')</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'service.view', in_array('service.view', $role_permissions), ['id' => 'colorCheckbox21']) !!}
                                                            {{-- <input type="checkbox" id="colorCheckbox1" name="permissions[]"
                                                                value="user.view"> --}}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox21">@lang('role.view')
                                                                @lang('services.service')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">
                                                            {{-- <input type="checkbox" id="colorCheckbox2" name="permissions[]"
                                                                value="user.add"> --}}
                                                            {!! Form::checkbox('permissions[]', 'service.add', in_array('service.add', $role_permissions), ['id' => 'colorCheckbox22']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox22">@lang('role.add')
                                                                @lang('services.service')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox3" name="permissions[]"
                                                                value="user.edit"> --}}
                                                            {!! Form::checkbox('permissions[]', 'service.edit', in_array('service.edit', $role_permissions), ['id' => 'colorCheckbox23']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox23">@lang('role.edit')
                                                                @lang('services.service')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox4" name="permissions[]"
                                                                value="user.delete"> --}}
                                                            {!! Form::checkbox('permissions[]', 'service.delete', in_array('service.delete', $role_permissions), ['id' => 'colorCheckbox24']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox24">@lang('role.delete')
                                                                @lang('services.service')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">@lang('employee.employee')</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'employee.view', in_array('employee.view', $role_permissions), ['id' => 'colorCheckbox25']) !!}
                                                            {{-- <input type="checkbox" id="colorCheckbox1" name="permissions[]"
                                                                value="user.view"> --}}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox25">@lang('role.view')
                                                                @lang('employee.employee')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">
                                                            {{-- <input type="checkbox" id="colorCheckbox2" name="permissions[]"
                                                                value="user.add"> --}}
                                                            {!! Form::checkbox('permissions[]', 'employee.add', in_array('employee.add', $role_permissions), ['id' => 'colorCheckbox26']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox26">@lang('role.add')
                                                                @lang('employee.employee')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox3" name="permissions[]"
                                                                value="user.edit"> --}}
                                                            {!! Form::checkbox('permissions[]', 'employee.edit', in_array('employee.edit', $role_permissions), ['id' => 'colorCheckbox27']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox27">@lang('role.edit')
                                                                @lang('employee.employee')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {{-- <input type="checkbox" id="colorCheckbox4" name="permissions[]"
                                                                value="user.delete"> --}}
                                                            {!! Form::checkbox('permissions[]', 'employee.delete', in_array('employee.delete', $role_permissions), ['id' => 'colorCheckbox28']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox28">@lang('role.delete')
                                                                @lang('employee.employee')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">Admin CRM</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'admin_crm.view', in_array('admin_crm.view', $role_permissions), ['id' => 'colorCheckbox29']) !!}

                                                            <label class="text-capitalize"
                                                                for="colorCheckbox29">@lang('role.view')
                                                                @lang('crm.crm')</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary ">

                                                            {!! Form::checkbox('permissions[]', 'admin_crm.addLead', in_array('admin_crm.addLead', $role_permissions), ['id' => 'colorCheckbox30']) !!}
                                                            <label class="text-capitalize"
                                                                for="colorCheckbox30">@lang('role.add')
                                                                Lead</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'admin_crm.show', in_array('admin_crm.show', $role_permissions), ['id' => 'colorCheckbox31']) !!}
                                                            <label class="text-capitalize" for="colorCheckbox31">Show Lead
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'assign_sales_person', in_array('assign_sales_person', $role_permissions), ['id' => 'colorCheckbox32']) !!}
                                                            <label class="text-capitalize" for="colorCheckbox32">
                                                                Assign Sales Person</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'assign_field_verification', in_array('assign_field_verification', $role_permissions), ['id' => 'colorCheckbox33']) !!}
                                                            <label class="text-capitalize" for="colorCheckbox33">
                                                                Assign Field Verification</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'request_for_quotation', in_array('request_for_quotation', $role_permissions), ['id' => 'colorCheckbox34']) !!}
                                                            <label class="text-capitalize" for="colorCheckbox34">
                                                                Request For Quotation</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'create.quotation', in_array('create.quotation', $role_permissions), ['id' => 'colorCheckbox35']) !!}
                                                            <label class="text-capitalize" for="colorCheckbox35">
                                                                Create Quotation</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">Vendor CRM</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'vendor_crm.view', in_array('vendor_crm.view', $role_permissions), ['id' => 'colorCheckbox36']) !!}

                                                            <label class="text-capitalize"
                                                                for="colorCheckbox36">@lang('role.view')
                                                                @lang('crm.crm')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <h4 class="text-capitalize">Sales Person CRM</h4>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            {!! Form::checkbox('permissions[]', 'sales_person_crm.view', in_array('sales_person_crm.view', $role_permissions), ['id' => 'colorCheckbox37']) !!}

                                                            <label class="text-capitalize"
                                                                for="colorCheckbox37">@lang('role.view')
                                                                @lang('crm.crm')</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <input type="submit" value="@lang('role.save')" class="btn btn-primary">
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



@endsection
