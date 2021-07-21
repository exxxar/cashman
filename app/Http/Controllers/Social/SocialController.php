<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Service\SocialService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function index($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback($driver)
    {
        $user = Socialite::driver($driver)->user();
        $objSocial = new SocialService();
        if ($user = $objSocial->saveSocialData($user)) {
            Auth::login($user);
            return redirect()->route('user-profile');
        }
        if($driver == 'vkontakte') {
            return $this->complete($user->accessTokenResponseBody['email'] ?? null);
        }
        return $this->complete($user->email);
    }

    public function complete($email)
    {
        return view('auth.registerStepper', compact('email'));
    }

}
