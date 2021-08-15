<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyAuthController extends Controller
{
    /**
     * @param Request $request
     */

    public function register(Request $request)
    {
        $result = [];
        $this->validate($request, [
            'title' => ['required', 'string'],
            'domain' => ['required', 'string', 'unique:companies'],
            'image' => ['required'],
            'description' => ['required', 'string'],
            'position' => ['required', 'string'],
            'confirmed' => ['accepted']
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = md5(time() . $image->getClientOriginalName() . Auth::user()->getAuthIdentifier());
            $image->move(public_path('assets/sample/companyLogos'), $imagename);
            $company = Company::create(['title' => $request->title,
                'domain' => $request->domain, 'image' => 'companyLogos/' . $imagename,
                'description' => $request->description,
                'company_group_id' => 1, 'position' => $request->position,
                'creator_id' => Auth::user()->getAuthIdentifier(),
                'socials'=>[
                    'vk'=>'',
                    'telegram'=>'',
                    'instagram'=>'',
                    'facebook'=>'',
                    'youtube'=>'',
                ],
                'properties'=>[
                    'time'=>'',
                    'address'=>''
                ]
            ]);

            $result['href'] = route('user-qr', ['user' => $company->creator_id, 'company' => $company->id]);
            return response()->json($result);
        }


    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $result = [];
        $this->validate($request, [
            'domain' => ['required', 'string', 'exists:companies'],
        ]);
        $company = Company::where('domain', $request->domain)->first();
        $result['href'] = route('user-qr', ['user' => Auth::user()->getAuthIdentifier(), 'company' => $company->id]);
        return response()->json($result);


    }
}
