<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    public function getCompanyData($id)
    {
        $company = (object)Company::where('id', $id)->first();
        $isAdmin = Company::where('creator_id', Auth::user()->getAuthIdentifier())->exists();
        $users = 100;
        $news =88;
        $stories = 27;
        $products = 39;
        return view('pages/companyProfile/companyProfilePage', compact('company',
            'news', 'users', 'stories', 'products', 'isAdmin'));
    }
}
