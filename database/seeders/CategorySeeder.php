<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate1= Category::create([
                'name'=>'Căn hộ',
                'slug'=>\Illuminate\Support\Str::slug('Căn hộ'),
                'is_active'=>'1',
        ]);
        $cate2= Category::create([
                'name'=>'Villa',
                'slug'=>\Illuminate\Support\Str::slug('Villa'),
                'is_active'=>'1',
        ]);
        $cate3= Category::create([
                'name'=>'Nhà ở',
                'slug'=>\Illuminate\Support\Str::slug('Nhà ở'),
                'is_active'=>'1',
        ]);
        $cate4= Category::create([
                'name'=>'Văn phòng',
                'slug'=>\Illuminate\Support\Str::slug('Văn phòng'),
                'is_active'=>'1',
        ]);
        $cate5= Category::create([
                'name'=>'Tòa nhà',
                'slug'=>\Illuminate\Support\Str::slug('Tòa nhà'),
                'is_active'=>'1',
        ]);
        $cate6= Category::create([
                'name'=>'Town house',
                'slug'=>\Illuminate\Support\Str::slug('Town house'),
                'is_active'=>'1',
        ]);
        $cate7= Category::create([
                'name'=>'Shop house',
                'slug'=>\Illuminate\Support\Str::slug('Shop house'),
                'is_active'=>'1',
        ]);
        $cate8= Category::create([
                'name'=>'Garage',
                'slug'=>\Illuminate\Support\Str::slug('Garage'),
                'is_active'=>'1',
        ]);
    }
}
