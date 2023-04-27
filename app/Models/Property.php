<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'slug',
            'description',
            'property_type',
            'property_status',
            'property_price',
            'property_price_per_meter',
            'longitude',
            'latitude',
            'area',
            'rooms',
            'bath_rooms',
            'bed_rooms',
            'furnished',
            'is_active',
    ];


}
