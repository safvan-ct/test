<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public $active = 'website';
    public $active_sub = 'slider';

    public function index()
    {
        $slider = Slider::Orderby('id', 'desc')->get();
        return view('admin.web.slider')
            ->with('sliders', $slider)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        $filename = time() . '.' . $request->file('image')->extension();
        $request->image->storeAs('uploads/slider', $filename, 'public');

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'link' => $request->link,
            'image' => $filename,
        ];
        Slider::create($data);

        return Back()->with('success', 'added');
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
        $slider = Slider::find($id);
        $request->validate([]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/slider/' . $slider->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/slider', $filename, 'public');
        } else {
            $filename = $slider->image;
        }

        $data = [
            'title' => $request->title,
            'link' => $request->link,
            'sub_title' => $request->sub_title,
            'image' => $filename,
        ];

        $slider->update($data);
        return Back()->with('success', 'Updated Sucessfully');

    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect(route('quantity.index'))->with('success', 'Deleted Successfully');
    }
}
