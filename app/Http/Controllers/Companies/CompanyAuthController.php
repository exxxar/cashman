<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyAuthController extends Controller
{
    /**
     * @param Request $request
     */

    public function register(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'domain' => ['required', 'string', 'unique:companies'],
            'logo' => ['image'],
            'description' => ['required', 'string', 'max:255'],
            'confirmed' => ['accepted']
        ]);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'domain' => ['required', 'string'],
        ]);
    }
}
