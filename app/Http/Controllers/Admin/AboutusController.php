<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = Aboutus::Orderby('id', 'desc')->get();

        return view('admin.web.aboutus')->with('abouts', $abouts );
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
        //
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
        $aboutus = Aboutus::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
         ]);



        $data = [
            'title' => $request->title,
            'description' => $request->description,
            
             'Heading' => $request->heading,
            'Productsaled' => $request->productsaled,
            
             'NumberofProducts' => $request->numberofproducts,
            'Buyersactive' => $request->buyersactive,
            
             'Rating' => $request->rating,
            'awardheading' => $request->awardheading,
            
              'awarddescription' => $request->awarddescription,
        ];


        $aboutus->update($data);
        return Back()->with('success', 'Updated Sucessfully');

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
