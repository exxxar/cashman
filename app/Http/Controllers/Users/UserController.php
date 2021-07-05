<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getAuthUser()
    {
        $profile = null;
        if (Auth::user()) {
            $profile = (object)[
                'id' => 12454,
                'name' => 'UserName',
                'avatar' => 'assets/sample/brand/3.jpg',
                'cashback' => 2354
            ];
        }

        return view('pages/welcome', compact('profile'));

    }
}
