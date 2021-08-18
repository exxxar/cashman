<?php

namespace App\Http\Controllers\Region;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class RegionMapController extends Controller
{
    public function getMap($id)
    {
        $company = Company::where('id', $id)->first();
        $position = json_decode($company['position']);
        $coords = [(float)$position->lat, (float)$position->lon];
        return view('pages/companies/regionMapPage', compact('coords'));
    }
}
