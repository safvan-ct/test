<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopupBanner;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PopupBannerController extends Controller
{
    public $active = 'website';
    public $active_sub = 'slider';

    public function index()
    {
        return view('admin.popup-banner.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = PopupBanner::Orderby('id', 'desc')->get();
        return Datatables::of($results)
            ->addIndexColumn()
            ->addColumn('image', function ($result) {
                if(!is_null($result->image)) {
                    $path = asset('/storage/uploads/popup_banner/' . $result->image);
                    return "<img src='{$path}' style='width: 100px; height: 50px'>";
                }
                return '';
            })

            ->addColumn('action', function ($result) {
                $path = !is_null($result->image) ? asset('/storage/uploads/popup_banner/' . $result->image) : '';
                $delete_url = route('popup.banner.status', [$result->id, 2]);
                $url = route('popup.banner.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button type='button' class='btn btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-danger'>Delete</button>
                    <button style='display: none' type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info'>{$text}</button>
                    <span style='display: none' id='title_{$result->id}'>{$result->title}</span>
                    <span style='display: none' id='content_{$result->id}'>{$result->content}</span>
                    <span style='display: none' id='duration_{$result->id}'>{$result->duration}</span>
                    <span style='display: none' id='image_{$result->id}'>{$path}</span>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function createUpdate(Request $request)
    {
        $popup_banner = $request->id == 0 ? new PopupBanner : PopupBanner::find($request->id);
        $id = $request->id == 0 ? null : $request->id;

        if($request->id == 0 && is_null($request->content) && !$request->hasFile('image')) {
            return json_encode(['response' => 'error', 'message' => 'Content or image required']);
        }

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:jpg,jpeg,png,webp']);
            Storage::delete('/public/uploads/popup_banner/' . $popup_banner->image);
            $filename = time() . '.' . $request->file('image')->extension();
            $request->image->storeAs('uploads/popup_banner', $filename, 'public');
        }
        else {
            $filename = $popup_banner->image;
        }

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'duration' => $request->duration,
            'image' => $filename,
        ];

        $popup_banner->updateOrCreate(['id' => $id], $data);
        return json_encode(['response' => 'success', 'message' => 'Updated Sucessfully']);
    }

    public function status($id, $status)
    {
        $obj = PopupBanner::findOrFail($id);
        if (in_array($status, [0,1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            Storage::delete('/public/uploads/popup_banner/' . $obj->image);
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message.' Sucessfully']);
    }
}
