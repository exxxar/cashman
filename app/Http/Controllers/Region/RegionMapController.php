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
        $coords = $company['position'];
        return view('pages/companies/regionMapPage', compact('coords'));
    }
}
