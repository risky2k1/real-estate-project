<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyStoreRequest;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $table = 'Property';
        View::share('title', $table);
    }

    public function index()
    {
        return view('admin.pages.properties.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyStoreRequest $request)
    {
        $property = Property::create([
                'name'=>$request->input('name'),
                'slug'=>$request->input('slug'),
                'description'=>$request->input('description'),
                'property_type'=>$request->input('property_type'),
                'property_status'=>$request->input('property_status'),
                'property_price'=>$request->input('price'),
                'property_price_per_meter'=>$request->input('price_per_meter'),
                'longitude'=>$request->input('longitude'),
                'latitude'=>$request->input('latitude'),
                'area'=>$request->input('area'),
                'rooms'=>$request->input('rooms'),
                'bath_rooms'=>$request->input('bath_rooms'),
                'bed_rooms'=>$request->input('bed_rooms'),
                'furnished'=>$request->input('furnish'),
                'is_active'=>$request->input('active'),
        ]);
        if ($request->hasFile('image')){
            foreach ($request->file('image') as $image){
                $path = Storage::disk('local')->put('properties', $image);
                Image::create([
                    'name'=>$request->image[0]->getClientOriginalName(),
                    'path' => $path,
                    'user_id'=>Auth::user()->id,
                    'type'=>'1',
                    'property_id'=>$property->id,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
