<?php

namespace App\Http\Controllers\Front;

use App\Enums\ImageTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Image;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Image::where('type',ImageTypeEnum::Slider)
            ->where('is_active',true)
            ->get();
        return view('front.layouts.index',[
            'sliders'=>$sliders,
        ]);
    }

//    public function slider()
//    {
//        return view('front.layouts.header');
//    }
}
