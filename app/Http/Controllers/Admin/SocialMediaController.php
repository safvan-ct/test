<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMeadia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SocialMediaController extends Controller
{
    public $active = 'website';
    public $active_sub = 'social_meadia';

    public function index()
    {
        return view('admin.social-meadia.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = SocialMeadia::Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                if(!is_null($result->image)) {
                    $path = asset('/storage/uploads/social_meadia/' . $result->image);
                    return "<img src='{$path}' style='width: 100px; height: 50px'>";
                }
                return '';
            })

            ->addColumn('action', function ($result) {
                $path = !is_null($result->image) ? asset('/storage/uploads/social_meadia/' . $result->image) : '';
                $delete_url = route('social.meadia.status', [$result->id, 2]);
                $url = route('social.meadia.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info'>{$text}</button>
                    <span style='display: none' id='name_{$result->id}'>{$result->name}</span>
                    <span style='display: none' id='link_{$result->id}'>{$result->link}</span>
                    <span style='display: none' id='image_{$result->id}'>{$path}</span>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $social_meadia = $request->id == 0 ? new SocialMeadia : SocialMeadia::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0){
            $request->validate([
                'name' => 'required',
                'link' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,webp',
            ]);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/social_meadia/' . $social_meadia->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/social_meadia', $filename, 'public');
        }
        else {
            $filename = $social_meadia->image;
        }

        $data = [
            'name' => $request->name,
            'link' => $request->link,
            'image' => $filename,
        ];

        $social_meadia->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = SocialMeadia::findOrFail($id);
        if (in_array($status, [0,1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            Storage::delete('/public/uploads/social_meadia/' . $obj->image);
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message.' Sucessfully']);
    }
}
