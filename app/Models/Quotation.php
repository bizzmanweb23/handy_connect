<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_unique_id',
        'lead_id',
        'total_price',
        'quantity',
        'tax',
        // 'final_price',
        'tax_price',
        'final_price_with_tax',
        'create_by',
        'vendor_id',
        'vendor_crm_id',
        'approve',
        'approve_date',
        'platform_tax_type',
        'platform_tax',
        'platform_fee',
        'final_fee_with_platform'
    ];
}