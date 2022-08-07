<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\OfferBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferBannerController extends Controller
{
    public function index()
    {
        $banners = OfferBanner::Orderby('id', 'desc')->get();
        return view('admin.web.offer-banner', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);
 
        $filename = time().'.'.$request->file('image')->extension();
        $request->image->storeAs('uploads/offer', $filename, 'public');
        $filename = 'uploads/offer/'.$filename;
 
        OfferBanner::create([
             'alt'=>$request->alt,
            'title' => $request->title,
            'image' => $filename,
        ]);
        
        return redirect(route('offer.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $banner = OfferBanner::find($id);

        $request->validate([
            'title' => 'required',
         ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/'.$banner->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/offer', $filename, 'public');
            $filename = 'uploads/offer/'.$filename;
        } else {
            $filename = $banner->image;
        }

        $banner->update([
             'alt'=>$request->alt,
            'title' => $request->title,
            'image' => $filename,
        ]);

        return redirect(route('offer.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $banner = OfferBanner::find($id);
        Storage::delete('/public/'.$banner->image);
        OfferBanner::destroy($banner->id);

        return redirect(route('offer.index'))->with('success', 'Deleted Successfully');
    }
}
