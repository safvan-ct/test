<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public $active = 'website';
    public $active_sub = 'slider';

    public function index()
    {
        return view('admin.slider.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $slider = Slider::Orderby('id', 'desc')->get();
        return Datatables::of($slider)
            ->addIndexColumn()
            ->addColumn('type', function ($result) {
                return $result->type == 1 ? 'Home' : 'Product';
            })
            ->addColumn('image', function ($result) {
                $path = asset('/storage/uploads/slider/' . $result->image);
                return "<img src='{$path}' style='width: 100px; height: 50px'>";
            })
            ->addColumn('action', function ($result) {
                $path = asset('/storage/uploads/slider/' . $result->image);
                $btn = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <span style='display: none' id='type_{$result->id}'>{$result->type}</span>
                    <span style='display: none' id='title_{$result->id}'>{$result->title}</span>
                    <span style='display: none' id='sub_title_{$result->id}'>{$result->sub_title}</span>
                    <span style='display: none' id='link_{$result->id}'>{$result->link}</span>
                    <span style='display: none' id='image_{$result->id}'>{$path}</span>";

                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $slider = $request->id == 0 ? new Slider : Slider::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0){
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,webp',
            ]);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/slider/' . $slider->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/slider', $filename, 'public');
        } else {
            $filename = $slider->image;
        }

        $data = [
            'type' => $request->type,
            'title' => $request->title,
            'link' => $request->link,
            'sub_title' => $request->sub_title,
            'image' => $filename,
        ];

        $slider->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }
}
