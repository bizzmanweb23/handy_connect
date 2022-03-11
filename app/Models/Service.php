<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_unique_id',
        'service_name',
        'category_id',
        'price',
        'unit_of_measure_id',
        'tax',
        'service_image',
    ];
}