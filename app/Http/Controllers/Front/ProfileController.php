<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $properties = $user->properties()->get();

        if ($request->vnp_ResponseCode && $request->vnp_ResponseCode == 00) {
            toastr()->success('Đăng kí gói thành công');
        }
        return view('front.pages.users.profiles', [
            'user' => $user,
            'properties' => $properties,
        ]);
    }

    public function cancelSub()
    {
        $user = Auth::user();
        $user->subscription()->cancel();
        return redirect()->route('agents.index');
    }
}
