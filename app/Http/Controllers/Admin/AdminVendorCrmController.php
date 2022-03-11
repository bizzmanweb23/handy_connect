<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorCrm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVendorCrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crm.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function create_quotations($id)
    {
        return view('admin.crm.vendor.create_quotations');
    }

    public function get_vendor_crm()
    {
        $data = VendorCrm::join('customers', 'customers.id', '=', 'vendor_crms.customer_id')
            ->select('vendor_crms.*', 'customers.name', 'customers.email')
            ->where('vendor_crms.vendor_id', Auth::user()->vendor_id)->get();

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crm = VendorCrm::join('customers', 'customers.id', 'vendor_crms.customer_id')
            ->select(
                'vendor_crms.*',
                'customers.name',
                'customers.email',
                'customers.address',
                'customers.country',
                'customers.zip_code',
                'customers.state',
                'customers.mobile',
            )
            ->where('vendor_crms.id', $id)->first();
        if ($crm) {
            return view('admin.crm.vendor.show_crm')->with(['data' => $crm]);
        } else {
            return abort(403, 'Sorry Something Wrong.');
        }
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