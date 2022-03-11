<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_unique_id',
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
        'website',
        'tag',
        'gst_treatment',
        'gst_no',
        'status',
    ];
}