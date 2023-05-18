<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Bpuig\Subby\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        return view('front.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

}
