<?php


namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService
{
    public function saveSocialData($user)
    {
        $email = $user->getEmail();
        $exist_user = User::where('email', $email)->first();
        if ($exist_user) {
            return $exist_user;
        }

    }

}
