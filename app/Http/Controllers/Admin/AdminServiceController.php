<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Tax;
use App\Models\UnitOfMeasure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('service.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        return view('admin.services.service');
    }

    public function get_all_services()
    {
        if (!auth()->user()->can('service.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $data = Service::join('categories', 'categories.id', '=', 'services.category_id')
            ->join('unit_of_measures', 'unit_of_measures.id', '=', 'services.unit_of_measure_id')
            ->select('services.*', 'categories.name', 'unit_of_measures.unit');
        return DataTables::of($data)
            ->addColumn('service_unique_id', function ($row) {
                return $row->service_unique_id;
            })
            ->addColumn('image', function ($row) {
                if (!empty($row->service_image)) {
                    $image = "<img src='" . asset($row->service_image) . "' width='40'>";
                } else {
                    $image = '--';
                }
                return $image;
            })
            ->addColumn('service_name', function ($row) {
                return $row->service_name;
            })
            ->addColumn('category', function ($row) {
                return $row->name;
            })
            ->addColumn('unit_of_measure', function ($row) {
                return $row->unit;
            })
            ->addColumn('tax', function ($row) {
                return $row->tax . "%";
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if (auth()->user()->can('service.edit'))
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="' . URL::signedRoute('admin.service.show', $row->id) . '"  data-toggle="tooltip" title="' . __('role.edit') . '"> <i class="las la-edit"></i></a>';
                if (auth()->user()->can('service.delete'))
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('role.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['service_name', 'image', 'action'])->make(true);
    }

    public function update_service(Request $request)
    {
        if (!auth()->user()->can('service.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $request->validate([
            'name'              => 'required|unique:services,service_name,' . $request->id,
            'category'          => 'required',
            'price'             => 'required|numeric',
            'unit_of_measure'   => 'required',
            'tax'               => ''
        ], [
            'name.required'             => __('services.please_enter') . ' ' . __('services.service') . ' ' . __('role.name'),
            'category.required'         => __('services.please_select') . ' ' . __('services.category'),
            'price.required'            => __('services.please_enter') . ' ' . __('services.price'),
            'unit_of_measure.required'  => __('services.please_select') . ' ' . __('services.unit_of_measure')
        ]);


        $data = Service::find($request->id);
        $image = $data->service_image;
        if ($request->hasFile('image')) {
            File::delete($data->service_image);
            $image = $request->image->storeAs('Service_image', $request->name . date('d_M_y_s') . "." . $request->image->extension());
        }

        $tax = array();
        if ($request->tax != null) {
            foreach ($request->tax as $item) {
                $tax[] = $item;
            }
        }


        Service::where('id', $request->id)->update([
            'service_name'          => $request->name,
            'category_id'           => $request->category,
            'price'                 => $request->price,
            'unit_of_measure_id'    => $request->unit_of_measure,
            'tax'                   => implode(",", $tax),
            'service_image'         => $image
        ]);

        echo json_encode(['status' => 'success', 'message' => __('services.service') . ' ' . __('services.update_successfully'), 'url' => URL::signedRoute('admin.service.index')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('service.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $edit = 0;
        return view('admin.services.create_service')->with('edit', $edit);
    }

    public function get_all_unit_of_measures()
    {
        $data = UnitOfMeasure::all();
        $new = array();
        foreach ($data as $item) {
            $new[] = ['id' => $item->id, 'text' => $item->unit];
        }
        echo json_encode($new);
    }

    public function add_new_unit_of_measures(Request $request)
    {
        $request->validate([
            'unit' => 'required|unique:unit_of_measures,unit'
        ]);

        UnitOfMeasure::create([
            'unit' => $request->unit
        ]);
        echo json_encode(['status' => 'success', 'message' => __('services.unit') . ' ' . __('customer.add_successfully')]);
    }

    function add_new_tax(Request $request)
    {
        $request->validate([
            'tax' => 'required|unique:taxes,tax|numeric',
        ]);

        Tax::create($request->only('tax'));

        echo json_encode(['status' => 'success', 'message' => __('services.tax') . ' ' . __('customer.add_successfully')]);
    }

    public function get_all_tax()
    {
        $data = Tax::all();
        $new_data = array();
        foreach ($data as $item) {
            $new_data[] = ['id' => $item->tax, 'text' => $item->tax];
        }
        echo json_encode($new_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('service.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $request->validate([
            'name'              => 'required|unique:services,service_name',
            'category'          => 'required',
            'price'             => 'required|numeric',
            'unit_of_measure'   => 'required',
            'tax'               => ''
        ], [
            'name.required'             => __('services.please_enter') . ' ' . __('services.service') . ' ' . __('role.name'),
            'category.required'         => __('services.please_select') . ' ' . __('services.category'),
            'price.required'            => __('services.please_enter') . ' ' . __('services.price'),
            'unit_of_measure.required'  => __('services.please_select') . ' ' . __('services.unit_of_measure')
        ]);

        $unique_id = Service::orderBy('id', 'desc')->first();
        $number = str_replace('HCS', '', $unique_id ? $unique_id->service_unique_id  : 0);
        if ($number == 0) {
            $number = 'HCS0000001';
        } else {
            $number = "HCS" . sprintf("%07d", $number + 1);
        }

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->image->storeAs('Service_image', $request->name . date('d_M_y_s') . "." . $request->image->extension());
        }

        $tax = array();
        if ($request->tax != null) {
            foreach ($request->tax as $item) {
                $tax[] = $item;
            }
        }


        Service::create([
            'service_unique_id'     => $number,
            'service_name'          => $request->name,
            'category_id'           => $request->category,
            'price'                 => $request->price,
            'unit_of_measure_id'    => $request->unit_of_measure,
            'tax'                   => implode(",", $tax),
            'service_image'         => $image
        ]);

        echo json_encode(['status' => 'success', 'message' => __('services.service') . ' ' . __('customer.add_successfully'), 'url' => URL::signedRoute('admin.service.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('service.edit')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $data = Service::where('id', $id)
            ->first();
        $edit = 1;
        return view('admin.services.create_service')->with(compact('data', 'edit'));
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
    public function delete()
    {
        if (!auth()->user()->can('service.delete')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $data = Service::find(request()->id);
        File::delete($data->service_image);
        $data->delete();
        echo json_encode(['status' => 'success', 'message' => __('services.service') . ' ' . __('services.delete_successfully')]);
    }
}