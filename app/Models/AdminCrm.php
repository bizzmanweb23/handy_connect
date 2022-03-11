<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCrm extends Model
{
    use HasFactory;

    protected $fillable = [
        'crm_unique_id',
        'stage',
        'delivery_date',
        'customer_id',
        'company_id',
        'assign_sales_person',
        'field_visit_employee_id',
        'field_visit_approve',
        'assign_to_vendor_id',
        'created_by'
    ];
}