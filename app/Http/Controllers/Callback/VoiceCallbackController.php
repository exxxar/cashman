<?php

namespace App\Http\Controllers\Callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoiceCallbackController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'string'],
            'name' => ['required', 'string']
        ]);
    }

}
