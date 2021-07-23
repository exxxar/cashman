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
    public function getUserPromocode($user, $company)
    {
        $operation_code = '000';
        $user_id = str_pad($user, 10, "0", STR_PAD_LEFT);
        $company_id = str_pad($company, 10, "0", STR_PAD_LEFT);
        $data = 'localhost:8000/qr-handler?data='.base64_encode($operation_code.$user_id.$company_id);
        return view('pages/promoCodePage', compact('data'));
    }
}
