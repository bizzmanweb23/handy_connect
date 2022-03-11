<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCrm;
use App\Models\AdminCrmService;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Service;
use App\Models\UnitOfMeasure;
use App\Models\Vendor;
use App\Models\VendorCrm;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminCrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('admin_crm.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        return view('admin.crm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('admin_crm.addLead')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $edit = 0;
        return view('admin.crm.create_crm')->with('edit', $edit);
    }


    public function search_customer()
    {
        $users = Customer::where('name', 'Like', '%' . request()->term . '%')->get();
        if ($users->count() > 0) {
            foreach ($users as $item) {
                $data[] = [
                    'label'     => $item->name,
                    'id'        => $item->id,
                    'address'   => $item->address,
                    'country'   => $item->country,
                    'state'     => $item->state,
                    'zip_code'  => $item->zip_code,
                    'email'     => $item->email,
                    'mobile'    => $item->mobile
                ];
            }
        } else {
            $data[] = ['label' => 'Not Found', 'id' => 0];
        }
        echo json_encode($data);
    }

    public function search_service()
    {
        $users = Service::where('service_name', 'Like', '%' . request()->term . '%')->get();
        if ($users->count() > 0) {
            foreach ($users as $item) {
                $unit = UnitOfMeasure::find($item->unit_of_measure_id);
                $data[] = [
                    'label'     => $item->service_name,
                    'id'        => $item->id,
                    'price'     => $item->price,
                    'tax'       => $item->tax,
                    'unit'      =>  $unit->unit,
                ];
            }
        } else {
            $data[] = ['label' => 'Not Found', 'id' => 0];
        }
        echo json_encode($data);
    }

    public function search_company()
    {
        foreach (Company::all() as $item) {
            $data[] = [
                'id' => $item->id,
                'text' => $item->name
            ];
        }
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
        if (!auth()->user()->can('admin_crm.addLead')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }

        $request->validate([
            'id'            => 'required|exists:customers,id',
            'customer_name' => 'required',
            'delivery_date' => 'required',
            // 'all_service_details' => 'required'

        ], [
            'id.exists'              => 'Customer Not Exist In System',
            'customer_name.required' => __('services.please_enter') . ' ' . __('customer.customer') . ' ' . __('role.name'),
            'delivery_date.required' => __('services.please_enter') . ' ' . __('crm.date'),
            // 'all_service_details.required'          => 'Please Add Service'
        ]);
        $check_id = array();
        $data = array();
        $admin_service = array();
        if (!empty($request->all_service_details)) {
            foreach ($request->all_service_details as $item) {
                if (!in_array($item['service_id'], $check_id)) {
                    $check_id[] = $item['service_id'];

                    if ($item['service_name'] == '') {
                        $request->validate([
                            'service_name' => 'required',
                        ], [
                            'service_name.required' => __('services.please_select') . ' ' . __('services.service'),
                        ]);
                    } else if (empty($item['service_id'])) {
                        $request->validate([
                            'service_id' => 'required',
                        ]);
                    } else if (!empty($item['service_id'])) {
                        $service = Service::find($item['service_id']);
                        if (!$service)
                            $request->validate([
                                'service_id' => 'required',
                            ], [
                                'service_id.required' => 'Please Check Service Not Exit In Our System'
                            ]);
                    }
                    if (empty($item['price'])) {
                        $request->validate([
                            'price' => 'required',
                        ], [
                            'price.required' => __('services.please_enter') . ' ' . __('services.price')
                        ]);
                    }

                    $admin_service[] = array(
                        'service_id' => $item['service_id'],
                        'quantity' => !empty($item['quantity']) ? $item['quantity'] : 1,
                        'uom_id' => $item['uom'],
                        'tax' => implode(',', $item['tax']),
                        'price' => $item['price'],
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                }
            }
        }

        $unique_id = AdminCrm::orderBy('id', 'desc')->first();
        $number = str_replace('HCL', '', $unique_id ? $unique_id->crm_unique_id  : 0);
        if ($number == 0) {
            $number = 'HCL0000001';
        } else {
            $number = "HCL" . sprintf("%07d", $number + 1);
        }

        $data = [
            'crm_unique_id' => $number,
            'stage'         => 1,
            'delivery_date' => $request->delivery_date,
            'customer_id'   => $request->id,
            'company_id'    => $request->company_id,
            'created_by'    => Auth::user()->id
        ];

        $admin_crm = AdminCrm::create($data);
        $new_service = array();
        if (!empty($request->all_service_details)) {
            foreach ($admin_service as $value) {
                $new_service[] = [
                    'admin_crm_id'  => $admin_crm->id,
                    'service_id'    => $value['service_id'],
                    'quantity'      => !empty($value['quantity']) ? $value['quantity'] : 1,
                    'uom_id'        => $value['uom_id'],
                    'tax'           => $value['tax'],
                    'price'         => $value['price'] * (!empty($value['quantity']) ? $value['quantity'] : 1),
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
            AdminCrmService::insert($new_service);
        }
        echo json_encode(['status' => 'success', 'message' => __('customer.add_successfully'), 'url' => URL::signedRoute('admin.crm.index')]);
    }

    public function get_admin_crm_data()
    {
        $data = AdminCrm::join('customers', 'customers.id', '=', 'admin_crms.customer_id')
            ->select('admin_crms.*', 'customers.name', 'customers.email')
            ->get();
        echo json_encode($data);
    }

    public function add_field_visit(Request $request)
    {
        $request->validate([
            'crm_id' => 'required|exists:admin_crms,id',
            'employee_id'     => 'required|array',
            'employee_id.*' => 'required'
        ]);

        $employee = array();
        foreach ($request->employee_id as $item) {
            $employee[] = $item;
        }

        AdminCrm::find($request->crm_id)->update([
            'stage' => 3,
            'field_visit_employee_id' => implode(',', $employee)
        ]);

        // echo json_encode(['status' => 'success', $request->employee_id]);
        echo json_encode(['status' => 'success', 'message' => __('employee.employee') . ' ' . 'Assign Successfully', 'url' => URL::signedRoute('admin.crm.index')]);
    }

    public function vendor_list()
    {
        $data = Vendor::all();
        $new_data = array();
        foreach ($data as $item) {
            $new_data[] = ['id' => $item->id, 'text' => $item->name];
        }
        echo json_encode($new_data);
    }


    public function assign_to_vendors(Request $request)
    {
        $request->validate([
            'crm_id' => 'required|exists:admin_crms,id',
            'vendor_id' => 'required|array',
            'vendor_id.*' => 'required'
        ]);


        $old = AdminCrm::find($request->crm_id);

        $check = VendorCrm::where('admin_crm_id', $request->crm_id)->get();

        $vendor = array();
        $data = array();
        foreach ($request->vendor_id as $item) {
            $vendor[] = $item;
            if (array_search($item, array_column(json_decode(json_encode($check), true), 'vendor_id')) === false) {
                $data[] = [
                    'vendor_id' => $item,
                    'admin_crm_id' => $old->id,
                    'crm_unique_id' => $old->crm_unique_id,
                    'stage' => 1,
                    'delivery_date' => $old->delivery_date,
                    'customer_id' => $old->customer_id,
                    'created_by' => $old->created_by,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        foreach ($check as $value) {
            if (!in_array($value['vendor_id'], $request->vendor_id)) {
                VendorCrm::where('admin_crm_id', $request->crm_id)->where('vendor_id', $value['vendor_id'])->delete();
            }
        }

        $vendor_crm = VendorCrm::insert($data);

        AdminCrm::find($request->crm_id)->update([
            'stage' => 4,
            'assign_to_vendor_id' => implode(',', $vendor)
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Assign To Vendor Successfully', 'url' => URL::signedRoute('admin.crm.index')]);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('admin_crm.show')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $crm = AdminCrm::join('customers', 'customers.id', 'admin_crms.customer_id')
            ->join('companies', 'companies.id', '=', 'admin_crms.company_id')
            ->select(
                'admin_crms.*',
                'customers.name',
                'customers.email',
                'customers.address',
                'customers.country',
                'customers.zip_code',
                'customers.state',
                'customers.mobile',
                'companies.name as company_name'
            )
            ->where('admin_crms.id', $id)->first();
        if ($crm) {
            return view('admin.crm.show_crm')->with(['data' => $crm]);
        } else {
            return abort(403, 'Sorry Something Wrong.');
        }
    }

    public function show_service_data_for_crm()
    {
        $data = AdminCrmService::join('services', 'services.id', '=', 'admin_crm_services.service_id')
            ->join('unit_of_measures', 'unit_of_measures.id', '=', 'admin_crm_services.uom_id')
            ->select('services.service_name', 'admin_crm_services.tax', 'admin_crm_services.quantity', 'unit_of_measures.unit', 'admin_crm_services.price')
            ->where('admin_crm_services.admin_crm_id', request()->id);
        return DataTables::of($data)
            ->addColumn('service_name', function ($row) {
                return $row->service_name;
            })
            ->addColumn('quantity', function ($row) {
                return $row->quantity;
            })
            ->addColumn('uom', function ($row) {
                return $row->unit;
            })
            ->addColumn('tax', function ($row) {
                return $row->tax;
            })
            ->addColumn('price', function ($row) {
                return $row->price;
            })
            ->rawColumns(['service_name'])->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  $crm = AdminCrm::join('customers', 'customers.id', 'admin_crms.customer_id')
            ->join('companies', 'companies.id', '=', 'admin_crms.company_id')
            ->select(
                'admin_crms.*',
                'customers.id as customer_id',
                'customers.name',
                'customers.email',
                'customers.address',
                'customers.country',
                'customers.zip_code',
                'customers.state',
                'customers.mobile',
                'companies.name as company_name'
            )
            ->where('admin_crms.id', $id)->first();
        return view('admin.crm.edit_crm')->with(['data' => $data]);
    }

    public function update_crm(Request $request)
    {
        $request->validate([
            'id'            => 'required|exists:admin_crms,id',
            'customer_id'   => 'required|exists:customers,id',
            'customer_name' => 'required',
            'delivery_date' => 'required',
            // 'all_service_details' => 'required'

        ], [
            'id.exists'              => 'Customer Not Exist In System',
            'customer_name.required' => __('services.please_enter') . ' ' . __('customer.customer') . ' ' . __('role.name'),
            'delivery_date.required' => __('services.please_enter') . ' ' . __('crm.date'),
            // 'all_service_details.required'          => 'Please Add Service'
        ]);
        $check_id = array();
        $data = array();
        $admin_service = array();
        if (!empty($request->all_service_details)) {
            foreach ($request->all_service_details as $item) {
                if (!in_array($item['service_id'], $check_id)) {
                    $check_id[] = $item['service_id'];

                    if ($item['service_name'] == '') {
                        $request->validate([
                            'service_name' => 'required',
                        ], [
                            'service_name.required' => __('services.please_select') . ' ' . __('services.service'),
                        ]);
                    } else if (empty($item['service_id'])) {
                        $request->validate([
                            'service_id' => 'required',
                        ]);
                    } else if (!empty($item['service_id'])) {
                        $service = Service::find($item['service_id']);
                        if (!$service)
                            $request->validate([
                                'service_id' => 'required',
                            ], [
                                'service_id.required' => 'Please Check Service Not Exit In Our System'
                            ]);
                    }
                    if (empty($item['price'])) {
                        $request->validate([
                            'price' => 'required',
                        ], [
                            'price.required' => __('services.please_enter') . ' ' . __('services.price')
                        ]);
                    }

                    $admin_service[] = array(
                        'service_id' => $item['service_id'],
                        'quantity' => !empty($item['quantity']) ? $item['quantity'] : 1,
                        'uom_id' => $item['uom'],
                        'tax' => implode(',', $item['tax']),
                        'price' => $item['price'] * (!empty($item['quantity']) ? $item['quantity'] : 1),
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                }
            }
        }



        $data = [
            'delivery_date' => $request->delivery_date,
            'customer_id'   => $request->customer_id,
            'company_id'    => $request->company_id,
            'created_by'    => Auth::user()->id
        ];

        $admin_crm = AdminCrm::find($request->id)->update($data);
        $new_service = array();
        $old_admin_service = AdminCrmService::where('admin_crm_id', $request->id)->get();

        if (!empty($request->all_service_details)) {
            foreach ($admin_service as $value) {
                if (array_search($value['service_id'],  array_column($old_admin_service->toArray(), 'service_id')) !== false) {
                    AdminCrmService::where('admin_crm_id', $request->id)->where('service_id', $value['service_id'])->update([
                        'quantity'      => !empty($value['quantity']) ? $value['quantity'] : 1,
                        'uom_id'        => $value['uom_id'],
                        'tax'           => $value['tax'],
                        'price'         => $value['price'],
                        'updated_at'    => now()
                    ]);
                    // echo json_encode(['status' => 'success', array_search($value['service_id'],  array_column($old_admin_service->toArray(), 'service_id'))]);
                } else {
                    $new_service[] = [
                        'admin_crm_id'  => $request->id,
                        'service_id'    => $value['service_id'],
                        'quantity'      => !empty($value['quantity']) ? $value['quantity'] : 1,
                        'uom_id'        => $value['uom_id'],
                        'tax'           => $value['tax'],
                        'price'         => $value['price'],
                        'created_at'    => now(),
                        'updated_at'    => now()
                    ];
                    // echo json_encode(['status' => 'success', 11]);
                }
            }
            AdminCrmService::insert($new_service);
        }
        echo json_encode(['status' => 'success', 'message' => __('services.update_successfully'), 'url' => URL::signedRoute('admin.crm.index')]);
    }


    public function assign_sales_person(Request $request)
    {
        $request->validate([
            'crm_id'         => 'required|exists:admin_crms,id',
            'sales_person_id'    => 'required',
        ]);

        AdminCrm::find($request->crm_id)->update([
            'stage' => 2,
            'assign_sales_person' => $request->sales_person_id,
        ]);
        echo json_encode(['status' => 'success', 'message' => __('employee.employee') . ' ' . 'Assign Successfully', 'url' => URL::signedRoute('admin.crm.index')]);
    }

    public function show_lead()
    {
        return view('admin.lead.index');
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