<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Bpuig\Subby\Models\Plan;
use Illuminate\Support\Facades\View;

class PlanController extends Controller
{
    public function __construct()
    {
        $title = 'Plan';
        View::share('title', $title);
    }

    public function index()
    {
        $plans = Plan::get();
        return \view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }
}
