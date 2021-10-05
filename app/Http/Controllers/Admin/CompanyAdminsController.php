<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyUser;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class CompanyAdminsController extends Controller
{
    public function getCompanyGroupAdmin($id){
        $adminIds = CompanyUser::where(['company_id'=>$id, 'role'=>'admin'])->pluck('user_id');
        $admins = UserProfile::whereIn('id', $adminIds)->get();
        foreach ($admins as $admin){
            $admin['isActive'] = CompanyUser::where(['company_id'=>$id, 'user_id'=>$admin->user_id, 'role'=>'admin'])->value('isActive');
        }
        return view('pages/companyProfile/Admin/CompanyGroupAdmin', compact('admins'));
    }

    public function addCompanyAdmin(Request $request){
        $this->validate($request, [
            'user' => ['required', 'exists:users,id'],
        ]);
        if(CompanyUser::where(['user_id'=>$request->user, 'company_id'=>$request->company['id']])->exists()){
            $admin = CompanyUser::where(['user_id'=>$request->user, 'company_id'=>$request->company['id']])->first();
            $admin->role='admin';
            $admin->isActive=true;
            $admin->save();
        }
        else{
            CompanyUser::create([
               'user_id'=>$request->user,
               'company_id'=>$request->company['id'],
               'role'=>'admin',
                'isActive'=>true
            ]);
        }
    }
    public function deleteCompanyAdmin(Request $request){
        $this->validate($request, [
            'user' => ['required', 'exists:users,id'],
        ]);
        if(!CompanyUser::where(['user_id'=>$request->user, 'company_id'=>$request->company['id'], 'role'=>'admin'])->exists()){
           return response()->json(['error'=>'Выбранный пользователь не является администратором компании']);
        }
        $user = CompanyUser::where(['user_id'=>$request->user, 'company_id'=>$request->company['id'], 'role'=>'admin'])->first();
        $user->role='user';
        $user->isActive=null;
        $user->save();
    }
    public function changeActiveAdmin($admin, $company){
        $user = CompanyUser::where(['user_id'=>$admin, 'company_id'=>$company])->first();
        if($user->role=='admin') {
            $user->isActive = !$user->isActive;
            $user->save();
        }
    }
}
