<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\JobPosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('employee.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('employee.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $edit = 0;
        return view('admin.employee.create')->with('edit', $edit);
    }

    public function get_all_employee()
    {
        if (!auth()->user()->can('employee.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }

        $data = DB::table('employees')->join('job_positions', 'job_positions.id', '=', 'employees.designation_id')
            ->select('employees.*', 'job_positions.job_name');
        if (Auth::user()->user_type == 'Admin') {
            $data->get();
        } else {
            $data->where('employees.vendor_id', Auth::user()->vendor_id)->get();
        }
        return DataTables::of($data)
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('mobile', function ($row) {
                return $row->mobile;
            })
            ->addColumn('designation', function ($row) {
                return $row->job_name;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if (auth()->user()->can('employee.edit'))
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="' . URL::signedRoute('admin.employee.show', $row->id) . '"  data-toggle="tooltip" title="' . __('role.edit') . '"> <i class="las la-edit"></i></a>';
                if (auth()->user()->can('employee.delete'))
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('role.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['name', 'action'])->make(true);
    }


    public function get_employee()
    {
        $employees = DB::table('employees');
        if (Auth::user()->user_type == 'Admin') {
            $employees->where('designation_id', 2);
            $data =  $employees->where('vendor_id', null)->get();
        } else {
            $employees->where('designation_id', 2);
            $data = $employees->where('vendor_id', Auth::user()->vendor_id)->get();
        }
        $new = array();
        foreach ($data as $item) {
            $new[] = ['id' => $item->id, 'text' => $item->name];
        }

        echo json_encode($new);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('employee.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:employees,email',
            'mobile'    => 'required|numeric',
            'password'  => 'required|confirmed',
            'designation'   => 'required',
            'role'          => 'required'
        ]);

        $request->validate([
            'email' => 'required|unique:users,email'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image'
            ]);

            $image = $request->image->storeAs('Employee_image', $request->name . date('d_M_y_s') . '.' . $request->image->extension());
        }
        $user = User::create([
            'user_type' => 'Employee',
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'vendor_id' => Auth::user()->vendor_id
        ]);

        $employee = Employee::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
            'password'  => Hash::make($request->password),
            'vendor_id' => Auth::user()->vendor_id,
            'user_id'   => $user->id,
            'image'     => $image,
            'designation_id' => $request->designation
        ]);


        // give role to user
        $user = User::find($user->id);
        $role = Role::find($request->role);
        $user->assignRole($role->name);


        echo json_encode(['status' => 'success', 'message' => __('employee.employee') . ' ' . __('customer.add_successfully'), 'url' => URL::signedRoute('admin.employee.index')]);
    }

    public function update_employee(Request $request)
    {
        if (!auth()->user()->can('employee.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }

        $request->validate([
            'id'        => 'exists:employees,id',
            'name'      => 'required',
            'email'     => 'required|unique:employees,email,' . $request->id,
            'mobile'    => 'required|numeric',
            'password'  => 'required|confirmed',
            'designation'   => 'required'
        ]);

        $old = Employee::find($request->id);

        $request->validate([
            'email' => 'required|unique:users,email,' . $old->user_id
        ]);

        $image = $old->image;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image'
            ]);

            File::delete($old->image);
            $image = $request->image->storeAs('Employee_image', $request->name . date('d_M_y_s') . '.' . $request->image->extension());
        }

        $user = User::find($old->user_id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        $employee = Employee::find($request->id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
            'password'  => Hash::make($request->password),
            'image'     => $image,
            'designation_id'   => $request->designation
        ]);

        // give role to user
        // give role to user
        $user = User::find($old->user_id);
        $role_id = $request->input('role');
        $user_role = $user->roles->first();
        $previous_role = !empty($user_role->id) ? $user_role->id : 0;
        if ($previous_role != $role_id) {
            if (!empty($previous_role)) {
                $user->removeRole($user_role->name);
            }
            $role = Role::findOrFail($role_id);
            $user->assignRole($role->name);
        }

        echo json_encode(['status' => 'success', 'message' => __('employee.employee') . ' ' . __('services.update_successfully'), 'url' => URL::signedRoute('admin.employee.index')]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('employee.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $edit = 1;
        $data = Employee::find($id);

        $user = User::find($data->user_id);
        $role = Role::where('name', $user->getRoleNames())->first();

        return view('admin.employee.create')->with(['edit' => $edit, 'data' => $data, 'role' => $role]);
    }


    public function delete()
    {
        if (!auth()->user()->can('employee.delete')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $data = Employee::find(request()->id);
        File::delete($data->image);
        User::find($data->user_id)->delete();
        $data->delete();

        echo json_encode(['status' => 'success', 'message' => __('employee.employee') . ' ' . __('services.delete_successfully')]);
    }


    public function designation_list()
    {
        $data = array();
        foreach (JobPosition::all() as $item) {
            $data[] = [
                'id'    => $item->id,
                'text'  => $item->job_name
            ];
        }

        echo json_encode($data);
    }

    public function store_designation(Request $request)
    {
        $request->validate([
            'designation' => 'required|unique:job_positions,job_name',
        ], [
            'designation.required' => __('services.please_select') . ' ' . 'Designation'
        ]);

        JobPosition::create([
            'job_name'      => $request->designation,
            'created_by'    => Auth::user()->id,
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Designation' . ' ' . __('customer.add_successfully')]);
    }


    public function sales_person_list()
    {
        $employees = DB::table('employees');
        if (Auth::user()->user_type == 'Admin') {
            $employees->where('designation_id', 1);
            $data =  $employees->where('vendor_id', null)->get();
        } else {
            $employees->where('designation_id', 1);
            $data = $employees->where('vendor_id', Auth::user()->vendor_id)->get();
        }
        $new = array();
        foreach ($data as $item) {
            $new[] = ['id' => $item->id, 'text' => $item->name];
        }
        echo json_encode($new);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}