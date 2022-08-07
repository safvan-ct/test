<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{
    public $active = 'website';
    public $active_sub = 'social_meadia';

    public function index()
    {
        $datas = DB::table('socialmedias')->Orderby('id', 'desc')->get();

        return view('admin.web.socialmedia')
            ->with('datas', $datas)
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //$filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
            $filename1 = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/socialmedia', $filename1, 'public');
            $filename1 = 'uploads/socialmedia/' . $filename1;
        }

        $data = [
            'link' => $request->link,
            'alt' => $request->alt,
            'image' => $filename1,
        ];
        DB::table('socialmedias')->insert($data);

        return back()->with('success', 'Added Successfully');
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            //$filename1 = 'product_1_'.time().'.'.$request->file('image1')->extension();
            $filename1 = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/socialmedia', $filename1, 'public');
            $filename1 = 'uploads/socialmedia/' . $filename1;
        }
        if ($request->hasFile('image')) {
            $leave = DB::table('socialmedias')->where('id', $id)->update(['image' => $filename1, 'alt' => $request->alt, 'link' => $request->link]);
        } else {
            $leave = DB::table('socialmedias')->where('id', $id)->update(['alt' => $request->alt, 'link' => $request->link]);
        }

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        DB::table('socialmedias')->where('id', $id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
