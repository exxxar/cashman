<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $company = $profile->companies()->get();
        if($company) {
            $ids = $company->pluck('id');
            $news = CompanyAdvertising::where('type', 'Баннер')->whereIn('company_id', $ids)->get();
            $stories = CompanyAdvertising::where('type', 'Сторис')->whereIn('company_id', $ids)->get();
        }
        else{
            $news = CompanyAdvertising::where('type', 'Баннер')->get();
            $stories = CompanyAdvertising::where('type', 'Сторис')->get();
        }

        return view('pages/userProfile/userProfilePage', compact('profile', 'company',
        'news', 'stories'));
    }
    public function getUserSettings(){
        $user = Auth::user();
        return view('pages/userProfile/userSettingsPage', compact('user'));
    }
}
