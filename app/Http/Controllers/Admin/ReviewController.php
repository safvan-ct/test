<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    public $active = 'product';
    public $active_sub = 'review';

    public function index()
    {
        return view('admin.review.index')
            ->with('active', $this->active)
            ->with('active_sub', $this->active_sub);
    }

    public function result()
    {
        $results = Review::with('product')->Orderby('id', 'desc')->get();
        return DataTables::of($results)
            ->addIndexColumn()

            ->addColumn('action', function ($result) {
                $delete_url = route('review.status', [$result->id, 2]);
                $url = route('review.status', [$result->id, $result->is_active == 1 ? 0 : 1]);
                $text = $result->is_active == 0 ? 'Disable' : 'Enable';

                $res = "<button style='display: none' type='button' class='btn btn-block btn-primary' onclick='createUpdateModal({$result->id})'>Edit</button>
                    <button type='button' onclick='return confirmStatusModal(2, \"{$delete_url}\")' class='btn btn-block btn-danger'>Delete</button>
                    <button type='button' onclick='return confirmStatusModal($result->is_active, \"{$url}\")' class='btn btn-info btn-block'>{$text}</button>";

                return $res;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    public function status($id, $status)
    {
        $obj = Review::findOrFail($id);
        if (in_array($status, [0, 1])) {
            $obj->update(['is_active' => $status]);
            $message = $status == 0 ? 'Disabled' : 'Enabled';
        } elseif (in_array($status, [2])) {
            $obj->delete();
            $message = 'Deleted';
        }

        return json_encode(['response' => 'success', 'message' => $message . ' Sucessfully']);
    }
}
