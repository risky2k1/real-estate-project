<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'slug',
            'is_active',
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class,'property_categories','category_id','property_id');
    }
}
