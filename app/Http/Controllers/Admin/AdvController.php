<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Adv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advs = Adv::Orderby('id', 'desc')->get();
        return view('admin.web.adv', compact('advs'));
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
        $request->validate([


            'image' => 'required|mimes:jpg,jpeg,png'

         ]);

         $filename = time().'.'.$request->file('image')->extension();
         $request->image->storeAs('uploads/adv', $filename, 'public');

         $data = [
              'alt'=>$request->alt,
            'link' => $request->link,
             'image' => $filename,
         ];
        Adv::create($data);

         return Back()->with('success', 'added');
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
        $adv = Adv::find($id);


        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/uploads/adv/'.$adv->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/adv', $filename, 'public');
        } else {
            $filename = $adv->image;
        }

        $data = [
             'alt'=>$request->alt,
            'link' => $request->link,
            'image' => $filename,
        ];


        $adv->update($data);
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
