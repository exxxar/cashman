<?php

namespace App\Http\Controllers\HistoryAction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryActionController extends Controller
{
    public function getActionDetail($id)
    {
        $action = (object)[
            'logo' => "../assets/sample/brand/1.jpg",
            'description' => "John sent you",
            'money_in_check' => 200,
            'type' => "Payment Received",
            'value' => "Payment Received",
            'created_at' => '5/3/2020 10:30 AM'
        ];
        return view('pages/userProfile/actions/actionDetail', compact('action'));
    }
}
