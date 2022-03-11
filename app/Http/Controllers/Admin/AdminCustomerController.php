<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('customer.view')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        return view('admin.customer.index');
    }

    public function customer_list()
    {
        $customer = Customer::all();
        return DataTables::of($customer)
            ->addColumn('customer_unique_id', function ($row) {
                return $row->customer_unique_id;
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
            ->addColumn('logo', function ($row) {
                if ($row->logo == null)
                    $logo = asset('asset/admin/image/your-logo-here.jpg');
                else
                    $logo = asset($row->logo);
                return "<img src='" . $logo . "'  width='40'>";
            })
            ->rawColumns(['logo'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('customer.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }
        $unique_id = Customer::orderBy('id', 'desc')->first();
        $number = str_replace('HCC', '', $unique_id ? $unique_id->customer_unique_id  : 0);
        if ($number == 0) {
            $number = 'HCC0000001';
        } else {
            $number = "HCC" . sprintf("%07d", $number + 1);
        }

        return view('admin.customer.create')->with('unique_id', $number);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('customer.add')) {
            return back()->with('unauthorized_error', 'Unauthorized action.');
        }

        $request->validate([
            'unique_id'     => 'required|unique:customers,customer_unique_id',
            'name'          => 'required|max:20',
            'email'         => 'required|unique:customers,email',
            'mobile'        => 'required|numeric',
            'password'      => 'required|confirmed',
            'address'       => 'required',
            'state'         => 'required',
            'zip_code'      => 'required',
            'country'       => 'required'
        ]);

        $user_id = User::insertGetId([
            'user_type' => 'Customer',
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

        $logo = null;
        if ($request->hasFile('image'))
            $logo = $request->image->storeAs('Customer_Logo', $request->name . date('d_M_y') . '.' . $request->image->extension());

        Customer::create([
            'customer_unique_id'    => $request->unique_id,
            'user_id'               => $user_id,
            'type'                  => $type,
            'logo'                  => $logo,
            'name'                  => $request->name,
            'email'                 => $request->email,
            'mobile'                => $request->mobile,
            'password'              => Hash::make($request->password),
            'address'               => $request->address,
            'state'                 => $request->state,
            'zip_code'              => $request->zip_code,
            'country'               => $request->country,
            'website'               => $request->web_site,
            'tag'                   => $request->tags,
            'gst_treatment'         => $request->gst_treatment,
            'gst_no'                => $request->gst_no,
            'status'                => $request->status
        ]);

        echo json_encode(['status' => 'success', 'message' => __('customer.customer') . ' ' . __('customer.add_successfully'), 'url' => URL::signedRoute('admin.customer.index')]);
    }


    public function get_customer_list()
    {
        $data = Customer::all();
        return DataTables::of($data)
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('phone', function ($row) {
                return $row->phone;
            })
            ->addColumn('address', function ($row) {
                return $row->address;
            })
            ->rawColumns(['name'])->make(true);
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