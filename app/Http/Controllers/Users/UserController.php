<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;
use App\Models\Product;
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
        $radius = 50; //km
        if ($latitude && $longitude){
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
                ->limit(20)
                ->get();
            $companiesIds = $companies->pluck('id');
            $products = Product::whereIn('company_id', $companiesIds)->get();
            $news = CompanyAdvertising::whereIn('company_id', $companiesIds)->where('type', 'Баннер')->get();
            $stories = CompanyAdvertising::whereIn('company_id', $companiesIds)->where('type', 'Сторис')->get();

        }
        else
        {
            $companies = Company::latest()->get();
            $products = Product::latest()->get();
            $news = CompanyAdvertising::where('type', 'Баннер')->get();
            $stories = CompanyAdvertising::where('type', 'Сторис')->get();
        }
        return response()->json(['companies' => $companies, 'products'=>$products,
            'news'=>$news, 'stories'=>$stories]);
    }
}
