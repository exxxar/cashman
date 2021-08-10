<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyEditSectionController extends Controller
{
    public function index($id)
    {
        $company = (object)Company::where('id', $id)->first();
        return view('pages/companyProfile/companyEditSection', compact('company'));
    }

    public function updateCompanyData(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'cashback_percent' =>['required', 'numeric'],
            'cashback_percent_level_1'=>['required', 'numeric'],
            'cashback_percent_level_2' =>['required', 'numeric'],
            'position'=>['required'],
            'callback_url'=>['required', 'string'],
            'upload_vk_url'=>['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
        ]);
    }
}
