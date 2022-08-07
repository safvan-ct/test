<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BestsalesliderController extends Controller
{
    public $active = 'website';
    public $active_sub = 'product_slider';

    public function index()
    {
        $slider = DB::table('bestsaleslider')->Orderby('id', 'desc')->get();
        return view('admin.web.bestsaleslider')
            ->with('sliders', $slider)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $slider = DB::table('bestsaleslider')->where('id', $id)->first();
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/bestsaleslider/' . $slider->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/bestsaleslider', $filename, 'public');
        } else {
            $filename = $slider->image;
        }

        if ($filename != " ") {
            DB::table('bestsaleslider')->where('id', $id)->update(['link' => $request->link, 'image' => $filename]);
        } else {
            DB::table('bestsaleslider')->where('id', $id)->update(['link' => $request->link]);

        }

        return Back()->with('success', 'Updated Sucessfully');
    }
}
