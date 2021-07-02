<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = (object)[
            ['id'=>1,
                'name' => 'John',
                'avatar' => 'assets/sample/photo/4.jpg',
                'phone' => '+38071476633',
                'country' => 'Russian',
                'region' => 'Region',
                'address' => 'Address 122, 97'
            ],
            ['id'=>2,
                'name' => 'John',
                'avatar' => 'assets/sample/photo/3.jpg',
                'phone' => '+38071476633',
                'country' => 'Russian',
                'region' => 'Region',
                'address' => 'Address 122, 97'
            ],
            ['id'=>3,
                'name' => 'John',
                'avatar' => 'assets/sample/photo/2.jpg',
                'phone' => '+38071476633',
                'country' => 'Russian',
                'region' => 'Region',
                'address' => 'Address 122, 97'
            ],
            ['id'=>4,
                'name' => 'John',
                'avatar' => 'assets/sample/photo/1.jpg',
                'phone' => '+38071476633',
                'country' => 'Russian',
                'region' => 'Region',
                'address' => 'Address 122, 97'
            ]
        ];
        return view('pages/companyProfile/Admin/AdminUsersPage', compact('users'));
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
        //
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
        //
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
