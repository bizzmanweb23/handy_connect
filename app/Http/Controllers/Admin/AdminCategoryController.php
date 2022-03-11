<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('category.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        return view('admin.services.category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('category.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $data = Category::join('companies', 'companies.id', '=', 'categories.company_id')
            ->select('categories.*', 'companies.name as company_name')->get();
        return DataTables::of($data)
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('company_name', function ($row) {
                return $row->company_name;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if (auth()->user()->can('category.edit'))
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="' . __('role.edit') . '" onclick="open_edit_company_model(' . $row->id . ')"> <i class="las la-edit"></i></a>';
                if (auth()->user()->can('category.delete'))
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('role.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['name', 'company_name', 'action'])->make(true);
    }

    public function get_edit_data()
    {
        if (!auth()->user()->can('category.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        request()->validate([
            'id' => 'required|exists:categories,id'
        ]);
        $data = Category::join('companies', 'companies.id', '=', 'categories.company_id')
            ->select('categories.*', 'companies.id as company_id')
            ->where('categories.id', request()->id)->first();
        echo json_encode($data);
    }

    public function edit_category(Request $request)
    {
        if (!auth()->user()->can('category.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $request->validate([
            'id'    => 'required|exists:categories,id',
            'name'  => 'required|unique:categories,name,' . $request->id,
            'company' => 'required'
        ], [
            'name.required'     => 'Please Enter Category Name',
            'company.required'  => 'Please Select Company'
        ]);

        Category::find($request->id)->update([
            'name'          => $request->name,
            'company_id'    => $request->company
        ]);
        echo json_encode(['status' => 'success', 'message' => __('services.category') . ' ' . __('services.update_successfully')]);
    }
    function get_all_category()
    {
        $data = Category::all();
        echo json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('category.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $request->validate([
            'name'      => 'required|unique:categories,name',
            'company'   => 'required|exists:companies,id',
        ], [
            'name.required'     => 'Please Enter Category Name',
            'company.required'  => 'Please Select Company'
        ]);

        Category::create([
            'name'          => $request->name,
            'company_id'    => $request->company
        ]);

        echo json_encode(['status' => 'success', 'message' => __('services.category') . ' ' . __('customer.add_successfully')]);
    }

    public function delete()
    {
        if (!auth()->user()->can('category.delete')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        Category::find(request()->id)->delete();
        echo json_encode(['status' => 'success', 'message' => __('services.category') . ' ' . __('services.delete_successfully')]);
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