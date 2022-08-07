<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class BestsalesliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider =  DB::table('bestsaleslider')->Orderby('id', 'desc')->get();

        return view('admin.web.bestsaleslider')->with('sliders', $slider );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png'

        //  ]);

        //  $filename = time().'.'.$request->file('image')->extension();
        //  $request->image->storeAs('uploads/bestsaleslider', $filename, 'public');

        //  $data = [
        //      'link' => $request->link,
        //      'image' => $filename,
        //  ];
        // Slider::create($data);

        //  return Back()->with('success', 'added');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
$slider=DB::table('bestsaleslider')-> where('id', $id)->first();
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/bestsaleslider/'.$slider->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/bestsaleslider', $filename, 'public');
        } else {
           $filename = $slider->image;
        }

     if($filename != " ")
     {
          DB::table('bestsaleslider')-> where('id', $id)->update(['link' =>$request->link,'image'=>$filename]);;
     }
     else
     {
          DB::table('bestsaleslider')-> where('id', $id)->update(['link' =>$request->link ]);;

     }

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
        $slider= Slider::findOrFail($id);
        $slider->delete();

        return redirect(route('quantity.index'))->with('success', 'Deleted Successfully');
    }
}
