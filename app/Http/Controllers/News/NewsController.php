<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNewsItem($id)
    {
        $news = (object)[
            'title' => ' Rules you need to know in business',
            'avatar' => '../assets/sample/avatar/avatar1.jpg',
            'name' => 'Jack Doe',
            'created_at' => ' 24, September 2021',
            'description' => ' Proin luctus viverra volutpat. Aenean hendrerit nisi quis consequat pretium. Maecenas ut vestibulum
justo. Morbi eleifend ante eget arcu sodales malesuada. Nunc interdum ac diam ut bibendum. Proin gravida
sit amet urna ac scelerisque. Vivamus consectetur ex vel felis bibendum fermentum.',
            'image' => '../assets/sample/photo/3.jpg',
            'description2' => ' Proin luctus viverra volutpat. Aenean hendrerit nisi quis consequat pretium. Maecenas ut vestibulum
justo. Morbi eleifend ante eget arcu sodales malesuada. Nunc interdum ac diam ut bibendum. Proin gravida
sit amet urna ac scelerisque. Vivamus consectetur ex vel felis bibendum fermentum.',
            'image2' => '../assets/sample/photo/3.jpg',
            'title2' => ' Nullam augue magna, dignissim sit amet libero eu, ultrices tempus metus. Ut finibus ac justo eu tempor.
Quisque egestas lectus neque, quis sodales lacus volutpat id.'
        ];
        return view('pages/userProfile/news/newsDetailPage', compact('news'));
    }
}
