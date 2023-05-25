<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Bpuig\Subby\Models\PlanSubscription;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        View::share('title', 'Dashboard');
    }

    public function index()
    {
        $post = Property::get()->count();
        $users = User::get()->count();
        $userSubscribes = PlanSubscription::all()->count();
        $pendingPosts = Property::all()->where('is_active', false)->count();
        return view('admin.pages.dashboard.index', [
            'posts' => $post,
            'users' => $users,
            'userSubscribes' => $userSubscribes,
            'pendingPosts' => $pendingPosts,
        ]);
    }
}
