<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Homequiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomequizController extends Controller
{
    public $active = 'website';
    public $active_sub = 'home_quiz';

    public function index()
    {
        $homequizs = Homequiz::Orderby('id', 'desc')->get();
        return view('admin.web.homequiz')
            ->with('homequizs', $homequizs)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function update(Request $request, $id)
    {
        $homequiz = Homequiz::find($id);
        $request->validate([
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/' . $homequiz->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/homequiz', $filename, 'public');
            $filename = 'uploads/homequiz/' . $filename;
        } else {
            $filename = $homequiz->image;
        }

        $data = [
            'alt' => $request->alt,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $filename,
        ];

        $homequiz->update($data);
        return Back()->with('success', 'Updated Sucessfully');
    }
}
