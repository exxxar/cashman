<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;
use App\Models\CompanyUser;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function getCompanyData($id)
    {
        $company = (object)Company::where('id', $id)->first();
        $isAdmin = CompanyUser::where(['company_id'=>$company->id, 'user_id'=>Auth::user()->getAuthIdentifier(),
            'role'=>'admin'])->exists();
        $users = 100;
        $news =$company->advertising()->where('type','Баннер')->get();
        $stories = $company->advertising()->where('type', 'Сторис')->get();
        $products = Product::where('company_id', $id)->get();
        $user = Auth::user()->getAuthIdentifier();
        return view('pages/companyProfile/companyProfilePage', compact('company',
            'news', 'users', 'stories', 'products', 'isAdmin', 'user'));
    }
}
