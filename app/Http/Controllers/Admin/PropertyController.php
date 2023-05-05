<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PropertyStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyStoreRequest;
use App\Http\Requests\PropertyUpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Property;
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
        $properties = Property::get();
        return view('admin.pages.properties.index', [
                'properties' => $properties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $statuses = PropertyStatus::getKeys();
        return view('admin.pages.properties.create', [
                'categories' => $categories,
                'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyStoreRequest $request)
    {
//        dd($request->property_status);
        $property = Property::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'property_status' => $request->input('property_status'),
                'property_price' => $request->input('price'),
                'property_price_per_meter' => $request->input('price_per_meter'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'area' => $request->input('area'),
                'rooms' => $request->input('rooms'),
                'bath_rooms' => $request->input('bath_rooms'),
                'bed_rooms' => $request->input('bed_rooms'),
                'furnished' => $request->input('furnish'),
                'is_active' => $request->input('active'),
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
        return redirect()->route('admin.properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return \view('admin.pages.properties.show', [
                'property' => $property,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $categories = Category::get();
        $statuses = PropertyStatus::getKeys();

        return \view('admin.pages.properties.edit', [
                'property' => $property,
                'categories' => $categories,
                'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyUpdateRequest $request, Property $property)
    {
        try {
            $validated = $request->validated();
            $property->update($validated);
            return redirect()->route('admin.properties.index');
        } catch (\Exception $exception) {
            return redirect()->back();
        }

        dd($property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }

    public function imageDelete(Image $image)
    {
        $image->delete();
        return redirect()->back();
    }
}
