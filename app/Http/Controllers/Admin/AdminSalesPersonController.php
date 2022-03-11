<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCrm;
use App\Models\Employee;
use App\Models\VendorCrm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSalesPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crm.sales_person.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Employee::where('user_id', Auth::user()->id)->first();

        $data = AdminCrm::join('customers', 'customers.id', '=', 'admin_crms.customer_id')
            ->select('admin_crms.*', 'customers.name', 'customers.email')
            ->where('admin_crms.assign_sales_person', $user->id)
            ->orderBy('admin_crms.id', 'desc')
            ->get();
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
            return view('admin.crm.sales_person.show_crm')->with(['data' => $crm, '']);
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