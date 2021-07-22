<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $profile = (object)[
            'name' => 'UserName',
            'phone' => '+380715555555',
            'country' => 'UserCountry',
            'region' => 'UserRegion',
            'address' => 'UserAddress',
            'avatar' => 'assets/sample/brand/3.jpg',
            'messengers' => [
                'vk' => 'https://vk.com',
                'facebook-f' => 'https://facebook.com',
                'twitter' => null,
                'telegram' => null,
                'google' => null,
                'yandex' => null],
        ];
        return view('pages/userProfile/userEditSection', compact('profile'));
    }

    public function updateUserProfileData(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'country' =>['required', 'string'],
            'region'=>['required', 'string'],
            'address'=>['required', 'string']
        ]);
    }
    public function getAuthUser(){
        $profile = Auth::user();
        return view('pages/userProfile/userProfilePage', compact('profile'));
    }
}
