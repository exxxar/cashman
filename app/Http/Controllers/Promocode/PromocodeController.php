<?php

namespace App\Http\Controllers\Promocode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function index()
    {
        return view('pages.companyProfile.Admin.AddPromocodePage');
    }
}
