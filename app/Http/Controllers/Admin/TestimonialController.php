<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public $active = 'website';
    public $active_sub = 'testimonial';

    public function index()
    {
        return view('admin.testimonials.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = Testimonial::Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                if(!is_null($result->image)) {
                    $path = asset('/storage/uploads/testimonial/' . $result->image);
                    return "<img src='{$path}' style='width: 100px; height: 50px'>";
                }
                return '';
            })

            ->addColumn('action', function ($result) {
                $path = !is_null($result->image) ? asset('/storage/uploads/testimonial/' . $result->image) : '';
                $delete_url = route('testimonial.status', [$result->id, 2]);
                $url = route('testimonial.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-primary btn-block' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger btn-block'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info btn-block'>{$text}</button>
                    <span style='display: none' id='name_{$result->id}'>{$result->name}</span>
                    <span style='display: none' id='designation_{$result->id}'>{$result->designation}</span>
                    <span style='display: none' id='quote_{$result->id}'>{$result->quote}</span>
                    <span style='display: none' id='image_{$result->id}'>{$path}</span>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $testimonial = $request->id == 0 ? new Testimonial : Testimonial::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0){
            $request->validate([
                'name' => 'required',
                'designation' => 'required',
                'quote' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,webp',
            ]);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/testimonial/' . $testimonial->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/testimonial', $filename, 'public');
        }
        else {
            $filename = $testimonial->image;
        }

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'quote' => $request->quote,
            'image' => $filename,
        ];

        $testimonial->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = Testimonial::findOrFail($id);
        if (in_array($status, [0,1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            Storage::delete('/public/uploads/testimonial/' . $obj->image);
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message.' Sucessfully']);
    }
}
