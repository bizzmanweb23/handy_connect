<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('role.view')) {
            abort(403, 'Unauthorized action.');
        }
        $edit = 0;
        return view('admin.role.index')->with(compact('edit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('role.view')) {
            abort(403, 'Unauthorized action.');
        }
        if (request()->ajax()) {
            $role = DB::table('roles');
            return DataTables::of($role)
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    if (!$row->is_default) {
                        if (auth()->user()->can('role.edit')) {
                            $action .= '<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="' . URL::signedRoute('admin.role.show', $row->id) . '"  data-toggle="tooltip" title="' . __('role.assign_permission') . '"> <i class="las la-tag"></i></a>';
                            $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="' . URL::signedRoute('admin.role.edit', $row->id) . '"  data-toggle="tooltip" title="' . __('role.edit') . '"> <i class="las la-edit"></i></a>';
                        }
                        if (auth()->user()->can('role.delete'))
                            $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('role.delete') . '" onclick="role_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                    }
                    return $action;
                })
                ->rawColumns(['name', 'action'])->make(true);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->canany(['role.add', 'role.edit'])) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required|unique:roles,name',
            'id'   => $request->edit == 1 ? 'required' : ''
        ]);

        if ($request->edit == 1) {
            DB::table('roles')->where('id', $request->id)->update([
                'name' => $request->name
            ]);
            $data = ['status' => 'success', 'message' => __('role.role_update'), 'url' => URL::signedRoute('admin.role.index')];
        } else {
            Artisan::call('permission:create-role', ["name" => $request->name]);
            $data = ['status' => 'success', 'message' => __('role.role_create')];
        }

        echo json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('role.view')) {
            abort(403, 'Unauthorized action.');
        }
        $role = Role::with(['permissions'])
            ->find($id);
        $role_permissions = [];
        foreach ($role->permissions as $role_perm) {
            $role_permissions[] = $role_perm->name;
        }
        return view('admin.role.assign_permission')->with(compact('id', 'role_permissions', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('role.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $edit = 1;
        $data = DB::table('roles')->where('id', $id)->first();
        return view('admin.role.index')->with(compact('edit', 'data'));
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
        if (!auth()->user()->can('role.edit')) {
            abort(403, 'Unauthorized action.');
        }
        $role = Role::findOrFail($id);
        $permissions = $request->permissions;
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        return redirect(URL::signedRoute('admin.role.index'))->with('status', __('role.permission_add'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        if (!auth()->user()->can('role.delete')) {
            abort(403, 'Unauthorized action.');
        }
        $role = Role::find(request()->id);
        if (!$role->is_default || $role->name != 'Admin') {
            $role->delete();
            DB::table('role_has_permissions')->where('role_id', request()->id)->delete();
            $output = [
                'status' => true,
                'message' => __('role.role_delete')
            ];
        } else {
            $output = [
                'status' => false,
                'message' => __('role.role_is_default')
            ];
        }
        echo json_encode($output);
    }

    public function get_all_role()
    {
        $data = DB::table('roles');
        if (Auth::user()->user_type == 'Admin') {
            $data = $data->get();
        } else {
            $data = $data->where('is_default', 0)->get();
        }
        $new_role = array();
        foreach ($data as $item) {
            $new_role[] = ['id' => $item->id, 'text' => $item->name];
        }
        echo json_encode($new_role);
    }
}