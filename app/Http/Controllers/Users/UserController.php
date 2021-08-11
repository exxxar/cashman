<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getAuthUser()
    {
        $profile = Auth::user();
        $news = CompanyAdvertising::where('type', 'Баннер')->get();
        $stories = CompanyAdvertising::where('type', 'Сторис')->get();
        $companies = Company::latest()->get();
        return view('pages/welcome', compact('profile', 'news', 'companies', 'stories'));

    }
}
