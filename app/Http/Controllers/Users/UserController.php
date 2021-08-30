<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getAuthUser()
    {
        $profile = Auth::user();
        return view('pages/welcome', compact('profile'));

    }

    function getCompanies(Request $request)
    {
        $latitude = $request->lat;
        $longitude = $request->lon;
        $radius = 20; //km
        if ($latitude!=0 && $longitude!=0){
            $companies = Company::selectRaw("id, title, image, latitude, longitude,
                         ( 6371 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
                ->having("distance", "<", $radius)
                ->orderBy("distance", 'asc')
                ->offset(0)
                ->limit(30)
                ->get();
            $companiesIds = $companies->pluck('id');
            $products = Product::whereIn('company_id', $companiesIds)->latest()->limit(30)->get();
            $news = CompanyAdvertising::whereIn('company_id', $companiesIds)->where('type', 'Баннер')->latest()->limit(20)->get();
            $stories = CompanyAdvertising::whereIn('company_id', $companiesIds)->where('type', 'Сторис')->latest()->limit(20)->get();

        }
        else
        {
            $companies = Company::latest()->limit(30)->get();
            $products = Product::latest()->limit(30)->get();
            $news = CompanyAdvertising::where('type', 'Баннер')->limit(20)->get();
            $stories = CompanyAdvertising::where('type', 'Сторис')->limit(20)->get();
        }
        return response()->json(['companies' => $companies, 'products'=>$products,
            'news'=>$news, 'stories'=>$stories]);
    }

    public function getUsersCompanies($id){
        $user = User::find($id);
        $companies = $user->companies()->get();
        return response()->json([
            'companies'=>$companies
            ]);
    }
    public function deleteCompany($user, $id)
    {
        $profile = User::find($user);
        $company = Company::find($id);
        $profile->companies()->detach($company);

    }
}
