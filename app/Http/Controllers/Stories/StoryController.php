<?php

namespace App\Http\Controllers\Stories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function addStory(Request $request)
    {
        $file = $request->file('file');
        $file->store('public/uploads');
    }
}
