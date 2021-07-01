<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyEditSectionController extends Controller
{
    public function index()
    {
        $company = (object)[
            'title' => 'CompanyTitle',
            'domain' => 'company.domain',
            'cashback_percent' => 10,
            'cashback_percent_level_1' => 5,
            'cashback_percent_level_2' => 3,
            'description' => 'company description',
            'image' => 'assets/sample/brand/2.jpg',
            'position' => "company position",
            'callback_url' => 'callback_url',
            'socials' => [
                'vk' => 'https://vk.com',
                'facebook-f' => 'https://facebook.com',
                'twitter' => null,
                'telegram' => null,
                'google' => null,
                'yandex' => null],
            'upload_vk_url' => 'upload_vk_url'
        ];
        return view('pages/companyProfile/companyEditSection', compact('company'));
    }

    public function updateCompanyData(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'domain' => ['required', 'string', 'unique:companies'],
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
