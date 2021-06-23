<?php

namespace App\Http\Controllers\Callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string'],
            'message' => ['required', 'string', 'max:255']
        ]);
    }
}
