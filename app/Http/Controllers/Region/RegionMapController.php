<?php

namespace App\Http\Controllers\Region;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegionMapController extends Controller
{
    public function getMap($id)
    {
        $coords = [39, 45];
        return view('pages/companies/regionMapPage', compact('coords'));
    }
}
