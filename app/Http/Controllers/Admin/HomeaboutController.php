<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Homeabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeaboutController extends Controller
{
    public $active = 'website';
    public $active_sub = 'home_about';

    public function index()
    {
        $homeabouts = Homeabout::Orderby('id', 'desc')->get();
        return view('admin.web.homeabout')
            ->with('homeabouts', $homeabouts)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $homeabout = Homeabout::find($id);
        $request->validate([
            'title' => '',
            'description' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/' . $homeabout->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/homeabout', $filename, 'public');
            $filename = 'uploads/homeabout/' . $filename;
        } else {
            $filename = $homeabout->image;
        }

        $data = [
            'alt' => $request->alt,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ];

        $homeabout->update($data);
        return Back()->with('success', 'Updated Sucessfully');
    }
}
