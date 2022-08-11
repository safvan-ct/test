<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AwardController extends Controller
{
    public $active = 'website';
    public $active_sub = 'award';

    public function index()
    {
        return view('admin.award.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = Award::Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                if(!is_null($result->image)) {
                    $path = asset('/storage/uploads/award/' . $result->image);
                    return "<img src='{$path}' style='width: 100px; height: 50px'>";
                }
                return '';
            })

            ->addColumn('action', function ($result) {
                $path = !is_null($result->image) ? asset('/storage/uploads/award/' . $result->image) : '';
                $delete_url = route('award.status', [$result->id, 2]);
                $url = route('award.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info'>{$text}</button>
                    <span style='display: none' id='title_{$result->id}'>{$result->title}</span>
                    <span style='display: none' id='image_{$result->id}'>{$path}</span>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $award = $request->id == 0 ? new Award : Award::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0){
            $request->validate([
                'title' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png,webp',
            ]);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/award/' . $award->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/award', $filename, 'public');
        }
        else {
            $filename = $award->image;
        }

        $data = [
            'title' => $request->title,
            'image' => $filename,
        ];

        $award->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = Award::findOrFail($id);
        if (in_array($status, [0,1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            Storage::delete('/public/uploads/award/' . $obj->image);
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message.' Sucessfully']);
    }
}
