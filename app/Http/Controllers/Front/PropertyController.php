<?php

namespace App\Http\Controllers\Front;

use App\Enums\PropertyStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyStoreRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
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
        $user = Auth::user();
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

        if($user->subscription()->canUseFeature('feature_property')){
            $property->update([
                'property_status'=>PropertyStatus::Featured,
            ]);
        }
        $property->categories()->attach($request->input('category'));
        return redirect()->route('agents.index');
    }

    public function listProperties(Request $request)
    {
//        dd($request->all());
        $propertyQuery = Property::query();
        if ($request->keywords !== null) {
            $propertyQuery->where('name', 'like', '%' . request('keywords') . '%');
        }
        if ($request->category !== null) {
            $categoryId = $request->category;
            $propertyQuery->whereHas('categories', function (Builder $builder) use ($categoryId) {
                $builder->where('category_id', $categoryId);
            })->get();
        }
        if ($request->status !== null) {
            $propertyQuery->where('property_status', $request->status)->get();
        }
        if ($request->rooms !== null) {
            $propertyQuery->where('rooms', $request->rooms)->get();
        }
        if ($request->bed_room !== null) {
            $propertyQuery->where('bed_rooms', $request->bed_room)->get();
        }
        if ($request->bath_room !== null) {
            $propertyQuery->where('bath_rooms', $request->bath_room)->get();
        }
        if ($request->max_area !== null && $request->max_area !=505) {
            $propertyQuery->where('area', '<=', $request->max_area)->get();
        }
        if ($request->max_money !== null &&$request->max_money !=15030) {
            $propertyQuery->where('property_price', '<=', $request->max_money * 1000000)->get();
        }
        $properties = $propertyQuery->paginate(9);
        $categories = Category::all();
        $propertyStatuses = PropertyStatus::getKeys();
        return view('front.pages.properties.list', [
            'properties' => $properties,
            'categories' => $categories,
            'propertyStatuses' => $propertyStatuses,
        ]);
    }
}
