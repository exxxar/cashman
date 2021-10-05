<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\UserProfile;
use App\Models\UsersFriedsByCompany;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'submitted'=>['accepted']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data

     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $parent_id = session('user');
        $company_id = session('company');
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $profile = UserProfile::create([
            'user_id'=>$user->id,
            'avatar'=>'avatar/avatar1.jpg',
            'messengers'=>[
                'vk' => null,
                'telegram' => null,
                'instagram' => null,
                'facebook' => null,
                'youtube' => null
            ]
        ]);
        if($parent_id!=null && $company_id!=null) {
            $company = Company::where('id', $company_id)->first();
            UsersFriedsByCompany::create(['user_id' => $user->id,
                'company_id' => $company_id, 'parent_id' => $parent_id]);
            $company->users()->attach(['user_id' => $user->id]);
        }
        return $user;
    }

}
