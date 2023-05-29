<?php

namespace App\Http\Controllers\Front;

use App\Enums\PropertyStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyStoreRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function create()
    {
        $categories = Category::get();
        $statuses = PropertyStatus::getKeys();
        return view('front.pages.properties.create', [
            'categories' => $categories,
            'statuses' => $statuses,
        ]);
    }

    public function store(PropertyStoreRequest $request)
    {
        $request->validated();

        $property = Property::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'property_status' => $request->input('property_status'),
            'property_price' => $request->input('price'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'area' => $request->input('area'),
            'rooms' => $request->input('rooms'),
            'bath_rooms' => $request->input('bath_rooms'),
            'bed_rooms' => $request->input('bed_rooms'),
            'furnished' => $request->input('furnish'),
            'is_active' => false,
            'user_id' => Auth::user()->id,
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = Storage::disk('public')->put('properties', $image);
                Image::create([
                    'name' => $request->image[0]->getClientOriginalName(),
                    'path' => $path,
                    'user_id' => Auth::user()->id,
                    'type' => '1',
                    'property_id' => $property->id,
                ]);
            }
        }
        $property->categories()->attach($request->input('category'));
        return redirect()->route('agents.index');
    }

    public function listProperties(Request $request)
    {

//            dd($request->all());
        $properties = Property::paginate(9);
        $categories = Category::all();
        $propertyStatuses = PropertyStatus::getKeys();
//        dd($propertyStatuses);
//        foreach ($propertyStatuses as $each){
//            dump($each);
//        }
//            die();
        return view('front.pages.properties.list', [
            'properties' => $properties,
            'categories' => $categories,
            'propertyStatuses' => $propertyStatuses,
        ]);
    }
}
