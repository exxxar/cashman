<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisement = (object)[
            ['id' => 1,
                'title' => 'cheese',
                'description' => 'best cheese',
                'creator_id' => 'John Wild',
                'images' => 'assets/sample/photo/3.jpg',
                'type' => 'sale type'],
            ['id' => 2,
                'title' => 'cheese',
                'description' => 'best cheese',
                'creator_id' => 'John Wild',
                'images' => 'assets/sample/photo/2.jpg',
                'type' => 'sale type'],
            ['id' => 3,
                'title' => 'cheese',
                'description' => 'best cheese',
                'creator_id' => 'John Wild',
                'images' => 'assets/sample/photo/1.jpg',
                'type' => 'sale type'],
            ['id' => 4,
                'title' => 'cheese',
                'description' => 'best cheese',
                'creator_id' => 'John Wild',
                'images' => 'assets/sample/photo/4.jpg',
                'type' => 'sale type'],

        ];
        return view('pages/companyProfile/Admin/AdminAdvertisementPage', compact('advertisement'));
    }

    public function getAdvertisement()
    {
        $stories = (object)[
            ['avatar' => "assets/sample/avatar/avatar1.jpg", 'image' => "assets/sample/photo/1.jpg",
                'name' => "Ashley Graham", 'created_at' => "24.06.2021", 'title' => "Another Title Here",
                'description' => "This is simple text for the story"],
            ['avatar' => "assets/sample/avatar/avatar2.jpg", 'image' => "assets/sample/photo/1.jpg",
                'name' => "Ashley Graham", 'created_at' => "24.06.2021", 'title' => "Another Title Here",
                'description' => "This is simple text for the story"],
            ['avatar' => "assets/sample/avatar/avatar3.jpg", 'image' => "assets/sample/photo/1.jpg",
                'name' => "Ashley Graham", 'created_at' => "24.06.2021", 'title' => "Another Title Here",
                'description' => "This is simple text for the story"],
            ['avatar' => "assets/sample/avatar/avatar4.jpg", 'image' => "assets/sample/photo/1.jpg",
                'name' => "Ashley Graham", 'created_at' => "24.06.2021", 'title' => "Another Title Here",
                'description' => "This is simple text for the story"],
        ];
        $news = (object)[
            ['id' => 1, 'image' => "assets/sample/photo/1.jpg", 'title' => "What will be the value of bitcoin in the next..."],
            ['id' => 2, 'image' => "assets/sample/photo/1.jpg", 'title' => "What will be the value of bitcoin in the next..."],
            ['id' => 3, 'image' => "assets/sample/photo/1.jpg", 'title' => "What will be the value of bitcoin in the next..."],
            ['id' => 4, 'image' => "assets/sample/photo/1.jpg", 'title' => "What will be the value of bitcoin in the next..."],

        ];
        return view('pages/companyProfile/Admin/StoryAdminMenu', [
            'stories'=>$stories,
            'news'=>$news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string|max:255',
            'type' => 'required|string',
            'images' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string|max:255'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
