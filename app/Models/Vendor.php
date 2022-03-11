<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_unique_id',
        'user_id',
        'type',
        'logo',
        'name',
        'email',
        'mobile',
        'password',
        'address',
        'state',
        'zip_code',
        'country',
        'service_id',
        'website',
        'gst_no',
        'status',
    ];
}