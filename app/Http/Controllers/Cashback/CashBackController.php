<?php

namespace App\Http\Controllers\Cashback;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\HistoryUsersCompany;
use Illuminate\Http\Request;

class CashBackController extends Controller
{
    public function debitingCashback(Request $request){
        $this->validate($request, [
            'user'=>['required', 'exists:users,id'],
            'description'=>['required'],
            'sum'=>['required'],
            'cashback'=>['required']
        ]);
        $company = Company::find($request->company_id);
        HistoryUsersCompany::create([
            'user_id'=>$request->user,
            'company_id'=>$request->company_id,
            'company_admin_id'=>$company->creator_id,
            'value'=>$request->cashback,
            'money_in_check'=>$request->sum,
            'description'=>$request->description,
            'type'=>'Списание'
        ]);

    }
}
