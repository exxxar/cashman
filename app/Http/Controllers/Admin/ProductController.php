<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return false|object|string
     */
    public function index()
    {
        $products =(object)[
            ['id'=>1,
            'title'=>'cheese',
            'description'=>'best cheese',
            'price'=>300,
            'discount_price'=>200,
            'type'=>'sale type'],
            ['id'=>2,
                'title'=>'cheese',
                'description'=>'best cheese',
                'price'=>300,
                'discount_price'=>200,
                'type'=>'sale type'],
            ['id'=>3,
                'title'=>'cheese',
                'description'=>'best cheese',
                'price'=>300,
                'discount_price'=>200,
                'type'=>'sale type'],
            ['id'=>4,
                'title'=>'cheese',
                'description'=>'best cheese',
                'price'=>300,
                'discount_price'=>200,
                'type'=>'sale type'],

        ];
        return view('pages/companyProfile/Admin/AdminProductsPage', compact('products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|string',
            'description'=>'required|string|max:255',
            'type'=>'required|string',
            'price'=>'required',
            'discount_price'=>'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required|string',
            'description'=>'required|string|max:255',
            'type'=>'required|string',
            'price'=>'required',
            'discount_price'=>'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
