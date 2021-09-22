<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyActionMenuController extends Controller
{
    public function index($id){
        return view('pages/companyProfile/Admin/CompanyActionMenu', compact('id'));
    }

    public function adminMenu($id){
        return view('pages/companyProfile/Admin/companyAdminMenuPage', compact('id'));
    }
}
