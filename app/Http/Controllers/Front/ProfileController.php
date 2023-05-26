<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
//        dd($request->vnp_ResponseCode);
        $user = Auth::user();
        $properties = $user->properties()->get();
        if ($user->subscriptions->first()) {
            $plan = $user->subscription()->plan;
        }
        $yourPlan = $plan;
//        dd($yourPlan);
        if ($request->vnp_ResponseCode && $request->vnp_ResponseCode == 00) {
            toastr()->success('Đăng kí gói thành công');
        }
        return view('front.pages.users.profiles', [
            'user' => $user,
            'properties' => $properties,
            'yourPlan' => $yourPlan,
        ]);
    }

    public function cancelSub()
    {
        $user = Auth::user();
        $user->subscription()->cancel();
        return redirect()->route('agents.index');
    }
}
