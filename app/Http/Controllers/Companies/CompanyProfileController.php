<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function getCompanyData($id)
    {
        $company = Company::where('id', $id)->first();
        $users = 100;
        $news =88;
        $stories = 27;
        $products = 39;
        return view('pages/companyProfile/companyProfilePage', compact('company',
            'news', 'users', 'stories', 'products'));
    }
}
