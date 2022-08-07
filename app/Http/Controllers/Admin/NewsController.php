<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $newss = News::Orderby('id', 'desc')->get();
        return view('admin.web.news', compact('newss'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
         ]);

         $filename = time().'.'.$request->file('image')->extension();
         $request->image->storeAs('uploads/news', $filename, 'public');
         $filename = 'uploads/news/'.$filename;

         News::create([
              'alt'=>$request->alt,
             'title' => $request->title,
             'description' => $request->description,
             'image' => $filename,
         ]);

         return redirect(route('news.index'))->with('success', 'Added Successfully');
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
        $news = News::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png']);
            Storage::delete('/public/'.$news->image);
            $filename = time().'.'.$request->file('image')->extension();
            $request->image->storeAs('uploads/news', $filename, 'public');
            $filename = 'uploads/news/'.$filename;
        } else {
            $filename = $news->image;
        }

        $news->update([
             'alt'=>$request->alt,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect(route('news.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        Storage::delete('/public/'.$news->image);
        news::destroy($news->id);

        return redirect(route('news.index'))->with('success', 'Deleted Successfully');
    }
}
