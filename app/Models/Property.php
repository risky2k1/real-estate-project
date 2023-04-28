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
    protected $appends =[
            'images'
    ];
    public function images()
    {
        return $this->hasMany(Image::class, 'property_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'property_categories','property_id','category_id');
    }


}
