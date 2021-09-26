<?php

namespace App\Http\Controllers\Promocode;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\UsersFriedsByCompany;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $data = 'https://your-cashman.com/qr-handler/data=' . base64_encode($operation_code . $user_id . $company_id);
        return view('pages/promoCodePage', compact('data'));
    }

    public function qrHandler( $data)
    {
        $data = base64_decode($data);
        $operation_code = mb_substr($data, 0, 2);
        $user_id = (integer)str_replace('0', '', mb_substr($data, 3, 12));
        $company_id = (integer)str_replace('0', '', mb_substr($data, 13, 22));
        $company = Company::where('id', $company_id)->first();
        if(!Auth::user()){
            session(['user' => $user_id, 'company'=>$company_id]);
            return redirect('/register');
        }
        $isAdmin = CompanyUser::where(['company_id'=>$company->id, 'user_id'=>Auth::user()->getAuthIdentifier(),
                'role'=>'admin'])->exists()  || $company->creator_id==Auth::user()->getAuthIdentifier();
        if($isAdmin) {
            $admin = Auth::user()->getAuthIdentifier();
            if ($admin == $user_id) {
                return redirect()->route('company-admin', $company_id);
            }
            else {
                return redirect()->to('/company-action-menu-'.$company_id.'?user='.$user_id);
            }
        }
        else if ($company->users()->where('user_id', Auth::user()->getAuthIdentifier())->exists()) {
            return redirect()->route('company-profile', $company_id);
        }
        else {
            UsersFriedsByCompany::create(['user_id' => Auth::user()->getAuthIdentifier(),
                'company_id' => $company_id, 'parent_id' => $user_id]);
            $company->users()->attach(['user_id' => Auth::user()->getAuthIdentifier()]);
             return redirect('/user-profile');
        }



    }
}
