<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('company.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        return view('admin.services.company');
    }

    public function get_all_company()
    {
        $data = Company::all();
        echo json_encode($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('company.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }

        $data = Company::all();
        return DataTables::of($data)
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('logo', function ($row) {
                if (!empty($row->logo))
                    $logo = $row->logo;
                else
                    $logo = 'asset/admin/image/your-logo-here.jpg';
                return "<img src='" . asset($logo) . "' width='40' class='img-fluid rounded-circle'>";
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if (auth()->user()->can('company.edit'))
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="' . __('role.edit') . '" onclick="open_edit_company_model(' . $row->id . ')"> <i class="las la-edit"></i></a>';
                if (auth()->user()->can('company.delete'))
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('role.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['logo', 'action'])->make(true);
    }

    public function get_edit_data()
    {
        if (!auth()->user()->can('company.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }

        request()->validate([
            'id' => 'required|exists:companies,id'
        ]);
        $data = Company::find(request()->id);
        echo json_encode($data);
    }

    public function edit_company(Request $request)
    {
        if (!auth()->user()->can('company.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }

        $request->validate([
            'id' => 'required|exists:companies,id',
            'name' => 'required|unique:companies,name,' . $request->id,
        ], [
            'name.required' => 'Please Enter Company Name'
        ]);

        $old_data = Company::find($request->id);
        $logo_path = null;
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image'
            ]);
            File::delete($old_data->logo);
            $logo_path = $request->logo->storeAs('Company_logo', $request->name . date('d_M_y_s') . "." . $request->logo->extension());
        }

        Company::find($request->id)->update([
            'name' => $request->name,
            'logo' => $logo_path
        ]);
        echo json_encode(['status' => 'success', 'message' => __('services.company') . ' ' . __('services.update_successfully')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('company.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $request->validate([
            'name' => 'required|unique:companies,name',
        ], [
            'name.required' => 'Please Enter Company Name'
        ]);

        $logo_path = null;
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image'
            ]);
            $logo_path = $request->logo->storeAs('Company_logo', $request->name . date('d_M_y_s') . "." . $request->logo->extension());
        }

        Company::create([
            'name' => $request->name,
            'logo' => $logo_path
        ]);
        echo json_encode(['status' => 'success', 'message' => __('services.company') . ' ' . __('customer.add_successfully')]);
    }

    public function delete()
    {
        if (!auth()->user()->can('company.delete')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        request()->validate([
            'id' => 'required|exists:companies,id'
        ]);
        $company = Company::find(request()->id);
        File::delete($company->logo);
        $company->delete();

        echo json_encode(['status' => 'success', 'message' => __('services.company') . ' ' . __('services.delete_successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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