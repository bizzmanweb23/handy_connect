<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCrm extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'admin_crm_id',
        'crm_unique_id',
        'stage',
        'delivery_date',
        'customer_id',
        'created_by',
    ];
}