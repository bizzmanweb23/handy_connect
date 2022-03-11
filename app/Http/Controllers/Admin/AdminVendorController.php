<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class AdminVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unique_id = Vendor::orderBy('id', 'desc')->first();
        $number = str_replace('HCV', '', $unique_id ? $unique_id->vendor_unique_id  : 0);
        if ($number == 0) {
            $number = 'HCV0000001';
        } else {
            $number = "HCV" . sprintf("%07d", $number + 1);
        }
        $edit = 0;
        return view('admin.vendor.create')->with(['unique_id' => $number, 'edit' => $edit]);
    }

    public function get_all_service()
    {
        $data = Service::all();
        $new_data = array();
        foreach ($data as $item) {
            $new_data[] = ['id' => $item->id, 'text' => $item->service_name];
        }
        echo json_encode($new_data);
    }

    public function get_all_vendor()
    {
        $data = Vendor::all();
        return DataTables::of($data)
            ->addColumn('vendor_unique_id', function ($row) {
                return $row->vendor_unique_id;
            })
            ->addColumn('type', function ($row) {
                return $row->type;
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('mobile', function ($row) {
                return $row->mobile;
            })
            ->addColumn('service', function ($row) {
                foreach (explode(',', $row->service_id) as $item) {
                    $service = Service::find($item);
                    $service_data[] = $service->service_name;
                }
                return  $service_data;
            })
            ->addColumn('logo', function ($row) {
                if ($row->logo == null)
                    $logo = asset('asset/admin/image/your-logo-here.jpg');
                else
                    $logo = asset($row->logo);
                return "<img src='" . $logo . "'  width='40'>";
            })
            ->addColumn('action', function ($row) {
                $action = '';

                $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="' . URL::signedRoute('admin.vendor.show', $row->id) . '"  data-toggle="tooltip" title="' . __('role.edit') . '"> <i class="las la-edit"></i></a>';
                $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('role.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['vendor_unique_id', 'logo', 'action'])->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unique_id'     => 'required|unique:vendors,vendor_unique_id',
            'name'          => 'required|max:20',
            'email'         => 'required|unique:vendors,email',
            'mobile'        => 'required|numeric',
            'password'      => 'required|confirmed',
            'address'       => 'required',
            'state'         => 'required',
            'zip_code'      => 'required',
            'country'       => 'required',
            'service'       => 'required',
            'role'          => 'required'
        ]);
        $request->validate([
            'email' => 'required|unique:users,email'
        ]);

        $user = User::create([
            'user_type' => 'Vendor',
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        if ($request->individual_form_submit == 1) {
            $type = "Individual";
        }

        if ($request->for_company_form_submit == 2) {
            $type = "Company";
        }

        $logo = null;
        if ($request->hasFile('image'))
            $logo = $request->image->storeAs('vendor_Logo', $request->name . date('d_M_y_s') . '.' . $request->image->extension());
        $service = array();
        foreach ($request->service as $item) {
            $service[] = $item;
        }

        $unique_id = Vendor::orderBy('id', 'desc')->first();
        $number = str_replace('HCV', '', $unique_id ? $unique_id->vendor_unique_id  : 0);
        if ($number == 0) {
            $number = 'HCV0000001';
        } else {
            $number = "HCV" . sprintf("%07d", $number + 1);
        }

        $vendor = Vendor::create([
            'vendor_unique_id'      => $number,
            'user_id'               => $user->id,
            'type'                  => $type,
            'logo'                  => $logo,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'mobile'                => $request->mobile,
            'password'              => Hash::make($request->password),
            'service_id'            => implode(',', $service),
            'address'               => $request->address,
            'state'                 => $request->state,
            'zip_code'              => $request->zip_code,
            'country'               => $request->country,
            'website'               => $request->web_site,
            'gst_no'                => $request->gst_no,
            'status'                => $request->status
        ]);

        //Update user with business id
        $user->vendor_id = $vendor->id;
        $user->save();

        // give role to user
        $user = User::find($user->id);
        $role = Role::find($request->role);
        $user->assignRole($role->name);

        echo json_encode(['status' => 'success', 'message' => __('vendor.vendor') . ' ' . __('customer.add_successfully'), 'url' => URL::signedRoute('admin.vendor.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edit = 1;
        $data = Vendor::find($id);
        $user = User::find($data->user_id);
        $role = Role::where('name', $user->getRoleNames())->first();
        return view('admin.vendor.create')->with(['edit' => $edit, 'data' => $data, 'role' => $role]);
    }

    public function delete()
    {
        $data = Vendor::find(request()->id);
        File::delete($data->logo);
        User::find($data->user_id)->delete();
        $data->delete();
        echo json_encode(['status' => 'success', 'message' => __('vendor.vendor') . ' ' . __('role.delete_confirmation')]);
    }

    public function update_vendor(Request $request)
    {
        $request->validate([
            'id'            => 'required|exists:vendors,id',
            'name'          => 'required|max:20',
            'email'         => 'required|unique:vendors,email,' . $request->id,
            'mobile'        => 'required|numeric',
            'password'      => 'required|confirmed',
            'address'       => 'required',
            'state'         => 'required',
            'zip_code'      => 'required',
            'country'       => 'required',
            'service'       => 'required',
            'role'          => 'required',
        ]);

        $old = Vendor::find($request->id);

        $request->validate([
            'email' => 'required|unique:users,email,' . $old->user_id
        ]);


        User::find($old->user_id)->update([
            'user_type' => 'Vendor',
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($request->individual_form_submit == 1) {
            $type = "Individual";
        }

        if ($request->for_company_form_submit == 2) {
            $type = "Company";
        }

        $logo = $old->logo;
        if ($request->hasFile('image'))
            $logo = $request->image->storeAs('vendor_Logo', $request->name . date('d_M_y_s') . '.' . $request->image->extension());
        $service = array();
        foreach ($request->service as $item) {
            $service[] = $item;
        }

        $number = Vendor::find($request->id);

        Vendor::find($request->id)->update([
            'type'                  => $type,
            'logo'                  => $logo,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'mobile'                => $request->mobile,
            'password'              => Hash::make($request->password),
            'service_id'            => implode(',', $service),
            'address'               => $request->address,
            'state'                 => $request->state,
            'zip_code'              => $request->zip_code,
            'country'               => $request->country,
            'website'               => $request->web_site,
            'gst_no'                => $request->gst_no,
            'status'                => $request->status
        ]);

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
        echo json_encode(['status' => 'success', 'message' => __('vendor.vendor') . ' ' . __('services.update_successfully'), 'url' => URL::signedRoute('admin.vendor.index')]);
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