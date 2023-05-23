<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $properties = $user->properties()->get();
        return view('front.pages.users.profiles', [
            'user' => $user,
            'properties' => $properties,
        ]);
    }
}
