<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::Orderby('id', 'desc')->get();
        return view('admin.web.banner', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'first_title' => 'required',
           'second_title' => 'required',
           'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $filename = time().'.'.$request->file('image')->extension();
        $request->image->storeAs('uploads/banner', $filename, 'public');
        $filename = 'uploads/banner/'.$filename;

        Banner::create([
            'first_title' => $request->first_title,
            'second_title' => $request->second_title,
            'image' => $filename,
        ]);

        return redirect(route('banner.index'))->with('success', 'Added Successfully');
    }
    
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);

        $request->validate([
            'first_title' => 'required',
            'second_title' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/'.$banner->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/banner', $filename, 'public');
            $filename = 'uploads/banner/'.$filename;
        } else {
            $filename = $banner->image;
        }

        $banner->update([
            'first_title' => $request->first_title,
            'second_title' => $request->second_title,
            'image' => $filename,
        ]);

        return redirect(route('banner.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        Storage::delete('/public/'.$banner->image);
        Banner::destroy($banner->id);

        return redirect(route('banner.index'))->with('success', 'Deleted Successfully');
    }
}
