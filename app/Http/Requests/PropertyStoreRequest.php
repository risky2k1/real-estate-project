<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'name' => 'string',
                'slug' => 'string',
                'description' => 'string',
                'property_type' => 'integer',
                'property_status' => 'integer',
                'property_price' => 'decimal:0,4',
                'property_price_per_meter' => 'decimal:4',
                'longitude' => 'string',
                'latitude' => 'string',
                'area' => ' numeric',
                'rooms' => ' numeric',
                'bath_rooms' => ' numeric',
                'bed_rooms' => ' numeric',
                'furnished' => 'string',
                'is_active' => 'string',
        ];
    }
}
