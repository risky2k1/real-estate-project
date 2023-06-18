<?php

namespace App\Http\Controllers\Front;

use App\Enums\ImageTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Image::where('type', ImageTypeEnum::Slider)
            ->where('is_active', true)
            ->get();
        $agents = User::role('Agent')->take(4)->get();
        $categories = Category::get();

        $query = Property::query();

        if ($request->has('keyword')) {
            $query->where('name', 'Like', '%' . request('keyword') . '%');
        }
        $properties = $query->where('property_status',4)->paginate(6);
        return view('front.properties', [
            'sliders' => $sliders,
            'properties' => $properties,
            'categories' => $categories,
            'agents' => $agents,
        ]);
    }

    public function show(Request $request, Property $property)
    {
        return view('front.pages.properties.show', [
            'property' => $property,
        ]);
    }

}
