<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public $active = 'website';
    public $active_sub = 'blogs';

    public function index()
    {
        $newss = News::Orderby('id', 'desc')->get();
        return view('admin.web.news')
            ->with('newss', $newss)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $filename = time() . '.' . $request->file('image')->extension();
        $request->image->storeAs('uploads/news', $filename, 'public');
        $filename = 'uploads/news/' . $filename;

        News::create([
            'alt' => $request->alt,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect(route('news.index'))->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/' . $news->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/news', $filename, 'public');
            $filename = 'uploads/news/' . $filename;
        } else {
            $filename = $news->image;
        }

        $news->update([
            'alt' => $request->alt,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect(route('news.index'))->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        Storage::delete('/public/' . $news->image);
        news::destroy($news->id);

        return redirect(route('news.index'))->with('success', 'Deleted Successfully');
    }
}
