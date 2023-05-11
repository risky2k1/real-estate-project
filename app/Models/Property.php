<?php

namespace App\Models;

use App\Enums\PropertyStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'user_id',
    ];
    protected $appends = [
        'images',
        'priceMeter',
    ];

    protected function statusName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return ucfirst(Str::snake(PropertyStatus::getKey($this->property_status), ' '));
            }
        );
    }

    protected function furnishStatus(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->furnished == 1 ? 'Furnished' : 'Unfurnished';
            }
        );
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'property_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'property_categories', 'property_id', 'category_id');
    }

    public function getCategoryNameAttribute()
    {
        return $this->categories()->pluck('name')->implode(',');
    }

    protected function agentName(): Attribute
    {
        return Attribute::make(
            get: function () {
                $user = User::find($this->user_id);
                return $user->name;
            }
        );
    }

//    protected function priceMeter()
//    {
//        return Attribute::make(
//                get: function () {
//                    dd($this->property_price);
//                    return $this->property_price / $this->area;
//                }
//        );
//    }


}
