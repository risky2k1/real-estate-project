<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
//        $sliders = Image::where('type', ImageTypeEnum::Slider)
//            ->where('is_active', true)
//            ->get();
        $user = Auth::user();
        $properties = $user->properties()->get();
//        $agents = User::role('Agent')->take(4)->get();
//        $categories = Category::get();
//        $query = Property::query();
//        $properties = $query->paginate(6);
//dd($properties);
        return view('front.pages.users.profiles', [
            'user' => $user,
            'properties' => $properties,
//            'sliders' => $sliders,
//            'properties' => $properties,
//            'categories' => $categories,
//            'agents' => $agents,
        ]);
    }
}
