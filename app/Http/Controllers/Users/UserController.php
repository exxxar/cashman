<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getAuthUser()
    {
        $profile = Auth::user();
        $news = CompanyAdvertising::where('type', 'Баннер')->get();
        $stories = CompanyAdvertising::where('type', 'Сторис')->get();
        //$yourIp = Location::get($_SERVER['REMOTE_ADDR']);
        $yourIp = $this->getIp();
        /* $yourIp = request()->ip();
         $yourIp = geoip()->getLocation($yourIp);*/
        $yourIp = geoip()->getLocation($yourIp);
        $latitude = $yourIp['lat'];
        $longitude = $yourIp['lon'];
        logger($yourIp['lat']);
        logger($yourIp['lon']);
        $radius = 100; //km

        $companies = Company::selectRaw("id, title, image, latitude, longitude,
                         ( 6371 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc')
            ->offset(0)
            ->limit(20)
            ->get();
        // $companies = Company::latest()->get();
        return view('pages/welcome', compact('profile', 'news', 'companies', 'stories'));

    }

    function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    logger($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }

                }
            }
        }
    }
}
