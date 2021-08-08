<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyListController extends Controller
{
    public function index()
    {
        return Company::orderBy('created_at', 'DESC')->get();

    }
    public function search()
    {
        return Company::latest()->paginate(8);

    }
}
