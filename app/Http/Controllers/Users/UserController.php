<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAdvertising;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function getAuthUser()
    {
        $profile = Auth::user();
        $news = CompanyAdvertising::where('type', 'Баннер')->get();
        $stories = CompanyAdvertising::where('type', 'Сторис')->get();

        //$yourIp = request()->ip();
       /* $yourIp = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        logger($yourIp['lat']);
        logger($yourIp['lon']);*/

        /*$upper_latitude = 48.007746 + (.50); //Change .50 to small values
        $lower_latitude = 48.007746 - (.50); //Change .50 to small values
        $upper_longitude = 37.804889 + (.50); //Change .50 to small values
        $lower_longitude = 37.804889 - (.50); //Change .50 to small values

        $result = DB::table('companies')
            ->whereBetween('position', [$lower_latitude, $upper_latitude])
            ->whereBetween('position.lon', [$lower_longitude, $upper_longitude])
            ->get();
        logger($result);*/
       /* $query = "SELECT (3956 * 2 * ASIN(SQRT( POWER(SIN(( $latitude - latitude) *  pi()/180 / 2), 2) +
        COS( $latitude * pi()/180) * COS(latitude * pi()/180) * POWER(SIN(( $longitude - longitude) *
        pi()/180 / 2), 2) ))) as distance, latitude, longitude" FROM COMPANIES HAVING distance <= 30;*/
        $companies = Company::latest()->get();
        return view('pages/welcome', compact('profile', 'news', 'companies', 'stories'));

    }


}
