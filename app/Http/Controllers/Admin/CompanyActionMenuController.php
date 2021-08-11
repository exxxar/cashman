<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyActionMenuController extends Controller
{
    public function index(){
        return view('pages/companyProfile/Admin/CompanyActionMenu');
    }

    public function adminMenu($id){
        return view('pages/companyProfile/Admin/companyAdminMenuPage', compact('id'));
    }
}
