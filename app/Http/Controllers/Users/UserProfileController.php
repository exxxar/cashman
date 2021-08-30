<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;
use App\Models\Product;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {

        $profile = (object)UserProfile::where('user_id', Auth::user()->getAuthIdentifier())->first();
        return view('pages.userProfile.userEditSection', compact('profile'));
    }

    public function updateUserProfileData(Request $request)
    {
        $this->validate($request, [
            'name' => ['string'],
            /* 'phone' => ['required', 'string'],
             'country' =>['required', 'string'],
             'region'=>['required', 'string'],
             'address'=>['required', 'string']*/
        ]);
        $profile = UserProfile::find($request->id);
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->country = $request->country;
        $profile->region = $request->region;
        $profile->address = $request->address;
        $profile->messengers = $request->messengers;
        if ($profile->avatar != $request->avatar) {
            $profile->avatar = 'avatar/' . $request->avatar;
        }
        $profile->save();
        $user = User::find($profile->user_id);
        if ($user->avatar != $request->avatar) {
            $user->avatar = 'avatar/' . $request->avatar;
            $user->save();
        }
        return response()->json(null, 200);

    }

    public function getAuthUser()
    {
        $profile = Auth::user();
        $company = $profile->companies()->get();
        if ($company) {
            $ids = $company->pluck('id');
            $news = CompanyAdvertising::where('type', 'Баннер')->whereIn('company_id', $ids)->get();
            $stories = CompanyAdvertising::where('type', 'Сторис')->whereIn('company_id', $ids)->get();
            $products = Product::whereIn('company_id', $ids)->get();
        } else {
            $company = Company::latest()->get();
            $news = CompanyAdvertising::where('type', 'Баннер')->get();
            $stories = CompanyAdvertising::where('type', 'Сторис')->get();
            $products = Product::latest()->get();
        }

        return view('pages/userProfile/userProfilePage', compact('profile', 'company',
            'news', 'stories', 'products'));
    }

    public function getUserSettings()
    {
        $user = Auth::user();
        return view('pages/userProfile/userSettingsPage', compact('user'));
    }

    public function uploadAvatar(Request $request)
    {
        $fileName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('assets/sample/avatar'), $fileName);

        return response()->json(['file' => $fileName]);
    }

    public function getProfileData($id)
    {
        $profile = (object)UserProfile::where('user_id', $id)->first();
        return response()->json(['profile' => $profile]);
    }


}
