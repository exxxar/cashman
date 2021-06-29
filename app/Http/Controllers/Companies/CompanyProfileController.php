<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function getCompanyData()
    {
        $company = (object)[
            'id'=>1,
            'image'=>'assets/sample/avatar/avatar1.jpg',
            'title' => 'Julian Gruber',
            'position'=>'Designer',
            'description'=>' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa.',
            'region'=>'Paris, France',
            'news'=>1022,
            'users'=>222,
            'stories'=>8,
            'products'=>329
        ];
        return view('pages/companyProfile/companyProfilePage', compact('company'));
    }
}
