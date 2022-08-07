<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Homequiz;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class HomequizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homequizs = Homequiz::Orderby('id', 'desc')->get();
        return view('admin.web.homequiz')->with('homequizs', $homequizs );
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
        $homequiz = Homequiz::find($id);
        $request->validate([
            'link' => 'required',

         ]);

         if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/'.$homequiz->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/homequiz', $filename, 'public');
            $filename = 'uploads/homequiz/'.$filename;
        } else {
            $filename = $homequiz->image;
        }

        $data = [
             'alt'=>$request->alt,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image'=>$filename,
        ];

        $homequiz->update($data);
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
