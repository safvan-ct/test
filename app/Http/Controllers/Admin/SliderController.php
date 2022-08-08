<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public $active = 'website';
    public $active_sub = 'slider';

    public function index()
    {
        return view('admin.web.slider')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $slider = Slider::Orderby('id', 'desc')->get();
        return Datatables::of($slider)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                $path = asset('/storage/uploads/slider/' . $result->image);
                return "<img src='{$path}' style='width: 100px; height: 50px'>";
            })

            ->addColumn('action', function ($result) {
                $path = asset('/storage/uploads/slider/' . $result->image);
                $btn = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
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
        $slider = Slider::find($request->id);
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
            'title' => $request->title,
            'link' => $request->link,
            'sub_title' => $request->sub_title,
            'image' => $filename,
        ];

        $slider->update($data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect(route('quantity.index'))->with('success', 'Deleted Successfully');
    }
}
