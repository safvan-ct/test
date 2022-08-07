<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Homeabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeaboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeabouts = Homeabout::Orderby('id', 'desc')->get();
        return view('admin.web.homeabout')->with('homeabouts', $homeabouts );
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
        $homeabout = Homeabout::find($id);
        $request->validate([
            'title' => '',
            'description' => 'required',

         ]);

         if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/'.$homeabout->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/homeabout', $filename, 'public');
            $filename = 'uploads/homeabout/'.$filename;
        } else {
            $filename = $homeabout->image;
        }

        $data = [
             'alt'=>$request->alt,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ];

        $homeabout->update($data);
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
