<?php

namespace Database\Seeders;

use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plan1 = Plan::find(1);
        $plan1->features()->saveMany([
            new PlanFeature(['tag' => 'post_per_day', 'name' => 'Số lượng bài viết 1 tuần', 'value' => 1, 'sort_order' => 1]),
        ]);
        $plan1 = Plan::find(2);
        $plan1->features()->saveMany([
            new PlanFeature(['tag' => 'post_per_day', 'name' => 'Số lượng bài viết 1 tuần', 'value' => 30, 'sort_order' => 1]),
        ]);
        $plan1 = Plan::find(3);
        $plan1->features()->saveMany([
            new PlanFeature(['tag' => 'post_per_day', 'name' => 'Số lượng bài viết 1 tuần', 'value' => 200, 'sort_order' => 1]),
        ]);
        $plan1 = Plan::find(4);
        $plan1->features()->saveMany([
            new PlanFeature(['tag' => 'post_per_day', 'name' => 'Số lượng bài viết 1 tuần', 'value' => 1000, 'sort_order' => 1]),
        ]);
    }
}
