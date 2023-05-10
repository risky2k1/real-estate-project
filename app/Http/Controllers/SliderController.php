<?php

namespace App\Http\Controllers;

use App\Enums\ImageTypeEnum;
use App\Models\Image;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $title = 'Slider';
        View::share('title', $title);
    }

    public function index()
    {
        $sliders = Image::query()->where('type', ImageTypeEnum::Slider)->get();
        return view('admin.pages.sliders.index', [
            'sliders' => $sliders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        if ($request->hasFile('slider')) {
            foreach ($request->file('slider') as $slider) {
                $path = Storage::disk('public')->put('sliders', $slider);
                Image::create([
                    'name' => $request->slider[0]->getClientOriginalName(),
                    'path' => $path,
                    'type' => ImageTypeEnum::Slider,
                ]);
            }
        }
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slider)
    {
        Image::find($slider)->delete();
    }

    public function statusUpdate(Request $request)
    {
        $slider =Image::find($request->id);
        $slider->is_active = $request->is_active;
        $slider->save();
        return response()->json(['message' => 'Slider updated successfully']);
    }
}
